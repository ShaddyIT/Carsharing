<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserStatus;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_statuses = ['админ', 'активен', 'забанен', 'не подтвержденны документы'];
        foreach ($user_statuses as $status){
            UserStatus::create(['status' => $status]);
        }
        
    }
}
