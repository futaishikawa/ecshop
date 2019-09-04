<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

use Storage;

class PostsController extends Controller
{
    //

    public function __construct()
        {
            $this->middleware('auth');
        }



    public function index(Request $request){
      // $posts = \App\Post::latest()->get();
      // return view('posts.index')->with('posts', $posts);

      if($request->has('keyword')) {
            // SQLのlike句でitemsテーブルを検索する
          $posts = \App\Post::where("title", 'LIKE', '%'.$request->get('keyword').'%')->get();
        }
        else{
          $posts = \App\Post::latest()->get();
        }
        return view('posts.index')->with('posts', $posts);
    }


    public function show(\App\Post $post) {
      return view('posts.show')->with('post', $post);
    }


    public function create() {
      return view('posts.create');
    }


    public function store(PostRequest $request){
      $post = new \App\Post();
      $post->user_id = Auth::id();
      $post->title = $request->title;
      $post->price = $request->price;
      $post->body = $request->body;

      $image = $request->file('image_url');
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('php-caravel-ecsite', $image, 'public');
      // アップロードした画像のフルパスを取得
      $post->image_url = Storage::disk('s3')->url($path);

      // $filename = $request->file('image_url')->store('storage/image/');
      // $post->image_url = basename($filename);

      $post->save();
      return redirect('/posts/index');
    }


    public function edit(\App\Post $post) {
      return view('posts.edit')->with('post', $post);
    }


    public function update(PostRequest $request, \App\Post $post){
      $post->user_id = Auth::id();
      $post->title = $request->title;
      $post->price = $request->price;
      $post->body = $request->body;
      $image = $request->file('image_url');
      $path = Storage::disk('s3')->putFile('php-caravel-ecsite', $image, 'public');
      $post->image_url = Storage::disk('s3')->url($path);
      $post->save();
      return redirect('/posts/index');
    }


    public function destroy(\App\Post $post){
      $post->delete();
      return redirect('posts/index');
    }


    public function userauth(\App\Post $post){
      return Auth::id() == $post->user_id;
    }


}
