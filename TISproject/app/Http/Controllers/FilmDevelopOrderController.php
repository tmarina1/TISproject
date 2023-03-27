<?php 

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FilmOrder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class FilmDevelopOrderController extends Controller 
{
    public function index (): View
    {
        $viewData = [];
        $userId = Auth::user()->getId();
        $orders = FilmOrder::all();
        $orders = $orders->where('user_id','==',$userId);
        $viewData['order'] = $orders;

        return view('filmOrder.index')->with('viewData', $viewData);
    }
    public function show(string $id): View
    {
        $viewData = [];
        $viewData['order'] = FilmOrder::findOrFail($id);

        return view('filmOrder.show')->with('viewData', $viewData);
    }
}