<?php namespace Ceylanur\Settings\Components;
use Ceylanur\Services\Repositories\ServicesRepository;
use Cms\Classes\ComponentBase;
use Ceylanur\Settings\Repositories\SettingsRepository;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;

/**
 * OrderService Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class OrderService extends ComponentBase
{
    protected $services;
    
    protected $settings;
   public function init()
    {
        $this->services = app(ServicesRepository::class);
        $this->settings = app(SettingsRepository::class);
        
    }
    public function onRun()
    {
         $ipAddress = $_SERVER['REMOTE_ADDR'];
        $hechUser = CopirightAtestation::where('ip', $ipAddress);
        $count = $hechUser->count();
        if($count< 1) {
            return redirect('/copirights_attention');
        }
        $this->page['slug'] = $this->param('slug');
        $this->page['services'] = $this->services->all();
        $this->page['success_form_image_first'] = $this->settings->settingsQuery()['success_form_image_first'];
    
    }
    public function componentDetails()
    {
        return [
            'name' => 'OrderService Component',
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
