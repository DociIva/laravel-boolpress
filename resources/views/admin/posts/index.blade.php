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
                     <td>Id</td>
                     <td>Title</td>
                     <td colspan="3">Action</td>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($posts as $post)
                     <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
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
    </div>
@endsection