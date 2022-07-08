<?php

namespace App\Http\Services;

use App\Models\City;
use App\Repositories\CityRepository;
use App\Http\Services\BaseServiceInterface;

class CityService implements BaseServiceInterface
{
    private $cityRepository;

    public function __construct(CityRepository $cityRepository) {
        $this->cityRepository = $cityRepository;
    }

    public function findByName(string $name): ?City
    {
        return $this->cityRepository->findByName($name);
    }
}
