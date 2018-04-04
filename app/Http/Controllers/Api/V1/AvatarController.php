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
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Resource("Avatars", uri="/avatar")
 */
class AvatarController extends Controller
{
    use Helpers;

    /**
     * Show an avatar for a given hash
     *
     * Get a JPEG representation of the avatar.
     * @Get("/{?hashed_email}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("hashed_email", type="string", required=true, description="The md5 hash of the email linked to the avatar.", default=null),
     * })
     */
    public function showAvatar($hashedEmail)
    {

        try {
            $avatar = Avatar::where('hashed_email', $hashedEmail)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException('Aucun avatar ne correspond à cet email');
        }
        $pic = Image::make($avatar->pic);
        $response = response()->make($pic->encode('jpeg'));
        //setting content-type
        $response->header('Content-Type', 'image/jpeg');
        return $response;

    }
}