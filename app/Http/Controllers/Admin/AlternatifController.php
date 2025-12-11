<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class AlternatifController extends Controller
{
     // Tampilkan semua data
    public function index(Request $request)
    {
         $datas = Alternatif::whereNotNull('alternatif')
        ->when($request->s, function ($query) use ($request) {
            $s = $request->s;

            $query->where(function ($q) use ($s) {
                $q->where('alternatif', 'LIKE', '%' . $s . '%')
                ->orWhere('nilai_ideal_alternatif', 'LIKE', '%' . $s . '%');
                });
            })
            ->orderBy('id','desc')
            ->paginate(7);
        return view('admin.alternatif.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.alternatif.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
         $validated = $request->validate([
            'alternatif'     => 'required|string',
            'nilai_ideal_alternatif'         => 'required|numeric',
        ]);


        Alternatif::create($validated);
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.alternatif');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $judul = 'DETAIL ALTERNATIF';
        $data = Alternatif::where('id',$id)->first();
        return view('admin.alternatif.create-update-show',compact('judul','data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
         $judul = 'UBAH ALTERNATIF';
         $data = Alternatif::where('id',$id)->first();
         return view('admin.alternatif.create-update-show',compact('judul','data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $data = Alternatif::findOrFail($id);
        $validated = $request->validate([
            'alternatif'     => 'required|string',
            'nilai_ideal_alternatif'         => 'required|numeric',
        ]);

        $data->update($validated);
        Alert::success('Berhasil', 'Update data berhasil');
        return redirect()->route('dashboard.alternatif');
    }

    // Hapus data
    public function destroy($id)
    {
        $data = Alternatif::findOrFail($id);
        $data->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dashboard.alternatif');
    }

}
