<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestaurantControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;
    
    public function test_that_restaurant_show_name_returns_restaurant()
    {
        $response = $this->get('api/restaurant/name/Delikatessen')->json();

        $this->assertEquals($response['data']['name'], 'Delikatessen');
        $this->assertEquals($response['data']['client_key'], 'CIdMJJ0dqHYB2mdOMs');
    }

    public function test_that_restaurant_show_name_returns_404()
    {
        $response = $this->get('api/restaurant/name/fourZeroFour');

        $response->assertStatus(404);
    }

    public function test_that_restaurant_show_name_returns_422()
    {
        $response = $this->get('api/restaurant/name/<');

        $response->assertStatus(422);
    }

    public function test_that_restaurant_show_nearest_returns_restaurant()
    {
        $response = $this->get('api/restaurant/distance/55.701431/13.197756')->json();

        $this->assertEquals($response['data']['name'], 'Zen Sushi');
    }

    public function test_that_restaurant_show_freetext_returns_restaurant()
    {
        $response = $this->get('api/restaurant/freetext/tapas')->json();

        $this->assertCount(1, $response['data']['restaurants']);
    }

    public function test_that_restaurant_show_freetext_returns_restaurants_from_cuisine()
    {
        $response = $this->get('api/restaurant/freetext/Vietnamesiskt')->json();

        $this->assertCount(5, $response['data']['restaurants']);
    }

    public function test_that_restaurant_show_freetext_returns_404()
    {
        $response = $this->get('api/restaurant/freetext/restaurant404');

        $response->assertStatus(404);
    }
}
