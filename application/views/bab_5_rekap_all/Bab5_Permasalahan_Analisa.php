<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5. Analisa Permasalahan</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="2">Permasalahan 1</th> 
        <th colspan="2">Permasalahan 2</th>
        <th colspan="2">Permasalahan 3</th>
        <th colspan="2">Permasalahan 4</th>
        <th colspan="2">Permasalahan 5</th>
        <th colspan="2">Permasalahan 6</th>
        <th colspan="2">Permasalahan 7</th>
        <th colspan="2">Permasalahan 8</th>
        <th colspan="2">Permasalahan 9</th>
        <th colspan="2">Permasalahan 10</th>
        
        <th rowspan="2">Analisa</th>
    </tr>
    <tr>
        <th>Masalah</th>
        <th>Pemecahan</th>
        
        <th>Masalah</th>
        <th>Pemecahan</th>
        
        <th>Masalah</th>
        <th>Pemecahan</th>
        
        <th>Masalah</th>
        <th>Pemecahan</th>
        
        <th>Masalah</th>
        <th>Pemecahan</th>
        
        <th>Masalah</th>
        <th>Pemecahan</th>
        
        <th>Masalah</th>
        <th>Pemecahan</th>
        
        <th>Masalah</th>
        <th>Pemecahan</th>
        
        <th>Masalah</th>
        <th>Pemecahan</th>
        
        <th>Masalah</th>
        <th>Pemecahan</th>
    </tr>
</thead>
<tbody>
     <?php
    $i = 1;

    $analisaRest = $analisa->result();
	$trackAnalisa = 0;
    
    $row = $data_permasalahan->result();

    $rs_count = $num_masalah;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->nm_list_regoion . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 10; $k++) {
            echo '<td>' . $row[$track]->PRBLM_NAMA . '</td>';
            echo '<td>' . $row[$track]->PRBLM_PEMECAHAN . '</td>';
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