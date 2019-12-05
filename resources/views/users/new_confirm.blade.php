@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/users.min.css') }}">
@endsection
@section('title', '登録|管理者画面｜TORIBIRD')
@section('main')
<div class="main">
  <h2 class="">登録|管理者画面</h2>

  <div class="row">
    <form action="{{ url('users/new/finish') }}" method="POST" class="col l8 m10 s12 offset-l2 offset-m1 inner">
      @csrf
      <input type="hidden" name="name" value="{{ $user->name }}">
      <input type="hidden" name="email" value="{{ $user->email }}">
      <input type="hidden" name="password" value="{{ $user->password }}">
      <input type="hidden" name="role" value="{{ $user->role }}">

      <div class="">
        <p>お名前：</p>
        <div class="">{{ $user->name }}</div>
      </div>
      <div class="">
        <p>Email：</p>
        <div class="">{{ $user->email }}</div>
      </div>
      <div class="">
        <p>パスワード：</p>
        <div class="">{{ $user->password }}</div>
      </div>
      <div class="">
        <p>権限：</p>
        <div class="">{{ $user->role }}</div>
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
