<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Cuisine;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $json = json_decode(File::get("database/data/backend-data.json"));

        collect($json)->each(function ($data) {
            $cuisine = Cuisine::firstOrCreate([
                'name' => $data->cuisine
            ]);
            
            $city = City::firstOrCreate([
                'name' => $data->city
            ]);

            Restaurant::firstOrCreate(
                [
                    'client_key' => $data->clientKey,
                    'name' => $data->restaurantName,
                    'longitude' => $data->longitude,
                    'latitude' => $data->latitude,
                    'cuisine_id' => $cuisine->id,
                    'city_id' => $city->id
                ]
            );
        });
    }
}
