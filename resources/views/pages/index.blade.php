@extends('pages.base.base')

@section('title-tag')
    Menuler
@endsection

@section('header-tag')
    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
@endsection

@section('container')
    <div class="row mt-3">

        @if (!$Slider->isEmpty())
            <div class="splide splide-skyblue">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($Slider as $items)
                            <li class="splide__slide splide__slide__desing">
                                <img id ="slider_imgs" style=" " src="{{ asset($items->image) }}" class="w-100 d-block"
                                    alt="item-{{ $items->id }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
        @endif
    </div>
    <div class="row mt-3 slider_anasayfa">

    </div>
    <div class="row mb-2 mt-3">
        <span class="font_menu_name" style="font-size:40px; color:white">
            <img src="{{ asset('assets/images/menu.png') }}" id="img_sr" width="50" />
            Menuler
        </span>
    </div>
    <div class="row anasayfa">
        @foreach ($Category as $kategori)
            <div class="col-md-4 " title="">
                <a href="{{ route('MenuItemPage', ['id' => $kategori->id]) }}" style="text-decoration:none !important;">
                    <div class="card_food text-center"
                        style=" text-decoration:none;
                    @if ($kategori->category_image != null) background-image: url('{{ asset($kategori->category_image) }}');
                    @else
                    background-image: url('{{ asset('assets/images/food_images/durum.jpg') }}'); @endif
                     background-size: cover; background-position: center;
                        @if (strlen($kategori->category_name) > 10) font-size:45px;padding-bottom:55px; @endif
                        ">
                        <p class="bold">
                            {{ $kategori->category_name }}
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    @if (!$TheMost->isEmpty())
        {{-- modal ürün detay --}}

        <!-- Modal -->
        <div class="modal fade rounded-0" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
            aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content rounded-0 bg-dark">
                    <div class="modal-header border-0">
                        <p class="modal-title font_menu_name" id="modalTitleId">
                            <img src="{{ asset('assets/images/menu.png') }}" alt="" srcset="" width="50px">
                            Ürün Detayı :
                            <br>
                            <span id="item_title" style="font-size:30px;">
                            </span>
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <style>
                        .images_detail_menu img {
                            border-radius: 20px;
                            box-shadow: 1px 1px 20px black;
                        }
                    </style>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <div class="images_detail_menu" style="">
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="" srcset=""
                                            width="100%" id="menu_detail_images">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <p id="menu_detail_description"></p>
                                    <hr>
                                    <p>
                                        Fiyatı : <span class="badge bg-danger" id="menu_detail_price">55</span>

                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div> --}}
                </div>
            </div>
        </div>

        <script>
            var modalId = document.getElementById('modalId');

            modalId.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                let button = event.relatedTarget;
                // Extract info from data-bs-* attributes
                let recipient = button.getAttribute('data-bs-whatever');

                // Use above variables to manipulate the DOM
            });
        </script>
        <div class="row">
            <span class="font_menu_name mb-4" style="font-size:40px; color:white">
                <img src="{{ asset('assets/images/menu.png') }}" id="img_sr" width="50" />
                En Çok Tercih Edilenler
            </span>

            @foreach ($TheMost as $menu)
                <div class="col-6 col-6 " title="">

                    <div class="menu_food text-center"
                        style="
                    @if ($menu->MenuleriGetir->menu_image != null) background-image: url('{{ asset($menu->MenuleriGetir->menu_image) }}');
                    @else
                    background-image: url('{{ asset('assets/images/food_images/durum.jpg') }}'); @endif
                     background-size: cover; background-position: center;

                        ">

                        <p class="bold">
                            {{ $menu->MenuleriGetir->menu_name }}
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <div class="food_description">
                                    <div class="row">

                                        <div class="col-6">
                                            <div
                                                style="margin-top:10px; margin-left:10px; border-radius:100%; color:white; ">
                                                <a href="#" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modalId" style="color:white;text-decoration:none;"
                                                    onclick="DetayGetir({{ $menu->MenuleriGetir->id }})">
                                                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="col-6 text-danger">
                                            <div
                                                style="margin-top:10px;  margin-left:-17px; border-radius:100%; color:##E74C3C; ">
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="food_description2">
                                    <div class="row">
                                        {{ $menu->MenuleriGetir->menu_price }}
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            @endforeach

        </div>
    @else
    @endif

@endsection
@section('Scripts')
    <script>
        function DetayGetir(id) {
            //console.log("Ürün İd : " + id);
            if (id != null) {
                $.ajax({
                    type: "post",
                    url: "{{ route('ItemDetailGetItemPage-POST') }}",
                    data: {
                        urun_id: id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(gelenDeger) {
                        $("#item_title").text(gelenDeger.menu_name);
                        var url = "{{ asset('') }}" + gelenDeger.menu_image;
                        $("#menu_detail_images").attr("src", url);
                        $("#menu_detail_description").text(gelenDeger.menu_description);
                        $("#menu_detail_price").text(gelenDeger.menu_price + " ₺ ");
                        // console.log(gelenDeger);
                    }
                });
            }
            //eğer id boş değilse
            //ajax ı başlat

        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('.splide.splide-skyblue', {
                type: 'fade',
                heightRatio: 0.5,
                pagination: true,
                arrows: true,
                autoplay: true,
                interval: 3000,
                pauseOnHover: false,
                easing: 'cubic-bezier(.42,.65,.27,.99)',
                speed: 800,
            }).mount();
        });
    </script>
@endsection
{{-- {{ secure_asset('', $title, $attributes=[]) }} --}}
