@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> {{ $post->title }}</h1>
          
       {{-- @dump($post->category); --}}
       
        @if ($post->category)
            <h2>CATEGORY : {{ $post->category->name }}</h2>
        @endif
        
        <div class="mb-5">
           
            <a  class="btn btn-warning" href=" {{ route('admin.posts.edit' , $post->id )}}">EDIT POST</a>
        </div>
        <div> {{ $post->content }}<div>
    </div>
@endsection