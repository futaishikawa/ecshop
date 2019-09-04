<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartPostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
    \App\CartPost::updateOrCreate(
        [
            'user_id' => Auth::id(),
            'post_id' => $request->post('post_id'),
        ]
    );
    return redirect('/cartpost/index');
    }

    public function index(){
        $cartposts = \App\CartPost::select('cart_posts.*', 'posts.title', 'posts.price','posts.body','posts.image_url')
            ->where('cart_posts.user_id', Auth::id() )
            ->join('posts', 'posts.id','=','cart_posts.post_id')
            ->get();
        return view('cartpost/index', ['cartposts' => $cartposts]);
    }

    public function destroy(\App\CartPost $cartpost){
        $cartpost->delete();
        return redirect('cartpost/index')->with('flash_message', 'カートから削除しました');
    }



}
