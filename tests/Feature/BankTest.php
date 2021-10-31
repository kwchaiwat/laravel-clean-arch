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

    use WithoutMiddleware;

    public function test_get_all_banks()
    {
        $response = $this->get('/api/v1/banks');

        $response->assertStatus(200);
    }

    public function test_has_bank()
    {
        $response = $this->get('/api/v1/banks/1');

        $response->assertStatus(200);
    }
}
