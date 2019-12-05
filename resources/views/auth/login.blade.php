@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/login.min.css') }}">
@endsection
@section('title', 'インコが見られる場所|ログイン')
@section('main')
<div class="main">
  <h2>ログイン</h2>

  <div class="row">
    <form action="{{ route('login') }}" method="post" class="col l8 m10 s12 offset-l2 offset-m1 inner">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" class="validate" value="{{ old('email') }}" autofocus>

        @if($errors->has('email'))<span>{{ $errors->first('email') }}</span> @endif
      </div>

      <div class="">
        <label for="password">パスワード</label>
        <input id="password" type="password" name="password" class="validate">

        @if($errors->has('password'))<span>{{ $errors->first('password') }}</span> @endif
      </div>

      <p>
        <label>
          <input type="checkbox" class="filled-in" name="remember" id="remember">
          <span>パスワードを記憶する</span>
        </label>
      </p>

      <div class="buttons">
        <button type="submit" class="btn">
          ログイン
        </button>

        <a class="btn" href="{{ route('password.request') }}">
          パスワードを忘れた方
        </a>
      </div>
    </form>
  </div>
</div>

@endsection
