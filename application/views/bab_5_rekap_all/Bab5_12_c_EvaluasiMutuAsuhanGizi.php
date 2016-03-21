<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.12.b. Evaluasi Mutu Asuhan Gizi</h4>
<thead>
    <tr>
        <th>No</th>
        <!--th>Region</th-->
        <th>Kode RS</th> 
        <th>Nama RS</th>        
        <th>Analisa</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;
    
    $analisaRest = $analisa->result();
	$trackAnalisa = 0;

	$track = 0;
    $rs_count = $num_analisa;

    for ($j = 0; $j < count($analisaRest); $j++) {
        echo '<tr>'; 
		echo '<td>' . $i++ . '</td>';
		//echo '<td>' . $analisaRest[$trackAnalisa]->daftar_list_region . '</td>';
		echo '<td>' . $analisaRest[$trackAnalisa]->KODE_REGISTRASI . '</td>';
		echo '<td>' . $analisaRest[$trackAnalisa]->RS_NAMA . '</td>';
        $analisaData = $analisaRest[$trackAnalisa]->ANALISA_URAIAN;
		 
			
			
		echo '<td>'.$analisaData.'</td>';
		 
		
        echo '</tr>';
    }?>
</tbody>