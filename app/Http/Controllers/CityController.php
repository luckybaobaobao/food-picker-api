<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Services\CityService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;

class CityController extends Controller
{
    private $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function show(CityRequest $request)
    {
        $city = $this->cityService->findByName($request->name);

        if (!$city) {
            return abort(404);
        }

        return new CityResource($city);
    }
}
