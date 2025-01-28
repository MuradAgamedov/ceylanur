<?php

namespace Ceylanur\Settings;

use Ceylanur\Settings\Components\ContactForm;
use Ceylanur\Settings\Components\Favicon;
use Ceylanur\Settings\Components\Footer;
use Ceylanur\Settings\Components\Header;
use Ceylanur\Settings\Components\MetaLang;
use Ceylanur\Settings\Components\OrderForm;
use Ceylanur\Settings\Components\CopirghtAttention;
use Route;
use System\Classes\PluginBase;
use Ceylanur\Settings\Components\OrderService;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        Route::prefix('api')->group(function () {
            Route::post('sendContactForm', 'Ceylanur\Settings\Controllers\SettingsController@sendContactForm');
            Route::post('sendOrderForm', 'Ceylanur\Settings\Controllers\SettingsController@sendOrderForm');
            Route::post('sendOrderServiceForm', 'Ceylanur\Settings\Controllers\SettingsController@sendOrderServiceForm');
           
        });
         Route::get('/copyright-attestation', 'Ceylanur\Settings\Controllers\SettingsController@copyrightAttestation');
       
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            ContactForm::class => "contact_form",
            Header::class => "header",
            Footer::class => "footer",
            MetaLang::class => "meta_lang",
            Favicon::class => "favicon",
            OrderForm::class => "order_form",
            OrderService::class => "order_service",
            CopirghtAttention::class => 'CopirghtAttention'
        ];
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
