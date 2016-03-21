<?php

foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php

$i = 1;

$row = $data3_4->result();
$rs_count = $num_3_4;

$totalJumlah = array(0, 0, 0, 0, 0,
    0, 0, 0, 0, 0,
    0, 0, 0, 0, 0,
    0, 0, 0, 0, 0, 0);

$totAll = $totAllTetap = $totAllTdkTetap = 0;

$track = 2;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 0; $k < 21; $k++) {
        $totalJumlah[$k] += $row[$track]->KETENAGAAN_KONTRAK;
        $track++;
    }
}

$judul = "Tenaga Kontrak Tenaga Medik Spesialis Dasar ".$yearName;

if ($tipe == 2) {
    $max = 10;
    $monothick = 0;
    $nilaiMax = max($totalJumlah[0], $totalJumlah[1], $totalJumlah[2], $totalJumlah[3], $totalJumlah[4], $totalJumlah[5], $totalJumlah[6], $totalJumlah[7], $totalJumlah[8], $totalJumlah[9], $totalJumlah[10], $totalJumlah[11], $totalJumlah[12], $totalJumlah[13], $totalJumlah[14], $totalJumlah[15], $totalJumlah[16], $totalJumlah[17], $totalJumlah[18], $totalJumlah[19], $totalJumlah[20]);
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
    include 'chart7_2.php';
} else if ($tipe == 1) {
    include 'chart7_1.php';
}
?>
