@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-file"></i>
                            {{ $judul ?? 'TAMBAH DATA PENGADUAN' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'pengaduan')
                                <form action="{{ route('dashboard.pengaduan.update', $data->id) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'pengaduan')
                                    <form action="{{ route('dashboard.pengaduan.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-7 mb-3">
                                    <label for="judul_pengaduan" class="form-label">Judul Pengaduan</label>
                                    <input type="text" class="form-control" id="judul_pengaduan" name="judul_pengaduan"
                                        value="{{ old('judul_pengaduan') ?? ($data->judul_pengaduan ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('judul_pengaduan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="tanggal_kejadian" class="form-label">Tanggal Kejadian</label>
                                    <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian"
                                        value="{{ old('tanggal_kejadian') ?? ($data->tanggal_kejadian ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('tanggal_kejadian')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-7 mb-3">
                                    <label for="nama_pengadu" class="form-label">Nama Pengadu</label>
                                    <input type="text" class="form-control" id="nama_pengadu" name="nama_pengadu"
                                        value="{{ old('nama_pengadu') ?? ($data->nama_pengadu ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nama_pengadu')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="nama_korban" class="form-label">Nama Korban</label>
                                    <input type="text" class="form-control" id="nama_korban" name="nama_korban"
                                        value="{{ old('nama_korban') ?? ($data->nama_korban ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nama_korban')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="nama_pelaku" class="form-label">Nama Pelaku</label>
                                    <input type="text" class="form-control" id="nama_pelaku" name="nama_pelaku"
                                        value="{{ old('nama_pelaku') ?? ($data->nama_pelaku ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nama_pelaku')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="jk_korban" class="form-label">Jenis Kelamin Korban</label>
                                    <select name="jk_korban" id="jk_korban" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option selected hidden>Pilih</option>

                                        <option value="Wanita"
                                            {{ old('jk_korban', $data->jk_korban ?? '') == 'Wanita' ? 'selected' : '' }}>
                                            Wanita
                                        </option>
                                        <option value="Pria"
                                            {{ old('jk_korban', $data->jk_korban ?? '') == 'Pria' ? 'selected' : '' }}>
                                            Pria
                                        </option>
                                    </select>

                                    @error('jk_korban')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-7 mb-3">
                                    <label class="form-label">Lokasi Kejadian</label>
                                    <textarea name="lokasi_kejadian" class="form-control" rows="3" @if (Request::segment(3) == 'detail') disabled @endif>{{ old('lokasi_kejadian', $data->lokasi_kejadian ?? '') }}</textarea>
                                    @error('lokasi_kejadian')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label class="form-label">Deskripsi Singkat</label>
                                    <textarea name="deskripsi_singkat" class="form-control" rows="3"
                                        @if (Request::segment(3) == 'detail') disabled @endif>{{ old('deskripsi_singkat', $data->deskripsi_singkat ?? '') }}</textarea>
                                    @error('deskripsi_singkat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="bukti_gambar" class="form-label">Bukti Gambar</label>
                                    <p>
                                        @if (isset($data) && $data->bukti_gambar)
                                            <a href="{{ asset('storage/' . $data->bukti_gambar) }}" target="_blank"
                                                class="btn btn-dark btn-sm">Lihat File</a>
                                        @endif
                                    </p>
                                    <input type="file" class="form-control" id="bukti_gambar" name="bukti_gambar"
                                        value="{{ old('bukti_gambar') ?? ($data->bukti_gambar ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('bukti_gambar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="no_hp" class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ old('no_hp') ?? ($data->no_hp ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('no_hp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                @if (isset($data))
                                    <div class="col-md-7 mb-3">
                                        <label for="user_id" class="form-label">User Pelapor</label>
                                        <input type="text" disabled class="form-control" id="user_id"
                                            name="user_id" value="{{ $data->user->email ?? '' }}"
                                            @if (Request::segment(3) == 'detail') disabled @endif>
                                        @error('user_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @else
                                    <div class="col-md-7 mb-3">
                                        <label for="user_id" class="form-label">User Pelapor</label>
                                        <input type="text" disabled class="form-control" id="user_id"
                                            name="user_id" value="{{ Auth::user()->email ?? '' }}"
                                            @if (Request::segment(3) == 'detail') disabled @endif>
                                        @error('user_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endif


                                @if (Auth::user()->hasAnyRole(['admindinas']))
                                    <div class="col-md-7 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select"
                                            @if (Request::segment(3) == 'detail') disabled @endif>
                                            <option selected hidden>Pilih</option>

                                            <option value="Diterima"
                                                {{ old('status', $data->status ?? '') == 'Diterima' ? 'selected' : '' }}>
                                                Diterima
                                            </option>
                                            <option value="Tidak diterima"
                                                {{ old('status', $data->status ?? '') == 'Tidak diterima' ? 'selected' : '' }}>
                                                Tidak diterima
                                            </option>
                                        </select>

                                        @error('jk_korban')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endif





                            </div>
                            <div class="col-md-12 mb-3 mx-auto">


                                @if (!Auth::user()->hasAnyRole(['petugas', 'kepaladinas']))
                                    @if (Request::segment(3) == 'detail')
                                        {{-- @if (!Auth::user()->hasAnyRole(['mahasiswa', 'dosen'])) --}}
                                        <a href="{{ route('dashboard.pengaduan.ubah', $data->id) }}"
                                            class="btn btn-dark text-white">
                                            <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                                        {{-- @endif --}}
                                    @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'pengaduan')
                                        <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                                class="menu-icon tf-icons bx bx-save"></i></button>
                                    @endif
                                @endif

                                <a href="{{ route('dashboard.pengaduan') }}" class="btn btn-dark text-white"> KEMBALI
                                </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
