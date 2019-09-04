@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ session('flash_message') }}
    </div>
@endif
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($cartposts as $cartpost)
                        <div class="card-header">
                            <a href="/posts/{{ $cartpost->id }}">{{ $cartpost->title }}</a>
                        </div>
                        <div class="card-body">
                            <div>
                                {{ $cartpost->price }}円
                            </div>
                            <br>
                            <div>
                            <form method="POST" action="/cartpost/{{ $cartpost->id }}">
                              <button type="submit" class="btn btn-danger">カートから削除する</button>
                              {{ csrf_field() }}
                              {{ method_field('delete') }}
                            </form>
                            </div>
                            <br>
                            <div>
                            <form method="POST" action="/buy">
                                {{ csrf_field() }}
                              <input name="title" type="hidden" value="{{ $cartpost->title }}">
                              <input name="price" type="hidden" value="{{ $cartpost->price }}">
                              <input name="body" type="hidden" value="{{ $cartpost->body }}">
                              <input name="image_url" type="hidden" value="{{ $cartpost->image_url }}">
                              <button type="submit" class="btn btn-primary" name="post">注文を確定する</button>
                            </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
