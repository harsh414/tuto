<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $avatar= auth()->user()->avatar;
//        dd($user->posts);
        return view('dashboard')->with([
            'posts'=> $user->posts,
            'avatar'=>$avatar
        ]);
    }

    public function upload(Request $request)
    {
        $images= $request->file('file');
        foreach ($images as $image)
        {
           $path = $image->store('myfile','s3');
           $url= Storage::disk('s3')->url($path);
           echo $url;
        }
//        return back();
    }
}
