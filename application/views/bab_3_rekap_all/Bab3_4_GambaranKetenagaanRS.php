<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 3.4 Gambaran Ketenagaan Rumah Sakit</h4>
<thead>
    <tr>
        <th rowspan="6">No</th>
        <th rowspan="6">Region</th>
        <th rowspan="6">Kode RS</th> 
        <th rowspan="6">Nama RS</th>  

        <th colspan="216">Jenis Ketenagaan</th>
    </tr>
    <tr>
        <th colspan="6">A.Tenaga Medik Dasar</th>
        <th colspan="63">B.Tenaga Medik Spesialis Dasar</th>
        <th colspan="15">C.Tenaga Spesialis Penunjang Medik</th>
        <th colspan="42">D.Tenaga Medik Spesialis Lain</th>
        <th colspan="21">E.Tenaga Medik Spesialis Gigi Mulut</th>
        <th colspan="57">F.Tenaga Paramedis dan Tenaga Kesehatan Lain</th>
        <th colspan="9">G.Tenaga Non Medis&Lainnya</th>  
        <th colspan="3" rowspan="3">TOTAl</th>
    </tr>
    <tr>
        <th colspan="3" rowspan="2">Dokter Umum</th>
        <th colspan="3" rowspan="2">Dokter Gigi</th>

        <th colspan="9">Dokter Spesialis Bedah</th>
        <th colspan="27">Dokter Spesialis Penyakit Dalam</th>
        <th colspan="15">Dokter Spesialis Anak</th>
        <th colspan="12">Dokter Spesialis Obgyn</th>

        <th colspan="3" rowspan="2">Dokter Spesialis Anestesiologi</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Radiologi</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Rehabilitasi Medik</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Patologi Klinik</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Patologi Anatomi</th>

        <th colspan="3" rowspan="2">Dokter Spesialis Mata</th>
        <th colspan="3" rowspan="2">Dokter Spesialis THT</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Syaraf</th>
        <th colspan="9">Dokter Spesialis Jantung dan Pembuluh Darah</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Kulit dan Kelamin</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Jiwa</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Paru</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Orthopedik</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Urologi</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Bedah Syaraf</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Bedah Plastik</th>
        <th colspan="3" rowspan="2">Dokter Spesialis Forensik</th>

        <th colspan="3" rowspan="2">Dokter Gigi Spesialis Bedah Mulut</th>
        <th colspan="3" rowspan="2">Dokter Gigi Spesialis Konservasi/Endodonsi</th>
        <th colspan="3" rowspan="2">Dokter Gigi Spesialis Periodonti</th>
        <th colspan="3" rowspan="2">Dokter Gigi Spesialis Orthodonti</th>
        <th colspan="3" rowspan="2">Dokter Gigi Spesialis Prosthodonti</th>
        <th colspan="3" rowspan="2">Dokter Gigi Spesialis Pedodonsi</th>
        <th colspan="3" rowspan="2">Dokter Gigi Spesialis Penyakit Mulut</th>

        <th colspan="3" rowspan="2">SPK</th>
        <th colspan="3" rowspan="2">D1 Perawat</th>
        <th colspan="3" rowspan="2">D3 Perawat</th>
        <th colspan="3" rowspan="2">S1 Perawat</th>
        <th colspan="3" rowspan="2">S2 Perawat</th>

        <th colspan="3" rowspan="2">D3 Bidan</th>
        <th colspan="3" rowspan="2">S1 Bidan</th>
        <th colspan="3" rowspan="2">Apoteker</th>

        <th colspan="3" rowspan="2">D1 Gizi</th>
        <th colspan="3" rowspan="2">D3 Gizi</th>
        <th colspan="3" rowspan="2">S1 Gizi</th>

        <th colspan="3" rowspan="2">D3 Anestesi</th>

        <th colspan="3" rowspan="2">D3 Rekam Medik</th>

        <th colspan="3" rowspan="2">D3 Teknik Lingkungan</th>

        <th colspan="3" rowspan="2">D3 Teknik Medik</th>

        <th colspan="3" rowspan="2">D3 Farmasi</th>

        <th colspan="3" rowspan="2">D3 Analis Kesehatan</th>

        <th colspan="3" rowspan="2">D3 Radiologi</th>

        <th colspan="3" rowspan="2">D3 Fisioterapi</th>

        <th colspan="3" rowspan="2">Sarjana Kesehatan Masyarakat</th>
        <th colspan="3" rowspan="2">Sarjana Psikologi</th>
        <th colspan="3" rowspan="2">Lain-Lain</th>
    </tr>
    <tr>
        <th colspan="3">Dr Spesialis Bedah</th>
        <th colspan="3">Dr Sub Spesialis Bedah Digesif</th>
        <th colspan="3">Dr Sub Spesialis Bedah Onkologi</th>

        <th colspan="3">Dr Spesialis Penyakit Dalam</th>
        <th colspan="3">Dr Sub Spesialis Ginjal Hipertensi (Sp.PD KGH)</th>
        <th colspan="3">Dr Sub Spesialis Hematologi-Onkologi Klinik (Sp.PD KHOM)</th>
        <th colspan="3">Dr Sub Spesialis Endokrinologi-Metabolik Diabetes (Sp.PD KEMD)</th>
        <th colspan="3">Dr Sub Spesialis Gastroenterologi-Hepatologi(Sp.PD KGEH)</th>
        <th colspan="3">Dokter Sub Spesialis Geriatri (Sp.PD Kger)</th>
        <th colspan="3">Dokter Sub Spesialis Alergi-Imunologi Klinik</th>
        <th colspan="3">Dokter Sub Spesialis Kardiovaskular (Sp.PD KKV)</th>
        <th colspan="3">Dokter Subspesialis Nutrisi Metabolik</th>

        <th colspan="3">Dr Spesialis Anak</th>
        <th colspan="3">Dokter Sub Spesialis Perinatologi</th>
        <th colspan="3">Dokter Sub Spesialis Alergi-Imunologi</th>
        <th colspan="3">Dokter Sub Spesialis Pediatri Gawat Darurat</th>
        <th colspan="3">Dokter Sub Spesialis Nutrisi Metabolik</th>

        <th colspan="3">Dr Spesialis Obgyn</th>
        <th colspan="3">Dokter Sub Spesialis Onkologi (Sp.OG K.Onk)</th>
        <th colspan="3">Dokter Sub Spesialis Fetomaternal (Sp.OG KFM)</th>
        <th colspan="3">Dokter Sub Spesialis Fertilisasi Endokrinologi Reproduksi (Sp.OG KFER)</th>

        <th colspan="3">Dr Spesialis Jantung & Pembuluh Darah</th>
        <th colspan="3">Dokter Sub Spesialis Intervensi</th>
        <th colspan="3">Dokter Sub Spesialis Rehab</th>        
    </tr>
    <tr>
        <?php for ($l = 0; $l < 71; $l++) { ?>
            <th rowspan="2">Jumlah SDM</th>
            <th colspan="2">Status Ketenagaan</th>
        <?php } ?>
        <th rowspan="2">Jumlah SDM</th>
        <th colspan="2">Status Ketenagaan</th>
    </tr>
    <tr>
        <?php for ($l = 0; $l < 71; $l++) { ?>
            <th>Tetap/PNS</th>
            <th>Tidak Tetap</th>
        <?php } ?>
        <th>Tetap/PNS</th>
        <th>Tidak Tetap</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data3_4->result();
    $rs_count = $num_3_4;

    $totalJumlah = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $totTdkTetap = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $totTetap = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    $totAll = $totAllTetap = $totAllTdkTetap = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totX1 = $totX2 = $totX3 = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 71; $k++) {
            echo '<td>' . $row[$track]->KETENAGAAN_JUMLAH . '</td>';
            $totX1 += $row[$track]->KETENAGAAN_JUMLAH;
            $totalJumlah[$k] += $row[$track]->KETENAGAAN_JUMLAH;
            echo '<td>' . $row[$track]->KETENAGAAN_TETAP . '</td>';
            $totX2 += $row[$track]->KETENAGAAN_TETAP;
            $totTetap[$k] += $row[$track]->KETENAGAAN_TETAP;
            echo '<td>' . $row[$track]->KETENAGAAN_KONTRAK . '</td>';
            $totX3 += $row[$track]->KETENAGAAN_KONTRAK;
            $totTdkTetap[$k] += $row[$track]->KETENAGAAN_KONTRAK;

            $track++;
        }
        $totAll += $totX1;
        $totAllTetap += $totX2;
        $totAllTdkTetap += $totX3;

        echo '<td>' . $totX1 . '</td>';
        echo '<td>' . $totX2 . '</td>';
        echo '<td>' . $totX3 . '</td>';
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($l = 0; $l < 71; $l++) {
            echo '<td>' . $totalJumlah[$l] . '</td>';
            echo '<td>' . $totTetap[$l] . '</td>';
            echo '<td>' . $totTdkTetap[$l] . '</td>';
        }
        echo '<td>' . $totAll . '</td>';
        echo '<td>' . $totAllTetap . '</td>';
        echo '<td>' . $totAllTdkTetap . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>