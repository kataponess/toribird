@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/login.min.css') }}">
@endsection
@section('title', 'インコが見られる場所|ログイン')
@section('main')
<div class="main">
  <h2>パスワードリセット</h2>
  <div class="row">
    <div class="col l8 m10 s12 offset-l2 offset-m1 inner">

      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="">
          <label for="email">Email</label>
          <input id="email" type="email" 　name="email" value="{{ $email ?? old('email') }}" autofocus>

          @if($errors->has('email'))<span>{{ $errors->first('email') }}</span> @endif
        </div>

        <div class="">
          <label for="password">パスワード</label>
          <input id="password" type="password" name="password">

          @if($errors->has('password'))<span>{{ $errors->first('password') }}</span> @endif
        </div>

        <div class="">
          <label for="password-confirm">パスワードの確認入力</label>
          <input id="password-confirm" type="password">
        </div>

        <div class="buttons">
          <button type="submit" class="btn">
            パスワードリセット
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
