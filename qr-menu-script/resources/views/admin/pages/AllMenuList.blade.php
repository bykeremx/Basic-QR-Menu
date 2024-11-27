@extends('admin.base.base')
@section('title-tag')
    Bütün Menuler
@endsection

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('AdminTemplate/assets/styles.css') }}">
@endsection
@section('container-admin')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @include('admin.base.flashMessage')
                <h3>
                    <i class="fa fa-list-alt mr-1" aria-hidden="true"></i>
                    Bütün Menu Listesi
                </h3>
                <hr>


                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="ImageShow" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="" alt="" srcset="" id="images_show_menu" width="100%">
                            </div>
                        </div>
                    </div>
                </div>



                {{-- UPDATE MENU İTEM MODAL --}}
                <div id="actiforpasif">
                    <div class="modal fade" id="modalUpdate" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        <span class="badge bg-primary text-dark" id="category_title"></span>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h3>
                                        <img src="{{ asset('assets/images/menu.png') }}" width="50" />
                                        Bu Menuyu Güncelle :
                                    </h3>
                                    <form method="post" enctype='multipart/form-data'
                                        action="{{ route('AllMenuPageModalUpdate') }}">
                                        @csrf
                                        <input type="text" id="menu_id" hidden name="menu_id" value="" />
                                        <div class="mb-3">
                                            <label for="" class="form-label">Adı</label>
                                            <input type="text" name="menu_name" id="menu_name" class="form-control"
                                                placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Menun Adı <b>Zorunlu</b></small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Açıklaması</label>
                                            <input type="text" name="menu_description" id="menu_description"
                                                class="form-control" placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Yeğenin/İçeceğin Açıklamsı : "İçinde
                                                Bolca
                                                Yağ
                                                Mevcut..."
                                            </small>
                                        </div>
                                        <div class="mb-3">
                                            <img src="" width="70" id="menu_image_">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Fotoğrafı : </label>
                                            <input type="file" name="menu_image" id="" class="form-control"
                                                placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Lütfen Yüklemek İstediğiniz Fotoğrafı
                                                Seçin
                                            </small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Fiyatı : </label>
                                            <input type="number" name="menu_price" id="menu_price" class="form-control"
                                                placeholder="" aria-describedby="helpId" />
                                            <small id="helpId" class="text-muted">Fiyatı
                                            </small>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="menu_status" id="1" checked />
                                            <label class="form-check-label" for="">Aktif/Pasif</label>
                                        </div>

                                        <button type="submit" class="btn btn-primary category_name">Güncelle</button>
                                    </form>


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
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <a type="button" class="btn btn-primary btn-md" href="{{ route('MenuCreatePage') }}">
                            <i class="fas fa-plus mr-1 "></i>
                            Menu Oluştur
                        </a>
                    </div>
                </div>
                @php
                    $count = 1;
                @endphp
                @if (!$MenuItemList->isEmpty())
                    <table id="myTable" class="display" data-bs-theme="dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Adı</th>
                                <th>Kategorisi</th>
                                <th>Açıklaması</th>
                                <th>Fotoğrafı</th>
                                <th>Aktif/Pasif</th>
                                <th>Fiyatı</th>
                                <th>Sil</th>
                                <th>Güncelle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($MenuItemList as $item)
                                <tr>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ $count++ }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger category_name">
                                            {{ $item->menu_name }}
                                        </span>

                                    </td>
                                    <td>
                                        <span>
                                            <a href="{{ route('GetThisItem', ['id' => $item->GetCategory->id]) }}"
                                                class="badge shadow-sm" style="background-color:#34495E;"
                                                title="Kategoriye Git ! ">

                                                #{{ $item->GetCategory->category_name }}

                                            </a>
                                        </span>
                                    </td>

                                    <td>
                                        <span>
                                            {{ $item->menu_description }}
                                        </span>

                                    </td>
                                    <td>

                                        <a href="" onclick="ImagesShow('{{ $item->menu_image }}')"
                                            data-bs-toggle="modal" data-bs-target="#ImageShow">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>


                                    </td>
                                    <td>
                                        <span class="badge bg-warning category_name">
                                            @if ($item->menu_status == '1')
                                                Aktif
                                            @else
                                                Pasif
                                            @endif
                                        </span>

                                    </td>
                                    <td>
                                        <span class="badge bg-dark category_name">
                                            {{ $item->menu_price }}
                                        </span>

                                    </td>
                                    <td>
                                        <a style="text-decoration:none; color:black"
                                            href="{{ route('AllMenuPageDelete', ['id' => $item->id]) }}">
                                            <span class="badge bg-danger category_name">
                                                <i class="fa fa-remove" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" type="button" class="btn btn-dark btn-sm update_button"
                                            data-bs-toggle="modal" data-bs-target="#modalUpdate"
                                            onclick="GetIdNumber({{ $item->id }})">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </td>

                                </tr>
                                <br>
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
                                Menu Bulunmamaktadır
                            </strong>
                        </span>

                        <hr>
                        <a href="{{ route('MenuCreatePage') }}" class="text-danger" style="font-size:border;">Menu
                            Oluşturmak İçin Lütfen Tıklayın</a>
                    </div>
                @endif
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
        function ImagesShow(url) {
            if (url != null) {
                var new_url = "{{ asset('') }}" + url;
                console.log(url);
                $("#images_show_menu").attr("src", new_url);
            }
        }

        function GetIdNumber(GetId) {

            if (GetId != null) {
                //console.log(GetId);

                $.ajax({
                    type: "post",
                    url: "{{ route('ajax-update-category-item') }}",
                    data: {
                        "id": GetId,
                        "_token": "{{ csrf_token() }}",
                    },
                    //dataType: "dataType",
                    success: function(response) {
                        if (response != null) {
                            $("#aktiforpasif").show();
                            $("#category_title").text(response[0].menu_name);
                            // console.log(response[0].menu_name);
                            $("#menu_name").val(response[0].menu_name);
                            $("#menu_description").val(response[0].menu_description);
                            $("#menu_price").val(response[0].menu_price);
                            $("#menu_id").val(response[0].id);
                            //console.log(response[0].id);
                            if (response[0].menu_image != null) {
                                var ImageUrl = "{{ asset('') }}" + response[0].menu_image;
                                console.log(ImageUrl);
                                $("#menu_image_").attr("src", ImageUrl);
                            }
                            console.log(response);

                        } else {
                            /* $("#category_title").text("Bulunamadı ! ");*/
                        }
                        //console.log(response);
                    }
                });
            }
        }
    </script>
@endsection
