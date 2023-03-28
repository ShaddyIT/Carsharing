<?php

namespace Tests\Feature\BalanceUp;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BalanceUpUpdateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateBalanceUp()
    {
        $response = $this->putJson('/');

        $response->assertStatus(200);
    }
}
