<?php

namespace App\Http\Services;

use App\Models\Restaurant;
use Illuminate\Support\Collection;
use App\Http\Services\BaseServiceInterface;

interface RestaurantServiceInterface extends BaseServiceInterface
{
    public function findByClosestDistance(string $latitude, string $longitude): ?Restaurant;
    public function findByFreeText(string $freeText): ?Collection;
}
