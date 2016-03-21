<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 63.a.4 Kasus TB Rawat Inap Berdasarkan Jenisnya</h4>
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
        <th colspan="3">TOTAL</th>
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

        <th>Tahun N-2 </th> 
        <th>Tahun N-1 </th> 
        <th>Tahun N </th> 
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_kasus_tb_ri_jenis->result(); 

    $totalJumlN = $totalJumlN1 = $totalJumlN2 = 0;
	$total = array_fill(0,33,0);
    $rs_count = $num_kasus_tb_ri_jenis;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $jumN2 = $jumN1 = $jumN = 0;
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 10; $k++) {
            echo '<td>' . $row[$track]->KASUS_TB_RI_JENIS_N2 . '</td>';
            $jumN2 = $jumN2 + $row[$track]->KASUS_TB_RI_JENIS_N2;
            echo '<td>' . $row[$track]->KASUS_TB_RI_JENIS_N1 . '</td>';
            $jumN1 = $jumN1 + $row[$track]->KASUS_TB_RI_JENIS_N1;
            echo '<td>' . $row[$track]->KASUS_TB_RI_JENIS_N . '</td>';
            $jumN = $jumN + $row[$track]->KASUS_TB_RI_JENIS_N;

            $total[$ind] += $row[$track]->KASUS_TB_RI_JENIS_N2; 
			$total[++$ind] += $row[$track]->KASUS_TB_RI_JENIS_N1;  
			$total[++$ind] += $row[$track]->KASUS_TB_RI_JENIS_N; 
			 
			$ind++;

            $track++;
        }
        
		$total[$ind] += $jumN2; 
		$total[++$ind] += $jumN1;  
		$total[++$ind] += $jumN; 
			
        echo '<td>' . $jumN2 . '</td>';
        echo '<td>' . $jumN1 . '</td>';
        echo '<td>' . $jumN . '</td>';
        echo '</tr>';
 
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 33; $i++){
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	  
	echo '</tr>';
	}
    ?>
</tbody>