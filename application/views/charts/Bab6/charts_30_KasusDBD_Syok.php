<?php

foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php

$row = $data_dbd->result();

$rs_count = $num_dbd;
$total4 = array(0, 0, 0);
$total3 = array(0, 0, 0);
$total2 = array(0, 0, 0);
$total1 = array(0, 0, 0);
$total = array(0, 0, 0, 0);
$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $ind = 0;
    for ($k = 0; $k < 3; $k++) {
        $total4[$ind] += $row[$track]->DBD_DEWASA_L;
        $total3[$ind] += $row[$track]->DBD_DEWASA_P;
        $total2[$ind] += $row[$track]->DBD_ANAK_L;
        $total1[$ind] += $row[$track]->DBD_ANAK_P;
        $ind++;
        $track++;
    }
}

$judul = "Kasus DBD Syok Tahun " . $yearName;
$total[0] = $total4[1];
$total[1] = $total3[1];
$total[2] = $total2[1];
$total[3] = $total1[1];
if ($tipe == 2) {
    $nilaiMax = max($total);

    $max = 10;
    $monothick = 0;
    $i = 0;

    while ($nilaiMax > 10) {
        $nilaiMax = $nilaiMax / 10;
        $i++;
    }

    for ($j = 0; $j < $i; $j++) {
        $max = $max * 10;
    }

    $monothick = $max / 5;
    include 'chart30_1.php';
} else if ($tipe == 1) {
    include 'chart30_2.php';
}
?>
