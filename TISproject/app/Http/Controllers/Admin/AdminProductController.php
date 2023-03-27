<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Util\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Product::validate($request);
        $storeImage = new ImageStorage();
        $productOfTheMonth = $request->get('productOfTheMonth');

        $product = new Product;
        $product->setReference($request->get('reference'));
        $product->setImage($storeImage->store($request));
        $product->setBrand($request->get('brand'));
        $product->setPrice($request->get('price'));
        $product->setStock($request->get('stock'));
        $product->setDescription($request->get('description'));
        $product->setWeight($request->get('weight'));
        if ($productOfTheMonth == 'on') {
            $product->setProductOfTheMonth('1');
        }
        $product->save();

        return back();
    }

    public function viewUpdate(string $id): View
    {
        $viewData = [];
        $viewData['id'] = $id;

        return view('admin.product.viewUpdate')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        Product::validateUpdate($request);
        $product = Product::findOrFail($id);
        $productOfTheMonth = $request->get('productOfTheMonth');

        if ($request->hasFile('image')) {
            $storeImage = new ImageStorage();
            $product->setImage($storeImage->store($request));
        }

        $product->setPrice($request->get('price'));
        $product->setStock($request->get('stock'));
        $product->setDescription($request->get('description'));
        if ($productOfTheMonth == 'add') {
            $product->setProductOfTheMonth('1');
        } else {
            $product->setProductOfTheMonth('0');
        }
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $delete = Product::destroy($id);
        } catch (Exception) {
            $error = 'Error';
        }

        return redirect()->route('admin.product.index');
    }
}
