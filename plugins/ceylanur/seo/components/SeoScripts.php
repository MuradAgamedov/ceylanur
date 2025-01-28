<?php

namespace Ceylanur\SEO\Components;

use Ceylanur\Seo\Models\SeoScripts as ModelsSeoScripts;
use Cms\Classes\ComponentBase;

/**
 * SeoScripts Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class SeoScripts extends ComponentBase
{
    public function onRun()
    {
        $this->page['seo_scripts'] = ModelsSeoScripts::where('status', 1)->get();
    }
    public function componentDetails()
    {
        return [
            'name' => 'SeoScripts Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }
}
