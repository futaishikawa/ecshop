@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品の詳細</div>

                <div class="card-body">


                  <div class="card-header" >{{ $post->title }}</div>
                  <div class="cart-body">{{ $post->price }}円</div>
                  <div class="cart-body"><img src="{{ $post->image_url }}"></div>
                  <div class="cart-body">{{ $post->body }}</div>

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





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
