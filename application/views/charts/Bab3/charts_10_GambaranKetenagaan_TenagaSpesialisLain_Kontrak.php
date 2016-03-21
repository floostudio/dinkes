<?php

foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php

$i = 1;

$row = $data3_4->result();
$rs_count = $num_3_4;

$totalJumlah = array(0, 0, 0, 0);
$totTdkTetap = array(0, 0, 0, 0);
$totTetap = array(0, 0, 0, 0);

$totAll = $totAllTetap = $totAllTdkTetap = 0;

$track = 29;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 0; $k < 14; $k++) {
        $totalJumlah[$k] += $row[$track]->KETENAGAAN_KONTRAK;

        $track++;
    }
}
$judul = "Total Tenaga Kontrak Tenaga Spesialis Lain Tahun " . $yearName;

if ($tipe == 2) {
    $max = 10;
    $monothick = 0;
    $nilaiMax = max($totalJumlah);
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
    include 'chart10_2.php';
} else if ($tipe == 1) {
    include 'chart10_1.php';
}
?>

