@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ session('flash_message') }}
    </div>
@endif
<div class="card-header">商品一覧</div>
<br>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

　　　　　　　　　<!-- 検索機能 -->
               <form method="GET" action="/posts/index">
                   <input type="text" name="keyword">
                   <input type="submit" value="商品名で検索">
               </form>


                  @forelse ($posts as $post)
                  <a href="{{ action('PostsController@show', $post) }}" class="card-header" >{{ $post->title }}</a>
                  <div class="cart-body">{{ $post->price }}円</div>
                  <img src="{{ $post->image_url }}">


                  <!-- //商品の編集　出品者のみみれる -->
                  @if(Auth::user()->id == $post->user_id)
　　　　　　　　　　　<a href="{{ action('PostsController@edit', $post) }}" class="edit">修正</a>
                  <a href="#" class="del" data-id="{{ $post->id }}">削除</a>
                  <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                  </form>
                  @endif

                  <!-- カート　ログインユーザーのみ観れる -->
                  <form method="POST" action="{{ url('/cartpost') }}" class="form-inline m-1">
                      {{ csrf_field() }}
                      <input type="hidden" name="post_id" value="{{ $post->id }}">
                      <button type="submit" class="btn btn-primary col-md-6">カートに入れる</button>
                  </form>



                  @empty
                  <li>現在販売中の商品はございません</li>
                  @endforelse

              </div>
            </div>
        </div>
    </div>
</div>

@endsection
