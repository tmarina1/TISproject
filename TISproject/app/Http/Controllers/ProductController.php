<?php
#Tomas Marin Aristizabal

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use \Illuminate\Http\RedirectResponse;
use App\Util\ImageStorage;

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
    $product = Product::findOrFail($id);
    $viewData["product"] = $product;

    return view('product.show')->with("viewData", $viewData);
  }

  public function filter(Request $request)
  {
    $viewData["title"] = "Products - Point n shot";
    $viewData["subtitle"] =  "Lista de productos";

    if($request->get('price') == 50)
    {
      $viewData["products"] = Product::whereBetween('price', [0, $request->get('price')])->get();
    }
    elseif ($request->get('price') == 100) 
    {
      $viewData["products"] = Product::whereBetween('price', [50, $request->get('price')])->get();
    }
    elseif ($request->get('price') == 200)
    {
      $viewData["products"] = Product::whereBetween('price', [100, $request->get('price')])->get();
    }
    elseif ($request->get('price') == 300)
    {
      $viewData["products"] = Product::whereBetween('price', [200, $request->get('price')])->get();
    }
    elseif ($request->get('price') == 301)
    {
      $viewData["products"] = Product::where('price', '>=', $request->get('price'))->get();
    }

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
    $storeImage = new ImageStorage();

    $product = new Product;
    $product->setReference($request->get('reference'));
    $product->setImage($storeImage->store($request));
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
    $product = Product::find($id);
    $storeImage = new ImageStorage();
    $product->setImage($storeImage->store($request));
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
    return redirect('/products/list')->with('success', 'Producto eliminado!');
  }

}