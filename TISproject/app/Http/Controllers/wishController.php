<?php
#Tomas Marin Aristizabal

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class wishController extends Controller
{
  public function index(): View
  {
    $viewData = [];
    $userId = Auth::user()->getId();
    $wish = Wish::all();
    $wish = $wish->where('user_id','==',$userId);
    $viewData["wish"] = $wish;

    return view('wish.index')->with("viewData", $viewData);
  }

  public function save(Request $request, string $productId): RedirectResponse
  {
    $userId = Auth::user()->getId();
    
    $wish = new Wish;
    $wish->setUserId($userId);
    $wish->setProductId($productId);
    $wish->save();
    
    return back();
  }

  public function delete(string $wishId): RedirectResponse
  {
    $delete = Wish::destroy($wishId);
    
    return back();
  }
}