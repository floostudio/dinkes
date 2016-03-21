<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$i = 1;

$nilaiMax = 0;

$row = $data_2_21_2->result();
$rs_count = $num_2_21_2;

$totalNilai = $total = array(0, 0, 0);

/*$totalLN2 = $totalPN2 = $totalTotN2 = 0;
$totalLN1 = $totalPN1 = $totalTotN1 = 0;
$totalLN = $totalPN = $totalTotN = 0;*/

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $totalNilai[0] += $row[$track]->irj_pasien_l_n1;
    $totalNilai[1] += $row[$track]->irj_pasien_p_n1;
    $totalNilai[2] += $row[$track]->irj_pasien_total_n1;

    $track++;
}

$judul = "Instalasi Rawat Jalan Tahun Ke-".$yearName."-1";

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
