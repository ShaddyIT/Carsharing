<?php

namespace Tests\Feature\BalanceUp;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BalanceUpGetTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api_v1/balance_ups');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeaderMissing('trulyalya')
            ->assertJsonCount(5, 'data')
            ->assertJsonStructure(['data'=>[
                                        '*' => ['id',
                                        'user_id']]]);
            
    }
}
