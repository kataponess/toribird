@extends('layouts.index_master')
@section('title', '問い合わせ：入力画面')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/contact.min.css') }}">
@endsection
@section('main')

<div class="main">

  <h2>お問い合わせ</h2>
  <p><span class="now-page">入力画面</span> -> 確認画面 -> 完了画面</p>

  <div class="row">
    <form action="{{ url('contact/confirm') }}" method="post" class="col m6 s12 offset-m3">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="">
        <label for="name">名前：</label>
        <input type="text" class="" id="name" name="name" value="{{ old('name') }}">
        @if($errors->has('name'))<span>{{ $errors->first('name') }}</span> @endif
      </div>

      <div class="">
        <label for="email">Email：</label>
        <input type="text" class="" id="email" name="email" value="{{ old('email') }}">
        @if($errors->has('email'))<span>{{ $errors->first('email') }}</span> @endif
      </div>

      <div class="">
        <label for="title">タイトル：</label>
        <input type="text" class="" id="title" name="title" value="{{ old('title') }}">
        @if($errors->has('title'))<span>{{ $errors->first('title') }}</span> @endif
      </div>

      <div class="row">
        <div class=" col m10 s11">
          <label for="body">内容：</label>
          <textarea class="body-textarea" id="body" name="body" value="{{ old('body') }}"></textarea>
          @if($errors->has('body'))<span>{{ $errors->first('body') }}</span> @endif
        </div>
      </div>

      <div class="">
        <input type="submit" name="button" value="送信" class="btn submit waves-effect">
      </div>
    </form>

  </div>

</div>

@endsection
