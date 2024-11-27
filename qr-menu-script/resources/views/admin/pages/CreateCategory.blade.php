@extends('admin.base.base')
@section('title-tag')
    Kategori Oluştur
@endsection

@section('head-tag')
@endsection
@section('container-admin')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @include('admin.base.flashMessage')
                <div class="row">
                    <h3><i class="fa fa-plus mr-1 " aria-hidden="true"></i>Kategori Oluştur</h3>
                    <hr>
                    <h5>
                        Kategori :
                    </h5>
                    <form method="post" action="{{ route('CreateCategoryPOST') }}" enctype='multipart/form-data'>
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Adı</label>
                            <input type="text" name="category_name" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                            <small id="helpId" class="text-muted">Kategori Adı örnek : "Ana Yemekler" </small>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Açıklaması</label>
                            <input type="text" name="category_description" id="" class="form-control"
                                placeholder="" aria-describedby="helpId" />
                            <small id="helpId" class="text-muted">Kategori Açıklaması <b>örnek : "Burada Sıcacak
                                    İçeceklerimiz Mevcuttur ... "</b></small>
                        </div>
                        <div class="mb-2 col-md-1">
                            <label for="" class="form-label">Rengi</label>
                            <input type="color" name="category_color" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                            <small id="helpId" class="text-muted">Renk Seçiniz </small>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Fotoğrafı</label>
                            <input type="file" name="category_image" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" />
                            <small id="helpId" class="text-muted">Kategori Fotoğrafı </small>
                        </div>
                        <hr>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="" checked />
                            <label class="form-check-label" for=""> Aktif/Pasif </label>
                            <br>
                            <small>
                                Oluşturduğunuz kategorinin pasif olmasını istiyor iseniz <b>tıklamyı kaldırın lütfen</b>
                            </small>
                        </div>
                        <hr>
                        <input name="" type="submit" id="" class="btn btn-success" type="button"
                            value="Oluştur" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
