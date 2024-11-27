@extends('admin.base.base')
@section('title-tag')
    Slider
@endsection

@section('head-tag')
@endsection
@section('container-admin')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @include('admin.base.flashMessage')
                <h3>
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Slider Sayfası
                </h3>
                <hr>
                <div class="row">
                    <div class="modal fade" id="update" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Güncelleme
                                        <span id="title_update">

                                        </span>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('SliderPagePostUpdate') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input hidden name="slider_id" value="" id="Slider_id">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Başlığı </label>
                                            <input type="text" name="title" id="title_update_slider"
                                                class="form-control" placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Slider Başlığı Güncellemek İstiyor
                                                İseniz
                                                Lütfen Giriş Yapın</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Açıklaması : </label>
                                            <input type="text" name="description" id="description_update"
                                                class="form-control" placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Slider Açıklaması Gümcellemek İstiyor
                                                İseniz
                                                Lütfen Giriş Yapın</small>
                                        </div>
                                        <div class="row px-2">
                                            <span class="text-dark">
                                                <strong>
                                                    * ŞUANKİ RESİM *
                                                </strong>
                                            </span>
                                            <img src="" alt="" srcset="" id="onceki_resim"
                                                width="150px">
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Resim </label>
                                            <input type="file" name="image" id="" class="form-control"
                                                placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Slider Resmi Güncellemek İstiyor
                                                İseniz
                                                Lütfen Giriş Yapın
                                                <br>
                                                <span class="text-danger"> <strong>* ZORUNLU *</strong></span>
                                            </small>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100">
                                            Güncelle
                                        </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="ShowImages" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    <span class="badge bg-dark">
                                        Slider Resmi
                                    </span>

                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="" alt="" srcset="" width="100%" id="showImages">

                            </div>

                        </div>
                    </div>
                </div>

                <!-- Optional: Place to the bottom of scripts -->
                <script>
                    const myModal = new bootstrap.Modal(
                        document.getElementById("modalId"),
                        options,
                    );
                </script>



                <div class="col-md-3">
                    <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal"
                        data-bs-target="#modalId">
                        <i class="fa fa-plus mr-1" aria-hidden="true"></i>
                        Slider Ekle
                    </button>
                </div>
                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="slidder_must" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">


                                <form action="{{ route('SliderMustUpdate') }}" method="post">

                                    @csrf
                                    <input type="text" name="slider_id" id="slider_id_must" hidden>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Sırayı Güncelle</label>
                                        <input type="text" name="must" id="must_val" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                        <small id="helpId" class="text-muted">Slider Sırasını Yazın</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Sırayı Güncelle
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                    data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    <span class="badge bg-danger"><i class="fa fa-plus" aria-hidden="true"></i>
                                        Slider Ekle
                                    </span>

                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <form action="{{ route('SliderPagePost') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="" class="form-label">Başlığı </label>
                                            <input type="text" name="title" id="" class="form-control"
                                                placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Slider Başlığı Eklemek İstiyor
                                                İseniz
                                                Lütfen Giriş Yapın</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Açıklaması : </label>
                                            <input type="text" name="description" id="" class="form-control"
                                                placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Slider Açıklaması Eklemek İstiyor
                                                İseniz
                                                Lütfen Giriş Yapın</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Resim </label>
                                            <input type="file" name="image" id="" class="form-control"
                                                placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Slider Resmi Eklemek İstiyor
                                                İseniz
                                                Lütfen Giriş Yapın
                                                <br>
                                                <span class="text-danger"> <strong>* ZORUNLU *</strong></span>
                                            </small>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100">
                                            Oluştur
                                        </button>


                                </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Kapat
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 p-2">
                    @php
                        $count = 1;
                    @endphp
                    @if (!$Slider->isEmpty())
                        <table id="myTable" class="display" data-bs-theme="dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Başlık</th>
                                    <th>Açıklama</th>
                                    <th>Resim</th>
                                    <th>Sırası</th>
                                    <th>Sırayı Düzenle</th>
                                    <th>Sil</th>
                                    <th>Güncelle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Slider as $item)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>
                                            <span class="badge bg-dark">
                                                {{ $item->title }}
                                            </span>

                                        </td>
                                        <td> {{ $item->description }} </td>
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#ShowImages"
                                                onclick="ShowImages('{{ $item->image }}')">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-dark">
                                                {{ $item->must }}</span>

                                        </td>
                                        <td>
                                            <a href="" style="color:black" data-bs-toggle="modal"
                                                data-bs-target="#slidder_must"
                                                onclick="MustSliderUpdate({{ $item->id }})">
                                                <i class="fa fa-sliders" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('SliderDelete', ['id' => $item->id]) }}"
                                                class="text-danger">
                                                <i class="fa fa-remove" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" class="text-success" data-bs-toggle="modal"
                                                data-bs-target="#update" onclick="UpdateSlider({{ $item->id }})">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <span class="badge bg-danger shadow">
                                    <strong>Hiçbir Slider Mevcut Değil</strong>
                                </span>
                                <hr>
                                <b>Slider Oluşturmak İçin Üstteki <u>Slider Ekle </u> Butonuna Tıklayıp Oluşturun</b>
                            </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });
            //$("#aktiforpasif").hide();
        });

        function ShowImages(url) {
            if (url != null) {
                Show = "{{ asset('') }}" + url;
                $("#showImages").attr("src", Show);
            }
        }

        function MustSliderUpdate(id) {
            if (id != null) {
                $.ajax({
                    type: "post",
                    url: "{{ route('SliderMustUpdatePOST') }}",
                    data: {
                        id: id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        console.log(response);

                        if (response != null) {
                            $("#slider_id_must").val(response.id);
                            $("#must_val").val(response.must);

                        }
                    }
                });
            }

        }

        function UpdateSlider(id) {
            //console.log("id si : "+id);

            if (id != null) {
                $.ajax({
                    type: "post",
                    url: "{{ route('GetDetaiUpdateSlider-POST') }}",
                    data: {
                        id: id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        console.log(response);

                        if (response != null) {
                            $("#title_update_slider").val(response.title);
                            $("#description_update").val(response.description);
                            var img_url = "{{ asset('') }}" + response.image;
                            $("#onceki_resim").attr("src", img_url);
                            $("#Slider_id").val(response.id);
                        }
                    }
                });
            }
        }
    </script>
@endsection
