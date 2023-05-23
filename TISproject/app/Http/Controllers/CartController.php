<?php

//Tomas Marin Aristizabal y Juan Pablo Yepes

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $totalPrice = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $totalPrice = Product::sumPrices($productsInCart, $productsInSession);
        }

        $viewData = [];
        $viewData['subtitle'] = __('texts.shoppingCar');
        $viewData['total'] = $totalPrice;
        $viewData['products'] = $productsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id): RedirectResponse
    {
        $product = Product::find($id);
        $products = $request->session()->get('products');

        if ($product->getStock() == 0) {
        } elseif ($request->get('quantity') >= $product->getStock()) {
            $products[$id] = $product->getStock();
            $request->session()->put('products', $products);
        } else {
            $products[$id] = $request->input('quantity');
            $request->session()->put('products', $products);
        }

        return redirect()->route('cart.index')->with('addProduct', 1);
    }

    public function remove(Request $request): RedirectResponse
    {
        $request->session()->forget('products');

        return back()->with('removeProducts', 1);
    }

    public function removeElement(Request $request, string $id): RedirectResponse
    {
        $request->session()->forget('products.'.$id);

        return back()->with('removeProduct', 1);
    }

    public function purchase(Request $request): RedirectResponse
    {
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $totalPrice = Product::sumPrices($productsInCart, $productsInSession);
            if (Product::validateBalance($userId, $totalPrice) && Product::validateProduct($request)) {
                $order = new Order();
                $order->setUserId($userId);
                $order->setTotalPrice(0);
                $order->save();
                foreach ($productsInCart as $product) {
                    $quantity = $productsInSession[$product->getId()];
                    $item = new Item();
                    $item->setQuantity($quantity);
                    $item->setPrice($product->getPrice());
                    $item->setProductId($product->getId());
                    $item->setOrderId($order->getId());
                    $item->save();
                    Product::updateStock($product->getId(), $quantity);
                }
                $order->setTotalPrice($totalPrice);
                $order->save();

                $newBalance = Auth::user()->getBalance() - $totalPrice;
                Auth::user()->setBalance($newBalance);
                Auth::user()->save();
                $request->session()->forget('products');
                $viewData = [];
                $viewData['order'] = $order;

                return redirect()->route('order.show', $order->getId())->with('success', true);
            } else {
                return redirect()->route('cart.index')->with('fail', 1);
            }
        } else {
            return redirect()->route('cart.index');
        }
    }
}
