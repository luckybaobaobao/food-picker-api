<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Cuisine;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\CuisineResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantController extends Controller
{
    public function showName(string $name)
    {
        $restaurant = Restaurant::where('name', $name)->first();

        if (!$restaurant) {
            return abort(404);
        }

        return new JsonResource($restaurant->toArray());
    }

    public function showDistance(string $latitude, string $longitude)
    {
        /* Search for the closest distance based on latitude and longitude */
        $restaurant = Restaurant::select(
                DB::raw(
                    "id, name, ( 3959 * acos( cos( radians('$latitude') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians( latitude ) ) ) ) AS distance"
                )
            )
            ->orderBy('distance')
            ->first();

        return new JsonResource($restaurant->toArray());
    }

    public function index(string $freeText)
    {
        if ($first = Restaurant::first()) {
            /* Search for a match of freeText in each of the Restaurant models attributes */
            $attributes = array_keys($first->toArray());

            foreach ($attributes as $attribute) {
                $result = Restaurant::where($attribute, 'LIKE', "%{$freeText}%")->get();

                if ($result->count() > 0) {
                    return new JsonResource(
                        [
                            'companies' => $result->toArray()
                        ]
                    );
                }
            }
        }

        /* If no restaurant entities where found in the freeText search, try to find cities or cuisines */
        $city = City::where('name', 'LIKE', "%{$freeText}%")->first();

        if ($city) {
            return new CityResource($city);
        }

        $cuisine = Cuisine::where('name', 'LIKE', "%{$freeText}%")->first();

        if ($cuisine) {
            return new CuisineResource($cuisine);
        }

        return abort(404);
    }
}
