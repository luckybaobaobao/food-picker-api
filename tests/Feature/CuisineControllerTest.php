<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CuisineControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;
    
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

    public function test_that_cuisine_show_returns_422()
    {
        $response = $this->get('api/cuisine/>');

        $response->assertStatus(422);
    }
}
