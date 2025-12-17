@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">

                <div class="card">
                    <h5 class="card-header">Data Nilai Kasus </h5>
                    <div class="table-responsive text-nowrap p-3">
                        <div class="row">
                            <div class="col-6 my-3">

                                <a class="btn btn-primary" href="{{ route('dashboard.nilai.tambah') }}">Tambah Data Nilai
                                    Kasus <i class="bx bx-plus me-1"></i></a>
                            </div>


                        </div>


                             <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th class="text-white text-center">Kasus</th>

                                @foreach ($alternatifs as $alt)
                                    <th class="text-white text-center">
                                        C{{ $alt->id }}
                                    </th>
                                @endforeach

                                <th class="text-white text-center">Aksi</th>
                            </tr>
                        </thead>
                     
                        @forelse($datas as $data)
                            <tr>
                               

                                {{-- Kode Kasus --}}
                                <td class="fw-bold text-center">
                                    K{{ $data->id }}
                                </td>

                                {{-- Loop Alternatif (C1–C4) --}}
                                @foreach ($alternatifs as $alt)
                                    <td class="text-center">
                                        {{ optional($data->nilaiKasus->where('alternatif_id', $alt->id)->first())->nilai_kasus ?? '-' }}
                                    </td>
                                @endforeach

                                {{-- Aksi --}}
                                <td class="text-center">
                                    {{-- <a href="#" class="btn btn-sm btn-info"></a> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ 3 + $alternatifs->count() }}" class="text-center">
                                    Data tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    </div>


                </div>
            </div>
            <!-- Bootstrap Table with Header - Light -->

        </div>
    </div>
@endsection
