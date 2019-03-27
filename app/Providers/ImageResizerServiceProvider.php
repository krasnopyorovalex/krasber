<?php

namespace App\Providers;

use App\Services\ImageResizerService;
use Illuminate\Support\ServiceProvider;

class ImageResizerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('image.resizer', function () {
            return new ImageResizerService();
        });
    }
}
