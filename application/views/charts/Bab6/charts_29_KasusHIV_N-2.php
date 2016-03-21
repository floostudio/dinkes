<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$row = $data_hiv->result();

$rs_count = $num_hiv;
$totalN2 = array(0, 0, 0, 0, 0, 0, 0);
$totalN1 = array(0, 0, 0, 0, 0, 0, 0);
$totalN = array(0, 0, 0, 0, 0, 0, 0);
$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $ind = 0;
    for ($k = 0; $k < 7; $k++) {
        $totalN2[$ind] += $row[$track]->HIV_JUMLAH2;

        $ind++;
        $track++;
    }
}
$judul = "Kasus HIV Rawat Inap Berdasarkan Golongan Umur Tahun ".$yearName."-2 (N-2)";

if ($tipe == 2) {
    $max = 10;
    $monothick = 0;
    $nilaiMax = max($totalN2);
    $i = 0;

    while ($nilaiMax > 10) {
        $nilaiMax = $nilaiMax / 10;
        $i++;
    }

    for ($j = 0; $j < $i; $j++) {
        $max = $max * 10;
    }

    $monothick = $max / 5;
    include 'chart25_1.php';
} else if ($tipe == 1) {
    include 'chart25_2.php';
}
?>