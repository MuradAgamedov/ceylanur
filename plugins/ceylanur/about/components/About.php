<?php

namespace Ceylanur\About\Components;

use Ceylanur\About\Repositories\AboutRepository;
use Ceylanur\Seo\Repositories\SeoRepository;
use Cms\Classes\ComponentBase;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;

/**
 * About Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class About extends ComponentBase
{

    protected $about;
    protected $seo;
    public function init()
    {
        $this->about = app(AboutRepository::class);
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
        $this->page['about'] = $this->about->query();
        $this->page['seo'] = $this->seo->aboutPageSeoQuery();
    }
    public function componentDetails()
    {
        return [
            'name' => 'About Component',
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
