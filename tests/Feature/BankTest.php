<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class BankTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use WithoutMiddleware, WithFaker, RefreshDatabase;

    public function get_all_banks()
    {
        $response = $this->get('/api/v1/banks');

        $response->assertStatus(200);
    }

    public function get_a_bank()
    {
        $response = $this->get('/api/v1/banks/1');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_a_bank()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'account_number' => $this->faker->creditCardNumber,
            'trust' => $this->faker->numerify
        ];

        $this->post('/api/v1/banks', $attributes);

        $this->assertDatabaseHas('banks', $attributes);

    }

}
