<nav class="navbar bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="">{{ config('app.name', 'Laravel') }}</a>

      <form class="d-flex">
        <a class="nav-brand" href="{{ route('blog.new') }}">New Post</a>
      </form>
    </div>
</nav>