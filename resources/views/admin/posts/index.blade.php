@extends('layouts.layout')

{{-- @dump($array) --}}

@section('pageTitle', 'HomePage')


@section('content')
<div class="my-posts-container">
 <div class="my-posts-section">
    <div class="my-top-nav">
      <h2>Gestisci i post</h2>
      <a class="" href="{{ route('admin.posts.create') }}">Aggiungi un post</a>
    </div>


      @foreach ($dataPosts as $post)
        <div class="my-div">{{$post->postTitle}}
          <a href="{{ route('admin.posts.show', $post->slug) }}">Mostra</a>
        </div>
        <hr class="my-line">
      @endforeach

 </div>
</div>
@endsection