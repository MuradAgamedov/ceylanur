<?php namespace Ceylanur\Gallary\Components;
use Ceylanur\Gallary\Repositories\GenresRepository;
use Ceylanur\Gallary\Repositories\TechniquesRepository;
use Ceylanur\Seo\Repositories\SeoRepository;
use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Request;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;


/**
 * Images Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class Images extends ComponentBase
{
        protected $techniques;
        protected $genres;
        protected $seo;

        public function init()
        {
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
            $this->page['seo'] = $this->seo->gallaryPageSeoQuery();
         
            $currentURL = Request::url();
          
            $this->page['url'] = $currentURL;
        }
    public function componentDetails()
    {
        return [
            'name' => 'Images Component',
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
