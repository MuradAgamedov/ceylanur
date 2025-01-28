<?php

namespace Ceylanur\Settings\Components;


use Cms\Classes\ComponentBase;

/**
 * MetaLang Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class MetaLang extends ComponentBase
{

    public function onRun()
    {
     ;
        $this->page['meta_lang'] = app()->getLocale();
    }
    public function componentDetails()
    {
        return [
            'name' => 'MetaLang Component',
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
