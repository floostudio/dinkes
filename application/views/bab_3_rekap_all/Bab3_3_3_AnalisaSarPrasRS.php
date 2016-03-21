<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 3.3.3 Kelayakan Ruangan Rumah Sakit</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>  

        <th colspan="4">3.Kelayakan Ruangan</th>
    </tr>
    <tr>
        <th>Jumlah Luas Ruangan Per Unit Layanan</th>
        <th>Jumlah Luas Ruangan sesuai Standar</th>
        <th>Prosentase</th>
        <th>Analisa</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data3_3_3->result();
    $rs_count = $num_3_3_3;

   $analisaRest = $analisa->result();
	$trackAnalisa = 0;

    $totKalibrasi = 0;
    $totWajibKalibrasi = 0;

    $totLuas = 0;
    $totLuasStandar = 0;

    $prosentaseTotal1 = 0;

    $prosentase1 = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totX1 = $totX2 = $totX3 = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        echo '<td>' . $row[$track]->JUMLAH_LUAS_RUANGAN . '</td>';
        $totLuas += $row[$track]->JUMLAH_LUAS_RUANGAN;
        echo '<td>' . $row[$track]->JUMLAH_LUAS_RUANGAN_STANDAR . '</td>';
        $totLuasStandar += $row[$track]->JUMLAH_LUAS_RUANGAN_STANDAR;
		if($row[$track]->JUMLAH_LUAS_RUANGAN_STANDAR!=0)
			$prosentase1 = ($row[$track]->JUMLAH_LUAS_RUANGAN / $row[$track]->JUMLAH_LUAS_RUANGAN_STANDAR) * 100;
		else
			$prosentase1 = 0;
        echo '<td>' . $prosentase1 . '</td>';

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
	
	if($totLuasStandar!=0)
		$prosentaseTotal1 = ($totLuas / $totLuasStandar) * 100;

    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        echo '<td>' . $totLuas . '</td>';
        echo '<td>' . $totLuasStandar . '</td>';
        echo '<td>' . $prosentaseTotal1 . '</td>';
        echo '<td>-</td>';
        echo '</tr>';
    }
    ?>
</tbody>