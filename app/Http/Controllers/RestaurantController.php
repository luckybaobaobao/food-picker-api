<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistanceRequest;
use App\Http\Requests\RestaurantRequest;
use App\Http\Services\RestaurantService;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantController extends Controller
{
    private $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    public function showName(RestaurantRequest $request)
    {
        $restaurant = $this->restaurantService->findByName($request->name);

        if (!$restaurant) {
            return abort(404);
        }

        return new JsonResource($restaurant->toArray());
    }

    public function showDistance(DistanceRequest $request)
    {
        $restaurant = $this->restaurantService->findByClosestDistance($request->latitude, $request->longitude);

        return new JsonResource($restaurant->toArray());
    }

    public function index(string $freeText)
    {
        $restaurants = $this->restaurantService->findByFreeText($freeText);

        if (!$restaurants) {
            return abort(404);
        }

        return new JsonResource([
            'restaurants' => $restaurants->toArray()
        ]);
    }
}
