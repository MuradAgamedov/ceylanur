<?php namespace Ceylanur\Gallary\Components;
use Ceylanur\Gallary\Repositories\ImageRepository;
use Cms\Classes\ComponentBase;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;
/**
 * Detail Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Detail extends ComponentBase
{
    
    protected $image;
 
    public function init()
    {
      
        $this->image = app(ImageRepository::class);
    }
    public function onRun()
    {
    
         $ipAddress = $_SERVER['REMOTE_ADDR'];
        $hechUser = CopirightAtestation::where('ip', $ipAddress);
        $count = $hechUser->count();
        if($count< 1) {
            return redirect('/copirights_attention');
        }
        $slug = $this->param("slug");
        $image =  $this->image->details($slug);
        $this->page['image'] =$image;
        $this->image->incrementSee($slug);
        $this->page['randoms'] = $this->image->random(3, $image, $image['style']);
         
    
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
