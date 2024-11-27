<nav id="colorlib-main-nav" role="navigation">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
    <div class="js-fullheight colorlib-table">
        @php
            $Settings = App\Models\Settings::where('settings_key', 'logo')->first();
            $logoSetting = $Settings->settings_value;
            $WebSiteName = App\Models\Settings::where('settings_key', 'name')->first()->settings_value;
        @endphp

        <div class="img" style="background-image: url({{ asset($logoSetting) }}); box-shadow : inset 20px 20px 100px black;"></div>
        <div class="colorlib-table-cell js-fullheight">
            <div class="row no-gutters">
                <div class="col-md-12 text-center">
                    {{-- <h1 class="mb-4"><a href="index.html" class="logo">
                           <img src="{{ asset('assets/images/logo.png') }}"/>
                        </a></h1> --}}
                    <ul>
                        @foreach ($Category_Navbar as $item)
                            <li>
                                <span class="badge rounded-pill text-bg-dark mb-2 shadow">

                                    <a style="text-decoration:none;"
                                        href="{{ route('MenuItemPage', ['id' => $item->id]) }}"><span>{{ $item->category_name }}</span></a>
                                </span>

                            </li>
                        @endforeach
                        {{-- <li class="active"><a href="index.html"><span>Home</span></a></li>
                        <li><a href="about.html"><span>About</span></a></li>
                        <li><a href="blog.html"><span>Blog</span></a></li>
                        <li><a href="contact.html"><span>Contact</span></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
