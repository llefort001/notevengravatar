<?php
/**
 * Created by PhpStorm.
 * User: Lucas Lefort
 * Date: 26/03/2018
 * Time: 19:48
 */

namespace App\Http\Controllers\Api\V1;

use App\Avatar;
use App\Http\Transformers\AvatarTransformer;
use Dingo\Api\Contract\Http\Request;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;


class AvatarController extends Controller
{
    use Helpers;

    public function index(Request $request) : Response
    {
        return $this->response->collection(Avatar::all(), new AvatarTransformer);
    }

    public function byEmail($email) : Response
    {
        $avatar =Avatar::where('email', '=', $email)->get();
        if ($avatar->isNotEmpty())return $this->response->collection($avatar, new AvatarTransformer);
        else throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Aucun avatar ne correspond à cet email,');
    }
}