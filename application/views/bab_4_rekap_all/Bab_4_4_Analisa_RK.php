<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 4.4 Analisa  Rasio Keuangan</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="2">Current Ratio</th>  
        <th colspan="2">Quick Ratio </th>  
        <th colspan="2">Cash Ratio </th>  
        <th colspan="2">Return of Investment </th>  
        <th colspan="2">Debt of Total Asset Ratio </th>  
        <th colspan="2">Debt To Equity Ratio </th>  
        <th rowspan="2">Analisa</th> 

    </tr>
    <tr>
        <th>Trend</th>
        <th>Kesimpulan</th>
        <th>Trend</th>
        <th>Kesimpulan</th>
        <th>Trend</th>
        <th>Kesimpulan</th>
        <th>Trend</th>
        <th>Kesimpulan</th>
        <th>Trend</th>
        <th>Kesimpulan</th>
        <th>Trend</th>
        <th>Kesimpulan</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_ark->result(); 
    $rs_count = $num_ark;
	
	$analisaRest = $analisa->result();
	$trackAnalisa = 0;

    $total = array_fill(0, 12, 0);

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 6; $k++) {
            echo '<td>' . $row[$track]->ARK_TREND . '</td>';
            echo '<td>' . $row[$track]->ARK_KESIMPULAN . '</td>';

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