<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 3.3.2 Kelayakan Peralatan Rumah Sakit</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 

        <th colspan="7">Kelayakan Peralatan</th>
    </tr>
    <tr>        
        <th>Jumlah Peralatan Berkalibrasi</th>
        <th>Jumlah Peralatan yang Wajib Dikalibrasi</th>
        <th>Prosentase</th>
        <th>Jumlah Peralatan yang Baik dan Berfungsi</th>
        <th>Jumlah Peralatan yang Ada</th>
        <th>Prosentase</th>
        <th>Analisa</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data3_3_2->result();
    $rs_count = $num_3_3_2;
    
    $analisaRest = $analisa->result();
	$trackAnalisa = 0;

    $totKalibrasi = 0;
    $totWajibKalibrasi = 0;
    
    $totBaik = 0;
    $totPeralatan = 0;
    
    $prosentaseTotal1 = $prosentaseTotal2 = 0;

    $prosentase1 = $prosentase2 = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totX1 = $totX2 = $totX3 = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        echo '<td>' . $row[$track]->JUMLAH_PERALATAN_KALIBRASI . '</td>'; 
        $totKalibrasi += $row[$track]->JUMLAH_PERALATAN_KALIBRASI;
        echo '<td>' . $row[$track]->JUMLAH_PERALATAN_KALIBRASI_STANDAR . '</td>';
        $totWajibKalibrasi += $row[$track]->JUMLAH_PERALATAN_KALIBRASI_STANDAR;
		
		if($row[$track]->JUMLAH_PERALATAN_KALIBRASI_STANDAR != 0)
			$prosentase1 = ($row[$track]->JUMLAH_PERALATAN_KALIBRASI / $row[$track]->JUMLAH_PERALATAN_KALIBRASI_STANDAR) * 100;
					
        echo '<td>' . $prosentase1 . '</td>';        
        
        echo '<td>' . $row[$track]->JUMLAH_PERALATAN_KONDISI_BAIK . '</td>';
        $totBaik += $row[$track]->JUMLAH_PERALATAN_KONDISI_BAIK;
        echo '<td>' . $row[$track]->JUMLAH_PERALATAN_TOTAL . '</td>';
        $totPeralatan += $row[$track]->JUMLAH_PERALATAN_TOTAL; 
		
		if($row[$track]->JUMLAH_PERALATAN_TOTAL)
			$prosentase2 = ($row[$track]->JUMLAH_PERALATAN_KONDISI_BAIK / $row[$track]->JUMLAH_PERALATAN_TOTAL) * 100;
		else
			$prosentase2 = 0;
        echo '<td>' . $prosentase2 . '</td>';
        
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
	if($totWajibKalibrasi!=0)
		$prosentaseTotal1 = ($totKalibrasi / $totWajibKalibrasi) * 100;
	  
	
	if($totPeralatan != 0)
    $prosentaseTotal2 = ($totBaik / $totPeralatan) * 100;
	else
		$prosentaseTotal2 = 0;

    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        echo '<td>' . $totKalibrasi . '</td>';
        echo '<td>' . $totWajibKalibrasi . '</td>';
        echo '<td>' . $prosentaseTotal1 . '</td>';
        echo '<td>' . $totBaik . '</td>';
        echo '<td>' . $totPeralatan . '</td>';
        echo '<td>' . $prosentaseTotal2 . '</td>';
        echo '<td>-</td>';
        echo '</tr>';
    }
    ?>
</tbody>