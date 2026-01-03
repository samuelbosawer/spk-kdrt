@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-file"></i>
                            {{ $judul ?? 'TAMBAH DATA NILAI PENGADUAN' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'nilai')
                                <form action="{{ route('dashboard.nilai.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'nilai')
                                    <form action="{{ route('dashboard.nilai.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif


                            <div class="row mt-3  p-3 rounded">

                                <div class="col-md-7 mb-3">
                                    <label class="form-label">Pengaduan</label>
                                    <select name="pengaduan_masyarakat_id" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option selected hidden>Pilih</option>

                                        @foreach ($pengaduan as $p)
                                            <option value="{{ $p->id }}"
                                                {{ old('pengaduan_masyarakat_id', $data[0]->pengaduan_masyarakat_id ?? '') == $p->id ? 'selected' : '' }}>
                                                {{ $p->judul_pengaduan }} (K{{ $p->id }})
                                            </option>
                                        @endforeach
                                    </select>

                               
                                    @error('pengaduan_masyarakat_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>



                            @foreach ($alternatifs as $index => $a)
                            @dump($a->id)
                                <div class="row mt-3 p-3 rounded shadow">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alternatif</label>
                                        <input type="text" class="form-control" value="{{ $a->alternatif }}" disabled>

                                        <input type="hidden" name="alternatif_id[]" value="{{ $a->id }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nilai Ideal {{ $a->alternatif }}</label>
                                        <input type="text" class="form-control" name="nilai_kasus[]"
                                            value="{{ old('nilai_kasus.' . $loop->index, $data[$a->id]->nilai_kasus ?? '') }}"
                                            @if (Request::segment(3) == 'detail') disabled @endif>

                                        @error('nilai_kasus.' . $loop->index)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>

                      

                            @endforeach

                            <div class="col-md-12 mb-3 mx-auto mt-5">
                                @if (Request::segment(3) == 'detail')
                                    <a href="{{ route('dashboard.nilai.ubah', $data[0]->pengaduan_masyarakat_id) }}" class="btn btn-dark ">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'nilai')
                                    <button type="submit" class="btn btn-primary ">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif

                                <a href="{{ route('dashboard.nilai') }}" class="btn btn-dark text-white "> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
