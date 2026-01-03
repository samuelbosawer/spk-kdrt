<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\NilaiKasus;
use App\Models\PengaduanMasyarakat;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {

        $alternatifs = Alternatif::orderBy('id')->get();
        $datas = PengaduanMasyarakat::with('nilaiKasus')->get();

        return view('admin.nilai.index', compact('datas', 'alternatifs'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        $alternatifs = Alternatif::orderBy('id')->get();
        $pengaduan = PengaduanMasyarakat::get();

        return view('admin.nilai.create-update-show', compact('alternatifs', 'pengaduan'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'pengaduan_masyarakat_id' => 'numeric|required|unique:nilai_kasuses,pengaduan_masyarakat_id',
            'alternatif_id'           => 'required|array',
            'nilai_kasus'             => 'required|array',
            'nilai_kasus.*'           => 'required',
        ]);

        foreach ($request->alternatif_id as $index => $alternatifId) {
            NilaiKasus::create([
                'pengaduan_masyarakat_id'   => $request->pengaduan_masyarakat_id,
                'alternatif_id'             => $alternatifId,
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
