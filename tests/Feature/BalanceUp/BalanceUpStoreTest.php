<?php

namespace Tests\Feature\BalanceUp;

use App\Models\BalanceUp;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BalanceUpStoreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBalanceUpStore()
    {
        $balanceUp = BalanceUp::factory()->make(['date' => Carbon::now()]);
        $response = $this->postJson('/api_v1/balance_ups', ['user_id'=>$balanceUp->user_id,
                                                            'date'=>$balanceUp->date,
                                                            'money'=>$balanceUp->money]);

        $response->assertCreated()
                 ->assertJsonMissingValidationErrors();
    }
}
