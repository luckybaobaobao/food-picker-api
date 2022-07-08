<?php

namespace App\Http\Services;

use App\Models\Cuisine;
use App\Repositories\CuisineRepository;
use App\Http\Services\BaseServiceInterface;

class CuisineService implements BaseServiceInterface
{
    private $cuisineRepository;

    public function __construct(CuisineRepository $cuisineRepository) {
        $this->cuisineRepository = $cuisineRepository;
    }

    public function findByName(string $name): ?Cuisine
    {
        return $this->cuisineRepository->findByName($name);
    }
}
