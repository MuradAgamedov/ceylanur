<?php

namespace Ceylanur\Gallary;

use Ceylanur\Gallary\Components\Images;
use System\Classes\PluginBase;
use Ceylanur\Gallary\Components\Detail;
use Illuminate\Support\Facades\Route;


/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */

    public function boot()
    {
        Route::prefix('api')->group(function () {
            Route::get('images', 'Ceylanur\Gallary\Controllers\ImagesController@getImages');
            // Другие маршруты API
        });
    }
    public function register()
    {
    }

    /**
     * boot method, called right before the request route.
     */


    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            Images::class => 'images',
            Detail::class => 'gallery_details',
            'Ceylanur\Gallary\Components\ImageList' => 'imageList'
        ];
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
