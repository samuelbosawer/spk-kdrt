<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Konversi;
use App\Models\Kriteria;
use App\Models\PengaduanMasyarakat;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
     // Tampilkan semua data
    public function index()
    {
        $kriteria = Kriteria::get();
        $alternatif = Alternatif::orderBy('id')->get();
        $nilai = PengaduanMasyarakat::with('nilaiKasus')->get();
        $konversi = Konversi::get();
        return view('admin.rekomendasi.index', compact('kriteria','alternatif','nilai','konversi'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.rekomendasi.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        //
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        return view('admin.rekomendasi.create-update-show');
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        return view('admin.rekomendasi.create-update-show');
    }

    // Update data
    public function update(Request $request, $id)
    {
        //
    }

    // Hapus data
    public function destroy($id)
    {
        //
    }
}
