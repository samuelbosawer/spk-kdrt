@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">

                <div class="card">
                    <h5 class="card-header">Nilai Awal Perhitungan </h5>

                    <div class="row">
                        <div class="col-md-6 p-3">
                            <div class="table-responsive p-3">
                                <p class="fw-bolder">Data Kriteria</p>
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr class="bg-primary ">
                                            <th class="text-white text-center  p-3 fw-bolder" width="10px" hight="10px">
                                                Kode </th>
                                            <th class="text-white text-center  p-3 fw-bolder">Kriteria</th>
                                            <th class="text-white text-center  p-3 fw-bolder">Jenis Faktor</th>
                                            <th class="text-white text-center  p-3 fw-bolder">Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($kriteria as $k)
                                            <tr>
                                                <td> C{{ $k->id }} </td>
                                                <td>{{ $k->kriteria }}</td>
                                                <td>{{ $k->jenis_faktor }}</td>
                                                <td>{{ $k->bobot }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>


                        </div>

                        <div class="col-md-6 p-3">
                            <div class="table-responsive p-3">
                                <p class="fw-bolder">Data Alternatif</p>
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr class="bg-primary ">
                                            <th class="text-white text-center  p-3 fw-bolder">Alternatif</th>
                                            <th class="text-white text-center  p-3 fw-bolder">Nilai Ideal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td>{{ $a->alternatif }}</td>
                                                <td>{{ $a->nilai_ideal_alternatif }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>




                        {{-- Penilai kasus --}}

                        <div class="col-md-6 p-3">
                            <div class="table-responsive p-3">
                                <p class="fw-bolder">Data Penilaian Kasus</p>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th class="text-white text-center">Kasus</th>

                                            @foreach ($alternatif as $alt)
                                                <th class="text-white text-center">
                                                    C{{ $alt->id }}
                                                </th>
                                            @endforeach


                                        </tr>
                                    </thead>

                                    @forelse($nilai as $data)
                                        <tr>


                                            {{-- Kode Kasus --}}
                                            <td class="fw-bold text-center">
                                                K{{ $data->id }}
                                            </td>

                                            {{-- Loop Alternatif (C1–C4) --}}
                                            @foreach ($alternatif as $alt)
                                                <td class="text-center">
                                                    {{ optional($data->nilaiKasus->where('alternatif_id', $alt->id)->first())->nilai_kasus ?? '-' }}
                                                </td>
                                            @endforeach


                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="{{ 3 + $alternatif->count() }}" class="text-center">
                                                Data tidak ditemukan
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>


                         <div class="col-md-6 p-3">
                            <div class="table-responsive p-3">
                                <p class="fw-bolder">Konversi GAP</p>
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr class="bg-primary ">
                                            <th class="text-white text-center  p-3 fw-bolder">GAP</th>
                                            <th class="text-white text-center  p-3 fw-bolder">Bobot_W</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($konversi as $a )
                                        <tr>
                                            <td>{{ $a->nilai_gap }}</td>
                                            <td>{{ $a->bobot_w }}</td>
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
