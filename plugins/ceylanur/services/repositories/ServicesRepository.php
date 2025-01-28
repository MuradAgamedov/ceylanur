<?php

namespace Ceylanur\Services\Repositories;

use Ceylanur\Services\Models\Services;

class ServicesRepository
{

    public function __construct(public Services $services)
    {
    }


    public function query()
    {
        return $this->services::all();
    }
    public function paginationQuery(int $count)
    {
        return $this->services::pagination($count);
    }



    public function all()
    {
        return $this->services::where('status', 1)->get();
    }
    public function pagination(int $count)
    {
        return $this->services::where('status', 1)->pagination($count);
    }



    public function details(string $slug)
    {
        return $this->services::where('slug', $slug)->first();
    }
}
