@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> {{ $post->title }}</h1>
    
        <div class="mb-5">
           
            <a  class="btn btn-warning" href=" {{ route('admin.posts.edit' , $post->id )}}">EDIT POST</a>
        </div>
        <h1> {{ $post->content }}</h1>
    </div>
@endsection