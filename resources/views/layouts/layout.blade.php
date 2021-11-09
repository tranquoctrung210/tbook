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
                        <li class="nav-item">
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
                        {{-- <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li> --}}
                    </ul>
                    <div class="search-container">
                        <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('search_book_get') }}">
                            <input class="form-control mr-sm-2" style="width:400px" type="search" id="search"
                                name="keyword" placeholder="Search" aria-label="Search" required autocomplete="off">
                            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <style>
                            .list-book-result {
                                width: 400px;
                                position: absolute;
                                z-index: 5;
                                background-color: #97c0e2;
                                max-height: 500px;
                                display: none;
                            }

                            .item-book-result {
                                padding: 10px 5px 10px 5px;
                            }

                            .item-book-result:not(:last-of-type) {
                                border-bottom: 1px solid
                            }

                            a.book-link:hover,
                            a.book-link li.item-book-result:hover {
                                background-color: gray;
                                text-decoration: none;
                            }

                            /* a.book-link .item-book-result  {
                                color: inherit;
                                display: contents;
                            } */

                        </style>
                        <ul class="list-unstyled overflow-auto list-book-result">
                            <li class="media item-book-result">
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
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
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0"
        nonce="FkjL0rCX"></script>
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
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            var value = $(this).val();
            if (value != "") {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('search_book_ajax') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'keyword_ajax': value,
                    },
                    success: function(data) {
                        $('.list-book-result').html(data);
                        $(".list-book-result").fadeIn('fast');
                    }
                });
            } else {
                $(".list-book-result").fadeOut();
            }

        })
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
        $('#search').focusout(function() {
            setTimeout(() => {
                $(".list-book-result").hide();
            }, 100);
        });
    </script>

    {{-- theo dõi truyện --}}
    <script type="text/javascript">
        load_followed_book()

        function load_followed_book() {
            if (localStorage.getItem('book_followed') != null) {
                let listBook = JSON.parse(localStorage.getItem('book_followed'))

                if (listBook.length === 0) {
                    $('#follow-list').html(``);
                }

                const book_id = $('.book_followed_id').val();
                if (listBook.some((book) => book.id === book_id)) {
                    $('.btn-follow-book').removeClass('btn-success').addClass('btn-danger')
                    $('.btn-follow-book').html('<i class="fas fa-heart-broken"></i> Huỷ theo dõi');
                }


                let follow_list = "";


                listBook.forEach((book) => {
                    follow_list += `
                    <li class="media item-book-result">
                        <a href="${book.url}">
                            <img class="mr-3" width="100px" height="100%"
                                src="${book.img}" alt="Generic placeholder image">
                        </a>
                        <div class="media-body">
                            <a href="${book.url}">
                                <h5 class="mt-0 mb-1"><strong>${book.name}</strong></h5>
                            </a>
                        </div>
                    </li>`
                })

                $("#follow-list").html(follow_list)
            }

        }

        $('.btn-follow-book').on('click', function() {
            $('.btn-follow-book').toggleClass('btn-success btn-danger')
            $(this).html($(this).html() == '<i class="fas fa-heart"></i> Theo dõi' ?
                '<i class="fas fa-heart-broken"></i> Huỷ theo dõi' : '<i class="fas fa-heart"></i> Theo dõi');
            const book_id = $('.book_followed_id').val();
            const book_url = $('.book_followed_url').val();
            const book_name = $('.book_followed_name').val();
            const book_img = $('.book_image_url').attr('src');
            const item = {
                id: book_id,
                url: book_url,
                name: book_name,
                img: book_img,
            }
            if (localStorage.getItem('book_followed') == null) {
                localStorage.setItem('book_followed', "[]")
            }

            let old_data = JSON.parse(localStorage.getItem('book_followed'))
            let isExist = false
            old_data.forEach((data) => {
                if (data.id == item.id) {
                    isExist = true;
                }
            })

            // Kiểm tra xem đã follow chưa, nếu rồi thì xoá, chưa thì thêm
            if (isExist) {
                old_data.splice(old_data.indexOf(item), 1);
                alert("Đã huỷ lưu")
            } else {
                old_data.push(item)
                alert("Đã lưu")
            }

            localStorage.setItem('book_followed', JSON.stringify(old_data))

            load_followed_book()

        })
    </script>
</body>

</html>
