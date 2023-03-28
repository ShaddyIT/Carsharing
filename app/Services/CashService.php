<?php

namespace App\Services;

use App\Models\BalanceUp;
use App\Models\FleetOfCar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CashService
{
    // Переводит деньги в копейки
    public static function moneyInDB($money){
        return $money*100;
    }

    // Переводит из копеек в рубли
    public static function moneyOutOfDB($money){
        return $money/100;
    }

    // Транзакция для пополнения баланса
    // возвращает два значения 
    // balance - сколько денег после пополнения
    // bill - сколько было пополнение
    public function balanceUp($request) {
        $arr =  DB::transaction(function() use ($request) {
            $balance_up = BalanceUp::create($request->validated());
            return self::updateUserBalance($balance_up, $balance_up->money);
        });
        return response()->json([
            'balance'=>$this->moneyOutOfDB($arr[0]),
            'bill'=>$this->moneyOutOfDB($arr[1])
        ], 201);
    }

    // Используется как часть транзакции пополнения баланса
    // а так же может и просто использоваться для изменения баланса
    // как в положительную так и в отрицательную сторону, зависит от знака переменной $money
    public static function updateUserBalance($rent, $money){
        $balance = (User::find($rent->user_id)->balance) + $money;
        User::find($rent->user_id)->update(['balance' => $balance]);
        return [$balance, $money]; 
    }

    // Считает стоимость поездки
    public static function costRent($rent) : int
    {
        $costMinute = FleetOfCar::find($rent->car_id)->cost_per_minute;
        $deltaTime = Carbon::createFromDate($rent->end_time)->diffInMinutes($rent->start_time); 
        $cost = $costMinute * $deltaTime;
        return $cost;
    }

    // Транзакция списания денег за поездку
    public static function balancePayRent($user_rent,$request){
        return DB::transaction(function() use ($user_rent, $request){
            $user_rent->update($request->validated());
            $costRent = self::costRent($user_rent) * -1;
            $user_rent->update(['final_cost'=>abs($costRent)]);
            CarService::updateStatus($user_rent->car_id, '0');
            return self::updateUserBalance($user_rent, ($costRent));
            
        });
    }

}