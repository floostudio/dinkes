<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.13.a. Kegiatan Transfusi Darah</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="1" rowspan="2">Total darah yang terkumpul (kantong)</th> 
        <th colspan="5"> Total darah yang terpakai (kantong)</th>  
      
    </tr>
	<tr>
		<th colspan="1">Total Darah Terpakai</th> 
		<th colspan="1"> a. Darah (kantong)</th> 
        <th colspan="1"> b. Packet cell (kantong)</th> 
        <th colspan="1"> c. Plasma (kantong)</th> 
        <th colspan="1"> d. Komponen darah lain</th> 
	</tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_trans->result();
    $rs_count = $num_trans;
	
    $total = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;

        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 6; $k++) {
            echo '<td>' . $row[$track]->TRANS_JUMLAH . '</td>';

			$total[$ind] += $row[$track]->TRANS_JUMLAH;
			$ind++;
			 
			
            $track++;
        }

        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td>total </td>';
		echo '<td> </td> <td> </td> <td> </td>';
		
			for($i = 0; $i < 6; $i++)
				 echo '<td>' . $total[$i]. '</td>';
				 
		echo '</tr>';
		}
    ?>
</tbody>