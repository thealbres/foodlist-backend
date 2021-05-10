<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MealTest extends TestCase
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
            'user_id' => '1',
            'type' =>'lunch',
            'foods' => [1, 2, 3, 4],
        ];
        $meal = $this->json('POST', 'api/meals', $data, ['Accept' => 'application/json'])
            ->assertStatus(201);

        return $meal;
    }

    /**
     * @depends testRegister
     */

    public function testDelete($meal)
    {
        $teste = $this->json('delete', 'api/meals/' . $meal['id'], [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
