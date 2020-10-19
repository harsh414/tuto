<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['show','index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $post= DB::select("SELECT * FROM posts WHERE title='sdsd' AND body=''"); using core way
//        $post= Post::orderBy('id','desc')->take(1)->get();  getting last few


        $posts = Post::orderBy('title','desc')->paginate(3);
        return view('posts.index')->with('posts',$posts);
//        return Post::where('title','sdsd')->get();
//        ->take(2)->get();   .... for getting reqd number of psot
    }

    public function try()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);

        $post= new Post();
        $post->title=$request->input('title');
        $post->body= $request->input('body');
        $post->user_id= auth()->user()->id;
        $post->save();

        return redirect('posts')->with('success','New Post Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorized User');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);

        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body= $request->input('body');
        $post->save();

        return redirect('posts')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorized User');
        }
        $post->delete();
        return redirect('posts')->with('success','Post deleted successfully');
    }
}
