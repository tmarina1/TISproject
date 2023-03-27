<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $userId = Auth::user()->getId();
        $orders = Order::all();
        $orders = $orders->where('user_id', '==', $userId);
        $viewData['order'] = $orders;

        return view('order.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['order'] = Order::findOrFail($id);

        return view('order.show')->with('viewData', $viewData);
    }
}
