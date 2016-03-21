<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6.3.d.1 Kematian Maternal</h4>
<thead>
    <tr>
        <th rowspan="2">No</th> 
        <th rowspan="2">Region RS</th> 
        <th rowspan="2">Kode RS</th>  
        <th rowspan="2">Nama RS</th>   

        <th colspan="2"> Ibu Hamil  </th> 
        <th colspan="2"> Ibu Bersalin (Persalinan di RS)   </th> 
        <th colspan="2">Ibu Nifas  </th> 
        <th colspan="1" rowspan="2">Total Kematian</th>  
    </tr>
    <tr>

        <th> rujukan </th> 
        <th> datang sendiri </th> 

        <th> rujukan </th> 
        <th> datang sendiri </th> 

        <th> persalinan Di RS Lain </th> 
        <th> persalinan Di RS</th> 

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_ki->result();

    $rs_count = $num_ki;
	$total = array_fill(0,7,0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        echo '<td>' . $row[$track]->JKI_IBUHAMIL_RUJUKAN . '</td>';
        echo '<td>' . $row[$track]->JKI_IBUHAMIL_DTGSENDIRI . '</td>';
        echo '<td>' . $row[$track]->JKI_IBUBERSALIN_RUJUKAN . '</td>';
        echo '<td>' . $row[$track]->JKI_IBUBERHASIL_DTGSENDIRI . '</td>';
        echo '<td>' . $row[$track]->JKI_IBUNIFAS_RSLAIN . '</td>';
        echo '<td>' . $row[$track]->JKI_IBUNIFAS_RS . '</td>';
        echo '<td>' . $row[$track]->JKI_TOTAL . '</td>';
        echo '</tr>';
		
		$total[$ind] += $row[$track]->JKI_IBUHAMIL_RUJUKAN; 
		$total[++$ind] += $row[$track]->JKI_IBUHAMIL_DTGSENDIRI;  
		$total[++$ind] += $row[$track]->JKI_IBUBERSALIN_RUJUKAN; 
		$total[++$ind] += $row[$track]->JKI_IBUBERHASIL_DTGSENDIRI;  
		$total[++$ind] += $row[$track]->JKI_IBUNIFAS_RSLAIN;
		$total[++$ind] += $row[$track]->JKI_IBUNIFAS_RS;  
		$total[++$ind] += $row[$track]->JKI_TOTAL;
			  
			
        $track++;
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 7; $i++){
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	  
	echo '</tr>';
	}
    ?>
</tbody>