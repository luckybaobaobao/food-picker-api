<?php

namespace App\Http\Services;

use App\Models\Restaurant;
use Illuminate\Support\Collection;
use App\Repositories\CityRepository;
use App\Repositories\CuisineRepository;
use App\Repositories\RestaurantRepository;
use App\Http\Services\RestaurantServiceInterface;

class RestaurantService implements RestaurantServiceInterface
{
    private $cuisineRepository;
    private $cityRepository;
    private $restaurantRepository;

    public function __construct(
        CuisineRepository $cuisineRepository,
        CityRepository $cityRepository,
        RestaurantRepository $restaurantRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->cuisineRepository = $cuisineRepository;
        $this->restaurantRepository = $restaurantRepository;
    }

    public function findByName(string $name): ?Restaurant
    {
        return $this->restaurantRepository->findByName($name);
    }

    public function findByClosestDistance(string $latitude, string $longitude): ?Restaurant
    {
        return $this->restaurantRepository->findByClosestDistance($latitude, $longitude);
    }

    public function findByFreeText(string $freeText): ?Collection
    {
        $restaurant = $this->restaurantRepository->findByName($freeText);

        if ($restaurant) {
            return $restaurant;
        }

        /* If no restaurant entities where found in the freeText search, try to find cities or cuisines */
        $city = $this->cityRepository->findByName($freeText);

        if ($city && $city->restaurants) {
            return $city->restaurants;
        }

        $cuisine = $this->cuisineRepository->findByName($freeText);

        if ($cuisine && $cuisine->restaurants) {
            return $cuisine->restaurants;
        }

        return null;
    }
}
