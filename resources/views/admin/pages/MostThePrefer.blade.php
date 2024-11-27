@extends('admin.base.base')
@section('title-tag')
    En çok Tercih Edilen
@endsection

@section('head-tag')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('AdminTemplate/assets/css/style.css') }}">
@endsection
@section('container-admin')
    <div class="container-fluid">
        <div class="card">

            <div class="card-body">
                @include('admin.base.flashMessage')
                <h3>
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    En Çok Tercih Edilen
                </h3>
                <hr>
                <div class="row mb-3">

                    <div class="row">
                        @if (!$MenuItems->isEmpty())
                            <h5 class="ml-3">
                                <span class="badge bg-dark"> Lütfen Eklemek İstediğiniz Menuleri Seçin</span>
                            </h5>
                            <form action="{{ route('TheMostToPreferPost') }}" method="post">
                                @csrf
                                <div class="col-lg-4">
                                    <select class="js-select2" multiple="multiple" name="menu_id[]"
                                        style="margin:0px;padding:0px;">

                                        @forelse ($MenuItems as $items)
                                            <option value="{{ $items->id }}" data-badge="">{{ $items->menu_name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success ml-3 mt-3">
                                    Ekle
                                </button>

                            </form>
                        @else
                            <div class="alert alert-info" role="alert">
                                <span class="badge bg-info shadow">
                                    <strong>Hiçbir Menu Mevcut Değil</strong>
                                </span>
                                <hr>
                                Lütfen ilk Önce Bir Menu Oluşturun
                                <b><a href="{{ route('MenuCreatePage') }}">Menu Oluşturma Sayfası</a></b>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="row p-3">
                    @if (!$MenuItems->isEmpty())
                        @if (!$ThePreferMenu->isEmpty())
                            <h5>
                                <span>Listesi : </span>
                            </h5>
                            @php
                                $count = 1;
                            @endphp
                            <div class="row">
                                <table id="myTable" class="display" data-bs-theme="dark">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Adı</th>
                                            <th>Açıklaması</th>
                                            <th>Fiyatı</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ThePreferMenu as $key)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="badge rounded-pill text-bg-info shadow">{{ $count++ }}</span>

                                                </td>
                                                <td>
                                                    <span class="badge bg-dark"> {{ $key->MenuleriGetir->menu_name }}</span>

                                                </td>
                                                <td>
                                                    <span class="badge bg-danger">
                                                        {{ $key->MenuleriGetir->menu_description }}</span>

                                                </td>
                                                <td>
                                                    <span
                                                        class="badge rounded-pill text-bg-dark">{{ $key->MenuleriGetir->menu_price }}</span>

                                                </td>
                                                <td>
                                                    <a href="{{ route('DeleteTheMostItem', ['id' => $key->MenuleriGetir->id]) }}"
                                                        class="text-danger">
                                                        <i class="fa fa-remove" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <span class="badge bg-danger shadow">
                                    <strong>Hiçbir Menu Mevcut Değil</strong>
                                </span>

                            </div>
                        @endif
                    @else
                    @endif


                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="{{ asset('AdminTemplate/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminTemplate/assets/js/popper.js') }}"></script> --}}
    <script src="{{ asset('AdminTemplate/assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script src="{{ asset('AdminTemplate/assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });
            //$("#aktiforpasif").hide();
        });
    </script>
@endsection
