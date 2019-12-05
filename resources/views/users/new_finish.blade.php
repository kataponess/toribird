@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/users.min.css') }}">
@endsection
@section('title', '登録|管理者画面｜TORIBIRD')
@section('main')
<div class="main">
  <h2 class="">登録|管理者画面</h2>

  <div class="row">
    登録しました。
  </div>

  <a href="{{ url('/users/list/') }}" class="btn btn-new">ユーザー一覧に戻る</a>

</div>

@endsection
