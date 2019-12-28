<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Snapshots\MatchesSnapshots;
use App\Restaurant;
class RestaurentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_restaurent_response_is_json()
    {   
        $response = $this->json('GET', '/api/getRestaurants');
        $response
            ->assertStatus(201)
            ->assertJson([
                'restaurants' => true
            ]);
    }

    public function test_restaurent_data_for_version()
    {   
        $response = $this->json('GET', '/api/getRestaurants',['version'=>'5.12.300']);
        $response
            ->assertJsonStructure([
                'restaurants' => [
                  '*' => [
                    'RestaurantName'
                  ]
                ]
            ]);

    }
}
