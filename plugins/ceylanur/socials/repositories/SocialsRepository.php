<?php

namespace Ceylanur\Socials\Repositories;

use Ceylanur\Socials\Models\FooterSocials;
use Ceylanur\Socials\Models\NavbarSocials;
use Ceylanur\Socials\Models\SontactFormSocials;

class SocialsRepository
{

    public function __construct(public NavbarSocials $navbarSocials, public SontactFormSocials $contactFormSocials, public FooterSocials $footerSocials)
    {
    }


    public function navbarSocialsQuery()
    {
        return $this->navbarSocials->first();
    }

    public function footerSocialsQuery()
    {
        return $this->footerSocials->first();
    }

    public function contactFormSocialsQuery()
    {
        return $this->contactFormSocials->first();
    }
}
