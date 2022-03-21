@extends('layouts.layout')

{{-- @dump($array) --}}

@section('pageTitle', 'Posts')


@section('content')
<div class="my-posts-container">
 <div class="my-posts-section">
    <div class="my-top-nav">
      <h2>Utenti registrati</h2>
    </div>


      @foreach ($users as $user)
        <div class="my-actions-cont">
          <div>
            <div class="my-personal-info">
              {{$user->name}} - {{$user->email}}
            </div>
          </div>

        </div>
        <hr class="my-line">
      @endforeach

 </div>
</div>
@endsection