<?php

namespace Ceylanur\About\Repositories;

use Ceylanur\About\Models\About;

class AboutRepository
{

    public function __construct(public About $about)
    {
    }

    public function query()
    {
        return  $this->about->first();
    }
}
