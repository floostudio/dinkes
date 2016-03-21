<?php

foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php

$row = $data_22->result();
$rs_count = $num_2_22;

$totalN2 = $total2 = 0;
$totalN1 = $total1 = 0;
$totalN = $total = 0;

$track = $count = 0;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 0; $k < 11; $k++) {
        if ($row[$track]->DEFF_ID == 1) {
            $total2 += $row[$track]->EFF_NILAI_N2;
            $total1 += $row[$track]->EFF_NILAI_N1;
            $total += $row[$track]->EFF_NILAI_N;
            $count++;
        }
        $track++;
    }
}

if ($rs_noreg == '') {
    $totalN2 = $total2 / $count;
    $totalN1 = $total1 / $count;
    $totalN = $total / $count;
} else {
    $totalN2 = $total2;
    $totalN1 = $total1;
    $totalN = $total;
}

echo "Rs "."1 ".$totalN."2 ".$totalN1."3 ".$totalN2."<br/>";

$judul = "Tingkat Efisiensi Mutu Pengelolaan RS Tahun " . $yearName . " - BOR Perinatologi";
//echo $judul;

if ($tipe == 1) {
    //include 'chart_4_1.php';
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

    //include 'chart_4_2.php';
}
?>