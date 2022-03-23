@extends('layouts.layout')

{{-- @dump($array) --}}

@section('pageTitle', 'Modify a post')


@section('content')
<div class="my-form-cont">
  <div><h1>Modifica il post selezionato:</h1></div>
  

 <form action="{{ route('admin.posts.update', $newPost->id) }}" method="post" enctype="multipart/form-data">
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

  <div class="my-postImage">
    <label>Aggiungi una foto al post</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
      </div>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="postImage" placeholder="Inserisci l'url di una foto">
        <label class="custom-file-label" for="inputGroupFile01">{{$newPost->postImage}}</label>
      </div>
    </div>
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

  <div>
    <label>Categoria del Post:</label>
    <select name="category_id">
      <option value=""> - non selezionata - </option> 
      @foreach ($categoriesAll as $category)
         <option value="{{$category->id}}" {{($newPost->category_id === $category->id) ? 'selected' : ''}}>{{$category->catName}}</option> 
      @endforeach
    </select>
  </div>

  <div class="my-tags-section">
    <div>Seleziona dei tag: </div>
    @foreach ($tags as $tag)
      {{-- <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id='tag_{{$tag->slug}}' 
        name='tags[]' --}} {{-- Viene letto come il passaggio di un array di dati dal server --}}
        {{-- {{$newPost->tags->contains($tag) ? 'checked' : ''}}> --}}
        {{-- <label class="form-check-label" for='tag_{{$tag->slug}}'>{{$tag->type}}</label>
      </div> --}}

      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-primary" for='tag_{{$tag->slug}}'>
          <input type="checkbox" autocomplete="off" value="{{$tag->id}}" id='tag_{{$tag->slug}}' 
          name='tags[]' {{$newPost->tags->contains($tag) ? 'checked' : ''}}> {{$tag->type}}
        </label>
      </div>
    @endforeach
  </div>

  <div class="my-form-group">
    <button type="submit" class="my-btn-save">Salva il post</button>
    <a href="{{ route('admin.posts.index') }}" class="">Torna indietro</a>
  </div>
</form>
</div>
@endsection