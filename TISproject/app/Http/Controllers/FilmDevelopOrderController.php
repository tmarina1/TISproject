<?php

namespace App\Http\Controllers;

use App\Models\FilmDevelopOrder;
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
        $filmOrder = new FilmDevelopOrder;
        $filmOrder->setReferenceFilm($request->get('reference'));
        if ($request->get('usePermission')) {
            $filmOrder->setUsePermission($request->get('usePermission'));
        }
        $filmOrder->setUserId(Auth::user()->getId());
        $filmOrder->save();
        $totalPrice = 20;
        $newBalance = Auth::user()->getBalance() - $totalPrice;
        Auth::user()->setBalance($newBalance);
        Auth::user()->save();

        return back();
    }
}
