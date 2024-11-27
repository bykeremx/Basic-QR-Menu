@extends('admin.base.base')
@section('title-tag')
    Ayarlar
@endsection

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('AdminTemplate/assets/styles.css') }}">
@endsection
@section('container-admin')
    <div class="container-fluid">
        <div class="card">

            {{-- modal default update setting  --}}
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                <span class="badge bg-danger">
                                    <i class="fa fa-cog mr-1 " aria-hidden="true"></i> Bu Ayarı Değiştir
                                </span>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form action="{{ route('SettingsUpdatePost') }}" method="post"
                                    enctype='multipart/form-data'>
                                    @csrf
                                    <div class="mb-3">
                                        <p>* Eski ayar * </p>
                                        <strong>
                                            <p id="old_values">

                                            </p>
                                        </strong>
                                        <label for="" class="form-label">Ayarı Değiştir</label>
                                        <input type="text" hidden name="settings_id" id="settings_id">
                                        <input type="" name="new_value" id="update_input" class="form-control"
                                            placeholder="" aria-describedby="helpId" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Güncelle
                                    </button>

                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">Save</button> --}}
                        </div>
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

            <div class="card-body">
                @include('admin.base.flashMessage')
                <h3>
                    <i class="fa fa-cogs mr-1" aria-hidden="true"></i>
                    Ayarlar
                </h3>
                <small>
                    Genel Ayarlar
                </small>
                <hr>
                <div class="row">
                    @php
                        $count = 1;
                    @endphp
                    @if (!$Settings->isEmpty())
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Açıklaması</th>
                                    <th>Mevcut Ayar</th>
                                    <th>Aktif/Pasif</th>
                                    <th>Duzenle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Settings as $setting)
                                    <tr>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $count++ }}
                                            </span>

                                        </td>
                                        <td>
                                            <span class="badge bg-dark category_name">
                                                {{ ucwords($setting->settings_description) }}
                                            </span>
                                        </td>
                                        <td>

                                            @if ($setting->settings_type == 'file')
                                                <img src="{{ asset($setting->settings_value) }}" alt=""
                                                    srcset="" width="50">
                                            @else
                                                <strong>
                                                    {{ $setting->settings_value }}
                                                </strong>
                                            @endif


                                        </td>

                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                    role="switch" @if (!$setting->settings_status == '0') checked @endif />
                                            </div>
                                        </td>

                                        <td>
                                            <span>


                                                <button type="button" class="btn btn-primary btn-sm update_button"
                                                    data-bs-toggle="modal" data-bs-target="#modalId"
                                                    onclick="SettingsUpdate({{ $setting->id }})">
                                                    <div class="text-light">

                                                        <i class="fa fa-refresh mr-1" aria-hidden="true"></i>

                                                    </div>
                                                </button>

                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        });

        function SettingsUpdate(id) {
            console.log(id);
            $.ajax({
                type: "post",
                url: "{{ route('ajax-settings-update') }}",
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    $("#update_input").attr("type", response.settings_type);
                    console.log(response.settings_description);
                    $("#settings_id").val(id);
                    if ($("#update_input").prop("type") == "file") {
                        //eğer gelecek değer img ise
                        var url = "{{ asset('') }}" + response.settings_value;
                        var html = "<img src=" + url + " width='100'/>";
                        console.log(html);
                        $("#old_values").html(html);
                    } else {
                        $("#old_values").html("'" + response.settings_value + "'");
                    }
                }
            });


        }
    </script>
@endsection
