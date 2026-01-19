<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Konversi;
use App\Models\Kriteria;
use App\Models\PengaduanMasyarakat;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Mpdf\Mpdf;

class PengajuanController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        // Ambil data master
        $kriteria   = Kriteria::orderBy('id')->get();
        $alternatif = Alternatif::orderBy('id')->get();

        // Ambil kasus (pengaduan)
        $nilai = PengaduanMasyarakat::with('nilaiKasus')->where('status', 'Diterima')
            ->when(auth()->check() && auth()->user()->hasRole('masyarakat'), function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->get();

        // Konversi GAP (key = nilai_gap, value = bobot_w)
        $konversi = Konversi::pluck('bobot_w', 'nilai_gap');
        $konversi_all = Konversi::orderBy('id')->get();

        $hasil = [];

        /*
    |--------------------------------------------------------------------------
    | PERHITUNGAN PROFILE MATCHING
    |--------------------------------------------------------------------------
    | Struktur:
    | Kasus -> Alternatif -> Kriteria
    | GAP = nilai_kasus - nilai_ideal_kriteria
    */

        foreach ($nilai as $kasus) {

            foreach ($alternatif as $alt) {

                $cf = [];
                $sf = [];

                foreach ($kriteria as $k) {

                    // Ambil nilai kasus PER KRITERIA
                    $nilaiKasus = $kasus->nilaiKasus
                        ->where('kriteria_id', $k->id)
                        ->first();

                    if (!$nilaiKasus) continue;

                    // GAP KE NILAI IDEAL ALTERNATIF (SESUAI EXCEL KAMU)
                    $gap = $nilaiKasus->nilai_kasus - $alt->nilai_ideal_alternatif;
                    $bobot = $konversi[$gap] ?? 0;

                    if ($k->jenis_faktor === 'Core') {
                        $cf[] = $bobot;
                    } else {
                        $sf[] = $bobot;
                    }

                    $hasil[$kasus->id][$alt->id]['bobot'][$k->id] = $bobot;
                }

                $nilaiCF = count($cf) ? array_sum($cf) / count($cf) : 0;
                $nilaiSF = count($sf) ? array_sum($sf) / count($sf) : 0;

                $hasil[$kasus->id][$alt->id]['cf'] = round($nilaiCF, 2);
                $hasil[$kasus->id][$alt->id]['sf'] = round($nilaiSF, 2);
                $hasil[$kasus->id][$alt->id]['nilai_akhir'] =
                    round(($nilaiCF * 0.6) + ($nilaiSF * 0.4), 2);
            }
        }

        /*
    |--------------------------------------------------------------------------
    | RINGKASAN & REKOMENDASI
    |--------------------------------------------------------------------------
    */

        $ringkasan = [];

        foreach ($nilai as $kasus) {

            $maxNilai = 0;
            $rekomendasi = '';

            foreach ($alternatif as $alt) {
                $nilaiAkhir = $hasil[$kasus->id][$alt->id]['nilai_akhir'] ?? 0;

                $ringkasan[$kasus->id]['nilai'][$alt->id] = $nilaiAkhir;

                if ($nilaiAkhir > $maxNilai) {
                    $maxNilai = $nilaiAkhir;
                    $rekomendasi = $alt->alternatif;
                }
            }

            $ringkasan[$kasus->id]['max'] = round($maxNilai, 2);
            $ringkasan[$kasus->id]['rekomendasi'] = $rekomendasi;
        }



        $pengajuan = Pengajuan::with(['pengaduan', 'pengaduan.user'])
            ->when($request->s, function ($query) use ($request) {
                $s = $request->s;

                $query->where(function ($q) use ($s) {

                    // field tabel pengajuan
                    $q->where('pengaduan_id', 'LIKE', "%{$s}%")
                        ->orWhere('rekomendasi', 'LIKE', "%{$s}%")
                        ->orWhere('status', 'LIKE', "%{$s}%")
                        ->orWhere('keterangan', 'LIKE', "%{$s}%")

                        // relasi pengaduan
                        ->orWhereHas('pengaduan', function ($p) use ($s) {
                            $p->where('nama_pengadu', 'LIKE', "%{$s}%")
                                ->orWhere('nama_korban', 'LIKE', "%{$s}%")
                                ->orWhere('judul_pengaduan', 'LIKE', "%{$s}%")
                                ->orWhere('nama_pelaku', 'LIKE', "%{$s}%")
                                ->orWhere('jk_korban', 'LIKE', "%{$s}%")
                                ->orWhere('lokasi_kejadian', 'LIKE', "%{$s}%")
                                ->orWhere('deskripsi_singkat', 'LIKE', "%{$s}%")
                                ->orWhere('tanggal_kejadian', 'LIKE', "%{$s}%");
                        });
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(7, ['*'], 'pengajuan_page')
            ->withQueryString();

        return view(
            'admin.pengajuan.index',
            compact('kriteria', 'alternatif', 'nilai', 'konversi', 'hasil', 'konversi_all', 'ringkasan', 'pengajuan')
        );
    }

    public function tambah($kasusId)
    {
        $kasus = PengaduanMasyarakat::findOrFail($kasusId);
        $ringkasan = $this->hitungProfileMatching();
        if (
            auth()->user()?->hasRole('masyarakat') &&
            (int) auth()->id() !== (int)  $kasus->user_id
        ) {
            return redirect()->route('dashboard.pengajuan');
        }
        return view('admin.pengajuan.create-update-show', [
            'kasus'        => $kasus,
            'alternatifId' => $ringkasan[$kasusId]['rekomendasi'],
            'alternatifNm' => $ringkasan[$kasusId]['rekomendasi'],
            'nilaiMax'     => $ringkasan[$kasusId]['max']
        ]);
    }


    private function hitungProfileMatching()
    {
         // Ambil data master
        $kriteria   = Kriteria::orderBy('id')->get();
        $alternatif = Alternatif::orderBy('id')->get();

        // Ambil kasus (pengaduan)
        $nilai = PengaduanMasyarakat::with('nilaiKasus')->where('status', 'Diterima')
            ->when(auth()->check() && auth()->user()->hasRole('masyarakat'), function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->get();

        // Konversi GAP (key = nilai_gap, value = bobot_w)
        $konversi = Konversi::pluck('bobot_w', 'nilai_gap');
        $konversi_all = Konversi::orderBy('id')->get();

        $hasil = [];

        /*
    |--------------------------------------------------------------------------
    | PERHITUNGAN PROFILE MATCHING
    |--------------------------------------------------------------------------
    | Struktur:
    | Kasus -> Alternatif -> Kriteria
    | GAP = nilai_kasus - nilai_ideal_kriteria
    */

        foreach ($nilai as $kasus) {

            foreach ($alternatif as $alt) {

                $cf = [];
                $sf = [];

                foreach ($kriteria as $k) {

                    // Ambil nilai kasus PER KRITERIA
                    $nilaiKasus = $kasus->nilaiKasus
                        ->where('kriteria_id', $k->id)
                        ->first();

                    if (!$nilaiKasus) continue;

                    // GAP KE NILAI IDEAL ALTERNATIF (SESUAI EXCEL KAMU)
                    $gap = $nilaiKasus->nilai_kasus - $alt->nilai_ideal_alternatif;
                    $bobot = $konversi[$gap] ?? 0;

                    if ($k->jenis_faktor === 'Core') {
                        $cf[] = $bobot;
                    } else {
                        $sf[] = $bobot;
                    }

                    $hasil[$kasus->id][$alt->id]['bobot'][$k->id] = $bobot;
                }

                $nilaiCF = count($cf) ? array_sum($cf) / count($cf) : 0;
                $nilaiSF = count($sf) ? array_sum($sf) / count($sf) : 0;

                $hasil[$kasus->id][$alt->id]['cf'] = round($nilaiCF, 2);
                $hasil[$kasus->id][$alt->id]['sf'] = round($nilaiSF, 2);
                $hasil[$kasus->id][$alt->id]['nilai_akhir'] =
                    round(($nilaiCF * 0.6) + ($nilaiSF * 0.4), 2);
            }
        }

        /*
    |--------------------------------------------------------------------------
    | RINGKASAN & REKOMENDASI
    |--------------------------------------------------------------------------
    */

        $ringkasan = [];

        foreach ($nilai as $kasus) {

            $maxNilai = 0;
            $rekomendasi = '';

            foreach ($alternatif as $alt) {
                $nilaiAkhir = $hasil[$kasus->id][$alt->id]['nilai_akhir'] ?? 0;

                $ringkasan[$kasus->id]['nilai'][$alt->id] = $nilaiAkhir;

                if ($nilaiAkhir > $maxNilai) {
                    $maxNilai = $nilaiAkhir;
                    $rekomendasi = $alt->alternatif;
                }
            }

            $ringkasan[$kasus->id]['max'] = round($maxNilai, 2);
            $ringkasan[$kasus->id]['rekomendasi'] = $rekomendasi;
        }

        return $ringkasan;
    }


    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pengaduan_id' => 'required|unique:pengajuans,pengaduan_id',
            'rekomendasi'     => 'required|string',
            'status'     => 'required|string',
            'keterangan'         => 'required',
        ]);

        Pengajuan::create($validated);
        Alert::success('Berhasil', 'Data pengajuan berhasil dibuat');
        return redirect()->route('dashboard.pengajuan');
    }

    // Tampilkan detail satu data
    public function show($id)
    {
        $data = Pengajuan::with('pengaduan')->findOrFail($id);
        $html = view('admin.pengajuan.pdf', compact('data'))->render();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_top' => 15,
            'margin_bottom' => 15,
        ]);

        $mpdf->WriteHTML($html);

        return response($mpdf->Output('', 'S'))
            ->header('Content-Type', 'application/pdf');
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        return view('admin.crud_tamplate.create-update-show');
    }

    // Update data
    public function update(Request $request, $id)
    {
        //
    }

    // Hapus data
    public function destroy($id)
    {
        $data = Pengajuan::findOrFail($id);
        $data->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('dashboard.pengajuan');
    }
}
