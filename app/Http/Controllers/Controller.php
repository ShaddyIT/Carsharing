<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="CarSharing API Documentation", 
 *      version="0.1",
 *      description="Документация для API монолит-приложения",
 *      @OA\Contact(
 *          name="Эксклюзивная IT компания 'Велосипеды и Ко, но Ко не компания, а Костыли'",
 *          url="https://cs4.pikabu.ru/post_img/big/2015/05/07/6/1430989171_1871837159.jpg",
 *          email="daniil@carsharing.egypt")
 *  )
 * 
 * @OA\Tag(
 *      name="Users",
 *      description="abracadabra"
 * )
 * 
 * @OA\Server(
 *      url="http://79.140.21.83:8833/api_v1",
 *      description="Development server"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
