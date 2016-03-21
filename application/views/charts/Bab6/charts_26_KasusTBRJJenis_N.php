<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php
$i = 1;

$row = $data_kasus_tb_rj_jenis->result();

$rs_count = $num_kasus_tb_rj_jenis;

$totalN2 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

$totalAll = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $ind = 0;
    for ($k = 0; $k < 10; $k++) {
        $totalN2[$ind] += $row[$track]->KASUS_TB_RJ_JENIS_N;

        $ind++;
        $track++;
    }
}
$judul = "Kasus TB Rawat Jalan Berdasarkan Jenisnya Tahun " . $yearName . " (N)";

if($tipe == 2){
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
include 'chart26_1.php';
} else if($tipe =  1){
    include 'chart26_2.php';
}
?>
