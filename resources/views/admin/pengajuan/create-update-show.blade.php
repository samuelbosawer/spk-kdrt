@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl container-p-y">

        <div class="card">
            <h5 class="card-header fw-bold">Tambah Pengajuan Kasus</h5>

            <div class="card-body">
                <form action="{{ route('dashboard.pengajuan.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="pengaduan_id" value="{{ $kasus->id }}">

                    <div class="mb-3">
                        <label class="form-label">Kode Kasus</label>
                        <input type="text" class="form-control" value="K{{ $kasus->id }}" disabled>
                        <input type="text" name="pengaduan_id" value="{{ $kasus->id }}" hidden>

                        @error('pengaduan_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- <input type="" name="alternatif_id" value="{{ $alternatifId }}"> --}}

                    <div class="mb-3">
                        <label class="form-label">Rekomendasi Sistem</label>
                        <input  type="text" class="form-control fw-bold " value="{{ $alternatifNm }}"
                            disabled>

                             <input name="rekomendasi" type="text" class="form-control fw-bold " value="{{ $alternatifNm }}"
                            hidden>

                        @error('rekomendasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>




                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select"
                            @if (Request::segment(3) == 'detail') disabled @endif>
                            <option selected value="" hidden>Pilih</option>

                            <option value="Tindak Lanjut"
                                {{ old('status', $data->status ?? '') == 'Tindak lanjut' ? 'selected' : '' }}>
                                Tindak lanjut
                            </option>
                            <option value="Pencabutan kasus"
                                {{ old('status', $data->status ?? '') == 'Pencabutan kasus' ? 'selected' : '' }}>
                                Pencabutan kasus
                            </option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>

                        @error('keterangan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button class="btn btn-primary">
                            Simpan Pengajuan
                        </button>
                        <a href="{{ route('dashboard.pengajuan') }}" class="btn btn-dark">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
