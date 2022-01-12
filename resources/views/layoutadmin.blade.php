
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link href="{{ asset('style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="top">
            <div class="header">
                <h5>Sehat Kuy GYM</h5>
            </div>
            @auth
            <div class="navbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/homeadmin">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/searchadmin">Search User</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item bg-black mb-1 text-center" href="/insert">Insert User</a>
                                </li>
                                <li>
                                    <a class="dropdown-item bg-black mt-1 mb-1 text-center" href="/manageuser">Manage User</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="/logout" method="post">
                                     @csrf
                                    <button type="submit" class="dropdown-item text-center">Logout</button>
                                </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            @else

            <div class="navbar">
                <nav class="navbar navbar-expand-lg navbar-light bg-dodgerblue">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/search">Search Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/register">Register</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        @endauth

        </div>

        <div class="container">
            @yield('content')
        </div>


        <div class="footer">
            <h10> © Copyright Sehat Kuy GYM 2022 </h10>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>
