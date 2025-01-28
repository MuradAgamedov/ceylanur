<?php

namespace Ceylanur\Settings\Components;

use Ceylanur\Settings\Repositories\SettingsRepository;
use Ceylanur\Socials\Repositories\SocialsRepository;
use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\URL;
/**
 * Header Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Header extends ComponentBase
{
    protected $settings;
    protected $socialsCheck;
    public function init()
    {
        $this->settings = app(SettingsRepository::class);
        $this->socialsCheck = app(SocialsRepository::class);

    }

    public function onRun()
    {
        $this->page['logo'] = $this->settings->settingsQuery()['logo'];
        $this->page['facebook_link'] = $this->settings->settingsQuery()['facebook_link'];
        $this->page['tiktok_link'] = $this->settings->settingsQuery()['tiktok_link'];
        $this->page['twitter_link'] = $this->settings->settingsQuery()['twitter_link'];
        $this->page['telegram_link'] = $this->settings->settingsQuery()['telegram_link'];
        $this->page['youtube_link'] = $this->settings->settingsQuery()['youtube_link'];
        $this->page['whatsapp_number'] = $this->settings->settingsQuery()['whatsapp_number'];
        $this->page['instagram_link'] = $this->settings->settingsQuery()['instagram_link'];
        $this->page['navbarSocials'] = $this->socialsCheck->navbarSocialsQuery();
        $this->page['currentUrl'] = URL::current();
        
    }
    public function componentDetails()
    {
        return [
            'name' => 'Header Component',
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
