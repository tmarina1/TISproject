<?php
#Tomas Marin Aristizabal

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
  public function index(): View
  {
    $viewData = [];
    $product = Product::all();
    $viewData["title"] = "Products - Point n shot";
    $viewData["subtitle"] =  "Lista de productos";
    $viewData["product"] = $product;

    return view('product.index')->with("viewData", $viewData);
  }

  public function show(string $id) : View
  {
    $viewData = [];
    $product = Product::findOrFail($id)::with('reviews')->get();
    $viewData["product"] = $product;

    return view('product.show')->with("viewData", $viewData);
  }

  #Los metodos de abajo van en admin

  public function create(): View
  {
    return view('product.create');
  }

  public function save(Request $request): \Illuminate\Http\RedirectResponse
  {
    Product::validate($request);
    
    $image = $request->file('image');
    $imageName =  "img/products/".time()."_".$image->getClientOriginalName();
    \Storage::disk('public')->put($imageName,  \File::get($image));

    $product = new Product([
      "reference" => $request->get('reference'),
      "image" => $imageName,
      "brand" => $request->get('brand'),
      "price" => $request->get('price'),
      "stock" => $request->get('stock'),
      "description" => $request->get('description'),
      "weight" => $request->get('weight')
    ]);
    $product->save();
    
    return back()->with("success", "Producto creado satisfactoriamente");
  }

  public function delete(string $id): View
  {
    $deleted = Product::where('id', $id)->delete();
    return $this->list();
  }

}