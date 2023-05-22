<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LocalImageStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'img/products/'.time().$image->getClientOriginalName();
            Storage::disk('public')->put($imageName, File::get($image));

            return $imageName;
        }
    }

    public function multipleStore(Request $request): string
    {
        $files = [];
        foreach ($request->file('image') as $image) {
            $imageName = 'img/filmOrder/'.time().$image->getClientOriginalName();
            Storage::disk('public')->put($imageName, File::get($image));
            $files[] = $imageName;
        }
        $namesTogether = implode(',', $files);

        return $namesTogether;
    }
}
