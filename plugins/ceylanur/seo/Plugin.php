<?php namespace Ceylanur\Seo;

use Ceylanur\SEO\Components\HeadLinks;
use Ceylanur\SEO\Components\SeoScripts;
use System\Classes\PluginBase;

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
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            HeadLinks::class => "seo_links",
            SeoScripts::class => "seo_scripts"
        ];
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
