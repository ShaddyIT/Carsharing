<?php

namespace Tests\Feature\BalanceUp;

use App\Models\BalanceUp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class BalanceUpShowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $id = BalanceUp::inRandomOrder()->first()->id;
        $balanceObj=BalanceUp::find($id);
        $response = $this->get('/api_v1/balance_ups/' . $id);

        $response->assertOK()
            ->assertJson(function (AssertableJson $json) use ($balanceObj){
                $json
                    ->where('money', $balanceObj->money)
                    ->missing('casdfasdf')
                    ->has('date')
                    ->etc();
            });
    }
}
