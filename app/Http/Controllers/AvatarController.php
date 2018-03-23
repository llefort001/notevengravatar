<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avatar;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Image;

class AvatarController extends Controller
{
    public function showAvatarList()
    {
        $avatars = Avatar::all();
        return view('Avatarlist')->with('avatars', $avatars);
    }

    public function addAvatar()
    {
        return view('addAvatar');
    }

    public function saveAvatar(Request $request)
    {

        $file = Input::file('pic');
        $img = Image::make($file);
        Response::make($img->encode('jpeg'));

        $avatar = new Avatar;
        $avatar->email = $request->get('email');
        $avatar->pic = $img;
        $avatar->user_id = 1;
        $avatar->save();


        return Redirect::to('list');
    }

    /*
     * Extracts Avatar's data from DB and makes an image
     */
    public function showAvatar($id)
    {
        $Avatar = Avatar::findOrFail($id);
        $pic = Image::make($Avatar->pic);
        $response = Response::make($pic->encode('jpeg'));

        //setting content-type
        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }
}
