<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.1.b. Kemampuan Menangani Life Saving pada Tahun n</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="3">Tribulan I </th>  
        <th colspan="3">Tribulan II </th>  
        <th colspan="3">Tribulan III </th>  
        <th colspan="3">Tribulan IV </th>  

    </tr>
    <tr>
        <th>Jumlah Kumulatif</th>
        <th>Jumlah Seluruh</th>
        <th>%</th>
        <th>Jumlah Kumulatif</th>
        <th>Jumlah Seluruh</th>
        <th>%</th>
        <th>Jumlah Kumulatif</th>
        <th>Jumlah Seluruh</th>
        <th>%</th>
        <th>Jumlah Kumulatif</th>
        <th>Jumlah Seluruh</th>
        <th>%</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_2->result();

    $rs_count = $num_51_2;
 
	$total = array_fill(0,12,0);
	 
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 4; $k++) {
            echo '<td>' . $row[$track]->LS_KUMULATIF_PASIEN . '</td>'; 
            echo '<td>' . $row[$track]->LS_TOTAL_PASIEN . '</td>';
            echo '<td>' . $row[$track]->LS_PERSENTASE . '</td>';
			
			$total[$ind] += $row[$track]->LS_KUMULATIF_PASIEN ; 
			$total[++$ind] += $row[$track]->LS_TOTAL_PASIEN  ;  
			$total[++$ind] += 0;
			$ind++;
			
            $track++;
        }
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 12; $i++){
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	echo '</tr>';
	}
    ?>
</tbody>