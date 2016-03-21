<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php
$i = 1;

$row = $data2_21_1->result();
$rs_count = $num_2_21_1;

$nilaiMax = 0;

$totalNilai = $total = array(0, 0, 0);

/* $totalLN2 = $totalPN2 = $totalTotN2 = 0;
  $totalLN1 = $totalPN1 = $totalTotN1 = 0;
  $totalLN = $totalPN = $totalTotN = 0; */

$totalAll = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $totalNilai[0] += $row[$track]->KIGD_PASIEN_L_N2;
    $totalNilai[1] += $row[$track]->KIGD_PASIEN_P_N2;
    $totalNilai[2] += $row[$track]->KIGD_PASIEN_TOTAL_N2;

    $track++;
}

$judul = "Instalasi Gawat Darurat Tahun Ke-".$yearName."-2";

if ($tipe == 1) {
    include 'chart2.php';
} else if ($tipe == 2) {
    $max = 10;
    $monothick = 0;
    $nilaiMax = max($totalNilai);
    $i = 0;

    while ($nilaiMax > 10) {
        $nilaiMax = $nilaiMax / 10;
        $i++;
    }

    for ($j = 0; $j < $i; $j++) {
        $max = $max * 10;
    }

    $monothick = $max / 5;
    include 'chart1.php';
}
?>
