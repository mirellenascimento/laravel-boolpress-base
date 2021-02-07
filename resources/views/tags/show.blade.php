
@extends('layouts.main')

@include('common.header')

@section('content')


<section>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>{{$tag->name}}</h1>

        <ul>
          @foreach($tag->posts as $post)
          <li>
            <a href="{{route('posts.show', $post->id)}}">
              {{$post->id}} | {{$post->title}} | {{$post->author}}
          </li>
            @endforeach
        </ul>

      </div>

    </div>

  </div>


</section>


@endsection
