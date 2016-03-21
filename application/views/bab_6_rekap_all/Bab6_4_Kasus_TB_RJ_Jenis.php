<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6.3.a.2 Kasus TB Rawat Jalan Berdasarkan Jenisnya</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th>
        <th rowspan="2">Nama RS</th>   

        <th colspan="3">TB Paru BTA (+) dgn/tanpa biakan kuman TB   </th> 
        <th colspan="3">TB Paru Lainnya   </th> 
        <th colspan="3">TB Ekstra Paru </th> 
        <th colspan="3">TB alat napas lainnya </th> 
        <th colspan="3">Meningitis TB </th>  
        <th colspan="3">TB Susunan saraf pusat lainnya </th>  
        <th colspan="3">TB Tulang dan sendi </th>  
        <th colspan="3">Limfadenitis TB </th>  
        <th colspan="3">TB Miller </th>  
        <th colspan="3">TB Lainnya </th>  
        
        <th rowspan="2">TOTAL</th>
    </tr>
    <tr>
        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 

        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 

        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 

        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 

        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 


        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 

        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 

        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 

        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 

        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 


    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_kasus_tb_rj_jenis->result();

    $rs_count = $num_kasus_tb_rj_jenis;

    $total = array_fill(0,32,0);
    
    $totalAll = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 10; $k++) {
            echo '<td>' . $row[$track]->KASUS_TB_RJ_JENIS_N2 . '</td>';
            echo '<td>' . $row[$track]->KASUS_TB_RJ_JENIS_N1 . '</td>';
            echo '<td>' . $row[$track]->KASUS_TB_RJ_JENIS_N . '</td>';

            $total[$ind] += $row[$track]->KASUS_TB_RJ_JENIS_N2; 
			$total[++$ind] += $row[$track]->KASUS_TB_RJ_JENIS_N1;  
			$total[++$ind] += $row[$track]->KASUS_TB_RJ_JENIS_N; 
			 
			$ind++;
			
            $totalX += $row[$track]->KASUS_TB_RJ_JENIS_N2;
            $totalX += $row[$track]->KASUS_TB_RJ_JENIS_N1;
            $totalX += $row[$track]->KASUS_TB_RJ_JENIS_N;            
            
            $track++;
        }
        $totalAll += $totalX;
        echo '<td>'.$totalX.'</td>';
		$total[$ind] += $totalX; 
        echo '</tr>'; 
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 31; $i++){
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	  
	echo '</tr>';
	}
    ?>
</tbody>