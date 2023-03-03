<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/users",
     *      operationId="usersAll",
     *      tags={"Users"},
     *      summary="Выводит всех юзеров нашего приложения",
     *      @OA\Response(
     *          response="200", 
     *          description="An example endpoint")
     *  )
     * 
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_user = User::create($request->all());
        return $new_user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,User $user)
    {
        
        $user->update($request->validated());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
