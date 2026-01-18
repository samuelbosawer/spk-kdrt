@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">

                <div class="card">
                    <h5 class="card-header">Nilai Perhitungan Pengaduan {{ $pengaduan->judul_pengaduan ?? '' }} </h5>

                    <div class="row">
                      
                        <div class="col-12 p-3">
                            <div class="table-responsive p-3">
                                <p class="fw-bolder">Perhitungan Profile Matching</p>

                                @foreach ($nilai as $kasus)
                                    <p class="fw-bold mt-4">Kasus K{{ $kasus->id }}</p>

                                    <table class="table table-bordered mb-4">
                                        <thead>
                                            <tr class="bg-primary text-white text-center">
                                                <th>Alternatif</th>

                                                @foreach ($kriteria as $k)
                                                    <th>C{{ $k->id }}</th>
                                                @endforeach

                                                <th>CF</th>
                                                <th>SF</th>
                                                <th>Nilai Akhir</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($alternatif as $alt)
                                                <tr>
                                                    <td class="fw-bold">{{ $alt->alternatif }}</td>

                                                    @foreach ($kriteria as $k)
                                                        <td class="text-center">
                                                            {{ $hasil[$kasus->id][$alt->id]['bobot'][$k->id] ?? '-' }}
                                                        </td>
                                                    @endforeach

                                                    <td class="text-center fw-bold">
                                                        {{ $hasil[$kasus->id][$alt->id]['cf'] }}
                                                    </td>
                                                    <td class="text-center fw-bold">
                                                        {{ $hasil[$kasus->id][$alt->id]['sf'] }}
                                                    </td>
                                                    <td class="text-center fw-bold bg-light">
                                                        {{ $hasil[$kasus->id][$alt->id]['nilai_akhir'] }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                        </div>


                        <div class="col-12 p-3">
                            <div class="table-responsive p-3">
                                <p class="fw-bolder">Ringkasan Hasil Rekomendasi</p>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-primary  text-center fw-bold">
                                            <th class="text-white">Kasus</th>

                                            @foreach ($alternatif as $alt)
                                                <th class="text-white">{{ $alt->alternatif }}</th>
                                            @endforeach

                                            <th class="text-white">Nilai Tertinggi</th>
                                            <th class="text-white">Rekomendasi</th>
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
