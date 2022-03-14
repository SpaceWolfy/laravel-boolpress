@extends('layouts.layout')

{{-- @dump($array) --}}

@section('pageTitle', 'Posts')


@section('content')
<div class="my-posts-container">
  <div class="my-posts-section">
    <div class="my-top-nav">
      <h2>Contenuto del post:</h2>
      <a href="{{ route('admin.posts.index') }}" class="">Torna indietro</a>
    </div>

    <div class="my-post-structure">
      <div class="my-title-structure">
        <h4> {{$newPost->postTitle}}</h4>
      </div>
      <div class="my-description-structure">{{$newPost->postText}}</div>
    </div>
  </div>
</div>
@endsection