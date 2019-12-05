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

      <div class="session">
        @if (session('status'))
        <div class="">
          {{ session('status') }}
        </div>
        @endif
      </div>

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" 　autofocus>

          @if($errors->has('email'))<span>{{ $errors->first('email') }}</span> @endif
        </div>

        <div class="buttons">
          <button type="submit" class="btn">
            パスワードリセット用のリンクを送る
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
