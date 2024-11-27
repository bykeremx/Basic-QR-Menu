@extends('admin.base.base')
@section('title-tag')
    Menu Oluştur
@endsection

@section('head-tag')
@endsection
@section('container-admin')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                {{-- flash message session --}}
               @include("admin.base.flashMessage")
                <h3>
                    <i class="fa fa-plus mr-1" aria-hidden="true"></i>
                    Menu Oluştur
                </h3>
                <hr>
                <div class="row">
                    <form action="{{route('MenuCreatePagePost')}}" method="post" enctype='multipart/form-data'>
                        {{-- csrf token --}}
                        @csrf
                        @if (!$Categories->isEmpty())
                            <div class="mb-3">
                                <label for="" class="form-label">Adı</label>
                                <input type="text" name="menu_name" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId" />
                                <small id="helpId" class="text-muted">Menun Adı <b>Zorunlu</b></small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Açıklaması</label>
                                <input type="text" name="menu_description" id="" class="form-control"
                                    placeholder="" aria-describedby="helpId" />
                                <small id="helpId" class="text-muted">Yeğenin/İçeceğin Açıklamsı : "İçinde
                                    Bolca
                                    Yağ
                                    Mevcut..."
                                </small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">
                                    <i class="fas fa-images fa-sm  " style="margin-left:5px !important;"></i>
                                    Fotoğrafı : </label>
                                <input type="file" name="menu_image" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId" />
                                <small id="helpId" class="text-muted">Lütfen Yüklemek İstediğiniz Fotoğrafı
                                    Seçin
                                </small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Fiyatı : </label>
                                <input type="number" name="menu_price" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId" />
                                <small id="helpId" class="text-muted">Fiyatı
                                </small>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="1" name="menu_status"
                                    id="" checked />
                                <label class="form-check-label" for="">Aktif/Pasif</label>
                            </div>
                            <hr>
                            <span class="badge bg-danger shadow mb-3">
                                <label for=""><b> * Zorunlu Alan * </b></label>
                            </span>
                            <div class=" mb-3">
                                <select class="form-select form-select-lg" name="category_id" id="">
                                    @foreach ($Categories as $kategori)
                                        <option value="{{ $kategori->id }}">{{ ucwords($kategori->category_name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary category_name">Oluştur</button>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <span class="badge bg-danger shadow">
                                    <strong>Hiçbir Kategori Mevcut Değil</strong>
                                </span>
                                <hr>
                                Lütfen ilk Önce Bir Kategori Oluşturun
                                <b><a href="{{ route('CreateCategoryPage') }}">Kategori Oluşturma Sayfası</a></b>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
