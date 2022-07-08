<?php

namespace App\Repositories;

use App\Models\Restaurant;
use Illuminate\Support\Collection;

interface RestaurantRepositoryInterface
{
    public function findByFreeText(string $freeText): ?Collection;
    public function findByClosestDistance(string $latitude, string $longitude): ?Restaurant;
}
