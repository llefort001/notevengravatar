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
        $avatars = Avatar::where('user_id',Auth::id())->get();
        return view('avatars')->with('avatars', $avatars);
    }

    public function addAvatar()
    {
        return view('addAvatar');
    }
    public function deleteAvatar($id)
    {
        $avatar = Avatar::findOrFail($id);
        $avatar->delete();
        return Redirect::to('avatars');
    }

    public function saveAvatar(Request $request)
    {
        $file = Input::file('pic');
        $img = Image::make($file);
        Response::make($img->encode('jpeg'));

        try {
            Avatar::create([
                'user_id' => Auth::id(),
                'email' => $request->get('email'),
                'pic' => $img,
            ]);
        }
        catch (QueryException $e) {
            if($request->get('email') == null)
                return view('addAvatar')->with("error", "You must fill email");
            else
                return view('addAvatar')->with("error", "Email already used");
        }
        catch (\Exception $e) {
            dd($e);
            if ($e instanceof PostTooLargeException)
                return view('addAvatar')->with("error","File too large");

            if ($e instanceof NotReadableException)
                return view('addAvatar')->with("error","Image source not readable");
        }
        return Redirect::to('avatars');
    }

    /*
     * Extracts Avatar's data from DB and makes an image
     */
    public function showAvatar($id)
    {
        $avatar = Avatar::findOrFail($id);
        $pic = Image::make($avatar->pic);
        $response = Response::make($pic->encode('jpeg'));

        //setting content-type
        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }
}
