<?php 

namespace App\Interfaces;
use Illuminate\Http\Request;

interface ImageStorage {
    public function store(Request $request): string;

    public function multipleStore(Request $request): string;
}
