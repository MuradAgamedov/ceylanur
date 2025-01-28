<?php

namespace Ceylanur\Settings\Components;

use Ceylanur\Settings\Models\Settings;
use Ceylanur\Settings\Repositories\SettingsRepository;
use Cms\Classes\ComponentBase;

/**
 * Favicon Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Favicon extends ComponentBase
{
    protected $settings;

    public function init()
    {
        $this->settings = app(SettingsRepository::class);
    }

    public function onRun()
    {
        $this->page['favicon'] = $this->settings->settingsQuery()['favicon'];
    }
    public function componentDetails()
    {
        return [
            'name' => 'Favicon Component',
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
