<!doctype html>
<html lang="tr">

<head>
    <title>@yield('title-tag')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("assets/SlideSlider/dist/css/splide.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/SlideSlider/dist/css/themes/splide-default.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/SlideSlider/dist/css/themes/splide-skyblue.min.css")}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @php

        $FavIcon = App\Models\Settings::where('settings_key', 'icon')->first()->settings_value;
    @endphp
    {{-- <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" /> --}}

    <link rel="shortcut icon" type="image/png" href="{{ asset($FavIcon) }}" />
    <link rel="stylesheet" href="{{ asset('MyTemplate/css/style.css') }}">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    @yield('header-tag')
</head>

<body>
    <div class="page">
        {{-- Navbar Bölümü --}}
        @include('pages.base.navbar')
        <div id="colorlib-page">
            <header>
                <div class="container">
                    <div class="colorlib-navbar-brand">
                        <a class="colorlib-logo" style="text-decoration:none;" href="{{ route('anasayfa') }}">
                            @php
                                $Settings = App\Models\Settings::where('settings_key', 'logo')->first();
                                $logoSetting = $Settings->settings_value;
                                $WebSiteName = App\Models\Settings::where('settings_key', 'name')->first()->settings_value;
                            @endphp
                            <img src="{{ asset($logoSetting) }}" width="70" alt="" />
                            {{ ucwords($WebSiteName) }}
                        </a>
                    </div>
                    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i>
                        </i></a>
                </div>
            </header>
            {{--      //--//      --}}
            <section class="hero-wrap">
                <div class="container px-3">
                    <br><br><br><br>
                    @yield('container')
                </div>
            </section>
        </div>
    </div>
    <script src="{{ asset('MyTemplate/js/jquery.min.js') }}"></script>
    <script src="{{ asset('MyTemplate/js/popper.js') }}"></script>
    <script src="{{ asset('MyTemplate/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('MyTemplate/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="{{asset("assets/SlideSlider/dist/js/splide.min.js")}}"></script>
    <script src="{{asset("assets/SlideSlider/dist/js/splide.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    @yield('Scripts')
</body>

</html>
