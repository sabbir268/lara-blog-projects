<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Post;
use App\Photo;
use App\Category;
use App\Comment;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        $data = $request->all();

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $data['photo_id'] = $photo->id;
        }

        
        Auth::user()->post()->create($data);

        return redirect('/admin/posts')->with('message', 'New post has been Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Post = new Post();

        
        $categorys = Category::all();
        $latestPost = $Post->orderBy('created_at','desc')->limit(5)->get();
        $post = $Post->findOrFail($id);
        $comments = $post->comment;
        return view('blog.post',compact('post','categorys','latestPost','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categorys = Category::pluck('name','id')->all();
        return view('admin.posts.edit',compact('post','categorys'));
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
        $data = $request->all();

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $data['photo_id'] = $photo->id;
        }

        
        Auth::user()->post()->whereId($id)->first()->update($data);

        return redirect('/admin/posts')->with('message', 'Post has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        unlink(public_path().$post->photo->file);

        $post->delete();

        return redirect('/admin/posts')->with('message', 'Post has been Deleted');
    }



    public function blog()
    {
        $Post = new Post();

        $posts = Post::all();
        $categorys = Category::all();
        $latestPost = $Post->orderBy('created_at','desc')->limit(5)->get();
        return view('blog.blogs',compact('posts','categorys','latestPost'));
    }
}
