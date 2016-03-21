<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.16.a Laporan Sanitasi</h4>
<thead>
    <tr>
        <th rowspan="1" >No</th>
        <th rowspan="1">Region</th>
        <th rowspan="1">Kode RS</th> 
        <th rowspan="1">Nama RS</th>  
		
        <th colspan="1">Kualitas fisik dan kimia air bersih</th> 
        <th colspan="1">Kualitas mikrobiologi air bersih</th>  
        <th colspan="1">Kualitas lingkungan fisik </th>  
        <th colspan="1">Kualitas mikrobiologi dan angka kuman udara ruang </th>  
        <th colspan="1">Kualitas fisik dan kimia air dari instalasi gizi</th>  
        <th colspan="1">Hasil pemeriksaan usap alat makan </th>  
    </tr>
	 
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_sanitasi->result();

    $rs_count = $num_sanitasi;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->nm_list_regoion . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 6; $k++) {
            echo '<td>' . $row[$track]->SANITASI_KESIMPULAN . '</td>';
            $track++;
        }
        echo '</tr>';
    }
    ?>
</tbody>
<?php echo 'Rs count='.$rs_count; ?>