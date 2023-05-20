<?php

#Tomas Marin Aristizabal

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function about(): View
    {
        return view('home.about');
    }

    public function myAccount(): View
    {
        $userId = Auth::user()->getId();
        $data = User::findOrFail($userId);
        $viewData = [];
        $viewData['user'] = $data;
        return view('home.myAccount')->with('viewData', $viewData);;
    }
}
