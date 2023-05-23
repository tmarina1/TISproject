<?php

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Util\GCPImageStorage;
use App\Util\LocalImageStorage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function ($app, $params) {
            $storage = $params['storage'];
            if ($storage == 'local') {
                return new LocalImageStorage();
            } elseif ($storage == 'gcp') {
                return new GCPImageStorage();
            }
        });
    }
}
