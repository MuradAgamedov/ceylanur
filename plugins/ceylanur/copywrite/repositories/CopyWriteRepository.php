<?php

namespace Ceylanur\Copywrite\Repositories;

use Ceylanur\Copywrite\Models\CopyWrite;
use Ceylanur\Services\Models\Services;

class CopyWriteRepository
{

    public function __construct(public CopyWrite $copyWrite)
    {
    }


    public function query()
    {
        return $this->copyWrite::all();
    }
    public function paginationQuery(int $count)
    {
        return $this->copyWrite::pagination($count);
    }



    public function all()
    {
        return $this->copyWrite::where('status', 1)->get();
    }
    public function pagination(int $count)
    {
        return $this->copyWrite::where('status', 1)->pagination($count);
    }
}
