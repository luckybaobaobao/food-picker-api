<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Http\Controllers\Controller;
use App\Http\Resources\CuisineResource;

class CuisineController extends Controller
{
    public function show(string $name)
    {
        $cuisine = Cuisine::where('name', $name)->first();

        if (!$cuisine) {
            return abort(404);
        }

        return new CuisineResource($cuisine);
    }
}
