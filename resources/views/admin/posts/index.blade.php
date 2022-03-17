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
        <div class="my-actions-cont">
          <div>
            @php
              $mydate = $post->created_at->format('d-m-Y, H:i');
            @endphp


            {{$post->postTitle}} 

            @if($post->category !== null)
            - {{$post->category->catName}}
            @endif

            <div class="my-personal-info">
              {{$post->user->name}} - 

              @if($post->created_at->diffInHours() > 12)
                {{$post->created_at->diffForHumans()}}
                @else
                {{$mydate}}
              @endif
              
            </div>
          </div>

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