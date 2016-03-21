<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.9.a. Jumlah Pemeriksaan Pelayanan Laboratorium Total</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="5"> Patologi Klinik</th> 
        <th colspan="5"> Patologi Anatomi</th>  
        <th colspan="5"> Toksikologi</th>  
 
    </tr>
	<tr>
		<th>n-2</th>
		<th>n-1</th>
		<th>n</th>
		<th>Total</th>
		<th>Rerata</th> 
		
		<th>n-2</th>
		<th>n-1</th>
		<th>n</th>
		<th>Total</th>
		<th>Rerata</th> 
		
		<th>n-2</th>
		<th>n-1</th>
		<th>n</th>
		<th>Total</th>
		<th>Rerata</th> 
		
	 
	</tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_lab3->result();

    $rs_count = $num_lab3;
$total = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
 
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 3; $k++) {
            echo '<td>' . $row[$track]->LAB_TOTAL_JUMLAH_N2 . '</td>';
            echo '<td>' . $row[$track]->LAB_TOTAL_JUMLAH_N1 . '</td>';
            echo '<td>' . $row[$track]->LAB_TOTAL_JUMLAH_N . '</td>';
            echo '<td>' . $row[$track]->LAB_TOTAL_JUMLAH_TOTAL . '</td>';
            echo '<td>' . $row[$track]->LAB_TOTAL_JUMLAH_RERATA . '</td>';

			$total[$ind] += $row[$track]->LAB_TOTAL_JUMLAH_N2;
			$ind++;
			$total[$ind] += $row[$track]->LAB_TOTAL_JUMLAH_N1; 
			$ind++;
			$total[$ind] += $row[$track]->LAB_TOTAL_JUMLAH_N; 
			$ind++;
			$total[$ind] += $row[$track]->LAB_TOTAL_JUMLAH_TOTAL; 
			$ind++;
			$total[$ind] += $row[$track]->LAB_TOTAL_JUMLAH_RERATA; 
			$ind++;
			 
			
            $track++;
        }

        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td>total </td>';
		echo '<td> </td> <td> </td> <td> </td>';
		
			for($i = 0; $i < 15; $i++){
				 if($i!= 4 &&  $i!= 9 && $i!= 14 )
				 echo '<td>' . $total[$i]. '</td>';
				 else{
					echo '<td>' . round(($total[$i]/$rs_count),2). '</td>';
				 }
				 }
				 
		echo '</tr>';
	}
    ?>
	
</tbody>