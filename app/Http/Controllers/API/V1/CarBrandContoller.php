<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarBrandRequest;
use Illuminate\Http\Request;
use App\Models\CarBrand;
use Illuminate\Http\Response;

class CarBrandContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarBrand::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarBrandRequest $request)
    {
        $created = CarBrand::create($request->validated());
        return $created;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarBrand $car_brand)
    {
        return $car_brand;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarBrandRequest $request, CarBrand $car_brand)
    {
        $car_brand->update($request->validated());
        return $car_brand;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarBrand $car_brand)
    {
        $car_brand->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
