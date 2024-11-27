@extends('admin.base.base')
@section('title-tag')
    Toplu Fiyat Güncelle
@endsection

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('AdminTemplate/assets/styles.css') }}">
@endsection
@section('container-admin')
    <div class="container-fluid">
        <div class="card">

            <div class="card-body">
                @include('admin.base.flashMessage');
                <h4>
                    Toplu Fiyat Güncelle
                </h4>
                <hr>
                @php
                    $count = 1;
                @endphp
                <style>
                    /* Search bar'ı gizleme */
                    .dataTables_filter {
                        display: none !important;
                    }
                </style>
                @if (!$MenuItemList->isEmpty())
                    <form action="{{ route('AllPriceUpdatePagePOST') }}" method="post">
                        @csrf
                        <div class="dark-theme" id="dark_theme_selector" data-bs-theme="dark">
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Adı</th>
                                        <th>Kategorisi</th>
                                        <th>Aktif/Pasif</th>
                                        <th>Fiyatı</th>
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
                                                <span class="badge bg-warning category_name">
                                                    @if ($item->menu_status == '1')
                                                        Aktif
                                                    @else
                                                        Pasif
                                                    @endif
                                                </span>

                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="menu_price[]"
                                                    id="_price" aria-describedby="helpId"
                                                    value="{{ $item->menu_price }}" />
                                                <small id="helpId" class="form-text text-muted">
                                                    <b>Yeni Fiyatı Girin</b>
                                                </small>
                                            </td>
                                        </tr>
                                        <br>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                @else
                    <div class="alert alert-danger" role="alert">
                        <span class="badge bg-danger shadow">
                            <strong>Hiçbir Menu Mevcut Değil</strong>
                        </span>
                        <hr>
                        Lütfen ilk Önce Bir Menu Oluşturun
                        <b><a href="{{ route('MenuCreatePage') }}">Menu Oluşturma Sayfası</a></b>
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
            //$("#aktiforpasif").hide();
        });
    </script>
@endsection
