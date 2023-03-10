<?php
#Tomas Marin Aristizabal

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


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

  public function filter(Request $request)
  {
    $viewData["title"] = "Products - Point n shot";
    $viewData["subtitle"] =  "Lista de productos";
    $viewData["products"] = Product::whereBetween('price', '<=',$request->get('price'))->get();

    return view('product.list')->with("viewData", $viewData);
  }

  public function productsOfTheMonth()
  {
    $viewData["randomProducts"] = Product::inRandomOrder()->limit(3)->get();

  }
  
  #Los metodos de abajo van en admin

  public function create(): View
  {
    return view('product.create');
  }

  public function save(Request $request): RedirectResponse
  {
    Product::validate($request);
    
    $image = $request->file('image');
    $imageName =  "img/products/".time().$image->getClientOriginalName();
    Storage::disk('public')->put($imageName,  \File::get($image));

    $product = new Product;
    $product->setReference($request->get('reference'));
    $product->setImage($imageName);
    $product->setBrand($request->get('brand'));
    $product->setPrice($request->get('price'));
    $product->setStock($request->get('stock'));
    $product->setDescription($request->get('description'));
    $product->setWeight($request->get('weight'));
    $product->save();
    
    return back()->with("success", "Producto creado satisfactoriamente");
  }

  public function viewUpDate(string $id): View
  {
    $viewData = [];
    $viewData["title"] = "Actualizar producto";
    $viewData["id"] = $id;
    return view('product.viewUpDate')->with("viewData", $viewData);
  }

  public function upDate(Request $request, string $id): RedirectResponse
  {
    $image = $request->file('image');
    $imageName =  "img/products/".time()."_".$image->getClientOriginalName();
    Storage::disk('public')->put($imageName,  \File::get($image));
    $product = Product::find($id);
    $product->setImage($imageName);
    $product->setPrice($request->get('price'));
    $product->setStock($request->get('stock'));
    $product->setDescription($request->get('description'));
    $product->save();

    return redirect('/products/list')->with('success', 'Producto actualizado!');
  }

  public function delete(string $id): RedirectResponse
  {
    try{
      $delete = Product::destroy($id);
    } catch (Exception){
      $error = "Error";
    }
    #$deleted = Product::where('id', $id)->delete();
    return redirect('/products/list')->with('success', 'Producto eliminado!');
  }

}