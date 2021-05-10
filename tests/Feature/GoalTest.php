<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GoalTest extends TestCase
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
            'height' => $this->faker->randomDigit,
            'imc' => $this->faker->randomDigit,
            'user_id' => '1',
        ];
        $goal = $this->json('POST', 'api/goals', $data, ['Accept' => 'application/json'])
            ->assertJson($data)
            ->assertStatus(201);

        return $goal;
    }
      /**
     * @depends testRegister
     */

    public function testShow($goal)
    {

        $this->json('get', 'api/goals/' . $goal['id'], [], ['Accept' => 'application/json'])
            ->assertStatus(302);
    }
     /**
     * @depends testRegister
     */

    public function testUpdate($goal)
    {
        $data = [
            'height' => $this->faker->randomDigit,
            'imc' => $this->faker->randomDigit,
            'user_id' => '1',
        ];

        $this->json('PATCH', 'api/goals/' . $goal['id'], $data, ['Accept' => 'application/json'])
            ->assertStatus(202);
    }

    /**
     * @depends testRegister
     */

    public function testDelete($goal)
    {
        $this->json('delete', 'api/goals/' . $goal['id'], [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
