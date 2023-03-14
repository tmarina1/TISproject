<?php 

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller 
{ 
    public function index(Request $request): View
    { 
    $totalPrice = 0; 
    $productsInCart = []; 
    $productsInSession = $request->session()->get("products"); 
    if ($productsInSession) 
    { 
    $productsInCart = Product::findMany(array_keys($productsInSession)); 
    $totalPrice = Product::sumPricesByQuantities($productsInCart, $productsInSession); 
    }

    $viewData = []; $viewData["title"] = "Point 'n shoot"; 
    $viewData["subtitle"] = "Shopping Cart"; 
    $viewData["total"] = $totalPrice; 
    $viewData["products"] = $productsInCart; 
    return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id): RedirectResponse
    {
    $products = $request->session()->get("products"); 
    $products[$id] = $request->input('quantity'); 
    $request->session()->put('products', $products); 
    return redirect()->route('cart.index')->with('success', 'Producto agregado satisfactioriamente');
    }

    public function remove(Request $request): RedirectResponse 
    { 
    $request->session()->forget('products'); 
    return back()->with("Productos eliminados satisfactioriamente"); 
    }

    public function removeElement(Request $request, string $id): RedirectResponse
    {
    $request->session()->forget('products.' .$id); 
    return back()->with("Producto eliminado satisfactioriamente"); 
    }
    public function purchase (Request $request): RedirectResponse
    {
        $productsInSession = $request->session()->get("products"); 
        if ($productsInSession){
        $userId = Auth::user()->getId(); 
        $order = new Order(); 
        $order->setUserId($userId);
        $order->setTotalPrice(0);
        $order->save(); 
        $total = 0; 
        $productsInCart = Product::findMany(array_keys($productsInSession)); 
        foreach ($productsInCart as $product) { 
        $quantity = $productsInSession[$product->getId()]; 
        $item = new Item(); 
        $item->setQuantity($quantity); 
        $item->setPrice($product->getPrice()); 
        $item->setProductId($product->getId()); 
        $item->setOrderId($order->getId()); 
        $item->save(); 
        $total = $total + ($product->getPrice()*$quantity); 
        } 
        $order->setTotalPrice($total); 
        $order->save();
        }else{
            return redirect()->route('cart.index');
        }
}
}