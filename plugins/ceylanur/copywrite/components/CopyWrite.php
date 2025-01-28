<?php

namespace Ceylanur\CopyWrite\Components;


use Ceylanur\Copywrite\Repositories\CopyWriteRepository;
use Ceylanur\Seo\Repositories\SeoRepository;
use Cms\Classes\ComponentBase;

/**
 * CopyWrite Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class CopyWrite extends ComponentBase
{

    protected $copyrights;
    protected $seo;
    public function init()
    {
        $this->copyrights = app(CopyWriteRepository::class);
        $this->seo = app(SeoRepository::class);
    }

    public function onRun()
    {
        $this->page['seo'] = $this->seo->copywriteSeoQuery();
        $this->page['copyrights'] = $this->copyrights->all();
    }
    public function componentDetails()
    {
        return [
            'name' => 'CopyWrite Component',
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
