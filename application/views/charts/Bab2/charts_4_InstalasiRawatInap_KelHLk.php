<?php

foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php

$row = $data_2_21_3->result();
$rs_count = $num_2_21_3;

$totalN2 = 0;
$totalN1 = 0;
$totalN = 0;

$nilaiMaxN = $nilaiMaxN1 = $nilaiMaxN2 = 0;

$track = 5;
for ($j = 0; $j < $rs_count; $j++) {
    $totalN2 += $row[$track]->IRI_JUMLAH_N2;
    $totalN1 += $row[$track]->IRI_JUMLAH_N1;
    $totalN += $row[$track]->IRI_JUMLAH_N;

    if ($track == 0) {
        $track += 17;
    } else if ($track > 0) {
        $track += 18;
    }
}

$judul = "Instalasi Rawat Inap Jumlah Total Pasien Keluar Hidup Laki-Laki Tahun ".$yearName;
//echo $judul;

if ($tipe == 1) {
    include 'chart_4_1.php';
} else if ($tipe == 2) {
    $max = 10;
    $monothick = 0;
    $nilaiMax = max($totalN2, $totalN1, $totalN);
    //echo $totalN2.' '.$totalN1.' '.$totalN.' '.$nilaiMax;
    $i = 0;

    while ($nilaiMax > 10) {
        $nilaiMax = $nilaiMax / 10;
        $i++;
    }

    for ($j = 0; $j < $i; $j++) {
        $max = $max * 10;
    }

    $monothick = $max / 5;
     
    include 'chart_4_2.php';
}
?>
