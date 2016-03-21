<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.14.g Hasil Survey Maskin</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="3">Rawat Jalan</th> 
        <th colspan="3">Rawat Inap </th>  
        <th colspan="3">IGD</th>   

        <th rowspan="2">Analisa</th>

    </tr>
    <tr>
        <th>Skor</th>
		<th>Jumlah Responden</th>
        <th>Tingkat Kepuasan</th>
        
		 <th>Skor</th>
		<th>Jumlah Responden</th>
        <th>Tingkat Kepuasan</th>
		
		 <th>Skor</th>
		<th>Jumlah Responden</th>
        <th>Tingkat Kepuasan</th>
 
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;
    
    $analisaRest = $analisa->result();

    $row = $data_maskin7->result();

	$analisaRest = $analisa->result();
	$trackAnalisa = 0;
	
    $rs_count = $num_maskin7;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->nm_list_regoion . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 3; $k++) {
            echo '<td>' . $row[$track]->HASIL_SURVEY_SKOR . '</td>';
            echo '<td>' . $row[$track]->HASIL_SURVEY_RESPONDEN . '</td>';
            echo '<td>' . $row[$track]->HASIL_SURVEY_KETERANGAN . '</td>';
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
    ?>
</tbody>