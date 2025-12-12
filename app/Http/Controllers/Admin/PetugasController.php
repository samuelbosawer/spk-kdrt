<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendampinganKasus;
use App\Models\PentugasPendamping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class PetugasController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $datas = PentugasPendamping::with('user')->whereNotNull('nip')
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {
                    $q->where('alternatif', 'LIKE', '%' . $s . '%')
                        ->orWhere('nama_petugas', 'LIKE', '%' . $s . '%')
                        ->orWhere('jk', 'LIKE', '%' . $s . '%')
                        ->orWhere('alamat', 'LIKE', '%' . $s . '%')
                        ->orWhere('jk', 'LIKE', '%' . $s . '%')
                        ->orWhere('no_hp', 'LIKE', '%' . $s . '%');
                })
                    // 🔍 Tambahkan pencarian email dari relasi user
                    ->orWhereHas('user', function ($uq) use ($s) {
                        $uq->where('email', 'LIKE', "%$s%");
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('admin.petugas.index', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 7);
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.petugas.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:petugas_pendampings,nip',
            'nama_petugas' => 'required|string',
            'jk' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',

            // Validasi untuk user
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // gunakan password_confirmation
        ]);


        $user = User::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user->assignRole('petugas');


        $profil = PentugasPendamping::create([
            'user_id' => $user->id,
            'nip' => $validated['nip'],
            'nama_petugas' => $validated['nama_petugas'],
            'jk' => $validated['jk'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
        ]);
        Alert::success('Berhasil', 'Tambah data berhasil');
        return redirect()->route('dashboard.petugas');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $data = PentugasPendamping::where('id', $id)->first();
        $judul = 'DETAIL DATA PETUGAS';
        return view('admin.petugas.create-update-show', compact('data', 'judul'));
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        $data = PentugasPendamping::where('id', $id)->first();
        $judul = 'UBAH DATA PETUGAS';
        return view('admin.petugas.create-update-show', compact('data', 'judul'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $data = PentugasPendamping::findOrFail($id);

        $validated = $request->validate([
            'nama_petugas' => 'required|string',
            'jk' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'nip' => 'nullable|string',

            // Password opsional saat update
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update user
        $user = User::findOrFail($data->user_id);

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        // Pastikan role ada (opsional, kalau perlu)
        if (!$user->hasRole('petugas')) {
            $user->assignRole('petugas');
        }

        // Update profil petugas
        $data->update([
            'nip' => $validated['nip'] ?? $data->nip,
            'nama_petugas' => $validated['nama_petugas'],
            'jk' => $validated['jk'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
        ]);

        Alert::success('Berhasil', 'Update data berhasil');
        return redirect()->route('dashboard.petugas');
    }

    // Hapus data
    public function destroy($id)
    {
        PentugasPendamping::find($id)->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dashboard.petugas');
    }
}
