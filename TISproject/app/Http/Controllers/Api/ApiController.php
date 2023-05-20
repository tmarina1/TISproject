<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getBombs()
    {
        $response = Http::get("https://www.nukestore.world/api/bombs");

        if ($response->ok()) {
            $data = $response->json();

            // Procesa la respuesta de la API como desees
            return $data;
        } else {
            abort($response->status());
        }
    }
}