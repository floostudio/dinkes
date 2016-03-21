<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 4.2  Laporan dan Perkembangan Cost Revovery</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="3">Pendapatan (Revenue)</th>  
        <th colspan="3">Belanja (Cost) </th>  
        <th colspan="3">Cost Recovery (%) </th>  
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
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_cr->result(); 
    $rs_count = $num_cr;
	
	$analisaRest = $analisa->result();
	$trackAnalisa = 0;
 
	$total = array_fill(0,12,0);
	 
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 3; $k++) {
            echo '<td>' . $row[$track]->CR_JUMLAH_N2 . '</td>'; 
            echo '<td>' . $row[$track]->CR_JUMLAH_N1 . '</td>';
            echo '<td>' . $row[$track]->CR_JUMLAH_N . '</td>';
			
			$total[$ind] += $row[$track]->CR_JUMLAH_N2 ; 
			$total[++$ind] += $row[$track]->CR_JUMLAH_N1  ;  
			$total[++$ind] += $row[$track]->CR_JUMLAH_N ;
			$ind++;
			
            $track++;
        }
		 
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
	 if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 6; $i++){
				  
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	 echo '<td> - </td> <td> - </td>  <td> - </td> <td> - </td>'; 
	echo '</tr>';
	}
    ?>
</tbody>