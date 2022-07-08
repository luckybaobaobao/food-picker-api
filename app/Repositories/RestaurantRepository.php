<?php

namespace App\Repositories;

use App\Models\Restaurant;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Repositories\RestaurantRepositoryInterface;

class RestaurantRepository extends BaseRepository implements RestaurantRepositoryInterface
{
    protected $modelClassName = Restaurant::class;

    public function findByFreeText(?string $freeText): ?Collection
    {
        if (!$freeText) {
            return null;
        }

        if ($first = Restaurant::first()) {
            /* Search for a match of freeText in each of the Restaurant models attributes */
            $attributes = array_keys($first->toArray());

            foreach ($attributes as $attribute) {
                $result = Restaurant::where($attribute, 'LIKE', "%{$freeText}%")->get();

                if ($result->count() > 0) {
                    return $result;
                }
            }
        }
    }

    public function findByClosestDistance(string $latitude, string $longitude): Restaurant
    {
        $rawQuery = DB::raw(
            "id, name, ( 3959 * acos( cos( radians('$latitude') ) * cos( radians( latitude ) ) * " .
            "cos( radians( longitude ) - radians('$longitude') ) + sin( radians('$latitude') ) * " .
            "sin( radians( latitude ) ) ) ) AS distance"
        );

        return Restaurant::select($rawQuery)->orderBy('distance')->first();
    }
}
