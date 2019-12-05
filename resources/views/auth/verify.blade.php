@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/login.min.css') }}">
@endsection
@section('title', 'インコが見られる場所|ログイン')
@section('main')
<div class="main">
  <h2>メールアドレスを確認する</h2>

  <div class="row">
    <div class="col l8 m10 s12 offset-l2 offset-m1 inner">

      <div class="card-body">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
          新しい確認リンクがメールアドレスに送信されました。
        </div>
        @endif


        メールが届かない場合、続行する前に、確認リンクのメールを確認してください。
        <a href="{{ route('verification.resend') }}">
          別のリクエストはこちらをクリックしてください</a>
      </div>
    </div>
  </div>
</div>
@endsection
