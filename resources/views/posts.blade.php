
@extends('layouts.main')

@section('content')

<section>
    <div class="container">
      <div class="row">
        <div class="col">

          @foreach($posts as $post)
          <div class="card border-dark mb-3">
            <div class="card-header">Post ID: {{$post->id}}</div>
            <div class="card-body text-dark">
              <h5 class="card-title">Title: {{$post->title}}</h5>
              <p class="card-text">Description: {{$post->info['description']}} 
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
</section>


@endsection
