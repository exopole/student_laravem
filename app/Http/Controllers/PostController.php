<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\User;
use App\Tag;
use App\Http\Requests;
use File;

class PostController extends Controller
{


    public function __construct(){
//        $this->middleware('auth', ['except'=> ['index']]);

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts')) ;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('title', 'id');
        $users = User::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('admin.post.create', compact('categories', 'users', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'title'=> 'required|max:100',
            'category_id' => 'integer',
            'user_id' => 'integer',
            'status' => 'in:published,unpublished,draft',
            'publish_at' => 'date',
            'tags.*' => 'integer',
            'thumbnail' => 'image|max:2000'
            ]);

        $post = Post::create($request->all()); // ici vous récupéré kes données POST de votre formulaire

        $post->tags()->attach($request->input('tags'));

        $in = $request->file('thumbnail');
        if(!empty($in))
        {
            $ext = $in->getClientOriginalExtension();
            $uri = str_random(12).".".$ext;

            $post->thumbnail = $uri;

            $in->move(env('UPLOAD_PATH', './images'), $uri);
            $post->save();
        }

        return redirect('admin/post')->with('message', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::lists('title', 'id');
        $post = Post::find($id);
        $users = User::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('admin.post.edit', compact('post','categories', 'users', 'tags'));

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
        //dd($request->all());
        $this->validate($request, [
        'title'=> 'required|max:100',
        'content' => 'required',
        'category_id' => 'integer',
        'user_id' => 'integer',
        'status' => 'in:published,unpublished,draft',
        'publish_at' => 'date',
        'tags.*' => 'integer',
        'thumbnail' => 'image|max:2000',
        'delete_image' => 'in:delete'
        ]);



        $post = Post::find($id);
        $post->update($request->all());

        $tags = empty($request->input("tags"))? [] : $request->input('tags');

        $post->tags()->sync($tags);

        $filename = public_path(env('UPLOAD_PATH', './images')).'/'.$post->thumbnail;


        $in = $request->file('thumbnail');
        if(!empty($in))
        {
            if(File::exists($filename)){
                File::delete($filename);
            }            $ext = $in->getClientOriginalExtension();
            $uri = str_random(12).".".$ext;

            $post->thumbnail = $uri;

            $in->move(env('UPLOAD_PATH', './images'), $uri);
            $post->save();
        }

        if(!empty($request->input('delete_image'))){
            if(File::exists($filename)){
                File::delete($filename);
            }
            $post->thumbnail = null;

            $post->save(); // => update sur la table posts
        }



        return redirect('admin/post')->with(['message' => 'update sucess']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $filename = public_path(env('UPLOAD_PATH', './images')).'/'.$post->thumbnail;

        if(File::exists($filename)){
            File::delete($filename);
        }

        Post::destroy($id);

        return redirect('admin/post')->with( ['message' => 'success delete']);
    }
}
