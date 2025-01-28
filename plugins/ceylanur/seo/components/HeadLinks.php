<?php namespace Ceylanur\SEO\Components;

use Ceylanur\Seo\Models\HeadLinks as ModelsHeadLinks;
use Cms\Classes\ComponentBase;

/**
 * HeadLinks Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class HeadLinks extends ComponentBase
{

    public function onRun() {
        $this->page['head_links'] = ModelsHeadLinks::where('status', 1)->get();
    }
    public function componentDetails()
    {
        return [
            'name' => 'HeadLinks Component',
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
