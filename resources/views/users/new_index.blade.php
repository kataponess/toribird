@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/users.min.css') }}">
@endsection
@section('title', '登録|管理者画面｜TORIBIRD')
@section('main')
<div class="main">
  <h2 class="">登録|管理者画面</h2>

  <div class="row">
    <form action="{{ url('users/new/confirm') }}" method="POST" class="col l8 m10 s12 offset-l2 offset-m1 inner">
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

      <div class="">
        <label>権限</label>
        <select name="role" class="browser-default" id="selectRole" value="{{ old('role') }}">
          <option value="10" selected>一般ユーザー</option>
          <option value="5">管理者</option>
        </select>

        @if($errors->has('role'))<span>{{ $errors->first('role') }}</span> @endif
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
