<?php
/**
 * Created by PhpStorm.
 * User: Lucas Lefort
 * Date: 26/03/2018
 * Time: 21:09
 */

namespace App\Http\Controllers\Api\V1;

use App\Avatar;
use App\Http\Transformers\AvatarTransformer;
use Dingo\Api\Contract\Http\Request;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use PhpParser\Node\Expr\Array_;
/**
 * @Resource("Informations", uri="/info")
 */
class InfoController extends Controller
{
    use Helpers;

    /**
     * Show API informations (name,format,version,avatar sizes,image formats)
     *
     * Get a JSON representation of the informations about the API.
     * @Get("/")
     * @Versions({"v1"})
     */
    public function index(): array
    {
        $test = array(
            "Api Name" => env("API_NAME", "Api name not defined"),
            "Api Format" => env("API_DEFAULT_FORMAT", "json"),
            "Api Version" => env("API_VERSION", "v0"),
            "Avatar sizes" => array(
                "small" => "32x32",
                "medium" => "128x128",
                "large" => "512x512"
            ),
            "Default avatar size" => "128x128",
            "Image formats" => array(
                "png" => "png",
                "jpeg" => "jpeg"
            )
        );
        return $test;
    }
}