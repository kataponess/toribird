@extends('layouts.index_master')
@section('title', '問い合わせ：確認画面')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection
@section('main')

<div class="main">

  <h2>お問い合わせ</h2>
  <p>入力画面 -> <span class="now-page">確認画面</span> -> 完了画面</p>

  <div class="row">
    <form action="{{ url('contact/finish') }}" method="post" class="form-horizontal col m6 s12 offset-m3">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="name" value="{{$name}}">
      <input type="hidden" name="email" value="{{$email}}">
      <input type="hidden" name="title" value="{{$title}}">
      <input type="hidden" name="body" value="{{$body}}">

      <div class="row">
        <label class="confirmation" for="name">名前：</label>
        <div class="confirmation">{{$name}}</div>
      </div>

      <div class="row">
        <label class="confirmation" for="email">Email：</label>
        <div class="confirmation">{{$email}}</div>
      </div>

      <div class="row">
        <label class="confirmation" for="title">タイトル：</label>
        <div class="confirmation">{{$title}}</div>
      </div>

      <div class="row">
        <label class="confirmation" for="body">内容：</label>
        <div class="confirmation">{{$body}}</div>
      </div>

      <div class="">
        <input type="submit" name="button" value="登録" class="submit waves-effect">
      </div>
    </form>
  </div>

</div>

@endsection
