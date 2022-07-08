<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function test_that_city_show_returns_city()
    {
        $response = $this->get('api/city/stockholm')->json();

        $this->assertEquals($response['data']['name'], 'Stockholm');
        $this->assertCount(125, $response['data']['restaurants']);
    }

    public function test_that_city_show_returns_404()
    {
        $response = $this->get('api/city/fourZeroFourCity');

        $response->assertStatus(404);
    }

    public function test_that_city_name_returns_422()
    {
        $response = $this->get('api/restaurant/name/<');

        $response->assertStatus(422);
    }
}
