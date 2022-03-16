@extends('layouts.layout')

{{-- @dump($array) --}}

@section('pageTitle', 'Posts')


@section('content')
<div class="my-full-cont">
  <div class="my-posts-container">
    <div class="my-posts-section">
      <div class="my-top-nav">
        <h2>Contenuto del post:</h2>
        
        <a href="{{ route('admin.posts.index') }}" class="">Torna indietro</a>
      </div>

      <div class="my-post-structure">
        <div class="my-post-text">
          <div class="my-title-structure">
            <h4> {{$newPost->postTitle}}</h4>
          </div>
          <div class="my-description-structure">{{$newPost->postText}}</div>
        </div>
        <div class="my-footer-infos">
          <div class="my-author-info">
            {{$newPost->user->name}} <-> {{$newPost->created_at}}
          </div>
    
          @if($newPost->category !== null)
            <div class="my-category-info">
              {{$newPost->category->catName}} - {{$newPost->category->catDesc}}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="my-tags-section">
    <div class="my-left-side">
      <h5>Tags</h5>
      {{-- @if ($newPost->tags !== null)
        <ul class="my-tags-list">
          @foreach ($newPost->tags as $tag)
            <li class="my-li-style">{{ $tag->type }}</li>
          @endforeach
        </ul>
      @endif --}}
      <ul class="my-tags-list">
        @forelse ($newPost->tags as $tag) 
          <li class="my-li-style">{{ $tag->type }}</li>
        @empty
          <li class="my-li-style text-center">Nessun Tag selezionato</li>
        @endforelse
      </ul>
    </div>
  </div>
</div>
@endsection