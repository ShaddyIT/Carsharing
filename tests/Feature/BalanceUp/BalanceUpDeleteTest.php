<?php

namespace Tests\Feature\BalanceUp;

use App\Models\BalanceUp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BalanceUpDeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteUser()
    {
        BalanceUp::factory()->create();
        $balanceUp = BalanceUp::orderBy('created_at', 'DESC')->first();
        $response = $this->delete('/api_v1/balance_ups/' . $balanceUp->id);

        $response->assertStatus(200);
    }
}
