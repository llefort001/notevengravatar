<?php
/**
 * Created by PhpStorm.
 * User: Lucas Lefort
 * Date: 26/03/2018
 * Time: 19:17
 */

namespace App\Http\Transformers;

use App\Avatar;
use App\User;
use League\Fractal\TransformerAbstract;

class AvatarTransformer extends TransformerAbstract
{
    public function transform(Avatar $avatar) : array
    {
        return [
            'email' => $avatar->email,
            'pic' => base64_encode($avatar->pic)
        ];
    }

}