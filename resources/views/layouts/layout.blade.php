<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <!--official bootstrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  

    <!-- main css -->
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <header>
        <div class="container-fluid">
            <navbar class="navbar navbar-expand-lg navbar-light bg-dark">
                <a href="" class="navbar-brand" id="navbar-heading">Articles</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-data">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-data">
                    <ul class="collapse navbar-collapse">
                        <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="/about" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="/article" class="nav-link">Add An Article</a></li>
                        @auth
                        
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                        <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                        @endauth
                    </ul>
                </div>
            </navbar>
        </div>
    </header>
    @yield("content")

    <!--JQuery-->
    <script script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!--off bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- main js -->
    <script src="/js/main.js"></script>
</body>
</html>