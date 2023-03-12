<?php 

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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
}