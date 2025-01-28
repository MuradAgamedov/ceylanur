<?php

namespace Ceylanur\Settings\Components;

use Ceylanur\Seo\Repositories\SeoRepository;
use Cms\Classes\ComponentBase;
use Ceylanur\Socials\Repositories\SocialsRepository;
use Ceylanur\Settings\Repositories\SettingsRepository;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;

/**
 * ContactForm Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ContactForm extends ComponentBase
{
    protected $settings;
    protected $socialsCheck;
    protected $seo;
    public function init()
    {
        $this->settings = app(SettingsRepository::class);
        $this->socialsCheck = app(SocialsRepository::class);
        $this->seo = app(SeoRepository::class);
    }
    public function onFeedBack()
    {
    }
    public function onRun()
    {
         $ipAddress = $_SERVER['REMOTE_ADDR'];
        $hechUser = CopirightAtestation::where('ip', $ipAddress);
        $count = $hechUser->count();
        if($count< 1) {
            return redirect('/copirights_attention');
        }
        $this->page['email'] = $this->settings->settingsQuery()['email'];
        $this->page['facebook_link'] = $this->settings->settingsQuery()['facebook_link'];
        $this->page['tiktok_link'] = $this->settings->settingsQuery()['tiktok_link'];
        $this->page['twitter_link'] = $this->settings->settingsQuery()['twitter_link'];
        $this->page['telegram_link'] = $this->settings->settingsQuery()['telegram_link'];
        $this->page['youtube_link'] = $this->settings->settingsQuery()['youtube_link'];
        $this->page['whatsapp_number'] = $this->settings->settingsQuery()['whatsapp_number'];
        $this->page['instagram_link'] = $this->settings->settingsQuery()['instagram_link'];
        $this->page['contactFormSocials'] = $this->socialsCheck->contactFormSocialsQuery();
        $this->page['success_form_image_first'] = $this->settings->settingsQuery()['success_form_image_first'];
        $this->page['seo_contact_form'] = $this->seo->contactPageSeoQuery();
    }
    public function componentDetails()
    {
        return [
            'name' => 'ContactForm Component',
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
