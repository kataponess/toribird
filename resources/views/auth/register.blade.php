@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('title', 'インコが見られる場所|ログイン')
@section('main')
<div class="main">
  <h2 class="">登録</h2>

  <div class="row">
    <form method="POST" action="{{ route('register') }}" class="col l8 m10 s12 offset-l2 offset-m1 inner">
      @csrf

      <div class="">
        <label for="name">名前</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus>

        @if($errors->has('name'))<span>{{ $errors->first('name') }}</span> @endif
      </div>

      <div class="">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}">

        @if($errors->has('email'))<span>{{ $errors->first('email') }}</span> @endif
      </div>

      <div class="">
        <label for="password">パスワード</label>
        <input id="password" type="password" name="password">

        @if($errors->has('password'))<span>{{ $errors->first('password') }}</span> @endif
      </div>

      <div class="">
        <label for="password-confirm">パスワードの確認入力</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
      </div>

      <div class="buttons">
        <button type="submit" class="btn">
          登録
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
