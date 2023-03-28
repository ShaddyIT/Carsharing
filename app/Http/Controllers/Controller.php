<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="CarSharing API Documentation", 
 *      version="0.1 alfa",
 *      termsOfService="How to use API",
 *      description="Документация для API приложения для каршеринга. Стек приложения: Nginx, PostgreSQL, Redis, RabbitMQ, Laravel",
 *      @OA\Contact(
 *          name="ПроТехнологии",
 *          url="https://pro-technologii.ru/",
 *          email="popowdaniil99@gmail.com"),
 *      @OA\License(
 *          name="Apache 2.0(fake for look how to use)",    
 *          identifier="license",
 *          url="asdfsa"
 *      )
 *  )
 * 
 * @OA\Tag(
 *      name="Users",
 *      description="Пользователи приложения",
 *      @OA\ExternalDocumentation(
 *          url="urls"
 *      )
 * )
 * @OA\Tag(
 *      name="UserStatus",
 *      description="Статусы которыми могут обладать пользователи"
 * )
 * @OA\Tag(
 *      name="BalanceUp",
 *      description="Пополнения баланса"
 * )
 * @OA\Tag(
 *      name="CarBrand",
 *      description="Марки машин"
 * )
 * @OA\Tag(
 *      name="CarEvent",
 *      description="События происходящие с машинами"
 * )
 * @OA\Tag(
 *      name="CarModel",
 *      description="Модели машин"
 * )
 * @OA\Tag(
 *      name="CarStatus",
 *      description="Статусы которые могут быть у машин"
 * )
 * @OA\Tag(
 *      name="Event",
 *      description="Список событий которые могут происходить с машиной"
 * )
 * @OA\Tag(
 *      name="FleetOfCar",
 *      description="Автопарк каршеринга"
 * )
 * @OA\Tag(
 *      name="UserRent",
 *      description="Платежи пользователей"
 * )
 * 
 * @OA\Server(
 *      url="http://79.140.21.83:8833",
 *      description="Development server"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
