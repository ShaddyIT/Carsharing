<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRentRequest;
use App\Models\UserRent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserRent::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRentRequest $request)
    {
        $user_rent = UserRent::create($request->validated());
        return $user_rent;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserRent $user_rent)
    {
        return $user_rent;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRentRequest $request, UserRent $user_rent)
    {
        $user_rent->update($request->validated());
        return $user_rent;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRent $user_rent)
    {
        $user_rent->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
