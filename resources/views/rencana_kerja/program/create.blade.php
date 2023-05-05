@extends('layouts.app')

@section('addbeforecss')
    <link href="{{ asset('plugins/jquery-treegrid-master/css/jquery.treegrid.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .border_bottom {
            border-bottom: 1px solid #c8c7c7;
        }
    </style>
@endsection

@section('content')
    {{-- <div id="perusahaan_id" data-variable="{{ $perusahaan_id }}"></div>
    <div id="tahun" data-variable="{{ $tahun }}"></div> --}}
    <div id="actionform" data-variable="{{ $actionform }}"></div>
    <div class="post d-flex flex-column-fluid cls-content-data" id="kt_content">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">

                <!--begin::Card header-->
                <div class="card-header pt-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="d-flex align-items-center">
                            {{-- {{ $pagetitle }}  --}}
                            Data Program TPB
                            <span class="text-gray-600 fs-6 ms-1"></span>
                        </h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1"
                            data-kt-view-roles-table-toolbar="base">
                            {{-- <button type="button" class="btn btn-active btn-info btn-sm btn-icon btn-search cls-search btn-search-active" style="margin-right:3px;" data-toggle="tooltip" title="Cari Data"><i class="bi bi-search fs-3"></i></button>
                        <button type="button" class="btn btn-active btn-light btn-sm btn-icon btn-search cls-search btn-search-unactive" style="display:none;margin-right:3px;" data-toggle="tooltip" title="Cari Data"><i class="bi bi-search fs-3"></i></button>
                        @if (!$view_only)
                        <button type="button" class="btn btn-primary btn-sm btn-icon btn-validasi cls-validasi" style="display:none;margin-right:3px;" data-toggle="tooltip" title="Validasi"><i class="bi bi-check fs-3"></i></button>
                        <button type="button" class="btn btn-danger btn-sm btn-icon btn-cancel-validasi cls-validasi" style="display:none;margin-right:3px;" data-toggle="tooltip" title="Batalkan Validasi"><i class="bi bi-check fs-3"></i></button> 
                        <button type="button" class="btn btn-active btn-light btn-sm btn-icon btn-disable-validasi cls-validasi" style="display:none;margin-right:3px;" data-toggle="tooltip" title="Validasi"><i class="bi bi-check fs-3"></i></button>
                        <button type="button" class="btn btn-success btn-sm btn-icon cls-add" style="margin-right:3px;" data-toggle="tooltip" title="Tambah Data"><i class="bi bi-plus fs-3"></i></button>
                        <button type="button" class="btn btn-warning btn-sm btn-icon cls-export"  data-toggle="tooltip" title="Download Excel"><i class="bi bi-file-excel fs-3"></i></button>
                        @endif --}}
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
                        @if ($errors->any())
                    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10">

                        <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                    fill="currentColor" />
                                <rect x="9" y="13.0283" width="7.3536" height="1.2256" rx="0.6128"
                                    transform="rotate(-45 9 13.0283)" fill="currentColor" />
                                <rect x="9.86664" y="7.93359" width="7.3536" height="1.2256" rx="0.6128"
                                    transform="rotate(45 9.86664 7.93359)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column text-white pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h4 class="mb-2 text-white">Error !</h4>
                            <!--end::Title-->

                            <!--begin::Content-->
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Close-->
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light"><svg width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z"
                                        fill="currentColor" />
                                    <path
                                        d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z"
                                        fill="currentColor" />
                                </svg></span>
                        </button>
                        <!--end::Close-->
                    </div>
                @endif
                @if (\Session::has('success'))
                    <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10">

                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                    fill="currentColor" />
                                <path
                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column text-white pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h4 class="mb-2 text-white">Sukses !</h4>
                            <!--end::Title-->

                            <!--begin::Content-->
                            <span>{{ Session::get('success') }}</span>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Close-->
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light"><svg width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z"
                                        fill="currentColor" />
                                    <path
                                        d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z"
                                        fill="currentColor" />
                                </svg></span>
                        </button>
                        <!--end::Close-->
                    </div>
                    <!--end::Alert-->
                @endif
                <div class="row">
                        <div class="col-lg-4 mb-20">
                                <label>BUMN</label>
                                @php
                                $disabled = (($admin_bumn) ? 'disabled="true"' : 'data-allow-clear="true"');
                            @endphp
                            <select class="form-select form-select-solid form-select2" id="perusahaan_id" name="perusahaan_id" data-kt-select2="true" data-placeholder="Pilih BUMN" {{ $disabled }}>
                                <option></option>
                                @foreach($perusahaan as $p)  
                                    @php
                                        $select = (($p->id == $perusahaan_id) ? 'selected="selected"' : '');
                                    @endphp
                                    <option value="{{ $p->id }}" {!! $select !!}>{{ $p->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 mb-20">
                            <label>Tahun</label>
                            <select class="form-select form-select-solid form-select2" id="select-tahun" name="tahun" data-kt-select2="true" >
                                @php for($i = date("Y")+1; $i>=2020; $i--){ @endphp
                                    @php
                                        $select = (($i == $tahun) ? 'selected="selected"' : '');
                                    @endphp
                                    <option value="{{$i}}" {!! $select !!}>{{$i}}</option>
                                @php } @endphp
                            </select>
                        </div>
                        <div class="col-lg-4 mb-20">
                       
                            <label>Jenis Anggaran</label>
                            <select  id="jenis-anggaran" class="form-select form-select-solid form-select2" name="jenis_anggaran" data-kt-select2="true" data-placeholder="Pilih Jenis Anggaran" data-allow-clear="true">
                                <option></option>
                                <option value="CID" {{ request('jenis_anggaran') === 'CID' ? 'selected="selected"' : '' }} >
                                        CID</option>
                                <option value="non CID" {{ request('jenis_anggaran') === 'non CID' ? 'selected="selected"' : '' }} >
                                    non CID</option>
                            </select>
                        </div>
                    </div>
                        <form method="POST" id="program-form">
                            @csrf
                            <div class="mb-6 ">
                                
                                <div class="row mb-6">
                                    <div class="col-lg-2 ">
                                        <div class="ms-2">Nama Program</div>


                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="nama_program" id="nama_program"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Nama Program"  
                                            />

                                    </div>
                                
                                </div>
                                <div class="row mb-6">
                                    <div class="col-lg-2 ">
                                        <div class="ms-2">Pilih TPB</div>


                                    </div>
                                    <div class="col-lg-6">
                                        <select id="tpb_id" class="form-select form-select-solid form-select2" name="tpb_id" data-kt-select2="true"  data-placeholder="Pilih TPB" data-allow-clear="true">
                                            <option></option>
                                            @foreach($tpb as $p)  
                                                @php
                                                    $select = (($p->no_tpb == $tpb_id) ? 'selected="selected"' : '');
                                                @endphp
                                                <option data-jenis-anggaran="{{ $p->jenis_anggaran }}" value="{{ $p->id }}" {!! $select !!}>{{ $p->no_tpb }} - {{ $p->nama }} [{{$p->jenis_anggaran}}]</option>
                                            @endforeach
                                        </select>

                                    </div>
                                
                                </div>
                                <div class="row mb-6">
                                    <div class="col-lg-2 ">
                                        <div class="ms-2">Unit Owner</div>


                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="unit_owner" name="unit_owner" style="height: 100px"></textarea>
                                            <label for="unit_owner">Unit Owner</label>
                                        </div>

                                    </div>
                                
                                </div>
                                <div class="row mb-6">
                                    <div class="col-lg-2">
                                        <div class="ms-2">Kriteria Program</div>


                                    </div>
                                    <div class="col-lg-6 fv-row d-flex align-items-center justify-content-start">
                                        
                                        <div style="display:flex; flex-direction: row;">
                                            <div class="form-check form-check-custom form-check-solid form-check-sm me-8">
                                                <input class="form-check-input" type="checkbox" name="kriteria_program" value="prioritas" id="checkboxPrioritas"/>
                                                <label class="form-check-label" for="checkboxPrioritas">
                                                    Prioritas
                                                </label>
                                            </div> 
                                            <div class="form-check form-check-custom form-check-solid form-check-sm me-8">
                                                <input class="form-check-input" type="checkbox" name="kriteria_program" value="csv" id="checkboxCSV"/>
                                                <label class="form-check-label" for="checkboxCSV">
                                                    CSV
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                <input class="form-check-input" type="checkbox" name="kriteria_program" value="umum" id="checkboxUmum"/>
                                                <label class="form-check-label" for="checkboxUmum">
                                                    Umum
                                                </label>
                                            </div>
                                        </div>
                                        
                                        

                                    </div>
                                
                                </div>

                                <div class="row mb-6">
                                    <div class="col-lg-2">
                                        <div class="ms-2">ID Core Subject</div>


                                    </div>
                                    <div class="col-lg-6">
                                        <select  id="core_subject_id" class="form-select form-select-solid form-select2" name="core_subject_id" data-kt-select2="true" data-placeholder="Pilih ID Core Subject" data-allow-clear="true">
                                            <option></option>
                                            @foreach($core_subject as $c)  
                                            
                                                <option value="{{ $c->id }}" >{{ $c->nama }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                
                                </div>

                                <div class="row mb-6">
                                    <div class="col-lg-2">
                                        <div class="ms-2">Pelaksanaan Program</div>


                                    </div>
                                    <div class="col-lg-6">
                                        <select  id="pelaksanaan_program" class="form-select form-select-solid form-select2" name="pelaksanaan_program" data-kt-select2="true" data-placeholder="Pilih Pelaksanaan Program" data-allow-clear="true">
                                            <option></option>
                                            <option value="Mandiri" {{ request('pelaksanaan_program') === 'Mandiri' ? 'selected="selected"' : '' }} >
                                                    Mandiri</option>
                                            <option value="Kolaborasi" {{ request('pelaksanaan_program') === 'Kolaborasi' ? 'selected="selected"' : '' }} >
                                                Kolaborasi</option>
                                        </select>
                                    </div>
                                
                                </div>

                                <div class="row mb-6">
                                    <div class="col-lg-2">
                                        <div class="ms-2">Mitra BUMN</div>


                                    </div>
                                    <div class="col-lg-6">
                                        <select class="form-select form-select-solid form-select2" id="mitra_bumn" name="mitra_bumn" data-kt-select2="true" data-placeholder="Pilih Mitra BUMN" {{ $disabled }}>
                                            <option></option>
                                            @foreach($perusahaan as $p)  
                                                @php
                                                    $select = (($p->id == $perusahaan_id) ? 'selected="selected"' : '');
                                                @endphp
                                                <option value="{{ $p->id }}" {!! $select !!}>{{ $p->nama_lengkap }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                </div>

                                <div class="row mb-6">
                                    <div class="col-lg-2">
                                        <div class="ms-2">Program Multi Years</div>
                                    </div>
                                    <div class="col-lg-6 fv-row d-flex align-items-center justify-content-start">
                                        <div style="display:flex; flex-direction: row;">
                                            <div class="form-check form-check-custom form-check-solid form-check-sm me-8">
                                                <input class="form-check-input" type="radio" name="program" id="multiyears_ya" value="ya"/>
                                                <label class="form-check-label" for="prioritas">
                                                    Ya
                                                </label>
                                            </div> 
                                            <div class="form-check form-check-custom form-check-solid form-check-sm me-8">
                                                <input class="form-check-input" type="radio" name="program" id="multiyears_tidak" value="tidak"/>
                                                <label class="form-check-label" for="csv">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="row mb-6">
                                    <div class="col-lg-2">
                                        <div class="ms-2">Alokasi Anggaran</div>


                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="alokasi_anggaran" id="alokasi_anggaran"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Rp ... " oninput="formatCurrency(this)" 
                                            onkeypress="return onlyNumbers(event)" style="text-align:right;"  value="{{$data->income_bumn_pembina_lain ?? ''}}"
                                            />

                                    </div>
                                
                                </div>
                            
                                
                            </div>
                        

                        


                        </form>
                        <div class="form-group row mt-8  mb-5 text-center">
                            <div class="col-lg-12">
                                <button id="proses" class="btn btn-danger me-3">Close</button>
                                <button id="clear-btn" class="btn btn-info me-3">Clear</button>
                                <button id="simpan-btn" class="btn btn-success me-3">Simpan</button>
                            </div>
                        </div>

                        {{-- CID --}}
                        <div class="card-px py-10">
                            <!--begin: Datatable -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover tree  table-checkable">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;font-weight:bold;width:50px;border-bottom: 1px solid #c8c7c7;">No.</th>
                                            <th style="font-weight:bold;border-bottom: 1px solid #c8c7c7;">Pilar - TPB</th>
                                            <th style="text-align:center;font-weight:bold;width:100px;border-bottom: 1px solid #c8c7c7;">  CID</th>
                                            {{-- <th style="text-align:center;font-weight:bold;width:100px;border-bottom: 1px solid #c8c7c7;">Non CID</th> --}}
                                            <th style="text-align:center;font-weight:bold;width:100px;border-bottom: 1px solid #c8c7c7;">Kriteria</th>
                                            <th style="text-align:center;font-weight:bold;width:120px;border-bottom: 1px solid #c8c7c7;">Status</th>
                                            <th style="text-align:center;width:100px;font-weight:bold;border-bottom: 1px solid #c8c7c7;" >Aksi</th>
                                            <th><label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 mt-3"><input
                                                    class="form-check-input addCheck" type="checkbox"
                                                    id="select-all"></label>
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>       
                                    @php 
                                        $total=0;
                                        $total_cid = 0;
                                        $total_noncid = 0;
                                        $bumn = $anggaran_bumn;
                                       
                                    @endphp       
                                    @foreach ($bumn as $b)     
                                        @php 
                                            $no=0;
                                            $sum_bumn = $anggaran_bumn->where('perusahaan_id', $b->id)->first(); 
                                            $anggaran_pilar_bumn = $anggaran_pilar->where('perusahaan_id', $b->id);
        
                                            $statusInProgress = $anggaran->where('perusahaan_id', $b->id)->where('status_id', 2)->first();
                                            if($statusInProgress) $statusPerusahaan = $statusInProgress;
                                            else $statusPerusahaan = $anggaran->where('perusahaan_id', $b->id)->first();
                                            
                                            $status_class = 'primary';
                                            if($statusPerusahaan->status_id == 1){
                                                $status_class = 'success';
                                            } else if($statusPerusahaan->status_id == 3){
                                                $status_class = 'warning';
                                            }
        
                                            $total_cid += $sum_bumn->sum_anggaran_cid;
                                            $total_noncid += $sum_bumn->sum_anggaran_noncid;                                    
                                        @endphp
                                        @if(!$perusahaan_id)
                                        <tr class="treegrid-bumn{{@$b->id}}" >
                                            <td style="text-align:center;"></td>
                                            <td>{{$b->nama_lengkap}}</td>
                                            <td style="text-align:right;">
                                                @if($sum_bumn)
                                                {{number_format($sum_bumn->sum_anggaran_cid,0,',',',')}}
                                                @endif
                                            </td>
                                            {{-- <td style="text-align:right;">
                                                @if($sum_bumn)
                                                {{number_format($sum_bumn->sum_anggaran_noncid,0,',',',')}}
                                                @endif
                                            </td> --}}
                                            <td style="text-align:right;">
                                                @if($sum_bumn)
                                                {{-- {{number_format($sum_bumn->sum_anggaran_noncid +$sum_bumn->sum_anggaran_cid ,0,',',',')}} --}}
                                                @endif
                                            </td>
                                            <td style="text-align:center;">
                                                {{-- <a class="badge badge-light-{{$status_class}} fw-bolder me-auto px-4 py-3" data-toggle="tooltip" title="Lihat Log">{{@$statusPerusahaan->status->nama}}</a> --}}
                                            </td>
                                            <td></td>
                                            <td><label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 mt-3">
                                                <input class="form-check-input is_active-check perusahaan-check" data-perusahaan-parent="perusahaan-{{$b->id}}" type="checkbox" data-no_tpb="${row.no_tpb}" data-nama="${row.nama}" data-jenis_anggaran="${row.jenis_anggaran}"  ${isChecked} name="selected-is_active[]" value="${row.id}">
                                                </label></td>
                                          
                                        </tr>  
                                        @endif    
                                        @foreach ($anggaran_pilar_bumn as $p)                              
                                            @php 
    
                                                $no++;
                                                $anggaran_anak = $anggaran->where('perusahaan_id', $b->id)->where('pilar_nama', $p->pilar_nama);                                        
                                            
                                                
                                                $statusInProgress = $anggaran->where('perusahaan_id', $b->id)->where('pilar_nama', $p->pilar_nama)->where('status_id', 2)->first();
                                                if($statusInProgress) $statusPilar = $statusInProgress;
                                                else $statusPilar = $anggaran->where('perusahaan_id', $b->id)->where('pilar_nama', $p->pilar_nama)->first();
                                                
                                                $status_class = 'primary';
                                                if($statusPilar?->status_id == 1){
                                                    $status_class = 'success';
                                                } else if($statusPilar?->status_id == 3){
                                                    $status_class = 'warning';
                                                }
                                                
                                                $class_parent = '';
                                                if(!$perusahaan_id){
                                                    $class_parent = 'treegrid-parent-bumn' . $p->perusahaan_id;
                                                }
                            
                                                $total += $p->sum_anggaran;
                                                $currentPrintable = true;
                                                $nextPrintable = true;
                                            @endphp
                                            
                                            @if(number_format($p->sum_anggaran_cid) > 0 || number_format($p->sum_anggaran_noncid) > 0)
                                            <tr class="treegrid-bumn{{@$b->id}}pilar{{str_replace(' ', '-', @$p->pilar_nama)}} {{$class_parent}} item-bumn{{@$b->id}}pilar{{str_replace(' ', '-', @$p->pilar_nama)}}" >
                                                <td style="text-align:center;">{{$no}}</td>
                                                <td>{{$p->pilar_nama}}</td>
                                                <td style="text-align:right;">{{number_format($p->sum_anggaran_cid,0,',',',')}}</td>
                                                {{-- <td style="text-align:right;">{{number_format($p->sum_anggaran_noncid,0,',',',')}}</td> --}}
                                                <td style="text-align:right;">
                                                    {{-- {{number_format($p->sum_anggaran_noncid + $p->sum_anggaran_cid,0,',',',')}} --}}
                                                </td>
                                                <td style="text-align:center;">
                                                    {{-- <a class="badge badge-light-{{$status_class}} fw-bolder me-auto px-4 py-3" data-toggle="tooltip" title="Lihat Log">{{@$statusPilar->status->nama}}</a> --}}
                                                </td>
                                                <td style="text-align:center;">                                            
                                                </td>
                                               
                                                <td><label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 mt-3">
                                                    <input class="form-check-input is_active-check pilar-check perusahaan-{{$b->id}}" data-pilar-parent="pilar-{{$b->id}}-{{str_replace(' ', '-', @$p->pilar_nama)}}" type="checkbox" data-no_tpb="${row.no_tpb}" data-nama="${row.nama}" data-jenis_anggaran="${row.jenis_anggaran}"  ${isChecked} name="selected-is_active[]" value="${row.id}">
                                                    </label></td>
                                            </tr>
                                            @endif
                                                                                                              
                                            
                                            @php
                                                $anggaran_anak = $anggaran_anak->values();
                                            @endphp
                                            
                                            @foreach ($anggaran_anak as $key => $a)                                     
                                                @php     
                                                    
                                                    $currentPrintable = $nextPrintable;
                                                    if(!$nextPrintable) $nextPrintable = true;
            
                                                    $id_anggaran_cid = $a->jenis_anggaran === 'CID' ? $a->id_anggaran : null;
                                                    $id_anggaran_noncid = $a->jenis_anggaran === 'non CID' ? $a->id_anggaran : null;
                                                    $anggaran_cid = $a->anggaran_cid;
                                                    $anggaran_noncid = $a->anggaran_noncid;   
                                                    $status = $a->status?->nama;   
                                                    $status_id = $a->status_id;
            
                                                    $nextTpb = isset($anggaran_anak[$key+1]) ? $anggaran_anak[$key+1] : null;
                                                    
                                                    if($nextTpb !== null) {
                                                        if($a->no_tpb === $nextTpb->no_tpb) {
                                                            if($nextTpb->jenis_anggaran == 'CID') {
                                                                $anggaran_cid = $nextTpb->anggaran_cid;
                                                                $id_anggaran_cid = $nextTpb->id_anggaran;
                                                            } else {
                                                                $anggaran_noncid = $nextTpb->anggaran_noncid;
                                                                $id_anggaran_noncid = $nextTpb->id_anggaran;
                                                            }
            
                                                            if($nextTpb->status->nama == 'In Progress') $status = $nextTpb->status->nama;
                                                            if($nextTpb->status_id != 1) $status_id = $nextTpb->status_id;
            
                                                            $currentPrintable = true;
                                                            $nextPrintable = false;
                                                        }
                                                    }
                                                    
                                                    $status_class = 'primary';
                                                    if($status_id == 1){
                                                        $status_class = 'success';
                                                    }else if($status_id == 3){
                                                        $status_class = 'warning';
                                                    }
                                                @endphp                                       
                                                @if($currentPrintable)
                                                    @if(number_format($anggaran_cid) > 0 || number_format($anggaran_noncid) > 0)
                                                    <tr class="treegrid-{{$a->id_anggaran}} treegrid-parent-bumn{{@$b->id}}pilar{{str_replace(' ', '-', @$p->pilar_nama)}} item-{{$a->id_anggaran}}">
                                                        <td></td>
                                                        <td>{{@$a->no_tpb .' - '. @$a->tpb_nama}}</td>
                                                        @if( $jenis_anggaran == 'CID')
                                                        <td style="text-align:right;">{{$id_anggaran_cid ? number_format($anggaran_cid,0,',',',') : '-'}}</td>
                                                        @endif
                                                        @if( $jenis_anggaran == 'non CID')
                                                        <td style="text-align:right;">{{$id_anggaran_noncid ? number_format($anggaran_noncid,0,',',',') : '-'}}</td>
                                                        @endif
                                                        {{-- <td style="text-align:right;">{{number_format($anggaran_noncid + $anggaran_cid,0,',',',')}}</td> --}}
                                                        <td style="text-align:center;">
                                                            {{-- <span class="btn cls-log badge badge-light-{{$status_class}} fw-bolder me-auto px-4 py-3" data-id="{{$a->id_anggaran}}" data-anggaran-cid="{{ $id_anggaran_cid }}" data-anggaran-noncid="{{ $id_anggaran_noncid }}">{{$status}}</span> --}}
                                                        </td>
                                                        <td style="text-align:center;">
                                                            
                                                        </td>
                                                        <td style="text-align:center;">
                                                            @if(!$view_only)
                                                                @if($status_id != 1)
                                                                {{-- <button type="button" class="btn btn-sm btn-light btn-icon btn-primary cls-button-edit" data-anggaran-cid="{{ $id_anggaran_cid }}" data-anggaran-noncid="{{ $id_anggaran_noncid }}" data-id="{{$a->id_anggaran}}" data-toggle="tooltip" title="Ubah data {{@$a->no_tpb}}"><i class="bi bi-pencil fs-3"></i></button> --}}
                                                                <!-- <button type="button" class="btn btn-sm btn-danger btn-icon cls-button-delete" data-anggaran="{{ $a->id_anggaran }}" data-perusahaan_id="{{$b->id}}" data-id="{{$a->id_anggaran}}" data-nama="{{@$a->no_tpb}}" data-toggle="tooltip" title="Hapus data {{@$a->no_tpb}}"><i class="bi bi-trash fs-3"></i></button> -->
                                                                @endif
                                                            @endif
                                                        </td>
                                                        
                                                        <td><label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 mt-3">
                                                            <input class="form-check-input is_active-check tpb-check perusahaan-{{$b->id}} pilar-{{$b->id}}-{{str_replace(' ', '-', @$p->pilar_nama)}}" data-anggaran-cid="{{ $id_anggaran_cid }}" data-anggaran-noncid="{{ $id_anggaran_noncid }}" type="checkbox" data-no_tpb="${row.no_tpb}" data-nama="${row.nama}" data-jenis_anggaran="${row.jenis_anggaran}"  ${isChecked} name="selected-is_active[]" value="${row.id}">
                                                            </label></td>
                                                    </tr>
                                                    @endif
    
                                                    
                                                @endif
                                                @if($a->program != null)
                                                @php     
                                                // dd($a);
                                                @endphp
                                                        <tr class="treegrid-{{$a->id}} treegrid-parent-{{$a->id_anggaran}}  item-{{$a->id}}" >
                                                            <td></td>
                                                            <td>{{$a->program}}</td>
                                                            @if( $jenis_anggaran == 'CID')
                                                            <td style="text-align:right;">{{number_format($a->anggaran_alokasi,0,',',',') }}</td>
                                                            @endif
                                                            @if( $jenis_anggaran == 'non CID')
                                                            <td style="text-align:right;">{{number_format($a->anggaran_alokasi,0,',',',') }}</td>
                                                            @endif
                                                            
                                                            {{-- <td style="text-align:right;">{{number_format($anggaran_noncid + $anggaran_cid,0,',',',')}}</td> --}}
                                                            
                                                            <td style="text-align:right;"> 
                                                                @if($a->kriteria_program_prioritas)
                                                                    Prioritas;
                                                                @endif
                                                                @if($a->kriteria_program_csv)
                                                                    CSV;
                                                                @endif
                                                                @if($a->kriteria_program_umum)
                                                                Umum;
                                                                @endif
                                                            </td>
                                                            <td style="text-align:center;">
                                                                <span class="btn cls-log badge badge-light-{{$status_class}} fw-bolder me-auto px-4 py-3" data-id="{{$a->id_target_tpb}}" data-anggaran-cid="{{ $id_anggaran_cid }}" data-anggaran-noncid="{{ $id_anggaran_noncid }}">{{$status}}</span>
                                                            </td>
                                                            <td style="text-align:center;">
                                                                @if(!$view_only)
                                                                    @if($status_id != 1)
                                                                    <button type="button" class="btn btn-sm btn-light btn-icon btn-primary cls-button-edit" data-anggaran-cid="{{ $id_anggaran_cid }}" data-anggaran-noncid="{{ $id_anggaran_noncid }}" data-id="{{$a->id_target_tpb}}" data-toggle="tooltip" title="Ubah data {{@$a->no_tpb}}"><i class="bi bi-pencil fs-3"></i></button>
                                                                    <!-- <button type="button" class="btn btn-sm btn-danger btn-icon cls-button-delete" data-anggaran="{{ $a->id_anggaran }}" data-perusahaan_id="{{$b->id}}" data-id="{{$a->id_anggaran}}" data-nama="{{@$a->no_tpb}}" data-toggle="tooltip" title="Hapus data {{@$a->no_tpb}}"><i class="bi bi-trash fs-3"></i></button> -->
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            
                                                            <td><label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 mt-3">
                                                                <input class="form-check-input is_active-check tpb-check perusahaan-{{$b->id}} pilar-{{$b->id}}-{{str_replace(' ', '-', @$p->pilar_nama)}}" data-anggaran-cid="{{ $id_anggaran_cid }}" data-anggaran-noncid="{{ $id_anggaran_noncid }}" type="checkbox" data-no_tpb="${row.no_tpb}" data-nama="${row.nama}" data-jenis_anggaran="${row.jenis_anggaran}"  ${isChecked} name="selected-is_active[]" value="${row.id}">
                                                                </label></td>
                                                        </tr>
                                                    @endif 
                                                
                                                
                                               
                                                    
                                                
                                              
                                                
                                                
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                    @php
                                        $total = $total_cid + $total_noncid;
                                    @endphp
                                    @if($total==0)
                                        <td></td>
                                        <td style="text-align:left;">-</td>
                                        <td style="text-align:center;">-</td>
                                        <td style="text-align:center;"><span class="badge badge-light-warning fw-bolder me-auto px-4 py-3">Unfilled</span></td>
                                        <td></td>
                                    @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            @if($total>0)
                                            <th style="text-align:right;font-weight:bold;border-top: 1px solid #c8c7c7;"></th>
                                            <th style="text-align:right;font-weight:bold;border-top: 1px solid #c8c7c7;">Total</th>
                                            @if($jenis_anggaran == 'CID')
                                            <th style="text-align:right;font-weight:bold;border-top: 1px solid #c8c7c7;">{{number_format($total_cid,0,',',',')}}</th>
                                            @endif
                                            @if($jenis_anggaran == 'non CID')
                                            <th style="text-align:right;font-weight:bold;border-top: 1px solid #c8c7c7;">{{number_format($total_noncid,0,',',',')}}</th>
                                            @endif
                                            {{-- <th style="text-align:right;font-weight:bold;border-top: 1px solid #c8c7c7;">{{number_format($total,0,',',',')}}</th> --}}
                                            @endif
                                        </tr>
                                    </tfoot>
                                </table>
        
        
                            </div>
                        </div>

                        <br><br>
                       
                       
                    </div>
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
@endsection

@section('addafterjs')
    <script type="text/javascript" src="{{ asset('plugins/jquery-treegrid-master/js/jquery.treegrid.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.tree').treegrid({
                initialState : 'collapsed',
                treeColumn : 1,
                indentTemplate : '<span style="width: 32px; height: 16px; display: inline-block; position: relative;"></span>'
            });
            const urlParams = new URLSearchParams(window.location.search)
            const checkJenisAnggaran = urlParams.get('jenis_anggaran')
            if(checkJenisAnggaran !== '') {
                setTimeout(()=>{
                    $("#jenis-anggaran").val(checkJenisAnggaran).trigger('change')
                }, 1000)
            }
            $("#jenis-anggaran").on('change', function(){
                // yovi
                const jenisAnggaran = $(this).val()
                $("#tpb_id, #pilar_pembangunan_id").val('').trigger('change')
                
                
                $("#tpb_id, #pilar_pembangunan_id").select2({    
                    templateResult: function(data) {
                        if($(data.element).attr('data-jenis-anggaran') === jenisAnggaran || jenisAnggaran === '') return data.text
                        return null
                    },
                    templateSelection: function(data) {
                        if($(data.element).attr('data-jenis-anggaran') === jenisAnggaran || jenisAnggaran === '') return data.text
                        return null
                    }
                })            

                let textAnggaran = jenisAnggaran ? `- ${jenisAnggaran}` : ''
                $("#select2-pilar_pembangunan_id-container .select2-selection__placeholder").text('Pilih Pilar '+textAnggaran)
                $("#select2-tpb_id-container .select2-selection__placeholder").text('Pilih TPB '+textAnggaran)

              
            
            })
        });

        function formatCurrency(element) {
            //ver 1
            // const value = element.value.replace(/[^\d]/g, "");
            // const isNegative = value.startsWith("-");
            // const formatter = new Intl.NumberFormat("id-ID", {
            //     style: "currency",
            //     currency: "IDR",
            //     minimumFractionDigits: 0,
            //     maximumFractionDigits: 0
            // });
            // let formattedValue = formatter.format(value);
            // formattedValue = formattedValue.replace(/,/g, ".");
            // if (isNegative) {
            //     formattedValue = "- " + formattedValue;
                
            // }
            // element.value = formattedValue;

            //ver 2
            let value = element.value.replace(/[^\d-]/g, "");
            let isNegative = false;

            if (value.startsWith("-")) {
                isNegative = true;
                value = value.substring(1);
            }

            let formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });

            let formattedValue = formatter.format(value);
            formattedValue = formattedValue.replace(/,/g, ".");

            if (isNegative) {
                formattedValue = "- " + formattedValue;
            }

            element.value = formattedValue;
            
        }

        function formatCurrency2(element) {
            let value = element.value.replace(/[^\d-]/g, ""); // Remove all non-numeric characters except for hyphen "-"
            const isNegative = value.startsWith("-");
            value = value.replace("-", ""); // Remove hyphen if it exists
            const formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });
            let formattedValue = formatter.format(value);
            formattedValue = formattedValue.replace(/,/g, ".");
            if (isNegative) {
                formattedValue = "( " + formattedValue + " )";
            } 
            element.value = formattedValue;
        }

        function onlyNumbers(event) {
            // const key = event.keyCode || event.which;
            // if (key < 48 || key > 57) {
            //     event.preventDefault();
            // }
            const key = event.keyCode || event.which;

            // Allow backspace, delete, arrow keys, and "-"
            if (key == 8 || key == 46 || key == 37 || key == 39 || key == 45) {
                return true;
            }

            // Allow numbers
            if (key >= 48 && key <= 57) {
                return true;
            }

            // Prevent any other input
            event.preventDefault();
            return false;
        }

        const form = document.getElementById('program-form');

        document.getElementById('clear-btn').addEventListener('click', function() {
            var inputs = document.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type == 'text' || inputs[i].type == 'email' || inputs[i].type == 'password') {
                    inputs[i].value = '';
                } else if (inputs[i].type == 'radio' || inputs[i].type == 'checkbox') {
                    inputs[i].checked = false;
                }
            }

            // clear dropdown options
            var dropdowns = document.getElementsByTagName('select');
            for (var i = 0; i < dropdowns.length; i++) {
                dropdowns[i].selectedIndex = -1;
            }
        });
        // const clearBtn = document.querySelector("#clear-btn");
        // clearBtn.addEventListener("click", function() {
        //     const inputFields = document.querySelectorAll("input[type='text']");
        //     inputFields.forEach(function(input) {
        //         input.value = null;
        //     });
        // });
        

        const simpanBtn = document.querySelector("#simpan-btn");
        simpanBtn.addEventListener("click", async function() {
            console.log('simpan clicked')
            
            var perusahaan_id = document.getElementById('perusahaan_id').value;
            // var perusahaan_id = perusahaan_id.getAttribute('data-variable');

            var tahun = document.getElementById('select-tahun').value;
            // var tahun = tahun.getAttribute('data-variable');

            var jenis_anggaran = document.getElementById('jenis-anggaran').value

             var actionform = document.getElementById('actionform');
            var actionform = actionform.getAttribute('data-variable');
            console.log(`perusahaan_id : ${perusahaan_id} | tahun : ${tahun} | jenis_anggaran : ${jenis_anggaran} | actionform : ${actionform}`)
            //data program tpb
            let nama_program = document.getElementById('nama_program').value
            let tpb_id = document.getElementById('tpb_id').value
            let unit_owner = document.getElementById('unit_owner').value
            const kriteria_program_checkboxes = document.getElementsByName("kriteria_program"); // mengambil semua checkbox dengan name="kriteria_program"
            const selectedKriteriaProgram = []; // deklarasi array untuk menyimpan nilai dari checkbox yang dipilih

            for (let i = 0; i < kriteria_program_checkboxes.length; i++) { // iterasi semua checkbox
            if (kriteria_program_checkboxes[i].checked) { // jika checkbox terpilih
                selectedKriteriaProgram.push(kriteria_program_checkboxes[i].value); // tambahkan nilai checkbox ke dalam array
            }
            }

            let core_subject_id = document.getElementById('core_subject_id').value
            let pelaksanaan_program = document.getElementById('pelaksanaan_program').value
            let mitra_bumn = document.getElementById('mitra_bumn').value
            let program_multiyears =  document.querySelector('input[name="program"]:checked').value
            let alokasi_anggaran = document.getElementById('alokasi_anggaran').value
            alokasi_anggaran = parseInt(alokasi_anggaran.replace(/[^0-9\-]/g, ''))
            let data = {
                nama_program : nama_program,
                tpb_id : tpb_id,
                unit_owner : unit_owner,
                kriteria_program : selectedKriteriaProgram,
                core_subject_id : core_subject_id,
                pelaksanaan_program : pelaksanaan_program,
                mitra_bumn : mitra_bumn,
                program_multiyears : program_multiyears,
                alokasi_anggaran : alokasi_anggaran
            }
            console.log('data', data)
           
            console.log(actionform)
            await $.ajax({
                url: '/rencana_kerja/program/store',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    data: data,
                    tahun: tahun,
                    perusahaan_id: perusahaan_id,
                    actionform: actionform,
                    jenis_anggaran: jenis_anggaran
                },
                success: function(response) {
                    
                    console.log(`success : ${response}`)
                    toastr.success(
                        `Berhasil!`
                    );
                    window.location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        });


        const selectElement = document.getElementById('select-tahun');
        selectElement.addEventListener('change', function(event) {
            const selectedOption = event.target.value;
            console.log(selectedOption)
        // call your function here, passing in the selectedOption value as an argument
        });


        

        
    </script>
@endsection
