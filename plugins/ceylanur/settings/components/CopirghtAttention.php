<?php namespace Ceylanur\Settings\Components;
use Ceylanur\Settings\Repositories\SettingsRepository;
use Cms\Classes\ComponentBase;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;
/**
 * CopirghtAttention Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class CopirghtAttention extends ComponentBase
{
       protected $settings;
       public function init()
    {
     
        $this->settings = app(SettingsRepository::class);
 
    }
    
     public function onRun()
    {
     
        $this->settings = app(SettingsRepository::class);
        $this->page['copyright_modal_image'] = $this->settings->settingsQuery()['copyright_modal_image'];
        
 
    }
    public function componentDetails()
    {
        return [
            'name' => 'CopirghtAttention Component',
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
