<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FoodGroupTest extends TestCase
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
            'user_id' => '1',
        ];
        $foodGroup = $this->json('POST', 'api/food-groups', $data, ['Accept' => 'application/json'])
            ->assertJson($data)
            ->assertStatus(201);

        return $foodGroup;
    }
      /**
     * @depends testRegister
     */

    public function testShow($foodGroup)
    {

        $this->json('get', 'api/food-groups/' . $foodGroup['id'], [], ['Accept' => 'application/json'])
            ->assertStatus(302);
    }
     /**
     * @depends testRegister
     */

    public function testUpdate($foodGroup)
    {
        $data = [
            'name' => $this->faker->sentence,
            'user_id' => '1',
        ];

        $this->json('PATCH', 'api/food-groups/' . $foodGroup['id'], $data, ['Accept' => 'application/json'])
            ->assertStatus(202);
    }

    /**
     * @depends testRegister
     */

    public function testDelete($foodGroup)
    {
        $this->json('delete', 'api/food-groups/' . $foodGroup['id'], [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
