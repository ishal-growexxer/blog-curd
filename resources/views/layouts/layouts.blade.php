<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title') - Laravel Blog</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a href="{{ route('posts.index') }}" class="navbar-brand">
        <img src="{{ asset('img/download.png') }}" width="112" height="28" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navMenu"
        aria-controls="navMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="navMenu" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{ route('posts.index') }}" class="nav-link">All Posts</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ route('posts.create') }}" class="btn btn-info">
              <strong>New Post</strong>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-8">
          @if (session('notification'))
          <div class="alert alert-primary" role="alert">
            {{ session('notification') }}
          </div>
          @endif
          @yield('content')
        </div>
      </div>
    </section>

    <footer class="footer bg-light py-3 mt-5">
      <div class="text-center">
        <p>
          <strong>Laravel Blog</strong> |
          <a href="https://stevencotterill.com">Steven Cotterill</a>
        </p>
      </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
  </body>
</html>
