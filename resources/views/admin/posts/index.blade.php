@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-seccess">
                   <strong> {{session('deleted')}}</strong>
            </div>

        @endif

        <h1>Our Post</h1>
        {{-- Link per creazione--}}
        <a class="btn btn-primary" href="{{ route('admin.posts.create')}}">Create New Post</a>

        <table  class="table mt-5">
             <thead>
                 <tr>
                     <th>Id</th>
                     <th>Title</th>
                     <th>Category</th>
                     <th colspan="3">Action</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($posts as $post)
                     <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>@if ($post->category)
                            {{ $post->category->name }}
                        @endif</td>
                        <td> 
                            <a class="btn btn-success" href="{{ route('admin.posts.show', $post->id)  }}">SHOW</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('admin.posts.edit', $post->id)}}">EDIT</a>
                        </td>
                        <td>
                            <form class="delete-post-form" action="{{route('admin.posts.destroy', $post->id )}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="DELETE">
                            </form>
                        </td>

                     </tr>
                 @endforeach
             </tbody>
        </table>
        {{-- GET POSTS BY CATEGORY--}}
        <h2>POST BY CATEGORY</h2>
        @foreach ($categories as $category)
            <h3 class="mb-4">
               {{ $category->name }}
            </h3>
            {{-- @dump($category->posts) --}}

            @forelse ($category->posts as $post)
                <h4>
                    <a href="{{ route('admin.posts.show', $post->id )}}">{{ $post->title }}</a>
                </h4>
            @empty
                There are no posts for this category at the moment. 
                <a href="{{ route('admin.posts.create')}}">Create New Post</a>
            @endforelse
        @endforeach
    </div>
@endsection