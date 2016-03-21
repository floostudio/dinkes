<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$penyakitIGD = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$penyakitRI = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$penyakitRJ = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$icd10PenyIGD = array('', '', '', '', '', '', '', '', '', '');
$icd10PenyRI = array('', '', '', '', '', '', '', '', '', '');
$icd10PenyRJ = array('', '', '', '', '', '', '', '', '', '');
$namaPenyIGD = array('', '', '', '', '', '', '', '', '', '');
$namaPenyRI = array('', '', '', '', '', '', '', '', '', '');
$namaPenyRJ = array('', '', '', '', '', '', '', '', '', '');

$rowIGD = $data_rekap10PenyIGD->result();
$rowRI = $data_rekap10PenyRI->result();
$rowRJ = $data_rekap10PenyRJ->result();

$rs_count = $num_rekap10Peny;
$i = 0;
$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    echo '<td>' . $i++ . '</td>';
    for ($k = 0; $k < 10; $k++) {
        echo $rowIGD[$track]->icd10_igd . ' ';
        echo $rowIGD[$track]->peny_igd_nama . ' ';
        echo $rowIGD[$track]->igd_jml . ' ';    
        if($rowIGD[$track]->icd10_igd == $rowIGD[$track+1]->icd10_igd)
        $penyakitIGD[$k] = $rowIGD[$track]->igd_jml;
        $icd10PenyIGD[$k] = $rowIGD[$track]->icd10_igd;
        $namaPenyIGD[$k] = $rowIGD[$track]->peny_igd_nama;
        $track+=1;
    }
    echo '</br>';
}
?>