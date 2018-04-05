<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avatar;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Database\QueryException;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Http\Exceptions\PostTooLargeException;

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
        $avatars = Avatar::where('user_id', Auth::id())->get();
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
        Response::make($img->encode('png'));

        try {Avatar::create([
            'user_id' => Auth::id(),
            'email' => $request->get('email'),
            'pic' => $img,
        'hashed_email' => md5($request->get('email'))]);}
        catch (QueryException $e) {
          return view('addAvatar')->with("error", "Email already used");
        }
        catch (\Exception $e) {
            if ($e instanceof PostTooLargeException)
                return view('addAvatar')->with("error","File too large");

            if ($e instanceof NotReadableException)
                return view('addAvatar')->with("error","Image source not readable");
        }
        return Redirect::to('avatars');
    }
}
