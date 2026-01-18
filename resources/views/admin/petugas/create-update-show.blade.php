@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-user"></i>
                            {{ $judul ?? 'TAMBAH DATA PETUGAS' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'petugas')
                                <form action="{{ route('dashboard.petugas.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'petugas')
                                    <form action="{{ route('dashboard.petugas.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-7 mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="text" class="form-control" id="nip" name="nip"
                                        value="{{ old('nip') ?? ($data->nip ?? '') }}"
                                        @if (Request::segment(3) == 'detail' ||  (Request::segment(4) == 'ubah' ) )disabled @endif>
                                    @error('nip')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="nama_petugas" class="form-label">Nama Petugas</label>
                                    <input type="teks" class="form-control" id="nama_petugas" name="nama_petugas"
                                        value="{{ old('nama_petugas') ?? ($data->nama_petugas ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nama_petugas')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                 <div class="col-md-7 mb-3">
                                    <label for="no_hp" class="form-label">Nomor HP</label>
                                    <input type="teks" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ old('no_hp') ?? ($data->no_hp ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('no_hp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-7 mb-3">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option selected hidden>Pilih</option>
                                      
                                            <option value="Wanita"
                                                {{ old('jk', $data->jk ?? '') == 'Wanita' ? 'selected' : '' }}>
                                                Wanita
                                            </option>
                                             <option value="Pria"
                                                {{ old('jk', $data->jk ?? '') == 'Pria' ? 'selected' : '' }}>
                                                Pria
                                            </option>
                                    </select>
                                    @error('jk')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                  <div class="col-md-7 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3" @if (Request::segment(3) == 'detail') disabled @endif>{{ old('alamat', $data->alamat ?? '') }}</textarea>
                                    @error('alamat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                   @if (!Auth::user()->hasAnyRole(['petugas', 'kepaladinas']))
                                @if (isset($data))

                                <div class="col-md-10">
                                    <p class="p-2 rounded bg-primary text-white fw-bold">AKSES AKUN PETUGAS</p>
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label for="user_id" class="form-label">User </label>
                                    <input type="text" disabled class="form-control" id="user_id" name="user_id"
                                        value="{{ $data->user->email ?? ''}}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('user_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                   <div class="col-md-5 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value=""
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                  <div class="col-md-5 mb-3">
                                    <label for="password_confirmation" class="form-label">Ulangi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                        value=""
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                    
                                @else

                             
                                <div class="col-md-10">
                                    <p class="p-2 rounded bg-primary text-white fw-bold">AKSES AKUN PETUGAS</p>
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="teks" class="form-control" id="email" name="email"
                                        value="{{ old('email') ?? ($data->email ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                  <div class="col-md-5 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value=""
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                  <div class="col-md-5 mb-3">
                                    <label for="password_confirmation" class="form-label">Ulangi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                        value=""
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                @endif
                                @endif

                                 





                               

                            </div>
                            <div class="col-md-12 mb-3 mx-auto">
                                @if (!Auth::user()->hasAnyRole(['petugas', 'kepaladinas']))
                                @if (Request::segment(3) == 'detail')
                                    <a href="{{ route('dashboard.petugas.ubah', $data->id) }}" class="btn btn-dark text-white">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                                        @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'petugas')
                                        <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                            @endif
                                            @endif

                                <a href="{{ route('dashboard.petugas') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
