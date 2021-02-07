<header>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a href="{{route('posts.index')}}" class="navbar-brand">BOOLPRESS</a>

      <div class="navbar-nav d-flex flex-row">
        <a class="nav-link" aria-current="page" href="{{route('posts.index')}}">Posts     |</a>
        <a class="nav-link" aria-current="page" href="{{route('tags.index')}}">|     Tags     |</a>
        <a class="nav-link" href="{{route('posts.create')}}">|     Create New Post</a>
      </div>
    </div>
  </nav>
</header>
