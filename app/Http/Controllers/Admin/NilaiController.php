<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiKasus;
use App\Models\PengaduanMasyarakat;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {

        $kriteria = Kriteria::orderBy('id')->get();
        $datas = PengaduanMasyarakat::with('nilaiKasus')->where('status','Diterima')->get();

        return view('admin.nilai.index', compact('datas', 'kriteria'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        $kriteria = Kriteria::orderBy('id')->get();
        $pengaduan = PengaduanMasyarakat::with('nilaiKasus')->where('status','Diterima')->get();

        return view('admin.nilai.create-update-show', compact('kriteria', 'pengaduan'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'pengaduan_masyarakat_id' => 'numeric|required|unique:nilai_kasuses,pengaduan_masyarakat_id',
            'kriteria_id'           => 'required|array',
            'nilai_kasus'             => 'required|array',
            'nilai_kasus.*'           => 'required',
        ]);

        foreach ($request->kriteria_id as $index => $alternatifId) {
            NilaiKasus::create([
                'pengaduan_masyarakat_id'   => $request->pengaduan_masyarakat_id,
                'kriteria_id'             => $alternatifId,
                'nilai_kasus'           => $request->nilai_kasus[$index],
            ]);
        };


        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.nilai');
    }

    public function show($id)
    {
        return redirect()->route('dashboard.nilai');

    }

    // Tampilkan form edit data
    public function edit($id)
    {
        
    }

    // Update data
    public function update(Request $request, $id)
    {
        return redirect()->route('dashboard.nilai');
    }

    // Hapus data
    public function destroy($id)
    {
        $data = NilaiKasus::where('pengaduan_masyarakat_id', $id);
        $data->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dashboard.nilai');
    }
}
