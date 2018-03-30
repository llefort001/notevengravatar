<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avatar;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avatars = Avatar::where('user_id',Auth::id())->get();

       // $avatars = Auth::user()->avatars;

        return view('avatars')->with('avatars', $avatars);
    }

    public function addAvatar()
    {
        return view('addAvatar');
    }
    public function deleteAvatar(Avatar $avatar)
    {
        $avatar->delete();
        return Redirect::to('avatars');
    }

    public function saveAvatar(Request $request)
    {
        $file = Input::file('pic');
        $img = Image::make($file);
        Response::make($img->encode('jpeg'));

        Avatar::create([
            'user_id' => Auth::id(),
            'email' => $request->get('email'),
            'pic' => $img,
            'hashed_email'=> md5($request->get('email'))
        ]);
        return Redirect::to('avatars');
    }
}
