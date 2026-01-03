<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\PendampinganKasus;
use App\Models\PengaduanMasyarakat;
use App\Models\PentugasPendamping;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendampinganController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = PendampinganKasus::with([
            'petugasPendamping',
            'pengaduanMasyarakat'

        ])
            ->whereNotNull('tanggal_pendampingan')
            ->when($request->s, function ($query) use ($request) {

                $s = $request->s;

                $query->where(function ($q) use ($s) {

                    // Pencarian di tabel pendampingan_kasuses
                    $q->where('tanggal_pendampingan', 'LIKE', "%$s%");

                    // Pencarian relasi: petugasPendamping
                    $q->orWhereHas('petugasPendamping', function ($q2) use ($s) {
                        $q2->where('nama_petugas', 'LIKE', "%$s%")
                            ->orWhere('nip', 'LIKE', "%$s%");
                    });

                    // Pencarian relasi: pengaduanMasyarakat
                    $q->orWhereHas('pengaduanMasyarakat', function ($q2) use ($s) {
                        $q2->where('judul_pengaduan', 'LIKE', "%$s%")
                            ->orWhere('nama_pengadu', 'LIKE', "%$s%")
                            ->orWhere('nama_pelaku', 'LIKE', "%$s%")
                            ->orWhere('nama_korban', 'LIKE', "%$s%");
                    });
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);

        return view('admin.pendampingan.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {

        $petugas = PentugasPendamping::orderBy('id', 'desc')->get();
        $pengaduan = PengaduanMasyarakat::orderBy('id', 'desc')->get();

        return view('admin.pendampingan.create-update-show', compact('petugas', 'pengaduan'));
    }

    // Simpan data baru
    public function store(Request $request)
    {

        $validated = $request->validate([
            'tanggal_pendampingan'     => 'required',
            'petugas_pendamping_id'         => 'required',
            'pengaduan_masyarakat_id'         => 'required',
            'keterangan'                => 'nullable',
            'bukti'          => 'file|mimes:pdf,doc,docx,jpg,png',
        ]);

        // Upload file bukti
        if ($request->hasFile('bukti')) {
            $validated['bukti'] = $request->file('bukti')->store('pendampingan/bukti', 'public');
        }

        PendampinganKasus::create($validated);
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.pendampingan');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $petugas = PentugasPendamping::orderBy('id', 'desc')->get();
        $pengaduan = PengaduanMasyarakat::orderBy('id', 'desc')->get();
        $data = PendampinganKasus::where('id', $id)->first();
        $judul = 'DETAIL DATA PENDAMPINGAN';
        return view('admin.pendampingan.create-update-show', compact('petugas', 'pengaduan','data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $petugas = PentugasPendamping::orderBy('id', 'desc')->get();
        $pengaduan = PengaduanMasyarakat::orderBy('id', 'desc')->get();
       
        $data = PendampinganKasus::where('id', $id)->first();

        $judul = 'UBAH DATA PENDAMPINGAN';
        return view('admin.pendampingan.create-update-show', compact('petugas', 'pengaduan', 'data', 'judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $data = PendampinganKasus::findOrFail($id);
        $validated = $request->validate([
            'tanggal_pendampingan'     => 'required',
            'petugas_pendamping_id'         => 'required',
            'pengaduan_masyarakat_id'         => 'required',
            'keterangan' => 'nullable',
            'bukti'          => 'file|mimes:pdf,doc,docx,jpg,png',
        ]);

        if ($request->hasFile('bukti')) {
            // Hapus file lama jika ada
            if ($request->bukti && \Storage::disk('public')->exists($request->bukti)) {
                \Storage::disk('public')->delete($request->bukti);
            }
            // Upload file baru
            $validated['bukti'] = $request->file('bukti')->store('pendampingan/bukti', 'public');
        }

        $data->update($validated);
        Alert::success('Berhasil', 'Ubah data berhasil');
        return redirect()->route('dashboard.pendampingan');
    }

    // Hapus data
    public function destroy($id)
    {
        $data = PendampinganKasus::findOrFail($id);
        $data->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dashboard.pendampingan');
    }
}
