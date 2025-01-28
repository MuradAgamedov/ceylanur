<?php

namespace Ceylanur\Gallary\Repositories;
use Ceylanur\Gallary\Models\Genres;



class GenresRepository
{

    public function __construct(public Genres $genres)
    {
    }


    public function query()
    {
        return $this->genres::all();
    }


    public function paginationQuery(int $count)
    {
        return $this->genres::pagination($count);
    }



    public function all()
    {
        return $this->genres::where('status', 1)->get();
    }
    public function pagination(int $count)
    {
        return $this->genres::where('status', 1)->pagination($count);
    }



}
