<?php

//Juan Pablo Yepes

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\FilmDevelopOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDevelopOrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['orders'] = FilmDevelopOrder::all();

        return view('admin.filmOrder.index')->with('viewData', $viewData);
    }

    public function update(string $id): View
    {
        $viewData = [];
        $viewData['id'] = $id;
        $viewData['order'] = FilmDevelopOrder::FindOrFail($id);

        return view('admin.filmOrder.update')->with('viewData', $viewData);
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        $filmOfTheMonth = $request->get('filmOfTheMonth');
        $order = FilmDevelopOrder::FindOrFail($id);
        if ($order->getPhoto()) {
            if ($filmOfTheMonth == 'add') {
                $order->setFilmOfTheMonth('1');
            } else {
                $order->setFilmOfTheMonth('0');
            }
        } else {
            $order->setState('1');
            $storage = 'local';
            $storeInterface = app(ImageStorage::class,
                ['storage' => $storage]);
            $order->setPhoto($storeInterface->multipleStore($request));
            if ($request->get('observation')) {
                $order->setObservation($request->get('observation'));
            }
        }
        $order->save();

        return back();
    }
}
