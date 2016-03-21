<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.13.b Penggunaan Darah di Rumah Sakit</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region</th>
        <th>Kode RS</th> 
        <th>Nama RS</th> 


        <th colspan="1">Kasus Obsgyn</th> 
        <th colspan="1"> Kasus Neonatal</th>  
        <th colspan="1"> Kasus Bedah</th> 
        <th colspan="1"> Kasus Dalam</th> 
        <th colspan="1"> Lain - lain</th> 
        <th colspan="1"> Total</th> 
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_darah1->result();

    $rs_count = $num_darah1;
	$total = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
 
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
	$ind = 0;
        $jum = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 5; $k++) {
            echo '<td>' . $row[$track]->PENGGUNAAN_DARAH_JUMLAH . '</td>';
            $jum += $row[$track]->PENGGUNAAN_DARAH_JUMLAH;
			
			
			$total[$ind] += $row[$track]->PENGGUNAAN_DARAH_JUMLAH; 
			$ind++;
			 
            $track++;
        }
        echo '<td>' . $jum . '</td>';
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td>total </td>';
		echo '<td> </td> <td> </td> <td> </td>';
			$totalAll = 0;
			for($i = 0; $i < 5; $i++){
				 echo '<td>' . $total[$i]. '</td>';
				 $totalAll += $total[$i];
			}
			echo '<td>'.$totalAll.'</td>';	 
		echo '</tr>';
		}
    ?>
</tbody>