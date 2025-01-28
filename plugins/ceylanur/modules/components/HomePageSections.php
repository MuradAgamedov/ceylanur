<?php

namespace Ceylanur\Modules\Components;

use Ceylanur\Modules\Models\HomePageFirstDescription;
use Ceylanur\Seo\Repositories\SeoRepository;

use Cms\Classes\ComponentBase;
use Ceylanur\Modules\Repositories\HomePageSectionsRepository;
use Ceylanur\Settings\Repositories\SettingsRepository;
use Ceylanur\Gallary\Repositories\ImageRepository;
use Ceylanur\Copyrightatestation\Models\CopirightAtestation;
use Ceylanur\Gallary\Repositories\GenresRepository;
/**
 * HomePageSections Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class HomePageSections extends ComponentBase
{
    protected $sections;
    protected $seo;
    protected $settings;
    protected $home_page_gallary;
    protected $genres;
    public function init()
    {
        $this->seo = app(SeoRepository::class);
        $this->genres = app(GenresRepository::class);
        $this->sections = app(HomePageSectionsRepository::class);
        $this->settings = app(SettingsRepository::class);
        $this->home_page_gallary = app(ImageRepository::class);
    }

    public function onRun()
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $hechUser = CopirightAtestation::where('ip', $ipAddress);
        $count = $hechUser->count();
        if($count< 1) {
            return redirect('/copirights_attention');
        }
        $this->page['home_page_genres'] = $this->genres->all();
        $this->page['settings'] = $this->settings->settingsQuery()['whatsapp_number'];
        $this->page['first_title'] = $this->sections->firstSectionQuery()['title'];
        $this->page['first_title'] = $this->sections->firstSectionQuery()['title'];
        $this->page['first_text'] = $this->sections->firstSectionQuery()['text'];
        $this->page['first_image_title'] = $this->sections->firstSectionQuery()['image_title'];
        $this->page['first_image_short_description'] = $this->sections->firstSectionQuery()['image_short_description'];
        $this->page['first_image'] = $this->sections->firstSectionQuery()['image'];


        $this->page['second_title'] = $this->sections->secondSectionQuery()['title'];
        $this->page['second_first_text'] = $this->sections->secondSectionQuery()['text'];
        $this->page['second_first_image_title'] = $this->sections->secondSectionQuery()['image_title'];
        $this->page['second_first_image_short_description'] = $this->sections->secondSectionQuery()['image_short_description'];
        $this->page['second_first_image'] = $this->sections->secondSectionQuery()['image'];



        $this->page['section_title'] = $this->sections->thirdSectionQuery()['section_title'];
        $this->page['section_subtitle_text'] = $this->sections->thirdSectionQuery()['section_subtitle_text'];
        $this->page['title'] = $this->sections->thirdSectionQuery()['title'];
        $this->page['text'] = $this->sections->thirdSectionQuery()['text'];
        $this->page['video'] = $this->sections->thirdSectionQuery()['video'];



        $this->page['first_video_title'] = $this->sections->fourthSectionQuery()['first_video_title'];
        $this->page['first_video_short_description'] = $this->sections->fourthSectionQuery()['first_video_short_description'];
        $this->page['second_video_title'] = $this->sections->fourthSectionQuery()['second_video_title'];
        $this->page['second_video_short_description'] = $this->sections->fourthSectionQuery()['second_video_short_description'];
        $this->page['third_vido_title'] = $this->sections->fourthSectionQuery()['third_vido_title'];
        $this->page['third_video_short_description'] = $this->sections->fourthSectionQuery()['third_video_short_description'];
        $this->page['first_video'] = $this->sections->fourthSectionQuery()['first_video'];
        $this->page['second_video'] = $this->sections->fourthSectionQuery()['second_video'];
        $this->page['third_video'] = $this->sections->fourthSectionQuery()['third_video'];



        $this->page['order_title'] = $this->sections->fifthSectionQuery()['title'];
        $this->page['order_text'] = $this->sections->fifthSectionQuery()['text'];
        $this->page['order_image'] = $this->sections->fifthSectionQuery()['image'];


        $this->page['seo'] = $this->seo->homePageSeoQuery();
        
        $first_image_on_home_page = $this->home_page_gallary->first_image_on_home_page();
        $second_image_on_home_page = $this->home_page_gallary->second_image_on_home_page();
        $third_image_on_home_page = $this->home_page_gallary->third_image_on_home_page();
        $this->page['first_image_on_home_page'] = $first_image_on_home_page;
        $this->page['second_image_on_home_page'] =  $second_image_on_home_page;
        $this->page['third_image_on_home_page'] = $third_image_on_home_page;
       
        
    }
    public function componentDetails()
    {
        return [
            'name' => 'HomePageSections Component',
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
