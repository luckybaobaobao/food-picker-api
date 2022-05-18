<?php

namespace Tests\Feature;

use Tests\TestCase;

class CityControllerTest extends TestCase
{
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
}
