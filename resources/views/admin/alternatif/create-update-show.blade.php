@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-box"></i>
                            {{ $judul ?? 'TAMBAH DATA KRITERIA' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'alternatif')
                                <form action="{{ route('dashboard.alternatif.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'alternatif')
                                    <form action="{{ route('dashboard.alternatif.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="alternatif" class="form-label">Alternatif</label>
                                    <input type="text" class="form-control" id="alternatif" name="alternatif"
                                        value="{{ old('alternatif') ?? ($data->alternatif ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('alternatif')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                  <div class="col-md-6 mb-3">
                                    <label for="nilai_ideal_alternatif" class="form-label">Nilai Ideal</label>
                                    <input type="text" class="form-control" id="nilai_ideal_alternatif" name="nilai_ideal_alternatif"
                                        value="{{ old('nilai_ideal_alternatif') ?? ($data->nilai_ideal_alternatif ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nilai_ideal_alternatif')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-12 mb-3 mx-auto">
                                @if (Request::segment(3) == 'detail')
                                {{-- @if(!Auth::user()->hasAnyRole(['mahasiswa', 'dosen'])) --}}
                                    <a href="{{ route('dashboard.alternatif.ubah', $data->id) }}" class="btn btn-dark text-white">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                                {{-- @endif --}}
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'alternatif')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif

                                <a href="{{ route('dashboard.alternatif') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
