<?php

namespace Tests\Feature;

use Tests\TestCase;

class RestaurantControllerTest extends TestCase
{
    
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

    public function test_that_restaurant_show_nearest_returns_restaurant()
    {
        $response = $this->get('api/restaurant/distance/55.701431/13.197756')->json();

        $this->assertEquals($response['data']['name'], 'Zen Sushi');
    }

    public function test_that_restaurant_show_freetext_returns_restaurant()
    {
        $response = $this->get('api/restaurant/index/tapas')->json();

        $this->assertCount(2, $response['data']['companies']);
    }

    public function test_that_restaurant_show_freetext_returns_cuisine()
    {
        $response = $this->get('api/restaurant/index/spansk tapas')->json();

        $this->assertEquals($response['data']['name'], 'Spansk Tapas');
    }

    public function test_that_restaurant_show_freetext_returns_404()
    {
        $response = $this->get('api/restaurant/index/restaurant404');

        $response->assertStatus(404);
    }
}
