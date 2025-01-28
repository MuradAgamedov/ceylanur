<?php

namespace Ceylanur\Modules\Repositories;

use Ceylanur\Modules\Models\HomePageFirstDescription;
use Ceylanur\Modules\Models\HomePageSecondDescription;
use Ceylanur\Modules\Models\HomePageThirdDescription;
use Ceylanur\Modules\Models\HomePageFourthDescription;
use Ceylanur\Modules\Models\HomePageFifthDescription;



class HomePageSectionsRepository
{

    public function __construct(public HomePageFirstDescription $firstSection, public HomePageSecondDescription $secondSection, public HomePageThirdDescription $thirdSection, public HomePageFourthDescription $fourthSection, public HomePageFifthDescription $fifthSection)
    {
    }

    public function firstSectionQuery()
    {
        return [
            'title' => $this->firstSection->first()->title,
            'text' => $this->firstSection->first()->text,
            'image_title' => $this->firstSection->first()->image_title,
            'image_short_description' => $this->firstSection->first()->image_short_description,
            'image' => $this->firstSection->first()->image->path
        ];
    }

    public function secondSectionQuery()
    {
        return [
            'title' => $this->secondSection->first()->title,
            'text' => $this->secondSection->first()->text,
            'image_title' => $this->secondSection->first()->image_title,
            'image_short_description' => $this->secondSection->first()->image_short_description,
            'image' => $this->secondSection->first()->image->path
        ];
    }


    public function thirdSectionQuery()
    {

        return [
            'section_title' => $this->thirdSection->first()->section_title,
            'section_subtitle_text' => $this->thirdSection->first()->section_subtitle_text,
            'title' => $this->thirdSection->first()->title,
            'text' => $this->thirdSection->first()->text,
            'video' => $this->thirdSection->first()->video->path
        ];
    }



    public function fourthSectionQuery()
    {
        return [
            'first_video_title' => $this->fourthSection->first()->first_video_title,
            'first_video_short_description' => $this->fourthSection->first()->first_video_short_description,
            'second_video_title' => $this->fourthSection->first()->second_video_title,
            'second_video_short_description' => $this->fourthSection->first()->second_video_short_description,
            'third_vido_title' => $this->fourthSection->first()->third_vido_title,
            'third_video_short_description' => $this->fourthSection->first()->third_video_short_description,
            'first_video' => $this->fourthSection->first()->first_video->path,
            'second_video' => $this->fourthSection->first()->second_video->path,
            'third_video' => $this->fourthSection->first()->third_video->path,
        ];
    }




    public function fifthSectionQuery()
    {
        return [
            'title' => $this->fifthSection->first()->title,
            'text' => $this->fifthSection->first()->text,
            'image' => $this->fifthSection->first()->image->path,
        ];
    }
}
