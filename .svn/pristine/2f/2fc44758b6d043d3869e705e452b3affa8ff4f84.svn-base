@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection
@section('title', 'インコが見られる場所|掲示板')
@section('main')
<div class="main">
  <h2>掲示板</h2>

  <div class="row">
    <div class="col l8 m10 s12 offset-l2 offset-m1">

      <div class="edit">
        @auth
        <a href="{{ route('posts.create') }}" class="waves-effect waves-light btn">
          投稿を新規作成する
        </a>
        @else
        <a href="{{ route('posts.create') }}" class="waves-effect waves-light btn" disabled>
          投稿を新規作成する
        </a>
        @endauth
      </div>

      @foreach ($posts as $post)
      <div class="collection z-depth-4">
        <div class="collection-item">
          <label for="title">タイトル </label>
          <p id="title">{{ $post->title }}</p>
        </div>
        <div class="collection-item">
          <label for="body">本文</label>
          <p class="card-text" id="body">{!! nl2br(e(str_limit($post->body, 200))) !!}</p>
          <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">続きを読む</a>
        </div>
        <div class="collection-item">
          <span class="new badge">コメント {{ $post->comments->count() }}件</span>投稿日時 {{ $post->created_at->format('Y.m.d') }}
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
