@extends('layouts.app')

@section('addbeforecss')
<link href="{{asset('plugins/jquery-treegrid-master/css/jquery.treegrid.css')}}" rel="stylesheet" type="text/css" />

<style>
.border_bottom {
    border-bottom: 1px solid #c8c7c7;
}
.cls-button-log:hover{
    background-color: rgb(211, 249, 250);
}
</style>
@endsection

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
                    <h2 class="d-flex align-items-center"><i class="fa fa-database" style="font-size: 20px;"></i> &nbsp {{ $pagetitle }}
                    <span class="text-gray-600 fs-6 ms-1"></span></h2>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1" data-kt-view-roles-table-toolbar="base">
                        <button type="button" class="btn btn-active btn-info btn-sm btn-icon btn-search cls-search"  data-toggle="tooltip" title="Cari Data"><i class="bi bi-search fs-3"></i></button> &nbsp
                        <button style="display: none;" type="button" class="btn btn-warning btn-sm btn-icon cls-export"  data-toggle="tooltip" title="Download Excel"><i class="bi bi-file-excel fs-3"></i></button>
                    </div>
                    <!--end::Search-->
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--begin::Card body-->
            <div class="card-body p-0">
                <!--begin::Heading-->
                <div class="card-px py-10" >
                  <div class="row" id="form-cari">
                    <div class="form-group row  mb-5" >
                        <div class="col-lg-3">
                            <label>BUMN</label>
                            @php
                                $disabled = (($admin_bumn) ? 'disabled="true"' : 'data-allow-clear="true"');
                            @endphp
                            <select class="form-select form-select-solid form-select2" id="perusahaan_id" name="perusahaan_id" data-kt-select2="true" data-placeholder="Pilih BUMN" {{ $disabled }}>
                                <option></option>
                                @foreach($perusahaan as $bumn)  
                                    @php
                                        $select = (($bumn->id == $filter_bumn_id) ? 'selected="selected"' : '');
                                    @endphp
                                    <option value="{{ $bumn->id }}" {!! $select !!}>{{ $bumn->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Provinsi</label>
                            <select id="provinsi_id" class="form-select form-select-solid form-select2" name="provinsi_id" data-kt-select2="true" data-placeholder="Pilih Provinsi" data-allow-clear="true">
                                <option></option>
                                @foreach($provinsi as $prov)  
                                    <option value="{{ $prov->id }}" >{{ $prov->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Kabupaten/Kota</label>
                            <select id="kota_id" class="form-select form-select-solid form-select2" name="kota_id" data-kt-select2="true" data-placeholder="Pilih Kab/Kota" data-allow-clear="true">
                                <option></option>
                                @foreach($kota as $kotas)  
                                    <option value="{{ $kotas->id }}" >{{ $kotas->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Sektor Usaha</label>
                            <select id="sektor_usaha_id" class="form-select form-select-solid form-select2" name="sektor_usaha_id" data-kt-select2="true" data-placeholder="Pilih Sektor Usaha" data-allow-clear="true">
                                <option></option>
                                @foreach($sektor_usaha as $sektor)  
                                    <option value="{{ $sektor->id }}" >{{ $sektor->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row  mb-5">
                        <div class="col-lg-3">
                            <label>Cara Penyaluran</label>
                            <select id="cp_id" class="form-select form-select-solid form-select2" name="cp_id" data-kt-select2="true" data-placeholder="Pilih Cara" data-allow-clear="true">
                                <option></option>
                                @foreach($cara_penyaluran as $cp)  
                                    <option value="{{ $cp->id }}" >{{ $cp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Skala Usaha</label>
                            <select class="form-select form-select-solid form-select2" id="skala_id" name="skala_id" data-kt-select2="true" data-placeholder="Pilih Skala Usaha" data-allow-clear="true">
                                <option></option>
                                @foreach($skala_usaha as $su)  
                                    <option value="{{ $su->id }}" >{{ $su->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Kolektibilitas Pendanaan</label>
                            <select class="form-select form-select-solid form-select2" id="kolekbilitas_id" name="kolekbilitas_id" data-kt-select2="true" data-placeholder="Pilih Kolekbilitas" data-allow-clear="true">
                                <option></option>
                                @foreach($kolektibilitas_pendanaan as $kp)  
                                    <option value="{{ $kp->id }}" >{{ $kp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Kondisi Pinjaman</label>
                            <select class="form-select form-select-solid form-select2" id="kondisi_id" name="kondisi_id" data-kt-select2="true" data-placeholder="Pilih Kondisi" data-allow-clear="true">
                                <option></option>
                                @foreach($kondisi_pinjaman as $kondisi)  
                                    <option value="{{ $kondisi->id }}" >{{ $kondisi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row  mb-5">
                        <div class="col-lg-3">
                            <label>Jenis Pembayaran</label>
                            <select id="jp_id" class="form-select form-select-solid form-select2" name="jp_id" data-kt-select2="true" data-placeholder="Pilih Jenis" data-allow-clear="true">
                                <option></option>
                                @foreach($jenis_pembayaran as $jp)  
                                    <option value="{{ $jp->id }}" >{{ $jp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Bank Account</label>
                            <select class="form-select form-select-solid form-select2" id="bank_account_id" name="bank_account_id" data-kt-select2="true" data-placeholder="Pilih Bank" data-allow-clear="true">
                                <option></option>
                                @foreach($bank_account as $ba)  
                                    <option value="{{ $ba->id }}" >{{ $ba->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>No. Identitas</label>
                            <input type="text" class="form-control " name="identitas" placeholder="masukan nomor identitas..." >
                        </div>
                    </div>
                    <div class="form-group row  mb-5">
                        <div class="col-lg-6">
                            <button id="proses" class="btn-small btn-success me-3 text-white"><i class="fa fa-search text-white"></i> Cari</button>
                            <button  onclick="window.location.href='{{route('pumk.anggaran.index')}}'" class="btn-small btn-danger me-3 text-white"><i class="fa fa-times text-white"></i> Batal</button>
                        </div>
                    </div>
                    <div class="separator border-gray-200 mb-10"></div>
                </div>   
                    <!--begin: Datatable -->
                    <div class="table-responsive"  >
                        <table class="table table-striped table-bordered table-hover " id="datatable">
                            <thead>
                                <tr style="border-top:ridge;">
                                    <th style="text-align:center;">No</th>
                                    <th >Nama Mitra</th>
                                    <th >Provinsi</th>
                                    {{-- <th >Kabupaten/Kota</th> --}}
                                    <th >Sektor Usaha</th>
                                    <th >Nominal Pendanaan</th>
                                    <th >Saldo Pokok</th>
                                    <th >Kolektibilitas</th>
                                    <th style="width: 50px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Card body-->
        </div>
    </div>
</div>
@endsection

@section('addafterjs')
<script type="text/javascript" src="{{asset('plugins/jquery-treegrid-master/js/jquery.treegrid.js')}}"></script>

<script>
    var datatable;
    var urledit = "{{route('pumk.anggaran.edit')}}";
    var urlshow = "{{route('pumk.anggaran.show')}}";
    var urldelete = "{{route('pumk.data_mitra.delete')}}";
    var urlexport = "{{route('pumk.anggaran.export')}}";
    var urldatatable = "{{route('pumk.data_mitra.datatable')}}";

    $(document).ready(function(){
        setDatatable();

        $('#page-title').html("{{ $pagetitle }}");
        $('#page-breadcrumb').html("{{ $breadcrumb }}");

        $('body').on('click','.cls-button-edit',function(){
            winform(urledit, {'id':$(this).data('id')}, 'Ubah Data');
        });

        $('body').on('click','.cls-button-delete-mitra',function(){
            onbtndeletemitra(this);
        });

        $('body').on('click','.cls-button-show',function(){
            winform(urlshow, {'id':$(this).data('id')}, 'Detail Data');
        });

        $('body').on('click','.cls-export',function(){
            exportExcel();
        });

        $('body').on('click','.btn-search',function(){
            $('#form-cari').toggle(600);
        });
        
        // if("{{ $admin_bumn }}"){
        //     $('.cls-export').hide();
        //     $('.cls-button-update-status').hide();
        // }
        // if("{{ $admin_tjsl }}"){
        //     $('.cls-add').hide();
        //     $('.cls-button-edit').hide();
        // }

    });

    function setDatatable(data){
        datatable = $('#datatable').DataTable({
            sDom: 'lrtip',
            processing: true,
            serverSide: true,
            ajax: urldatatable,
            columns: [
                {data: "id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'nama_mitra', name: 'nama_mitra' },
                { data: 'provinsi', name: 'provinsi' },
                // { data: 'kota', name: 'kota' },
                { data: 'sektor_usaha', name: 'sektor_usaha' },
                { data: 'nominal_pendanaan', name: 'nominal_pendanaan' },
                { data: 'saldo_pokok_pendanaan', name: 'saldo_pokok_pendanaan' },
                { data: 'kolektibilitas', name: 'kolektibilitas' },
                { data: 'action', name:'action'},
            ],
            drawCallback: function( settings ) {
                var info = datatable.page.info();
                $('[data-toggle="tooltip"]').tooltip();
                datatable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = info.start + i + 1;
                } );
            }
        });
    }

    $('#proses').on('click', function(event){
      var url = urldatatable;
      var perusahaan_id = $('#perusahaan_id').val();
      $.ajax({
                url: url,
                type:'GET',
                dataType:'json',
                data:{
                    "perusahaan_id":perusahaan_id
                },
                success: function(response) {
                    var data = jQuery.parseJSON(response);
                    
                }
            });
    });


    function onbtndeletemitra(element){
        swal.fire({
            title: "Pemberitahuan",
            text: "Yakin hapus data "+$(element).data('nama')+" ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus data",
            cancelButtonText: "Tidak"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                url: urldelete,
                data:{
                    "id": $(element).data('id')
                },
                type:'post',
                dataType:'json',
                beforeSend: function(){
                    $.blockUI();
                },
                success: function(data){
                    $.unblockUI();

                    swal.fire({
                            title: data.title,
                            html: data.msg,
                            icon: data.flag,

                            buttonsStyling: true,

                            confirmButtonText: "<i class='flaticon2-checkmark'></i> OK"
                    });

                    if(data.flag == 'success') {
                        // datatable.ajax.reload( null, false );
                        location.reload(); 
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
                        html: msgerror+', coba ulangi kembali !!!',
                        icon: 'error',

                        buttonsStyling: true,

                        confirmButtonText: "<i class='flaticon2-checkmark'></i> OK"
                    });  
                    }
                });
            }
        });	
    }
    
    function onbtnupdatestatus(element){
        swal.fire({
            title: "Pemberitahuan",
            text: "Yakin update status "+$(element).data('nama')+" ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, update status",
            cancelButtonText: "Tidak"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                url: urlupdatestatus,
                data:{
                    "id": $(element).data('id')
                },
                type:'post',
                dataType:'json',
                beforeSend: function(){
                    $.blockUI();
                },
                success: function(data){
                    $.unblockUI();

                    swal.fire({
                            title: data.title,
                            html: data.msg,
                            icon: data.flag,

                            buttonsStyling: true,

                            confirmButtonText: "<i class='flaticon2-checkmark'></i> OK"
                    });

                    if(data.flag == 'success') {
                        // datatable.ajax.reload( null, false );
                        location.reload(); 
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
                        html: msgerror+', coba ulangi kembali !!!',
                        icon: 'error',

                        buttonsStyling: true,

                        confirmButtonText: "<i class='flaticon2-checkmark'></i> OK"
                    });  
                    }
                });
            }
        });	
    }


    function onbtnaktivasistatus(element){
        swal.fire({
            title: "Pemberitahuan",
            text: "Apakah anda yakin ingin melakukan aktivasi kembali status data "+$(element).data('nama')+" ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, aktivasi",
            cancelButtonText: "Tidak"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                url: urlupdatestatus,
                data:{
                    "id": $(element).data('id')
                },
                type:'post',
                dataType:'json',
                beforeSend: function(){
                    $.blockUI();
                },
                success: function(data){
                    $.unblockUI();

                    swal.fire({
                            title: data.title,
                            html: data.msg,
                            icon: data.flag,

                            buttonsStyling: true,

                            confirmButtonText: "<i class='flaticon2-checkmark'></i> OK"
                    });

                    if(data.flag == 'success') {
                        // datatable.ajax.reload( null, false );
                        location.reload(); 
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
                        html: msgerror+', coba ulangi kembali !!!',
                        icon: 'error',

                        buttonsStyling: true,

                        confirmButtonText: "<i class='flaticon2-checkmark'></i> OK"
                    });  
                    }
                });
            }
        });	
    }

    function exportExcel()
    {
        $.ajax({
            type: 'post',
            data: {
                'perusahaan_id' : $("select[name='perusahaan_id']").val(),
                'tahun' : $("select[name='tahun']").val(),
                'status' : $("select[name='status_id']").val(),
                'periode_id' : $("select[name='periode_id']").val()
            },
            beforeSend: function () {
                $.blockUI();
            },
            url: urlexport,
            xhrFields: {
                responseType: 'blob',
            },
            success: function(data){
                $.unblockUI();

                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                
                today = dd + '-' + mm + '-' + yyyy;
                var filename = 'Data Anggaran PUMK '+today+'.xlsx';

                var blob = new Blob([data], {
                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = filename;

                document.body.appendChild(link);

                link.click();
                document.body.removeChild(link);
            },
            error: function(jqXHR, exception){
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
                    html: msgerror+', coba ulangi kembali !!!',
                    icon: 'error',

                    buttonsStyling: true,

                    confirmButtonText: "<i class='flaticon2-checkmark'></i> OK",
            });      
                
            }
        });
        return false;
    }
    
</script>
@endsection

