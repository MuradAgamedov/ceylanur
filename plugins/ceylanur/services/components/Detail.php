<?php

namespace Ceylanur\Services\Components;

use Ceylanur\Seo\Repositories\SeoRepository;
use Ceylanur\Services\Models\Services;
use Ceylanur\Services\Repositories\ServicesRepository;
use Cms\Classes\ComponentBase;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;

/**
 * Detail Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Detail extends ComponentBase
{

    protected $services;
    protected $seo;
    public function init()
    {
        $this->services = app(ServicesRepository::class);
        $this->seo = app(SeoRepository::class);
    }
    public function onRun()
    {
         $ipAddress = $_SERVER['REMOTE_ADDR'];
        $hechUser = CopirightAtestation::where('ip', $ipAddress);
        $count = $hechUser->count();
        if($count< 1) {
            return redirect('/copirights_attention');
        }
        $slug = $this->param('slug');
        $this->page['service'] = $this->services->details($slug);
       
        $this->page['seo'] = $this->seo->aboutPageSeoQuery();
    }
    public function componentDetails()
    {
        return [
            'name' => 'detail Component',
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
