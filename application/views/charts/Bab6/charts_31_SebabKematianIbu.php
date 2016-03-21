<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php
$row = $data_ski->result();

$rs_count = $num_ski;
$total = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $ind = 0;
    for ($k = 0; $k < 9; $k++) {
        $total[$ind] += $row[$track]->JKIF_FAKTOR;
        $ind++;
        $track++;
    }
}
$judul = "Sebab Kematian Ibu Tahun ".$yearName;

if($tipe == 2){
$max = 10;
$monothick = 0;
$nilaiMax = max($total);
$i = 0;

while ($nilaiMax > 10) {
    $nilaiMax = $nilaiMax / 10;
    $i++;
}

for ($j = 0; $j < $i; $j++) {
    $max = $max * 10;
}

$monothick = $max / 5;
include 'chart31_1.php';
} else if($tipe == 1){
    include 'chart31_2.php';
}
?>