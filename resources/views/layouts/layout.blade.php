<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tbook') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="header row align-self-center">
            <div class="col" style="background-color:black"></div>
            {{-- ---------------------------- Menu ----------------------------- --}}
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary col-8 mx-auto">
                <a class="navbar-brand" href="#">Tbook</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Trang Chủ<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Danh Mục
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $category)
                                    <a class="dropdown-item"
                                        href="{{ route('category_slug', ['slug' => $category->slug_category, 'id' => $category->id]) }}">{{ $category->category_name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <div class="col" style="background-color:black"></div>
        </div>
        <div class="main row align-self-center">
            <div class="col" style="background-color:black"></div>
            <div class="col-8 mx-auto">
                <br>
                {{-- ---------------------------- Slide ----------------------------- --}}
                @yield('slide')
                {{-- ---------------------------- News ----------------------------- --}}
                <div class="container">
                    @yield('content')
                </div>
            </div>
            <div class="col" style="background-color:black"></div>
        </div>
        <footer class="text-muted py-5 row align-self-center">
            <div class="container col-8 mx-auto">
                <p class="mb-1">Album example is © Bootstrap, but please download and customize it for
                    yourself!</p>
                <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                        href="/docs/5.1/getting-started/introduction/">getting started guide</a>.</p>
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
            </div>
        </footer>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <script type="text/javascript">
        $('.select-chapter').on('change', function() {
            var url = $(this).val();
            if (url) {
                window.location = url
            } else {
                return false;
            }
        })
    </script>
</body>

</html>
