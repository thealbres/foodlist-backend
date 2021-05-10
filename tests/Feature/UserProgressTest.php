<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserProgressTest extends TestCase
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
            'weight' => $this->faker->randomDigit,
            'imc' => $this->faker->randomDigit
        ];
        $user_progress = $this->json('POST', 'api/user-progress', $data, ['Accept' => 'application/json'])
            ->assertStatus(201);

        return $user_progress;
    }
    /**
     * @depends testRegister
     */

    public function testUpdate($user_progress)
    {
        $data = [
            'user_id' => '1',
            'weight' => $this->faker->randomDigit,
            'imc' => $this->faker->randomDigit
        ];

        $this->json('PATCH', 'api/user-progress/' . $user_progress['id'], $data, ['Accept' => 'application/json'])
            ->assertStatus(202);
    }
    /**
     * @depends testRegister
     */

    public function testDelete($user_progress)
    {
        $teste = $this->json('delete', 'api/user-progress/' . $user_progress['id'], [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
