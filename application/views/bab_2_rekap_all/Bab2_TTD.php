<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 2 Kapasitas Tempat Tidur</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region</th>
        <th>Kode RS</th> 
        <th>Nama RS</th>   
 
        <th>Perinatologi</th>
        <th>Kelas VVIP</th>
        <th>Kelas VIP</th>
        <th>Kelas I</th>
        <th>Kelas II</th>
        <th>Kelas III</th>
        <th>ICU</th>
        <th>PICU</th>
        <th>NICU</th>
        <th>ICCU</th>
        <th>HCU</th>
        <th>Ruang Isolasi</th>
		<th>Ruang UGD</th>
		<th>Ruang Bersalin</th>
		<th>Ruang Operasi</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $dataTTD->result();
    $rs_count = $numTTD;
 
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 15; $k++) {
            echo '<td>' . $row[$track]->KTT_JUMLAH . '</td>';
 
            $track++;
        }

      
        echo '</tr>';
    }
     
    ?>
</tbody>