<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FleetOfCarRequest;
use App\Models\FleetOfCar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FleetOfCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FleetOfCar::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FleetOfCarRequest $request)
    {
        $new_car = FleetOfCar::create($request->validated());
        return $new_car;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return FleetOfCar::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FleetOfCarRequest $request, FleetOfCar $new_car)
    {
        $new_car->update($request->validated());
        return $new_car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FleetOfCar $new_car)
    {
        $new_car->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
