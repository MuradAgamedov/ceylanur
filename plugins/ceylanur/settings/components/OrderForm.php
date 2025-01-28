<?php

namespace Ceylanur\Settings\Components;

use Ceylanur\Gallary\Repositories\GenresRepository;
use Ceylanur\Gallary\Repositories\TechniquesRepository;
use Ceylanur\Seo\Repositories\SeoRepository;
use Ceylanur\Settings\Repositories\SettingsRepository;
use Ceylanur\Socials\Repositories\SocialsRepository;
use Cms\Classes\ComponentBase;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;

/**
 * OrderForm Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class OrderForm extends ComponentBase
{
    protected $techniques;
    protected $genres;
    protected $seo;
    protected $settings;
    public function init()
    {
        $this->settings = app(SettingsRepository::class);
        $this->techniques = app(TechniquesRepository::class);
        $this->genres = app(GenresRepository::class);
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
        $this->page['techniques'] = $this->techniques->all();
        $this->page['genres'] = $this->genres->all();
        $this->page['seo'] = $this->seo->orderFormSeoQuery();
        $this->page['success_form_image_first'] = $this->settings->settingsQuery()['success_form_image_first'];
    }
    public function componentDetails()
    {
        return [
            'name' => 'OrderForm Component',
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
