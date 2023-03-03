<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStatusRequest;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserStatus::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStatusRequest $request)
    {
        $status = UserStatus::create($request->validated());
        return $status;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserStatus $user_status)
    {
        return $user_status;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStatusRequest $request, UserStatus $user_status)
    {
        $user_status->update($request->validated());
        return $user_status;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserStatus $user_status)
    {
        $user_status->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
