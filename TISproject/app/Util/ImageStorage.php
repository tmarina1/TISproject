<?php

namespace App\Util;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageStorage
{
    public function store(Request $request): string
    {
        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $imageName =  "img/products/".time().$image->getClientOriginalName();
          Storage::disk('public')->put($imageName,  File::get($image));
          return $imageName;
        }
    }
}

