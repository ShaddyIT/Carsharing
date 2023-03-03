<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BalanceUp;
use App\models\UserRent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_id = DB::table('users')->pluck('id');
        foreach($users_id as $id){
            $balance_ups = DB::table('balance_ups')->where('user_id', $id)->sum('money');
            $rents = DB::table('user_rents')->where('user_id', $id)->sum('final_cost');
            $delta = $balance_ups - $rents;
            $user = User::find($id);
            if ($delta <= 0){
                BalanceUp::create([
                    'user_id' => $id,
                    'date' => Carbon::now(),
                    'money' => abs($delta) + rand(100, 20000)
                ]);
                $balance_actually = DB::table('balance_ups')->where('user_id', $id)->sum('money');
                $user->balance = $balance_actually;
                $user->save();
            } else {
                $user->balance = $balance_ups;
                $user->save();
            }
        } 
    }
}
