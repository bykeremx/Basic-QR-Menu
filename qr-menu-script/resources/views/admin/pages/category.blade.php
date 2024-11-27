@extends('admin.base.base')
@section('title-tag')
    Kategoriler
@endsection

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('AdminTemplate/assets/styles.css') }}">
@endsection
@section('container-admin')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                @include('admin.base.flashMessage')
                <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <span class="badge bg-danger category_name" id="category_title"></span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div id="aktiforpasif">
                                    <form method="post" action="{{ route('updateCategory') }}"
                                        enctype='multipart/form-data'>
                                        @csrf
                                        <input type="hidden" name="category_id" value="1" id="category_id">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Adı</label>
                                            <input type="text" name="category_name" id="category_name"
                                                class="form-control" placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Kategori Adı örnek : "Ana Yemekler"
                                            </small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Açıklaması</label>
                                            <input type="text" name="category_description" id="category_description"
                                                class="form-control" placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Kategori Açıklaması <b>örnek : "Burada
                                                    Sıcacak
                                                    İçeceklerimiz Mevcuttur ... "</b></small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mevcut Rengi : </label>
                                            <input type="color" name="category_color" id="category_color"
                                                class="form-control" placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Renk Seçiniz / Değişmek için başka bir
                                                renk seçin lütfen ...</small>
                                        </div>
                                        <div class="mb-2">

                                            <p>Mevcut Fotoğraf : </p>
                                            <div>
                                                <img src="" width="100" id="category_image_">
                                            </div>
                                            <hr>
                                            <label for="" class="form-label">Fotoğrafı Güncelle</label>
                                            <input type="file" name="category_image" id="category_image"
                                                class="form-control" placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Kategori Fotoğrafı </small>
                                        </div>
                                        <hr>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id=""
                                                checked />
                                            <label class="form-check-label" for=""> Aktif/Pasif </label>
                                            <br>
                                            <small>
                                                Oluşturduğunuz kategorinin pasif olmasını istiyor iseniz <b>tıklamyı
                                                    kaldırın
                                                    lütfen</b>
                                            </small>
                                        </div>
                                        <hr>
                                        <input name="" type="submit" id="" class="btn btn-success"
                                            type="button" value="Oluştur" />
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="imagesModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog modal-sm " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="get_images">
                                <img src="" width="100%" id="show_image">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Kapat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="lead"><b>Kategori Listesi</b></p>
                <div class="row">
                    <div class="col-md-2">
                        <a name="" id="" class="btn btn-success"
                            href="{{ route('CreateCategoryPage') }}" role="button">
                            <i class="fa fa-plus mr-1" aria-hidden="true"></i>
                            Kategori Ekle
                        </a>
                    </div>
                </div>
                <hr>
                <p><b>Kategori : </b></p>
                @php
                    $count = 1;
                @endphp
                <div class="row">
                    @if (!$Category->isEmpty())
                        <table id="myTable" class="display" data-bs-theme="dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Adı</th>
                                    <th>Açıklaması</th>
                                    <th>Rengi</th>
                                    <th>Fotoğrafı</th>
                                    <th>Aktif/Pasif</th>
                                    <th>Sil</th>
                                    <th>Güncelle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Category as $kategoriler)
                                    <tr>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $count++ }}
                                            </span>

                                        </td>
                                        <td>
                                            <span class="badge bg-danger category_name">
                                                {{ $kategoriler->category_name }}
                                            </span><sup>
                                                <small> <a href="{{ route('GetThisItem', ['id' => $kategoriler->id]) }}"
                                                        class="badge bg-warning"
                                                        style="text-decoration:none;font-size:10px; color:black;">e git
                                                    </a></small>
                                            </sup>

                                        </td>
                                        <td>{{ $kategoriler->category_description }}</td>
                                        <td>
                                            <span class="badge"
                                                style="background-color:{{ $kategoriler->category_color }};">

                                            </span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#imagesModal"
                                                style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
                                            "
                                                onclick="GetImages('{{ $kategoriler->category_image }}')">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>

                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckChecked" role="switch"
                                                    @if (!$kategoriler->category_status == '0') checked @endif />
                                            </div>
                                        </td>
                                        <td>
                                            <a style="color:rgb(204, 92, 92); text-decoration:none;"
                                                href="{{ route('DeleteCategory', ['id' => $kategoriler->id]) }}">
                                                <i class="fa fa-remove" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <span>

                                                <button type="button" class="btn btn-primary btn-sm update_button"
                                                    data-bs-toggle="modal" data-bs-target="#modalId" id="getimages"
                                                    onclick="GetIdNumber({{ $kategoriler->id }})">
                                                    <div class="text-light">

                                                        <i class="fa fa-pencil" aria-hidden="true"></i>

                                                    </div>
                                                </button>

                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <br><br>
                        <div class="alert alert-danger"
                            style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px !important;"
                            role="alert">
                            <span class="badge bg-danger">
                                <img src="{{ asset('assets/images/menu.png') }}" alt="" srcset=""
                                    width="30px">
                                <strong>
                                    Kategori Bulunmamaktadır
                                </strong>
                            </span>
                            <hr>
                            <a href="{{ route('CreateCategoryPage') }}" class="text-danger"
                                style="font-size:border;">Kategori
                                Oluşturmak İçin Lütfen Tıklayın</a>
                        </div>
                    @endif
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
            $("#aktiforpasif").hide();
        });
    </script>
    <script>
        function GetImages(GetImage) {
            console.log(typeof GetImage);

            if (!GetImage || GetImage.trim() === "{{ asset('') }}") {
                $("#get_images").text("Resim yok yüklemek için lütfen düzenleyin ! ");
            } else {
                var Urlimg = "{{ asset('') }}" + GetImage;
                $("#show_image").attr("src", Urlimg);
            }
        }


        function GetIdNumber(GetId) {

            if (GetId != null) {
                //console.log(GetId);

                $.ajax({
                    type: "post",
                    url: "{{ route('ajax-update-category') }}",
                    data: {
                        "id": GetId,
                        "_token": "{{ csrf_token() }}",
                    },
                    //dataType: "dataType",
                    success: function(response) {
                        if (response != null) {
                            $("#aktiforpasif").show();
                            $("#category_title").text(response[0].category_name);
                            $("#category_name").val(response[0].category_name);
                            $("#category_description").val(response[0].category_description);
                            $("#category_color").val(response[0].category_color);
                            $("#category_id").val(response[0].id);
                            if (response[0].category_image != null) {
                                var ImageUrl = "{{ asset('') }}" + response[0].category_image;
                                console.log(ImageUrl);
                                $("#category_image_").attr("src", ImageUrl);
                            }
                        } else {
                            $("#category_title").text("Bulunamadı ! ");
                        }
                        //console.log(response);
                    }
                });
            }
        }
    </script>
@endsection
