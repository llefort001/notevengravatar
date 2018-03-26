<?php
/**
 * Created by PhpStorm.
 * User: Lucas Lefort
 * Date: 26/03/2018
 * Time: 19:17
 */

namespace App\Http\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user) : array
    {
        return [
            'name' => $user->name,
            'email' => $user->email
        ];
    }

}