<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $Settings = App\Models\Settings::where('settings_key', 'logo')->first();
        $Settings_description = App\Models\Settings::where('settings_key', 'title')->first()->settings_value;
        $logoSetting = $Settings->settings_value;
        $name = App\Models\Settings::where('settings_key', 'name')->first()->settings_value;
        $FavIcon = App\Models\Settings::where('settings_key', 'icon')->first()->settings_value;
    @endphp
    <title>{{$name}}-Giriş</title>
    {{-- <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" /> --}}

    <link rel="shortcut icon" type="image/png" href="{{ asset($FavIcon) }}" />
    <link rel="stylesheet" href="{{ asset('AdminTemplate/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                @include("admin.base.flashMessage")
                                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset($logoSetting) }}" width="150" alt="">
                                </a>
                                <p class="text-center">{{ ucwords($Settings_description) }}</p>
                                <form method="post" action="{{route('AdminLoginPagePOST')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="username">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Şifre</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                        name="password"
                                        >
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                        Giriş Yap
                                    </button>
                                    {{-- <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                                        <a class="text-primary fw-bold ms-2"
                                            href="./authentication-register.html">Create an account</a>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('AdminTemplate/libs/jquery/dist/jquery.min.js') }}"></script>
    {{-- ../assets/libs/jquery/dist/jquery.min.js --}}
    <script src="{{ asset('AdminTemplate/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
