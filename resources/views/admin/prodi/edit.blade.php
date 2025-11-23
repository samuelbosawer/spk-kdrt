

     
@extends('admin.layout.tamplate')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

  <div class="row ">
    <div class="col-12">
        <div class="row">
          <div class="card mb-4">
            <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-box"></i> DATA PRODI</h5>
            <div class="card-body">
               <form action="">
                  <div class="col-md-12 mb-3">
                    <label for="nama" class="form-label">Nama Program Studi</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') ?? $data->nama ?? '' }}" >
                   </div>
                   <div class="col-md-12 mb-3">
                     <label for="visi" class="form-label">Visi</label>
                      <textarea class="form-control" id="visi" rows="3">{{ old('visi') ?? $data->visi ?? ''}}</textarea>
                   </div>
                   <div class="col-md-12 mb-3">
                     <label for="misi" class="form-label">MIsi</label>
                      <textarea class="form-control" id="misi" name="misi" rows="3">{{ old('misi') ?? $data->misi ?? ''}}</textarea>
                   </div>
                    <div class="col-md-12 mb-3">
                     <label for="sejarah" class="form-label">Sejarah</label>
                      <textarea class="form-control" id="sejarah" name="sejarah" rows="3">{{ old('sejarah') ?? $data->sejarah ?? ''}}</textarea>
                   </div>
                    <div class="col-md-12 mb-3">
                     <label for="sejarah" class="form-label">Sturktur</label>
                     <input type="file" class="form-control" id="struktur" name="struktur" value="{{ old('struktur') ?? $data->struktur ?? '' }}">
                      <a class="btn btn-primary text-white btn-sm mt-2" href="{{ old('struktur') ?? $data->struktur ?? ''}}">Lihat file</a>
                   </div>

                   <div class="col-md-12 mb-3 mx-auto">
                       <a href="{{ route('dashboard.prodi.ubah', $data->id) }}" class="btn btn-dark text-white"> <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                   </div>
                   
                   
               </form>
            </div>
        </div>
      
    </div>
  </div>

@endsection
      