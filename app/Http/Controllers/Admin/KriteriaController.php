<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
     // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = Kriteria::whereNotNull('kode')
        ->when($request->s, function ($query) use ($request) {
            $s = $request->s;

            $query->where(function ($q) use ($s) {
                $q->where('kode', 'LIKE', '%' . $s . '%')
                ->orWhere('kriteria', 'LIKE', '%' . $s . '%')
                ->orWhere('jenis_faktor', 'LIKE', '%' . $s . '%')
                ->orWhere('bobot', 'LIKE', '%' . $s . '%');
                });
            })
            ->orderBy('id','desc')
            ->paginate(7);
        return view('admin.kriteria.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }


    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.kriteria.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
       $validated = $request->validate([
            'kode' => 'required|max:4',
            'kriteria'     => 'required|string',
            'jenis_faktor'     => 'required|string',
            'bobot'         => 'required|numeric',
        ]);


        Kriteria::create($validated);

        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.kriteria');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $judul = "DETAIL KRITERIA";
        $data = Kriteria::where('id',$id)->first();
        return view('admin.kriteria.create-update-show', compact('judul','data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $judul = "UBAH KRITERIA";
        $data = Kriteria::where('id',$id)->first();
        return view('admin.kriteria.create-update-show', compact('judul','data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
         $data = Kriteria::findOrFail($id);
        $validated = $request->validate([
            'kode' => 'required|max:4',
            'kriteria'     => 'required|string',
            'jenis_faktor'     => 'required|string',
            'bobot'         => 'required|numeric',
        ]);

        $data->update($validated);
        Alert::success('Berhasil', 'Update data berhasil');
        return redirect()->route('dashboard.kriteria');
    }

    // Hapus data
    public function destroy($id)
    {
        $data = Kriteria::findOrFail($id);

        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dashboard.kriteria');
    }
}
