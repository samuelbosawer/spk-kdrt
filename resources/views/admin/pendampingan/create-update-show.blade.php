@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-message"></i>
                            {{ $judul ?? 'TAMBAH DATA PENDAMPINGAN' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'pendampingan')
                                <form action="{{ route('dashboard.pendampingan.update', $data->id) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'pendampingan')
                                    <form action="{{ route('dashboard.pendampingan.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">



                                <div class="col-md-7 mb-3">
                                    <label for="tanggal_pendampingan" class="form-label">Tanggal Pendampingan</label>
                                    <input type="date" class="form-control" id="tanggal_pendampingan"
                                        name="tanggal_pendampingan"
                                        value="{{ old('tanggal_pendampingan') ?? ($data->tanggal_pendampingan ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('tanggal_pendampingan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="penilaian_kasus" class="form-label">Penilaian Kasus</label>
                                    <input type="text" class="form-control" id="penilaian_kasus" name="penilaian_kasus"
                                        value="{{ old('penilaian_kasus') ?? ($data->penilaian_kasus ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('penilaian_kasus')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-7 mb-3">
                                    <label class="form-label">Petugas</label>
                                    <select name="petugas_pendamping_id" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option selected hidden>Pilih</option>

                                        @foreach ($petugas as $p)
                                            <option value="{{ $p->id }}"
                                                {{ old('petugas_pendamping_id', $data->petugas_pendamping_id ?? '') == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama_petugas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label class="form-label">Pengaduan</label>
                                    <select name="pengaduan_masyarakat_id" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option selected hidden>Pilih</option>

                                        @foreach ($pengaduan as $p)
                                            <option value="{{ $p->id }}"
                                                {{ old('pengaduan_masyarakat_id', $data->pengaduan_masyarakat_id ?? '') == $p->id ? 'selected' : '' }}>
                                                {{ $p->judul_pengaduan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label class="form-label">Alternatif</label>
                                    <select name="alternatif_id" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option selected hidden>Pilih</option>

                                        @foreach ($alternatif as $a)
                                            <option value="{{ $a->id }}"
                                                {{ old('alternatif_id', $data->alternatif_id ?? '') == $a->id ? 'selected' : '' }}>
                                                {{ $a->alternatif }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-7 mb-3">
                                    <label class="form-label">Kriteria</label>
                                    <select name="kriteria_id" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option selected hidden>Pilih</option>

                                        @foreach ($kriteria as $k)
                                            <option value="{{ $k->id }}"
                                                {{ old('kriteria_id', $data->kriteria_id ?? '') == $k->id ? 'selected' : '' }}>
                                                {{ $k->kriteria }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>







                            </div>
                            <div class="col-md-12 mb-3 mx-auto">
                                @if (Request::segment(3) == 'detail')
                                    {{-- @if (!Auth::user()->hasAnyRole(['mahasiswa', 'dosen'])) --}}
                                    <a href="{{ route('dashboard.pendampingan.ubah', $data->id) }}"
                                        class="btn btn-dark text-white">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                                    {{-- @endif --}}
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'pendampingan')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif

                                <a href="{{ route('dashboard.pendampingan') }}" class="btn btn-dark text-white"> KEMBALI
                                </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
