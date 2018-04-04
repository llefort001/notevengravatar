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
use Image;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AvatarController extends Controller
{
    use Helpers;

    public function index(Request $request) : Response
    {
        return $this->response->collection(Avatar::all(), new AvatarTransformer);
    }
    
    public function showAvatar($hashedEmail)
    {
        $avatar =Avatar::where('hashed_email', '=', $hashedEmail)->firstOrFail();
        $pic = Image::make($avatar->pic);
        dump("test");
        die;
        $response = response()->make($pic->encode('jpeg'));
        //setting content-type
        $response->header('Content-Type', 'image/jpeg');
        if(is_null($avatar)) throw new NotFoundHttpException('Aucun avatar ne correspond à cet email');
        return $response;

    }
}