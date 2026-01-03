@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">

                <div class="card">
                   

                      <div class="row">
                          <div class="col-12 p-3">
                            <h5 class="p-3">Pengajuan Kasus </h5>
                            <div class=" p-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-primary  text-center fw-bold">
                                            <th class="text-white" width="10">No</th>

                                           
                                            <th class="text-white">Pengaduan</th>
                                            <th class="text-white">Rekomendasi</th>
                                            <th class="text-white">Status</th>
                                            <th class="text-white"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($pengajuan as $p )
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $p->pengaduan->judul_pengaduan}}</td>
                                            <td>{{ $p->rekomendasi}}</td>
                                            <td>{{ $p->status}}</td>
                                            
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.pengajuan.detail', $p->id) }}">
                                                    <i class="bx bx-box me-1"></i> PDF</a>

                                                <form action="{{ route('dashboard.pengajuan.hapus', $p->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="bx bx-trash me-1"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </td>
                                        @empty
                                            <td colspan="6" class="text-center">Data tidak ada </td>
                                        @endforelse
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>


                    <div class="row">

                       <div class="col-12 p-3">
                            <h5 class="p-3">Rekomendasi Kasus </h5>
                            <div class="table-responsive p-3">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-primary  text-center fw-bold">
                                            <th class="text-white">Kasus</th>

                                            @foreach ($alternatif as $alt)
                                                <th class="text-white">{{ $alt->alternatif }}</th>
                                            @endforeach

                                            <th class="text-white">Nilai Tertinggi</th>
                                            <th class="text-white">Rekomendasi</th>
                                            <th class="text-white"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($nilai as $kasus)
                                            <tr class="text-center">
                                                <td class="fw-bold">K{{ $kasus->id }}</td>

                                                @foreach ($alternatif as $alt)
                                                    <td>
                                                        {{ number_format($ringkasan[$kasus->id]['nilai'][$alt->id], 2) }}
                                                    </td>
                                                @endforeach

                                                <td class="fw-bold bg-light">
                                                    {{ number_format($ringkasan[$kasus->id]['max'], 2) }}
                                                </td>

                                                <td class="fw-bold text-success">
                                                    {{ $ringkasan[$kasus->id]['rekomendasi'] }}
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('dashboard.pengajuan.tambah', $kasus->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        Buat Pengajuan
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- Bootstrap Table with Header - Light -->

            </div>
        </div>
    @endsection
