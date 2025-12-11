@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">

                <div class="card">
                    <h5 class="card-header">Data Pengaduan </h5>
                    <div class="table-responsive text-nowrap p-3">
                        <div class="row">
                            <div class="col-6 my-3">

                                <a class="btn btn-primary" href="{{ route('dashboard.pengaduan.tambah') }}">Tambah Data
                                    Pengaduan <i class="bx bx-plus me-1"></i></a>
                            </div>
                            <div class="col-6 my-3">
                                @include('admin.layout.search')
                            </div>

                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead class="">
                            <tr class="bg-primary ">
                                <th class="text-white text-center  p-3 fw-bolder" width="10px" hight="10px">No</th>
                                <th class="text-white text-center  p-3 fw-bolder">Judul</th>
                                <th class="text-white text-center  p-3 fw-bolder">Tanggal Kejadian</th>
                                <th class="text-white text-center  p-3 fw-bolder">Pengadu</th>
                                <th class="text-white text-center  p-3 fw-bolder">Pelaku</th>
                                <th class="text-white text-center  p-3 fw-bolder"></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse($datas as $data)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td class="fw-bolder"> <a
                                            href="{{ route('dashboard.pengaduan.ubah', $data->id) }}">{{ $data->judul_pengaduan }}</a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($data->tanggal_kejadian)->translatedFormat('d - m - Y') }}</td>

                                    <td>{{ $data->nama_pengadu }}</td>
                                    <td>{{ $data->nama_pelaku }}</td>

                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.pengaduan.detail', $data->id) }}">
                                                    <i class="bx bx-box me-1"></i> Detail</a>


                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.pengaduan.ubah', $data->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Ubah</a>

                                                <form action="{{ route('dashboard.pengaduan.hapus', $data->id) }}"
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center"> Data tidak ditemukan</td>
                                </tr>
                            @endforelse




                        </tbody>
                    </table>
                    <div class=" mt-3">
                        {{ $datas->links() }}
                    </div>
                </div>
            </div>
            <!-- Bootstrap Table with Header - Light -->

        </div>
    </div>
@endsection
