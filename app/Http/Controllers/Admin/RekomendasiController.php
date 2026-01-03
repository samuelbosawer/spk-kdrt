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
        $kriteria = Kriteria::orderBy('id')->get();
        $alternatif = Alternatif::orderBy('id')->get();
        $nilai = PengaduanMasyarakat::with('nilaiKasus')->get();
        $konversi = Konversi::pluck('bobot_w', 'nilai_gap'); // key = GAP
        $konversi_all = Konversi::orderBy('id')->get();
        $hasil = [];
        foreach ($nilai as $kasus) {
            foreach ($alternatif as $alt) {

                $cf = [];
                $sf = [];

                foreach ($kriteria as $k) {

                    $nilaiKasus = $kasus->nilaiKasus
                        ->where('alternatif_id', $k->id)
                        ->first();

                    if (!$nilaiKasus) continue;

                    $gap = $nilaiKasus->nilai_kasus - $alt->nilai_ideal_alternatif;
                    $bobot = $konversi[$gap] ?? 0;

                    if ($k->jenis_faktor == 'Core') {
                        $cf[] = $bobot;
                    } else {
                        $sf[] = $bobot;
                    }

                    $hasil[$kasus->id][$alt->id]['gap'][$k->id] = $gap;
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


        $ringkasan = [];

        foreach ($nilai as $kasus) {
            $maxNilai = 0;
            $rekomendasi = '';

            foreach ($alternatif as $alt) {
                $nilaiAkhir = $hasil[$kasus->id][$alt->id]['nilai_akhir'];

                $ringkasan[$kasus->id]['nilai'][$alt->id] = $nilaiAkhir;

                if ($nilaiAkhir > $maxNilai) {
                    $maxNilai = $nilaiAkhir;
                    $rekomendasi = $alt->alternatif;
                }
            }

            $ringkasan[$kasus->id]['max'] = round($maxNilai, 2);
            $ringkasan[$kasus->id]['rekomendasi'] = $rekomendasi;
        }

        return view(
            'admin.rekomendasi.index',
            compact('kriteria', 'alternatif', 'nilai', 'konversi', 'hasil', 'konversi_all', 'ringkasan')
        );
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
