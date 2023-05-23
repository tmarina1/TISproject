<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getBombs()
    {
        $response = Http::get('https://www.nukestore.world/api/bombs');

        if ($response->ok()) {
            $data = $response->json();

            // Procesa la respuesta de la API como desees
            //return $data;
            return view('api.consumeApi')->with('viewData', $data);
        } else {
            abort($response->status());
        }
    }
}
