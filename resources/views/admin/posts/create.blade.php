@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">CREATE NEW POST</h1>

        {{-- form e i campi--}}
        <div class="row">
            <div class="col-md-8 offset-md-2">

                @if ($errors->any())
                  <div class="alert alert-danger mb-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div>
                @endif
                <form action="{{ route('admin.posts.store')}}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="title" class="form-label">TITLE*</label>
                        <input type="text" class="form-control  @error('title') is-valid @enderror"
                            name="title" id="title" value="{{ old('title')}}">
                        @error('title')
                            <div class="feedback">
                               {{$message}}
                            </div>
                        @enderror
                      
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">CONTENT*</label>
                        <textarea class="form-control  @error('content') is-valid @enderror" 
                                  name="content" id="content" rows="6">{{ old('content')}}</textarea>
                        @error('content')
                        <div class="feedback">
                           {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">-> Select Category <-</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if ($category->id == old('category_id')) selected @endif >
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') 
                          <div class="feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    {{-- TAGS --}}
                    <h4>TAGS</h4>

                    <div class="MB">
                        @foreach ($tags as $tag)
                            <span class="d-inline-block mr-3">
                                <input type="checkbox" name="tags[]" id="tag{{$loop->iteration}} ">
                                <label for="tag{{$loop->iteration}}" 
                                       value="{{$tag->id }}" 
                                       @if (in_array($tag->id, old('tags', [] ))) checked   
                                       @endif
                                >
                                   {{ $tag->name }}
                                </label>

                            </span>
                        @endforeach
                        @error('tags_id') 
                          <div class="feedback">{{ $message }}</div> 
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create Post</button>

                </form>
            </div>
        </div>
    </div>
@endsection