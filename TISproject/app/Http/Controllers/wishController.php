<?php

//Tomas Marin Aristizabal

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WishController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $userId = Auth::user()->getId();
        $wish = Wish::where('user_id', $userId)->get();
        $viewData['wish'] = $wish;

        return view('wish.index')->with('viewData', $viewData);
    }

    public function save(Request $request, string $productId): RedirectResponse
    {
        $userId = Auth::user()->getId();

        $wishExist = Wish::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($wishExist == null) {
            $wish = new Wish;
            $wish->setUserId($userId);
            $wish->setProductId($productId);
            $wish->save();
        }

        return back();
    }

    public function delete(string $wishId): RedirectResponse
    {
        $delete = Wish::destroy($wishId);

        return back();
    }
}
