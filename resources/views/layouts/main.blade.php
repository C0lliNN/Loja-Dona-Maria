<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <main>
    <header>
      <nav class="navbar navbar-dark bg-dark px-5">
        <h1 class="m-0">
          <a class="navbar-brand" href="/">Loja Dona Maria</a>
        </h1>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('clientes.index') }}">
              Clientes <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </nav>
    </header>
    @if ($errors->any())
        <div class="container mt-5">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if (session('status'))
      <div class="container mt-5">
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      </div>
    @endif
  
    <section class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-12">
          @yield('content')
        </div>
      </div>
    </section>
  </main>

  @yield('scripts')
</body>

</html>