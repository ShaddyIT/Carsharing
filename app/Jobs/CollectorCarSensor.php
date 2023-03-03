<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\CarEvent;
use Exception;

class CollectorCarSensor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $car_event;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($car_event_request)
    {
        $this->car_event = $car_event_request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $new_car = CarEvent::create($this->car_event);
        return $new_car;
    }
    public function failed()
    {
        dispatch(new CollectorCarSensor($this->car_event))->onQueue('failed_jobs');
    }
}
