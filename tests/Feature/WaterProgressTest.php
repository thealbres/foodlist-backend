<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WaterProgressTest extends TestCase
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
            'every_hour' => $this->faker->randomDigit,
        ];
        $water_progress = $this->json('POST', 'api/water-progress', $data, ['Accept' => 'application/json'])
            ->assertStatus(201);

        return $water_progress;
    }
    /**
     * @depends testRegister
     */

    public function testUpdate($water_progress)
    {
        $data = [
            'user_id' => '1',
            'every_hour' => $this->faker->randomDigit,
        ];

        $this->json('PATCH', 'api/water-progress/' . $water_progress['id'], $data, ['Accept' => 'application/json'])
            ->assertStatus(202);
    }
    /**
     * @depends testRegister
     */

    public function testDelete($water_progress)
    {
        $teste = $this->json('delete', 'api/water-progress/' . $water_progress['id'], [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
