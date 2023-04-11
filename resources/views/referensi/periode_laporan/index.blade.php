@extends('layouts.app')

@section('content')
    <div class="post d-flex flex-column-fluid cls-content-data" id="kt_content">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">

                <!--begin::Card header-->
                <div class="card-header pt-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="d-flex align-items-center">Periode Standar
                            <span class="text-gray-600 fs-6 ms-1"></span>
                        </h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1"
                            data-kt-view-roles-table-toolbar="base">
                            <button type="button" class="btn btn-danger btn-sm cls-add me-2"
                                data-kt-view-roles-table-select="delete_selected">Hapus</button>
                            <button type="button" class="btn btn-success btn-sm cls-add"
                                data-kt-view-roles-table-select="delete_selected">Tambah Data</button>
                        </div>
                        <!--end::Search-->
                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--begin::Card body-->
                <div class="card-body p-0">
                    <!--begin::Heading-->
                    <div class="card-px py-10">
                        <!--begin: Datatable -->

                        <table class="table table-striped- table-bordered table-hover table-checkable" id="datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Periode</th>
                                    <th>Jenis Laporan</th>
                                    <th>Urutan</th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Keterangan</th>
                                    <th style="text-align:center;">Aksi</th>
                                    <th><label
                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 mt-3"><input
                                                class="form-check-input addCheck" type="checkbox" id="select-all"></label>
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <br><br>
            {{-- Tentatif --}}
            <div class="card">

                <!--begin::Card header-->
                <div class="card-header pt-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="d-flex align-items-center">Periode Tentatif
                            <span class="text-gray-600 fs-6 ms-1"></span>
                        </h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1"
                            data-kt-view-roles-table-toolbar="base">
                            <button type="button" class="btn btn-danger btn-sm cls-add me-2"
                                data-kt-view-roles-table-select="delete_selected">Hapus</button>
                            {{-- <button type="button" class="btn btn-success btn-sm cls-add"
                                data-kt-view-roles-table-select="delete_selected">Tambah Data</button> --}}
                        </div>
                        <!--end::Search-->
                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--begin::Card body-->
                <div class="card-body p-0">
                    <!--begin::Heading-->
                    <div class="card-px py-10">
                        <!--begin: Datatable -->

                        <table class="table table-striped- table-bordered table-hover table-checkable"
                            id="datatable_tentatif">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Periode</th>
                                    <th>Jenis Laporan</th>

                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Keterangan</th>
                                    <th style="text-align:center;">Aksi</th>
                                    <th><label
                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 mt-3"><input
                                                class="form-check-input addCheck" type="checkbox" id="select-all"></label>
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
@endsection

@section('addafterjs')
    <script>
        var datatable;
        var urlcreate = "{{ route('referensi.periode_laporan.create') }}";
        var urledit = "{{ route('referensi.periode_laporan.edit') }}";
        var urlstore = "{{ route('referensi.periode_laporan.store') }}";
        var urldatatable = "{{ route('referensi.periode_laporan.datatable') }}";
        var urldelete = "{{ route('referensi.periode_laporan.delete') }}";

        var urldatatable_tentatif = "{{ route('referensi.periode_laporan.datatable_tentatif') }}";

        $(document).ready(function() {
            $('#page-title').html("{{ $pagetitle }}");
            $('#page-breadcrumb').html("{{ $breadcrumb }}");

            $('body').on('click', '.cls-add', function() {
                winform(urlcreate, {}, 'Tambah Data');
            });

            $('body').on('click', '.cls-button-edit', function() {
                winform(urledit, {
                    'id': $(this).data('id')
                }, 'Ubah Data');
            });

            $('body').on('click', '.cls-button-delete', function() {
                onbtndelete(this);
            });

            setDatatable();
        });

        function setDatatable() {
            datatable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: urldatatable,
                columns: [{
                        data: 'id',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenis_laporan',
                        name: 'jenis_laporan'
                    },
                    {
                        data: 'urutan',
                        name: 'urutan',
                        sClass: 'text-center'
                    },
                    {
                        data: 'tanggal_awal',
                        name: 'tanggal_awal'
                    },
                    {
                        data: 'tanggal_akhir',
                        name: 'tanggal_akhir'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return ' <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 mt-3"><input class="form-check-input selectCheck" type="checkbox" name="selected[]" value="' +
                                row.id + '"></label>';
                        }
                    }
                ],
                drawCallback: function(settings) {
                    var info = datatable.page.info();
                    $('[data-toggle="tooltip"]').tooltip();
                    datatable.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = info.start + i + 1;
                    });
                }
            });

            datatable_tentatif = $('#datatable_tentatif').DataTable({
                processing: true,
                serverSide: true,
                ajax: urldatatable_tentatif,
                columns: [{
                        data: 'id',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenis_laporan',
                        name: 'jenis_laporan'
                    },

                    {
                        data: 'tanggal_awal',
                        name: 'tanggal_awal'
                    },
                    {
                        data: 'tanggal_akhir',
                        name: 'tanggal_akhir'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return ' <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 mt-3"><input class="form-check-input selectCheck" type="checkbox" name="selected[]" value="' +
                                row.id + '"></label>';
                        }
                    }
                ],
                drawCallback: function(settings) {
                    var info = datatable.page.info();
                    var info_tentatif = datatable_tentatif.page.info();
                    $('[data-toggle="tooltip"]').tooltip();
                    datatable.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = info.start + i + 1;
                    });
                    datatable_tentatif.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = info.start + i + 1;
                    });
                }
            });
        }

        function onbtndelete(element) {
            swal.fire({
                title: "Pemberitahuan",
                text: "Yakin hapus data " + $(element).data('nama') + " ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus data",
                cancelButtonText: "Tidak"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: urldelete,
                        data: {
                            "id": $(element).data('id')
                        },
                        type: 'post',
                        dataType: 'json',
                        beforeSend: function() {
                            $.blockUI();
                        },
                        success: function(data) {
                            $.unblockUI();

                            swal.fire({
                                title: data.title,
                                html: data.msg,
                                icon: data.flag,

                                buttonsStyling: true,

                                confirmButtonText: "<i class='flaticon2-checkmark'></i> OK",
                            });

                            if (data.flag == 'success') {
                                datatable.ajax.reload(null, false);
                                datatable_tentatif.ajax.reload(null, false);
                            }

                        },
                        error: function(jqXHR, exception) {
                            $.unblockUI();
                            var msgerror = '';
                            if (jqXHR.status === 0) {
                                msgerror = 'jaringan tidak terkoneksi.';
                            } else if (jqXHR.status == 404) {
                                msgerror = 'Halaman tidak ditemukan. [404]';
                            } else if (jqXHR.status == 500) {
                                msgerror = 'Internal Server Error [500].';
                            } else if (exception === 'parsererror') {
                                msgerror = 'Requested JSON parse gagal.';
                            } else if (exception === 'timeout') {
                                msgerror = 'RTO.';
                            } else if (exception === 'abort') {
                                msgerror = 'Gagal request ajax.';
                            } else {
                                msgerror = 'Error.\n' + jqXHR.responseText;
                            }
                            swal.fire({
                                title: "Error System",
                                html: msgerror + ', coba ulangi kembali !!!',
                                icon: 'error',

                                buttonsStyling: true,

                                confirmButtonText: "<i class='flaticon2-checkmark'></i> OK",
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
