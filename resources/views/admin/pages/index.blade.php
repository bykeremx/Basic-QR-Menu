@extends('admin.base.base')
@section('title-tag')
    Anasayfa
@endsection

@section('head-tag')
@endsection
@section('container-admin')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @include('admin.base.flashMessage')
                <h3>Admin Sayfası </h3>
                <hr>
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card bg-dark shadow text-bg-dark-light">
                            <div class="card-body">
                                <h3 class="card-title text-light">
                                    <i class="fa fa-list mr-2 " aria-hidden="true"></i>
                                    Toplam Categori
                                </h3>
                                <p class="card-text">
                                    <span class="badge bg-light text-dark">
                                        {{ $category_count }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-dark shadow text-bg-dark-light">
                            <div class="card-body">
                                <h3 class="card-title text-light">
                                    <i class="fa fa-list-alt mr-1" aria-hidden="true"></i>
                                    Toplam Menu
                                </h3>
                                <p class="card-text">
                                    <span class="badge bg-light text-dark">
                                        {{ $menu_count }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card bg-dark shadow text-bg-dark-light">
                            <div class="card-body">
                                <h3 class="card-title text-light">
                                    <i class="fa fa-list-alt mr-1" aria-hidden="true"></i>
                                    Toplam Slider
                                </h3>
                                <p class="card-text">
                                    <span class="badge bg-light text-dark">
                                        {{ $slider_count }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-dark shadow  text-bg-dark-light">
                            <div class="card-body">
                                <h3 class="card-title text-light">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    E.Ç.T.E Sayısı
                                </h3>
                                <p class="card-text">

                                    <span class="badge bg-light text-dark">
                                        {{ $theMostToPrefer_count }}
                                    </span>

                                </p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
