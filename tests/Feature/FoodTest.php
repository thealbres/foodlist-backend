<?php

namespace Tests\Feature;

use App\Http\Controllers\FoodController;
use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FoodTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testRegister()
    {
        $data = [
            'name' => $this->faker->sentence,
            'quantity' => $this->faker->randomDigit,
            'calories' => $this->faker->randomDigit,
            'user_id' => '1',
            'food_group_id' => '1',
        ];
        $food = $this->json('POST', 'api/foods', $data, ['Accept' => 'application/json'])
            ->assertJson($data)
            ->assertStatus(201);

        return $food;
    }
      /**
     * @depends testRegister
     */

    public function testShow($food)
    {

        $this->json('get', 'api/foods/' . $food['id'], [], ['Accept' => 'application/json'])
            ->assertStatus(302);
    }
     /**
     * @depends testRegister
     */

    public function testUpdate($food)
    {
        $data = [
            'name' => $this->faker->sentence,
            'quantity' => $this->faker->randomDigit,
            'calories' => $this->faker->randomDigit,
            'user_id' => '1',
            'food_group_id' => '1',
        ];

        $this->json('PATCH', 'api/foods/' . $food['id'], $data, ['Accept' => 'application/json'])
            ->assertStatus(202);
    }

    /**
     * @depends testRegister
     */

    public function testDelete($food)
    {
        $this->json('delete', 'api/foods/' . $food['id'], [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
