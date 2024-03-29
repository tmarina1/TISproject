<?php

//Tomas Marin Aristizabal

namespace App\Http\Controllers;

use App\Models\FilmDevelopOrder;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $product = Product::all();
        $productOfTheMonth = Product::where('productOfTheMonth', true)->get();
        $filmOfTheMonth = FilmDevelopOrder::where('filmOfTheMonth', true)->where('usePermission', true)->get()->first();
        $viewData['title'] = __('texts.titleProductsIndex');
        $viewData['subtitle'] = __('texts.subtitleProductsIndex');
        $viewData['product'] = $product;
        $viewData['productOfTheMonth'] = $productOfTheMonth;
        $viewData['images'] = [];
        if ($filmOfTheMonth) {
            $viewData['images'] = explode(',', $filmOfTheMonth->getPhoto());
        }

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function filter(Request $request)
    {
        $viewData = [];
        $viewData['title'] = __('texts.titleProductsIndex');
        $viewData['subtitle'] = __('texts.subtitleProductsIndex');
        $viewData['productOfTheMonth'] = Product::where('productOfTheMonth', true)->get();
        $filmOfTheMonth = FilmDevelopOrder::where('filmOfTheMonth', true)->where('usePermission', true)->get()->first();
        $viewData['images'] = [];
        if ($filmOfTheMonth) {
            $viewData['images'] = explode(',', $filmOfTheMonth->getPhoto());
        }

        if ($request->get('price') == 50) {
            $viewData['product'] = Product::whereBetween('price', [0, $request->get('price')])->get();
        } elseif ($request->get('price') == 100) {
            $viewData['product'] = Product::whereBetween('price', [50, $request->get('price')])->get();
        } elseif ($request->get('price') == 200) {
            $viewData['product'] = Product::whereBetween('price', [100, $request->get('price')])->get();
        } elseif ($request->get('price') == 300) {
            $viewData['product'] = Product::whereBetween('price', [200, $request->get('price')])->get();
        } elseif ($request->get('price') == 301) {
            $viewData['product'] = Product::where('price', '>=', $request->get('price'))->get();
        }

        return view('product.index')->with('viewData', $viewData);
    }

    public function filterBrand(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('texts.titleProductsIndex');
        $viewData['subtitle'] = __('texts.subtitleProductsIndex');
        $viewData['product'] = Product::where('brand', $request->get('brands'))->get();
        $viewData['productOfTheMonth'] = Product::where('productOfTheMonth', true)->get();
        $filmOfTheMonth = FilmDevelopOrder::where('filmOfTheMonth', true)->where('usePermission', true)->get()->first();
        $viewData['images'] = [];
        if ($filmOfTheMonth) {
            $viewData['images'] = explode(',', $filmOfTheMonth->getPhoto());
        }

        return view('product.index')->with('viewData', $viewData);
    }
}
