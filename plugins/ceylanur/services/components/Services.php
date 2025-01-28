<?php

namespace Ceylanur\Services\Components;

use Ceylanur\Services\Repositories\ServicesRepository;
use Ceylanur\Seo\Repositories\SeoRepository;
use Ceylanur\Modules\Repositories\HomePageSectionsRepository;
use Cms\Classes\ComponentBase;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;

/**
 * Services Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Services extends ComponentBase
{

    protected $services;
    protected $seo;
    protected $sections;
    public function init()
    {
        $this->services = app(ServicesRepository::class);
        $this->seo = app(SeoRepository::class);
        $this->sections = app(HomePageSectionsRepository::class);
        
    }
    public function onRun()
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $hechUser = CopirightAtestation::where('ip', $ipAddress);
        $count = $hechUser->count();
        if($count< 1) {
            return redirect('/copirights_attention');
        }
        $this->page['services'] = $this->services->all();
        $this->page['seo'] = $this->seo->aboutPageSeoQuery();
        $this->page['order_image'] = $this->sections->fifthSectionQuery()['image'];
    }

    public function componentDetails()
    {
        return [
            'name' => 'Services Component',
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
