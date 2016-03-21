<?php

foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php

$row = $data_51_1->result();

$rs_count = $num_51_1;

$t1 = $t2 = $t3 = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $t1+= $row[$track]->TJK_ASKES;
    $t2+= $row[$track + 1]->TJK_ASKES;
    $t3+= $row[$track + 2]->TJK_ASKES;

    $track+=3;
}

$judul = "Trend Jumlah Kunjungan IGD ASKES Tahun " . $yearName;

if ($tipe == 2) {
    $max = 10;
    $monothick = 0;
    $nilaiMax = max($t1, $t2, $t3);
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
    include 'chart13_2.php';
} else if ($tipe == 1) {
    include 'chart13_1.php';
}
?>
