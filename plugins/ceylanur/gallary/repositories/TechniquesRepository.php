<?php

namespace Ceylanur\Gallary\Repositories;

use Ceylanur\Gallary\Models\Techniques;


class TechniquesRepository
{

    public function __construct(public Techniques $techniques)
    {
    }


    public function query()
    {
        return $this->techniques::all();
    }


    public function paginationQuery(int $count)
    {
        return $this->techniques::pagination($count);
    }



    public function all()
    {
        return $this->techniques::where('status', 1)->get();
    }
    public function pagination(int $count)
    {
        return $this->techniques::where('status', 1)->pagination($count);
    }
}
