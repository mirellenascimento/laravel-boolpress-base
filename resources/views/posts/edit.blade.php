
@extends('layouts.main')

@include('common.header')

@section('content')

<section>
    <div class="container">
      <div class="row">
        <div class="col edit-post">
          <form class="form-group" action="{{route('posts.update', $post->id)}}" method="post">
            @csrf
            @method('PUT')
              <label for="post_title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{$post->title}}">

              <label for="post_author">Author:</label>
              <input type="text" class="form-control" name="author" value="{{$post->author}}">

              <div class="d-flex flex-column">
                <label for="post_description">Description:</label>
                <textarea name="description" rows="8" cols="100%">{{$post->postInformation->description}}</textarea>
              </div>

              <label for="categories">Category:</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
               <option value="{{$category->id}}" {{$post->category->id == $category->id ? "selected" : " "}}> {{$category->title}}</option>
                @endforeach
              </select>

              <div class="form-check">
                <p>Tags:</p>
                <div>
                  @foreach($tags as $tag)
                  <input type="checkbox" id="{{"checked_".$tag->name}}" name="selected_tags[]" value="{{$tag->id}}" {{in_array($tag->id, Arr::pluck($post->tags, 'id'), true) ? 'checked' : ''}}>
                  <label class="form-check-label" for="{{"checked_".$tag->name}}">{{$tag->name}}       |</label>
                  @endforeach
                </div>
              </div>
              <button type="submit" class="btn btn-secondary edit-btn" name="button">Confirm Edition</button>
          </form>

          <div class="col">
            <a href="{{route('posts.index')}}" class="btn btn-primary">Back to list</a>
          </div>
          <form action="{{route('posts.destroy', $post->id)}}" method="POST">
           @method('DELETE')
           @csrf
           <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
</section>


@endsection
