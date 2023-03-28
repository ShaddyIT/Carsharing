<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRequestUpdate;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api_v1/users",
     *      operationId="/api_v1/users(ALL)",
     *      @OA\ExternalDocumentation(
     *          url="https://haait.net/how-to-use-swagger-in-laravel/"
     *      ),
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
     * @OA\Post (
     *      path="/api_v1/users",
     *      operationId="/api_v1/users(POST)",
     *      summary="Создание пользователя",
     *      description="description",
     *      tags={"Users"},
     *      @OA\Parameter(
     *         name="surname",
     *         in="query",
     *         description="Фамилия пользователя",
     *         required=true,
     *         @OA\Schema(
     *              type="string")
     *      ),
     *      @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Имя пользователя",
     *         required=true,
     *         @OA\Schema(
     *              type="string")
     *      ),
     *      @OA\Parameter(
     *         name="patronymic",
     *         in="query",
     *         description="Отчество пользователя",
     *         required=true,
     *         @OA\Schema(
     *              type="string")
     *      ),  
     *      @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="Пароль пользователя",
     *         required=true,
     *         @OA\Schema(
     *              type="integer")
     *      ),    
     *      @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="email пользователя",
     *         required=true,
     *         @OA\Schema(
     *              type="string")
     *      ),  
     *      @OA\Parameter(
     *         name="user_status_id",
     *         in="query",
     *         description="Статус пользователя",
     *         required=true,
     *         @OA\Schema(
     *              type="integer")
     *      ),          
     *      @OA\Response(
     *          response="201",
     *          description="Пользователь создан",
     *          @OA\JsonContent(example="")
     *      )
     * )
     */

    public function store(UserRequest $request)
    {
        $new_user = User::create($request->validated());
        return $new_user;
    }

    /**
     * @OA\GET (
     *      path="/api_v1/users/{id}",
     *      operationId="/api_v1/users{id}(POST)",
     *      summary="Получить пользователя по его ID",
     *      description="Данный endpoint позволяет получить аккаунт пользователя по его id",
     *      tags={"Users"},
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID пользователя",
     *         required=true,
     *         @OA\Schema(
     *              type="integer")
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Держи пользователя",
     *          @OA\JsonContent(example="")
     *      )
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return Cache::remember((string)$id, now()->addMinutes(5), function() use ($id) {
            return User::find($id);
        });
    }

    /**
     * @OA\Put (
     *      path="/api_v1/users/{id}",
     *      operationId="/api_v1/users(Put)",
     *      summary="Изменение данных пользователя",
     *      description="Изменяет определенные данные пользователя",
     *      tags={"Users"},
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Фамилия пользователя",
     *         required=false,
     *         @OA\Schema(
     *              type="string")
     *      ),
     *      @OA\Parameter(
     *         name="surname",
     *         in="query",
     *         description="Фамилия пользователя",
     *         required=false,
     *         @OA\Schema(
     *              type="string")
     *      ),
     *      @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="Имя пользователя",
     *         required=false,
     *         @OA\Schema(
     *              type="string")
     *      ),
     *      @OA\Parameter(
     *         name="patronymic",
     *         in="query",
     *         description="Отчество пользователя",
     *         required=false,
     *         @OA\Schema(
     *              type="string")
     *      ),  
     *      @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="Пароль пользователя",
     *         required=false,
     *         @OA\Schema(
     *              type="integer")
     *      ),    
     *      @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="email пользователя",
     *         required=false,
     *         @OA\Schema(
     *              type="string")
     *      ),  
     *      @OA\Parameter(
     *         name="user_status_id",
     *         in="query",
     *         description="Статус пользователя",
     *         required=false,
     *         @OA\Schema(
     *              type="integer")
     *      ),          
     *      @OA\Response(
     *          response="201",
     *          description="Данные изменены",
     *          @OA\JsonContent(example="")
     *      )
     * )
     */
    public function update(UserRequestUpdate $request,User $user)
    {
        
        $user->update($request->validated());
        return $user;
    }

    /**
    * @OA\Delete(
     *      path="/api_v1/users/{id}",
     *      operationId="/api_v1/users{id}(DELETE)",
     *      summary="Удалить пользователя по его ID",
     *      description="Данный endpoint позволяет удалить аккаунт пользователя по его id",
     *      tags={"Users"},
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID пользователя",
     *         required=true,
     *         @OA\Schema(type="integer")),
     *      @OA\Response(
     *          response="200",
     *          description="Держи пользователя",
     *          @OA\JsonContent(example="")
     *      )
     * )
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
