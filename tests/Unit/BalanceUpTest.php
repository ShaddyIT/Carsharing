<?php

namespace Tests\Unit;

use App\Services\CashService;
use PHPUnit\Framework\TestCase;

class BalanceUpTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $cah = CashService::moneyInDB(123.3);
        $this->assertEquals(12330.0, $cah);
    }
}
