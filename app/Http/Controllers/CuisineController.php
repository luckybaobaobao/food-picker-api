<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CuisineRequest;
use App\Http\Services\CuisineService;
use App\Http\Resources\CuisineResource;

class CuisineController extends Controller
{
    private $cuisineService;

    public function __construct(CuisineService $cuisineService)
    {
        $this->cuisineService = $cuisineService;
    }

    public function show(CuisineRequest $request)
    {
        $cuisine = $this->cuisineService->findByName($request->name);

        if (!$cuisine) {
            return abort(404);
        }

        return new CuisineResource($cuisine);
    }
}
