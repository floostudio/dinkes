<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5 SPM Sarana</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 

        <th colspan="4">Kecepatan waktu menanggapi kerusakan alat</td>
    <th colspan="4">Ketepatan waktu pemeliharaan alat</td>
<th colspan="4">Peralatan laboratorium dan alat ukur yang digunakan dalam pelayanan terkalibrasi tepat waktu sesuai dengan ketentuan kalibrasi</td>

<th rowspan="2">Analisa</th>
</tr>
<tr>

    <th>Standar</th> 
    <th>Hasil Numerator</th> 
    <th>Hasil Denumenrator</th>  
    <th>Nilai</th>  

    <th>Standar</th> 
    <th>Hasil Numerator</th> 
    <th>Hasil Denumenrator</th>  
    <th>Nilai</th>  

    <th>Standar</th> 
    <th>Hasil Numerator</th> 
    <th>Hasil Denumenrator</th>  
    <th>Nilai</th>  

</tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $analisaRest = $analisa->result();
	$trackAnalisa = 0;

    $row = $data_spm->result();

    $rs_count = $num_spm;

    $track = 0; //indikator kategori starting id
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->nm_list_regoion . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 0; $k < 3; $k++) {
            echo '<td>' . $row[$track]->SPM_STANDAR . '</td>';
            echo '<td>' . $row[$track]->SPM_NUMERATOR . '</td>';
            echo '<td>' . $row[$track]->SPM_DENUMERATOR . '</td>';
            echo '<td>' . $row[$track]->SPM_PENCAPAIAN . '</td>';
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