<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.1.a Trend Jumlah Kunjungan IGD</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="3">Umum</th> 
        <th colspan="3">ASKES</th>    
        <th colspan="3">Asuransi lainnya</th> 
        <th colspan="3">Jamkesmas</th>    
        <th colspan="3">Jamkesmasda</th> 
        <th colspan="3">Jamsostek</th>   
        <th colspan="3">SPM</th> 
        <th colspan="3">Lain-lain</th>   
        <th colspan="3">Total</th> 
        
        <th rowspan="2">Analisa</th>

    </tr>
    <tr>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;
    
    $analisaRest = $analisa->result(); 
    $row = $data_51_1->result(); 
    $rs_count = $num_51_1;
	
	$analisaRest = $analisa->result();
	$trackAnalisa = 0;

	
	
	$t1 = $t2 = $t3 = $t4 = $t5 =  $t6 = $t7 = $t8 = $t9 = $t10 = 0;
	$t11 = $t12 = $t13 = $t14 = $t15 =  $t16 = $t17 = $t18 = $t19 = $t20 = 0;
	$t21 = $t22 = $t23 = $t24 = $t25 =  $t26 = $t27 =  0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
	
		
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        $temp = $track;

        echo '<td>' . $row[$track]->TJK_UMUM . '</td>'; 
        echo '<td>' . $row[$track + 1]->TJK_UMUM . '</td>';
        echo '<td>' . $row[$track + 2]->TJK_UMUM . '</td>';
		$t1+= $row[$track]->TJK_UMUM; 
		$t2+= $row[$track+ 1]->TJK_UMUM; 
		$t3+= $row[$track+ 2]->TJK_UMUM; 

        echo '<td>' . $row[$track]->TJK_ASKES . '</td>';
        echo '<td>' . $row[$track + 1]->TJK_ASKES . '</td>';
        echo '<td>' . $row[$track + 2]->TJK_ASKES . '</td>';
		$t4+= $row[$track]->TJK_ASKES; 
		$t5+= $row[$track+ 1]->TJK_ASKES; 
		$t6+= $row[$track+ 2]->TJK_ASKES; 

        echo '<td>' . $row[$track]->TJK_ASURANSI_LAIN . '</td>';
        echo '<td>' . $row[$track + 1]->TJK_ASURANSI_LAIN . '</td>';
        echo '<td>' . $row[$track + 2]->TJK_ASURANSI_LAIN . '</td>';
		$t7+= $row[$track]->TJK_ASURANSI_LAIN; 
		$t8+= $row[$track+ 1]->TJK_ASURANSI_LAIN; 
		$t9+= $row[$track+ 2]->TJK_ASURANSI_LAIN; 

        echo '<td>' . $row[$track]->TJK_JAMKESMAS . '</td>';
        echo '<td>' . $row[$track + 1]->TJK_JAMKESMAS . '</td>';
        echo '<td>' . $row[$track + 2]->TJK_JAMKESMAS . '</td>';
		$t10+= $row[$track]->TJK_JAMKESMAS; 
		$t11+= $row[$track+ 1]->TJK_JAMKESMAS; 
		$t12+= $row[$track+ 2]->TJK_JAMKESMAS;

        echo '<td>' . $row[$track]->TJK_JAMKESDA . '</td>';
        echo '<td>' . $row[$track + 1]->TJK_JAMKESDA . '</td>';
        echo '<td>' . $row[$track + 2]->TJK_JAMKESDA . '</td>';
		$t13+= $row[$track]->TJK_JAMKESDA; 
		$t14+= $row[$track+ 1]->TJK_JAMKESDA; 
		$t15+= $row[$track+ 2]->TJK_JAMKESDA;

        echo '<td>' . $row[$track]->TJK_JAMSOSTEK . '</td>';
        echo '<td>' . $row[$track + 1]->TJK_JAMSOSTEK . '</td>';
        echo '<td>' . $row[$track + 2]->TJK_JAMSOSTEK . '</td>';
		$t16+= $row[$track]->TJK_JAMSOSTEK; 
		$t17+= $row[$track+ 1]->TJK_JAMSOSTEK; 
		$t18+= $row[$track+ 2]->TJK_JAMSOSTEK;

        echo '<td>' . $row[$track]->TJK_SPM . '</td>';
        echo '<td>' . $row[$track + 1]->TJK_SPM . '</td>';
        echo '<td>' . $row[$track + 2]->TJK_SPM . '</td>';
		$t19+= $row[$track]->TJK_SPM; 
		$t20+= $row[$track+ 1]->TJK_SPM; 
		$t21+= $row[$track+ 2]->TJK_SPM;

        echo '<td>' . $row[$track]->TJK_LAIN . '</td>';
        echo '<td>' . $row[$track + 1]->TJK_LAIN . '</td>';
        echo '<td>' . $row[$track + 2]->TJK_LAIN . '</td>';
		$t22+= $row[$track]->TJK_LAIN; 
		$t23+= $row[$track+ 1]->TJK_LAIN; 
		$t24+= $row[$track+ 2]->TJK_LAIN;

        echo '<td>' . $row[$track]->TJK_TOTAL . '</td>';
        echo '<td>' . $row[$track + 1]->TJK_TOTAL . '</td>';
        echo '<td>' . $row[$track + 2]->TJK_TOTAL . '</td>';
		$t25+= $row[$track]->TJK_TOTAL; 
		$t26+= $row[$track+ 1]->TJK_TOTAL; 
		$t27+= $row[$track+ 2]->TJK_TOTAL;

        $track+=3;
        
        //analisa
		$analisaData = null;
        if (count($analisaRest)!= null){ 
			for( $trackAnalisa = 0; $trackAnalisa  < count($analisaRest) ; $trackAnalisa++){
				if($analisaRest[$trackAnalisa]->RS_NOREG == $row[$track-1]->RS_NOREG  )
				{ 
						$analisaData = $analisaRest[$trackAnalisa]->ANALISA_URAIAN;
						break; 
				}  
			} 
		}
		
		if($analisaData != null)
			echo '<td>'.$analisaData.'</td>';
		else
			echo '<td>-</td>';
		//////////////////
        
        echo '</tr>';
		
		
    }       
        
	echo '<tr>';
    echo '<td> Total </td>';
	echo '<td>   </td>'; echo '<td> - </td>'; echo '<td> - </td>'; 
	
	echo '<td>' . $t1 . '</td>';
	echo '<td>' . $t2 . '</td>';
	echo '<td>' . $t3 . '</td>';
	echo '<td>' . $t4 . '</td>';
	echo '<td>' . $t5 . '</td>';
	echo '<td>' . $t6 . '</td>';
	echo '<td>' . $t7 . '</td>';
	echo '<td>' . $t8 . '</td>';
	echo '<td>' . $t9 . '</td>';
	
	echo '<td>' . $t10 . '</td>';
	echo '<td>' . $t11 . '</td>';
	echo '<td>' . $t12 . '</td>';
	echo '<td>' . $t13 . '</td>';
	echo '<td>' . $t14 . '</td>';
	echo '<td>' . $t15 . '</td>';
	echo '<td>' . $t16 . '</td>';
	echo '<td>' . $t17 . '</td>';
	echo '<td>' . $t18 . '</td>';
	
	echo '<td>' . $t19 . '</td>';
	echo '<td>' . $t20 . '</td>';
	echo '<td>' . $t21 . '</td>';
	echo '<td>' . $t22 . '</td>';
	echo '<td>' . $t23 . '</td>';
	echo '<td>' . $t24 . '</td>';
	echo '<td>' . $t25 . '</td>';
	echo '<td>' . $t26 . '</td>';
	echo '<td>' . $t27 . '</td>';
        
        echo '<td>-</td>';
        
	echo '</tr>';
    ?>
</tbody>