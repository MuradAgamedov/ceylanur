<?php

namespace Ceylanur\Seo\Repositories;

use Ceylanur\Seo\Models\AboutPageSeo;
use Ceylanur\Seo\Models\ContactPageSeo;
use Ceylanur\Seo\Models\CopywriteSeo;
use Ceylanur\Seo\Models\GallaryPageSeo;
use Ceylanur\Seo\Models\HomePageSeo;
use Ceylanur\Seo\Models\OrderFormSeo;
use Ceylanur\Seo\Models\ServicesPageSeo;

class SeoRepository
{

    public function __construct(public HomePageSeo $homePageSeo, public AboutPageSeo $aboutPageSeo, public ServicesPageSeo $servicesPageSeo, public ContactPageSeo $contactPageSeo, public CopywriteSeo $copywriteSeo, public GallaryPageSeo $gallaryPageSeo, public OrderFormSeo $orderFormSeo)
    {
    }

    public function homePageSeoQuery()
    {
        return [
            'meta_title' => $this->homePageSeo->first()->meta_title,
            'meta_keywords' => $this->homePageSeo->first()->meta_keywords,
            'meta_description' => $this->homePageSeo->first()->meta_description,
            'links' => $this->homePageSeo->first()->links,
            'scripts' => $this->homePageSeo->first()->scripts
        ];
    }



    public function aboutPageSeoQuery()
    {
        return [
            'meta_title' => $this->aboutPageSeo->first()->meta_title,
            'meta_keywords' => $this->aboutPageSeo->first()->meta_keywords,
            'meta_description' => $this->aboutPageSeo->first()->meta_description,
            'links' => $this->aboutPageSeo->first()->links,
            'scripts' => $this->aboutPageSeo->first()->scripts
        ];
    }


    public function servicesPageSeoQuery()
    {
        return [
            'meta_title' => $this->servicesPageSeo->first()->meta_title,
            'meta_keywords' => $this->servicesPageSeo->first()->meta_keywords,
            'meta_description' => $this->servicesPageSeo->first()->meta_description,
            'links' => $this->servicesPageSeo->first()->links,
            'scripts' => $this->servicesPageSeo->first()->scripts
        ];
    }


    public function copywriteSeoQuery()
    {
        return [
            'meta_title' => $this->copywriteSeo->first()->meta_title,
            'meta_keywords' => $this->copywriteSeo->first()->meta_keywords,
            'meta_description' => $this->copywriteSeo->first()->meta_description,
            'links' => $this->copywriteSeo->first()->links,
            'scripts' => $this->copywriteSeo->first()->scripts
        ];
    }


    public function gallaryPageSeoQuery()
    {
        return [
            'meta_title' => $this->gallaryPageSeo->first()->meta_title,
            'meta_keywords' => $this->gallaryPageSeo->first()->meta_keywords,
            'meta_description' => $this->gallaryPageSeo->first()->meta_description,
            'links' => $this->gallaryPageSeo->first()->links,
            'scripts' => $this->gallaryPageSeo->first()->scripts
        ];
    }


    public function contactPageSeoQuery()
    {
        return [
            'meta_title' => $this->contactPageSeo->first()->meta_title,
            'meta_keywords' => $this->contactPageSeo->first()->meta_keywords,
            'meta_description' => $this->contactPageSeo->first()->meta_description,
            'links' => $this->contactPageSeo->first()->links,
            'scripts' => $this->contactPageSeo->first()->scripts
        ];
    }

    public function orderFormSeoQuery()
    {
        return [
            'meta_title' => $this->orderFormSeo->first()->meta_title,
            'meta_keywords' => $this->orderFormSeo->first()->meta_keywords,
            'meta_description' => $this->orderFormSeo->first()->meta_description,
            'links' => $this->orderFormSeo->first()->links,
            'scripts' => $this->orderFormSeo->first()->scripts
        ];
    }
}
