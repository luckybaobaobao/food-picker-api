<?php

namespace Tests\Feature;

use Tests\TestCase;

class CuisineControllerTest extends TestCase
{
    public function test_that_cuisine_show_returns_cuisine()
    {
        $response = $this->get('api/cuisine/Burgers');

        $this->assertEquals($response['data']['name'], 'Burgers');
        $this->assertCount(2, $response['data']['restaurants']);
    }

    public function test_that_cuisine_show_returns_404()
    {
        $response = $this->get('api/cuisine/fourZeroFourSoup');

        $response->assertStatus(404);
    }
}
