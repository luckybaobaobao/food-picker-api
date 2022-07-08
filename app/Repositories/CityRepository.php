<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\BaseRepository;

class CityRepository extends BaseRepository
{
    protected $modelClassName = City::class;
}
