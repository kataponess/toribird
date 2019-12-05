@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/post.min.css') }}">
@endsection
@section('title', 'インコが見られる場所|掲示板')
@section('main')
<div class="main">
  <h2>掲示板</h2>

  <div class="row">
    <div class="col l8 m10 s12 offset-l2 offset-m1">
      <h3>投稿の新規作成</h3>

      <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div class="collection z-depth-4">
          <div class="collection-item">
            <label for="title">タイトル </label>
            <input id="title" name="title" value="{{ old('title') }}" type="text">
            @if ($errors->has('title'))
            <span>
              {{ $errors->first('title') }}
            </span>
            @endif
          </div>

          <div class="collection-item">
            <label for="body">本文</label>
            <textarea id="body" name="body" rows="4">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
            <span>
              {{ $errors->first('body') }}
            </span>
            @endif
          </div>

          <div class="edit">
            <a class="btn" href="{{ route('top') }}">
              キャンセル
            </a>

            <button type="submit" class="btn btn-primary">
              投稿する
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endsection
</div>
