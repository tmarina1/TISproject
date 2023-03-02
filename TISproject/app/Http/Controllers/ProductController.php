<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{

  public function index(): View
  {
    return view('product.index');
  }

  public function list(): View
  {
    $viewData = [];
    $viewData["title"] = "Products - Point n shot";
    $viewData["subtitle"] =  "Lista de productos";
    $viewData["products"] = Product::all();
    return view('product.list')->with("viewData", $viewData);
  }

  public function show(string $id) : View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["id"] = $id;
        $viewData["reference"] = $product["reference"];
        $viewData["brand"] = $product["brand"];
        $viewData["price"] = $product["price"];
        $viewData["stock"] = $product["stock"];
        $viewData["description"] = $product["description"];
        $viewData["weight"] = $product["weight"];
        return view('product.show')->with("viewData", $viewData);
    }

  public function create(): View
  {
    $viewData = [];
    $viewData["title"] = "Crear producto";

    return view('product.create')->with("viewData", $viewData);
  }
  
  public function save(Request $request): \Illuminate\Http\RedirectResponse
  {
    #Hacer validacion
    Product::create($request->only(["reference", "image", "brand", "price", "stock", "description", "weight"]));
    return back()->with("success", "Elemento creado satisfactoriamente");
  }

}