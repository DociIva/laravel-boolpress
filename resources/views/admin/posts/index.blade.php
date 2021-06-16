@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Our Post</h1>

        <table  class="table">
             <thead>
                 <tr>
                     <td>Id</td>
                     <td>Title</td>
                     <td collapse="3">Action</td>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($posts as $post)
                     <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td> <a class="btn btn-success" href="{{ route('admin.posts.show', $post->id)  }}">SHOW</a>
                        </td>
                        <td>EDIT</td>
                        <td>DELETE</td>

                     </tr>
                 @endforeach
             </tbody>
        </table>
    </div>
@endsection