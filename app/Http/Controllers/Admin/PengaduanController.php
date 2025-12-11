<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengaduanMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
     // Tampilkan semua data
    public function index(Request $request)
    {
          $datas = PengaduanMasyarakat::with('user')->whereNotNull('judul_pengaduan')
        ->when($request->s, function ($query) use ($request) {
            $s = $request->s;
            $query->where(function ($q) use ($s) {
                $q->where('nama_pengadu', 'LIKE', '%' . $s . '%')
                ->orWhere('nama_korban', 'LIKE', '%' . $s . '%')
                ->orWhere('judul_pengaduan', 'LIKE', '%' . $s . '%')
                ->orWhere('nama_pelaku', 'LIKE', '%' . $s . '%')
                ->orWhere('jk_korban', 'LIKE', '%' . $s . '%')
                ->orWhere('lokasi_kejadian', 'LIKE', '%' . $s . '%')
                ->orWhere('deskripsi_singkat', 'LIKE', '%' . $s . '%')
                ->orWhere('tanggal_kejadian', 'LIKE', '%' . $s . '%')
                ->orWhere('tanggal_kejadian', 'LIKE', '%' . $s . '%');
                });
            })
            ->orderBy('id','desc')
            ->paginate(7);
        return view('admin.pengaduan.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.pengaduan.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_pengaduan' => 'required|max:255',
            'nama_pengadu'     => 'required',
            'nama_korban'     => 'required',
            'nama_pelaku'     => 'required',
            'jk_korban'     => 'required',
            'lokasi_kejadian'     => 'required',
            'deskripsi_singkat'     => 'required',
            'bukti_gambar'          => 'required|file|mimes:pdf,doc,docx,jpg,png',
            'tanggal_kejadian'         => 'required',
            'no_hp'         => 'required',
        ]);

        // Upload file SK
        if ($request->hasFile('bukti_gambar')) {
            $validated['bukti_gambar'] = $request->file('bukti_gambar')->store('bukti_gambar', 'public');
        }

        $validated['user_id'] = Auth::user()->id;

        PengaduanMasyarakat::create($validated);
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.pengaduan');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
         $judul = 'DETAIL DATA PENGADUAN';
        $data =   PengaduanMasyarakat::where('id',$id)->first();
         return view('admin.pengaduan.create-update-show', compact('judul','data'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
         $judul = 'UBAH DATA PENGADUAN';
        $data =   PengaduanMasyarakat::where('id',$id)->first();
         return view('admin.pengaduan.create-update-show', compact('judul','data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $data = PengaduanMasyarakat::findOrFail($id);
         $validated = $request->validate([
            'judul_pengaduan' => 'required|max:255',
            'nama_pengadu'     => 'required',
            'nama_korban'     => 'required',
            'nama_pelaku'     => 'required',
            'jk_korban'     => 'required',
            'lokasi_kejadian'     => 'required',
            'deskripsi_singkat'     => 'required',
            'bukti_gambar'          => 'required|file|mimes:pdf,doc,docx,jpg,png',
            'tanggal_kejadian'         => 'required',
            'no_hp'         => 'required',
        ]);


         // Jika ada upload file baru
        if ($request->hasFile('bukti_gambar')) {

            // Hapus file lama
            if (!empty($data->bukti_gambar) && Storage::disk('public')->exists($data->bukti_gambar)) {
                Storage::disk('public')->delete($data->bukti_gambar);
            }

            // Upload file baru
            $validated['bukti_gambar'] = $request->file('bukti_gambar')->store('bukti_gambar', 'public');
        } else {
            // Jika tidak upload baru, tetap pakai file lama
            $validated['bukti_gambar'] = $data->sk;
        }

        $data->update($validated);
        Alert::success('Berhasil', 'Ubah data berhasil');
        return redirect()->route('dashboard.pengaduan');

    }

    // Hapus data
    public function destroy($id)
    {
        $data = PengaduanMasyarakat::findOrFail($id);

        // Hapus file SK jika ada
        if (!empty($data->bukti_gambar) && Storage::disk('public')->exists($data->bukti_gambar)) {
            Storage::disk('public')->delete($data->bukti_gambar);
        }

        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dashboard.pengaduan');
    }
}
