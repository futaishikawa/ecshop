@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品登録フォーム</div>

                <div class="card-body">
                  <form method="post" action="{{ url('/posts') }}"　enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <p>
                      商品名の入力
                      <br>
                      <input type="text" name="title" placeholder="例　炭酸水" value="{{old('title')}}">
                      @if ($errors->has('title'))
                      <span class="error">{{ $errors->first('title') }}</span>
                      @endif
                    </p>

                    <p>
                      金額の入力　（注　半角数字のみ）
                      <br>
                      <input type="text" name="price" placeholder="例　1000" value="{{old('price')}}">
                      @if ($errors->has('price'))
                      <span class="error">{{ $errors->first('title') }}</span>
                      @endif
                    </p>


                    <p class="form-image_url">
                      商品画像
                      <br>
                      <input type="file" name="image_url">
                    </p>


                    <p>
                      商品の説明
                      <br>
                      <textarea name="body" placeholder="こちらの商品は富士山で取れた・・・" >{{old('body')}}</textarea>
                      @if ($errors->has('body'))
                      <span class="error">{{ $errors->first('body') }}</span>
                      @endif
                    </p>

                    <p><input type="submit" value="商品登録！" ></p>

                  </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
