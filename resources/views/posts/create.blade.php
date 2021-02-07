
@extends('layouts.main')

@include('common.header')

@section('content')

<section>
    <div class="container">
      <div class="row">
        <div class="col">
          <form class="form-group" action="{{route('posts.store', $post->id)}}" method="post">
            @csrf
            @method('POST')
              <label for="post_title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{old('$post->title')}}">

              <label for="post_author">Author:</label>
              <input type="text" class="form-control" name="author" value="{{old('$post->author')}}">

              <div class="d-flex flex-column">
                <label for="post_description">Description:</label>
                <textarea name="description" rows="8" cols="100%">{{old('$post->postInformation->description')}}</textarea>
              </div>

              <label for="categories">Category:</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
               <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
              </select>

              <div class="form-check">
                <p>Tags:</p>
                <div>
                  @foreach($tags as $tag)
                  <input type="checkbox" id="{{"checked_".$tag->name}}" name="tags[]" value="{{$tag->id}}">
                  <label class="form-check-label" for="{{"checked_".$tag->name}}">{{$tag->name}}       |</label>
                  @endforeach
                </div>
              </div>
              <button type="submit" class="btn btn-primary edit-btn" name="button">Create post</button>
          </form>
          <a href="{{route('posts.index')}}" class="btn btn-danger">Cancel</a>

        </div>
      </div>
    </div>
</section>


@endsection
