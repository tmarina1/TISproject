<?php

namespace App\Http\Controllers;

use App\Models\FilmDevelopOrder;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FilmDevelopOrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $userId = Auth::user()->getId();
        $orders = FilmDevelopOrder::all();
        $orders = $orders->where('user_id', '==', $userId);
        $viewData['order'] = $orders;

        return view('filmOrder.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['order'] = FilmDevelopOrder::findOrFail($id);
        $viewData['images'] = explode(',', $viewData['order']->getPhoto());

        return view('filmOrder.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('filmOrder.create');
    }

    public function save(Request $request): RedirectResponse
    {
        FilmDevelopOrder::validate($request);
        $totalPrice = 20;
        $userId = Auth::user()->getId();
        if (Product::validateBalance($userId, $totalPrice)){
            $filmOrder = new FilmDevelopOrder;
            $filmOrder->setReferenceFilm($request->get('referenceFilm'));
            if ($request->get('usePermission')) {
                $filmOrder->setUsePermission($request->get('usePermission'));
            }
            $filmOrder->setUserId(Auth::user()->getId());
            $filmOrder->save();

            $newBalance = Auth::user()->getBalance() - $totalPrice;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();

            return back()->with('success', 1);
        }else
        {
            return back()->with('fail', 1);
        }

        
    }
}
