<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 2 Ambulans</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>   

        <th colspan="4">Ambulans Transportasi</th>
	    <th colspan="4">Ambulans Gawat Darurat</th>
        <th rowspan="2">Ambulans Jenazah</th>
    </tr>    
    <tr>
        <th>Total</th>
        <th>Kondisi Baik</th>
        <th>Rusak Ringan</th>
        <th>Rusak Berat</th>
		<th>Total</th>
		<th>Kondisi Baik</th>
        <th>Rusak Ringan</th>
        <th>Rusak Berat</th>
         
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $dataAmb->result();
    $rs_count = $numAmb;
  
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
         
				echo '<td>' . $row[$track]->AMB_TRANS_JML. '</td>';
                echo '<td>' . $row[$track]->AMB_TRANS_BAIK. '</td>'; 
				echo '<td>' . $row[$track]->AMB_TRANS_RUSAK_RINGAN. '</td>'; 
				echo '<td>' . $row[$track]->AMB_TRANS_RUSAK_BERAT. '</td>'; 
				echo '<td>' . $row[$track]->AMB_GD_JML. '</td>'; 
				echo '<td>' . $row[$track]->AMB_GD_BAIK. '</td>'; 
				echo '<td>' . $row[$track]->AMB_GD_RUSAK_RINGAN. '</td>'; 
				echo '<td>' . $row[$track]->AMB_GD_RUSAK_BERAT. '</td>'; 
				echo '<td>' . $row[$track]->AMB_JENAZAH. '</td>';           
             

            $track++;
         
        echo '</tr>';
    }
     
    ?>
</tbody>