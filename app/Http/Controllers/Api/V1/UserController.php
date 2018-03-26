<?php
/**
 * Created by PhpStorm.
 * User: Lucas Lefort
 * Date: 26/03/2018
 * Time: 19:11
 */
namespace App\Http\Controllers\Api\V1;

use App\Http\Transformers\UserTransformer;
use App\User;
use Dingo\Api\Contract\Http\Request;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    use Helpers;

    public function index(Request $request) : Response
    {
        return $this->response->collection(User::all(), new UserTransformer);
    }
}