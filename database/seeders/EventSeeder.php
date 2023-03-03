<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = ['движение','остановка','взятие в аренду','сдача из аренды', 'состояние'];
        foreach ($events as $event){
           Event::create([
            'event'=> $event
        ]);
        }
    }
}
