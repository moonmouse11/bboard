<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') :: Billboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <a href="{{ route('home') }}" class="navbar-brand me-auto">Main page</a>
                @guest
                <a href="{{ route('register') }}" class="nav-item nav-link">Registration</a>
                <a href="{{ route('login') }}" class="nav-item nav-link">Entance</a>
                @endguest
                @auth
                <a href="{{ route('home') }}" class="nav-item nav-link">My bills</a>
                <form action="{{ route('logout') }}" method="POST" class="form-inline">
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Logout">
                </form>
                @endauth
            </div>
        </nav>
        <h1 class="my-3 text-center">Bills</h1>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
