<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengajuan Kasus</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .kop {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop img {
            width: 80px;
            float: left;
        }

        .kop h2, .kop h3, .kop p {
            margin: 0;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            margin: 20px 0;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table td {
            padding: 6px;
            vertical-align: top;
        }

        .border td {
            border: 1px solid #000;
        }

        .ttd {
            width: 100%;
            margin-top: 40px;
            text-align: right;
        }

        .ttd p {
            margin-bottom: 80px;
        }

        .footer-note {
            font-size: 10px;
            font-style: italic;
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>

{{-- KOP --}}
<div class="kop">
    <img width="80" src="{{ public_path('assets/img/logo.png') }}">
    <h3>DINAS PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK,</h3>
    <h3>PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA</h3>
    <h3>(DP3AP2KB) KABUPATEN MIMIKA</h3>
    <p>
        Jl. Yos Sudarso, Utikini Baru, Kuala Kencana, Mimika Papua Tengah<br>
        Telp: +62 821 9988 9821 | Email: info@sikdrt.com
    </p>
</div>

{{-- JUDUL --}}
<div class="judul">
    LAPORAN PENGAJUAN PENANGANAN KASUS<br>
</div>

{{-- DATA PENGAJUAN --}}
<table class="border">
    <tr>
        <td width="30%">Rekomendasi</td>
        <td width="5%">:</td>
        <td>{{ $data->rekomendasi }}</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td>{{ $data->status }}</td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>{{ $data->keterangan ?? '-' }}</td>
    </tr>

      <tr>
        <td>Petugas</td>
        <td>:</td>
        <td>{{ optional($data->pengaduan->pendampinganKasus()->latest('tanggal_pendampingan')->first()?->petugasPendamping)->nama_petugas ?? '' }}</td>
    </tr>
</table>

{{-- DATA PENGADUAN --}}
<table class="border">
    <tr>
        <td width="30%">Nama Pengadu</td>
        <td width="5%">:</td>
        <td>{{ $data->pengaduan->nama_pengadu }}</td>
    </tr>
    <tr>
        <td>Nama Korban</td>
        <td>:</td>
        <td>{{ $data->pengaduan->nama_korban }}</td>
    </tr>
    <tr>
        <td>Judul Pengaduan</td>
        <td>:</td>
        <td>{{ $data->pengaduan->judul_pengaduan }}</td>
    </tr>
    <tr>
        <td>Nama Pelaku</td>
        <td>:</td>
        <td>{{ $data->pengaduan->nama_pelaku }}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin Korban</td>
        <td>:</td>
        <td>{{ $data->pengaduan->jk_korban }}</td>
    </tr>
    <tr>
        <td>Lokasi Kejadian</td>
        <td>:</td>
        <td>{{ $data->pengaduan->lokasi_kejadian }}</td>
    </tr>
    <tr>
        <td>Tanggal Kejadian</td>
        <td>:</td>
        <td> {{ \Carbon\Carbon::parse( $data->pengaduan->tanggal_kejadian)->translatedFormat('d - F - Y') }} </td>
    </tr>
    <tr>
        <td>No HP</td>
        <td>:</td>
        <td>{{ $data->pengaduan->no_hp }}</td>
    </tr>
    <tr>
        <td>Deskripsi Singkat</td>
        <td>:</td>
        <td>{{ $data->pengaduan->deskripsi_singkat }}</td>
    </tr>
</table>

{{-- TTD --}}
<div class="ttd">
    <p>
        Mimika, {{ date('d F Y') }}<br>
        Kepala Dinas DP3AP2KB<br>
        Kabupaten Mimika
    </p>

    <strong>
        ( ........................................ )<br>
        NIP. 19xxxxxxxxxxxxx
    </strong>
</div>

{{-- FOOTER --}}
<div class="footer-note">
    Laporan ini dihasilkan oleh Sistem Pendukung Keputusan (SPK)<br>
    Penanganan Kasus Kekerasan Dalam Rumah Tangga
</div>

</body>
</html>
