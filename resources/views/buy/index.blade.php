@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ session('flash_message') }}
    </div>
@endif
<div class="card-header">購入履歴</div>
<br>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($buys as $buy)
                        <div class="card-header">
                            <a>{{ $buy->title }}</a>
                        </div>
                        <div class="card-body">
                            <div>
                                {{ $buy->price }}円
                            </div>
                            <div>
                              <img src="{{ $buy->image_url }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
