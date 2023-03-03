<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarEventRequest;
use App\Jobs\CollectorCarSensor;
use App\Models\CarEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarEvent::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarEventRequest $request)
    {
        $car_event_request = $request->validated();
        dispatch(new CollectorCarSensor($car_event_request));
        return $car_event_request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarEvent $car_event)
    {
        return $car_event;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarEventRequest $request, CarEvent $car_event)
    {
        $car_event->update($request->validated());
        return $car_event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarEvent $car_event)
    {
        $car_event->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
