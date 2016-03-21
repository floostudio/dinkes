<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.9.a. Jumlah Pemeriksaan Pelayanan Laboratorium Toksikologi</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 


        <th colspan="6"> Narkotika</th> 
        <th colspan="6"> Psikotropika</th>  
        <th colspan="6"> Zat Adiktif</th> 
        <th colspan="6"> Pestisida</th> 
        <th colspan="6"> Zat Toksikologi</th> 
		</tr>
	<tr>
		<th colspan="2"> N-2</th> 
		<th colspan="2"> N-1</th> 
		<th colspan="2"> N</th> 
		<th colspan="2"> N-2</th> 
		<th colspan="2"> N-1</th> 
		<th colspan="2"> N</th>  
		<th colspan="2"> N-2</th> 
		<th colspan="2"> N-1</th> 
		<th colspan="2"> N</th>  
		<th colspan="2"> N-2</th> 
		<th colspan="2"> N-1</th> 
		<th colspan="2"> N</th>  
		<th colspan="2"> N-2</th> 
		<th colspan="2"> N-1</th> 
		<th colspan="2"> N</th>  
		
	</tr>
	<tr>
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>   
		
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th> 
		
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th> 
		
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th> 
		
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th>  
		<th colspan="1"> Skrining</th> 
		<th colspan="1"> Konfirmasi</th> 
		
		 
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_lab2->result();

    $rs_count = $num_lab2;
$total = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 5; $k++) {
            echo '<td>' . $row[$track]->LAB_T_SKRINING_N2 . '</td>';
            echo '<td>' . $row[$track]->LAB_T_KONFIRMASI_N2 . '</td>';
            echo '<td>' . $row[$track]->LAB_T_SKRINING_N1 . '</td>';
            echo '<td>' . $row[$track]->LAB_T_KONFIRMASI_N1 . '</td>';
            echo '<td>' . $row[$track]->LAB_T_SKRINING_N . '</td>';
            echo '<td>' . $row[$track]->LAB_T_KONFIRMASI_N . '</td>';
			
			$total[$ind] += $row[$track]->LAB_T_SKRINING_N2;
			$ind++;
			$total[$ind] += $row[$track]->LAB_T_KONFIRMASI_N2; 
			$ind++;
			$total[$ind] += $row[$track]->LAB_T_SKRINING_N1; 
			$ind++;
			$total[$ind] += $row[$track]->LAB_T_KONFIRMASI_N1; 
			$ind++;
			$total[$ind] += $row[$track]->LAB_T_SKRINING_N; 
			$ind++;
			$total[$ind] += $row[$track]->LAB_T_KONFIRMASI_N;
            $ind++;			
			 
			
            $track++;
        }

        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td>total </td>';
		echo '<td> </td> <td> </td> <td> </td>';
		
			for($i = 0; $i < 30; $i++)
				 echo '<td>' . $total[$i]. '</td>';
				 
		echo '</tr>';
	}
    ?>
</tbody>