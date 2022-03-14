@extends('layouts.layout')

{{-- @dump($array) --}}

@section('pageTitle', 'Posts')


@section('content')
<div class="my-posts-container">
 <div class="my-posts-section">
    <div class="my-top-nav">
      <h2>Gestisci i post</h2>
      <a class="" href="{{ route('admin.posts.create') }}">Aggiungi un post</a>
    </div>


      @foreach ($dataPosts as $post)
        <div class="my-div">
          {{$post->postTitle}}

          <div class="my-actions">
            <a href="{{ route('admin.posts.show', $post->slug) }}">Mostra</a>
            <a href="{{ route('admin.posts.edit', $post->slug) }}">Modifica</a>

            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
              @csrf
              @method("delete")
        
              <button class="my-del-btn">Elimina</button>
            </form>
          </div>
        </div>
        <hr class="my-line">
      @endforeach

 </div>
</div>
@endsection