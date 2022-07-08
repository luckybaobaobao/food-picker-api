<?php

namespace App\Repositories;

use App\Models\Cuisine;
use App\Repositories\BaseRepository;

class CuisineRepository extends BaseRepository
{
    protected $modelClassName = Cuisine::class;
}
