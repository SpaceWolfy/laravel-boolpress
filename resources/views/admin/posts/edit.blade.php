@extends('layouts.layout')

{{-- @dump($array) --}}

@section('pageTitle', 'Modify a post')


@section('content')
<div class="my-form-cont">
  <div><h1>Modifica il post selezionato:</h1></div>
  

 <form action="{{ route('admin.posts.update', $newPost->id) }}" method="post">
  @csrf
  @method('put')

  {{-- Titolo del post --}}
  <div class="my-title">
    <label>Titolo del post</label>
    
    <input type="text" name="postTitle" class="@error('postTitle') is-invalid @enderror" placeholder="Inserisci il titolo del post" value="{{$newPost->postTitle}}">
    
    @error('postTitle')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  {{-- Testo del post --}}
  <div class="my-text">
    <label>Contenuto del post</label>

    <textarea name="postText" cols="30" rows="15" class="@error('postText') is-invalid @enderror"
    placeholder="Inserisci qui il contenuto del tuo post..." required>{{$newPost->postText}}</textarea>

    @error('postText')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="my-form-group">
    <button type="submit" class="my-btn-save">Salva il post</button>
    <a href="{{ route('admin.posts.index') }}" class="">Torna indietro</a>
  </div>
</form>
</div>
@endsection