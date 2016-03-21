<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 3.5 Analisa Ketenagaan Rumah Sakit</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>  

        <th colspan="4">Ketenagaann</th>
    </tr>
    <tr>
        <th>Jumlah Tenaga RS</th>
        <th>Jumlah Tenaga yang Harus Ada</th>
        <th>Prosentase</th>
        <th>Analisa</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data3_5->result();
    $rs_count = $num_3_5;
    
    $analisaRest = $analisa->result();
	$trackAnalisa = 0;
	
    $prosentase = 0;
    
    $totJumlah = $prosentase = 0;

    $track = 0;
    
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
		
        echo '<td>' . $row[$track]->AT_JUMLAH . '</td>';
        echo '<td>' . $row[$track]->AT_STANDAR . '</td>';
        
		if($row[$track]->AT_STANDAR != 0)
			$prosentase = ($row[$track]->AT_JUMLAH/$row[$track]->AT_STANDAR)*100;
		else
			$prosentase = 0;
        echo '<td>' . $prosentase . '</td>';   
		 
        $track++;
		
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
    ?>
</tbody>