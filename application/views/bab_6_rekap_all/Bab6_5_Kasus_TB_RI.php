<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6 Kasus TB Rawat Inap</h4>
KASUS TB RI  
<thead>
    <tr>

        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th>
        <th rowspan="2">Nama RS</th>   

        <th colspan="3"> <1 </th> 
        <th colspan="3">1-4 tahun   </th> 
        <th colspan="3">5-14 tahun</th> 
        <th colspan="3">15-24 tahun</th> 
        <th colspan="3">25-44 tahun</th>  
        <th colspan="3">45-64 tahun </th>  
        <th colspan="3">65+ tahun</th>  
        <th colspan="3">Total </th>   
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
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_kasus_tb_ri->result(); 
	
    $totalJumlN = $totalJumlN1 = $totalJumlN2 = 0;
	$total = array_fill(0,27,0);
    $rs_count = $num_kasus_tb_ri;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $jumN2 = $jumN1 = $jumN = 0;
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 7; $k++) {
            echo '<td>' . $row[$track]->KASUS_TB_RI_N2 . '</td>';
            $jumN2 = $jumN2 + $row[$track]->KASUS_TB_RI_N2;
            echo '<td>' . $row[$track]->KASUS_TB_RI_N1 . '</td>';
            $jumN1 = $jumN1 + $row[$track]->KASUS_TB_RI_N1;
            echo '<td>' . $row[$track]->KASUS_TB_RI_N . '</td>';
            $jumN = $jumN + $row[$track]->KASUS_TB_RI_N; 
			
			$total[$ind] += $row[$track]->KASUS_TB_RI_N2; 
			$total[++$ind] += $row[$track]->KASUS_TB_RI_N1;  
			$total[++$ind] += $row[$track]->KASUS_TB_RI_N; 
			 
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
			for($i = 0; $i < 24; $i++){
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	  
	echo '</tr>';
 }
    ?>
</tbody>