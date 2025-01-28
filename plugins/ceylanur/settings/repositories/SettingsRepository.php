<?php

namespace Ceylanur\Settings\Repositories;

use Ceylanur\Settings\Models\Settings;

class SettingsRepository
{

    public function __construct(public Settings $settings)
    {
    }


    public function settingsQuery()
    {
        return [
            'facebook_link' => $this->settings->first()->facebook_link,
            'twitter_link' => $this->settings->first()->twitter_link,
            'telegram_link' => $this->settings->first()->telegram_link,
            'youtube_link' => $this->settings->first()->youtube_link,
            'whatsapp_number' => $this->settings->first()->whatsapp_number,
            'instagram_link' => $this->settings->first()->instagram_link,
            'tiktok_link' => $this->settings->first()->tiktok_link,
            'email' => $this->settings->first()->email,
            'copywrite_text' => $this->settings->first()->copywrite_text,
            'logo' => $this->settings->first()->logo->path,
            'favicon' => $this->settings->first()->favicon->path,
            'success_form_image_first' => $this->settings->first()->success_form_image_first->path,
            'copyright_modal_image' => $this->settings->first()->copyright_modal_image->path,
        ];
    }
}
