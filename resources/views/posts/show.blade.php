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
        <a class="btn" href="{{ route('posts.edit', ['post' => $post]) }}">
          編集する
        </a>

        <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
          @csrf
          @method('DELETE')
          <button class="btn">削除する</button>
        </form>
      </div>

      <div class="collection z-depth-4">
        <div class="collection-item">
          <label for="title">タイトル </label>
          <p id="title">{{ $post->title }}</p>
          <label for="body">本文</label>
          <p id="body">{!! nl2br(e($post->body)) !!}</p>
        </div>

        <div class="collection-item">
          <form class="" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input name="post_id" type="hidden" value="{{ $post->id }}">

            <label for="body">コメント</label>
            <textarea id="body" name="body" class="" rows="4">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
            {{ $errors->first('body') }}
            @endif

            @auth
            <button type="submit" class="btn btn-primary">コメントする</button>
            @else
            <button type="submit" class="btn btn-primary" disabled>コメントする</button>
            @endauth
          </form>
        </div>

        <div class="collection-item">
          <p class="h5 mb-4">コメント</p>
          @forelse($post->comments as $comment)

          <time class="">{{ $comment->created_at->format('Y.m.d H:i') }}</time>
          <p class="mt-2">{!! nl2br(e($comment->body)) !!}</p>

          <form method="POST" action="{{ action('PostsController@destroyComment', $post) }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <button class="btn btn-danger" id="{{ $comment->id }}">コメント削除する</button>
          </form>

          @empty
          <p>コメントはまだありません。</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
