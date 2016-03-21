<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.8.a Pelayanan Radiologi</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region</th>
        <th>Kode RS</th> 
        <th>Nama RS</th> 

        <th> Foto tanpa bahan kontras </th> 
        <th> Foto dengan bahan kontras</th>  
        <th> USG </th>  
        <th> CT Scan </th>  
        <th> MRI (Magnetic Resonance Imaging) </th>  
        <th> Lain – lain </th>  
        <th>Total</th>

        <th> Analisa </th> 

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;
    
    $analisaRest = $analisa->result();
	$trackAnalisa = 0; 
	
    $row = $data_radiologi->result();
    $totalX = 0; $totalAll = 0;
    $rs_count = $num_radiologi;
	$total = array_fill(0,12,0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->nm_list_regoion . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 6; $k++) {
            echo '<td>' . $row[$track]->RADIO_KUNJUNGAN . '</td>';
            $totalX += $row[$track]->RADIO_KUNJUNGAN;
			
			$total[$ind] += $row[$track]->RADIO_KUNJUNGAN ;
			$ind++;
            $track++;
        }
        echo '<td>' . $totalX . '</td>';
        
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
		
		$totalAll += $totalX;
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 6; $i++){
				 echo '<td>' . $total[$i]. '</td>';  
			}  
			 echo '<td>' . $totalAll. '</td>';  
			  echo '<td> - </td>';  
	echo '</tr>';
	}
    ?>
</tbody>