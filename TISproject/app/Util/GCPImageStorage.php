<?php

namespace App\Util;

use Illuminate\Support\Facades\Storage;
use App\Interfaces\ImageStorage;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\Request;

class GCPImageStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $gcpKeyFile = file_get_contents(base_path('service-account.json'));
            $storage = new StorageClient(['keyFile' => json_decode($gcpKeyFile, true)]);
            $bucket = $storage->bucket(env('GOOGLE_CLOUD_STORAGE_BUCKET'));
            $imageName = 'img/products/'.time().$image->getClientOriginalName();
            $bucket->upload(
                file_get_contents($request->file('image')->getRealPath()), [
                    'name' => $imageName,
                ]);
                return 'https://storage.googleapis.com/'.env('GOOGLE_CLOUD_STORAGE_BUCKET').'/'.$imageName; 
        }
    }

    public function multipleStore(Request $request): string
    {
        $files = [];
        $gcpKeyFile = file_get_contents(env('GCP_KEY_FILE', base_path('service-account.json')));
        $storage = new StorageClient(['keyFile' => json_decode($gcpKeyFile, true)]);
        $bucket = $storage->bucket(env('GOOGLE_CLOUD_STORAGE_BUCKET'));
        
        foreach ($request->file('image') as $image) {
            $image = $request->file('image');
            $imageName = 'img/products/'.time().$image->getClientOriginalName();
            $bucket->upload(
                file_get_contents($request->file('image')->getRealPath()), [
                    'name' => $imageName,
                ]);
            $files[] = $imageName;
        }
        $namesTogether = implode(',', $files);

        return $namesTogether;

            
        
    }
}