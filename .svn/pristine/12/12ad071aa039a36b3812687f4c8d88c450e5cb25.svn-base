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

      <div class="collection z-depth-4">
        <div class="collection-item">
          <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
            @csrf
            @method('PUT')

            <div class="">
              <label for="title">タイトル</label>
              <input id="title" name="title" class="" value="{{ old('title') ?: $post->title }}" type="text">
              @if($errors->has('title'))
              {{ $errors->first('title') }}
              @endif
            </div>

            <div class="">
              <label for="body">本文</label>
              <textarea id="body" name="body" class="" rows="4">{{ old('body') ?: $post->body }}</textarea>
              @if ($errors->has('body'))
              {{ $errors->first('body') }}
              @endif
            </div>
        </div>

        <div class="collection-item">
          <a class="btn" href="{{ route('posts.show', ['post' => $post]) }}">
            キャンセル
          </a>

          <button type="submit" class="btn">
            更新する
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
