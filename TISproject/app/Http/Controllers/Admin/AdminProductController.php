<?php 

namespace App\Http\Controllers\Admin; 
use App\Models\Product; 
use App\Util\ImageStorage;
use App\Http\Controllers\Controller; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request; 
use Illuminate\View\View;

class AdminProductController extends Controller 
{ 
  public function index(): View
  { 
    $viewData = []; 
    $viewData["title"] = "Admin page products";
    $viewData["products"] = Product::all();

    return view('admin.product.index')->with("viewData", $viewData); 
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
    return view('admin.product.indexUpDate')->with("viewData", $viewData);
  }

  public function upDate(Request $request, string $id): RedirectResponse
  {
    $product = Product::findOrFail($id);

    Product::validateUpdate($request);
    $storeImage = new ImageStorage();
    $product->setImage($storeImage->store($request));
    $product->setPrice($request->get('price'));
    $product->setStock($request->get('stock'));
    $product->setDescription($request->get('description'));
    $product->save();

    return redirect()->route('admin.product.index')->with('success', 'Producto actualizado!');
  }

  public function delete(string $id): RedirectResponse
  {
    try{
      $delete = Product::destroy($id);
    } catch (Exception){
      $error = "Error";
    }
    return redirect()->route('admin.product.index')->with('success', 'Producto eliminado!');
  }
}