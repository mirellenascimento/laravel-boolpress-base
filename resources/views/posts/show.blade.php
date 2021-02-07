
@extends('layouts.main')

@section('content')

<section>
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col">
          <div class="card text-center">
            <div class="card-header">Post: {{$post->id}}</div>
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->postInformation->description}}</p>
              <p class="card-text">Category: {{$post->category->title}}</p>
            </div>
            <div class="card-body">
              <a href="{{route('posts.index')}}" class="btn btn-primary">Back to list</a>
              <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit Post</a>
              <form action="{{route('posts.destroy', $post->id)}}" method="POST">
               @method('DELETE')
               @csrf
               <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
            <div class="card-footer text-muted">
              <p class="card-text">Tags: <strong>
              @foreach($post->tags as $tag)
              <a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a>
              @endforeach
              </strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


@endsection
