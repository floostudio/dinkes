<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.3.d 10 Besar Penyakit Rawat Inap</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="4">No 1 </th>  
        <th colspan="4">No 2 </th>  
        <th colspan="4">No 3 </th> 
        <th colspan="4">No 4 </th> 
        <th colspan="4">No 5 </th> 
        <th colspan="4">No 6 </th> 
        <th colspan="4">No 7 </th> 
        <th colspan="4">No 8 </th> 
        <th colspan="4">No 9 </th> 
        <th colspan="4">No 10 </th>  
        <th rowspan="2">Total </th>  
        
        <th rowspan="2">Analisa</th>

    </tr>
    <tr>
        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>

        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>

        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>

        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>

        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>

        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>

        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>

        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>

        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>

        <th>Kode ICD10</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Persentase</th>        
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;
    
    $analisaRest = $analisa->result();
	$trackAnalisa = 0; 
	
    $row = $data_51_14->result();

    $rs_count = $num_51_14;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 10; $k++) {
            echo '<td>' . $row[$track]->ICD10_CODE . '</td>';
            echo '<td>' . $row[$track]->PENY_RI_NAMA . '</td>';
            echo '<td>' . $row[$track]->PENY_RI_JMLH . '</td>';
            echo '<td>' . $row[$track]->PENY_RI_PERSENTASE . '</td>';
            $track++;
        }
        echo '<td></td>';
        
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