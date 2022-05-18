<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;

class CityController extends Controller
{
    public function show(string $name)
    {
        $city = City::where('name', $name)->first();

        if (!$city) {
            return abort(404);
        }

        return new CityResource($city);
    }
}
