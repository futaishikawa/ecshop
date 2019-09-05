<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $buys = \App\Buy::latest()->get();
        return view('buy/index', ['buys' => $buys]);
    }






    public function store(Request $request) {
        if( $request->has('post') ){
          $buy = new \App\Buy();
          $buy->title = $request->title;
          $buy->price = $request->price;
          $buy->body = $request->body;
          $buy->image_url = $request->image_url;
          $buy->save();
          \App\CartPost::where('user_id', Auth::id())->delete();
          // \App\Post::where('post_id')->delete();
          return redirect('cartpost/index')->with('flash_message', '商品を購入しました！');;
        }
        $request->flash();
        return $this->index();
    }
}
