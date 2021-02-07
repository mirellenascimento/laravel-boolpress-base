
@extends('layouts.main')

@include('common.header')

@section('content')

<section>
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col">
          @foreach($posts as $post)
          <div class="card">
            <div class="card-header"><h4>Post ID: {{$post->id}}</h4></div>
            <div class="card-body text-dark">
              <h5 class="card-title">Title: {{$post->title}}</h5>
              <p class="card-text"><strong>Description:</strong> {{$post->postInformation->description}}</p>
              <p class="card-text"><strong>Category:</strong> {{$post->category->title}}</p>
              <p class="card-text">Tags: <strong>
              @foreach($post->tags as $tag)
              <a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a>
              @endforeach
              </strong>
              </p>
            </div>
            <div class="card-body">
              <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">See details</a>
              <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit Post</a>
              <form action="{{route('posts.destroy', $post->id)}}" method="POST">
               @method('DELETE')
               @csrf
               <button type="submit" class="btn btn-danger">Delete</button>
              </form>

            </div>
          </div>
          @endforeach

        </div>
      </div>
      <div class="row">
        <div class="col">
        {{$posts->links()}}
        </div>
      </div>
    </div>
</section>


@endsection
