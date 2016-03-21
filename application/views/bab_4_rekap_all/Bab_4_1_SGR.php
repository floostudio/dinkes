<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 4.1 Perkembangan Pertumbuhan Pendapatan (Sales Growth Rate)</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="3">N-2</th>  
        <th colspan="3">N-1</th>  
        <th colspan="3">N</th>   
        <th rowspan="2">Analisa</th> 

    </tr>
    <tr>
        <th>Pendapatan tahun ini</th>
        <th>Pendapatan tahun sebelumnya</th>
        <th> SGR (%)</th> 
        <th>Pendapatan tahun ini</th>
        <th>Pendapatan tahun sebelumnya</th>
        <th> SGR (%)</th> 
        <th>Pendapatan tahun ini</th>
        <th>Pendapatan tahun sebelumnya</th>
        <th> SGR (%)</th> 
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_sgr->result();
	$analisaRest = $analisa->result();
	$trackAnalisa = 0;

    $rs_count = $num_sgr;
	$total = array_fill(0,9,0);

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 3; $k++) {
            echo '<td>' . $row[$track]->SGR_PENDAPATAN_TAHUN_INI . '</td>';
            echo '<td>' . $row[$track]->SGR_PENDAPATAN_TAHUN_LALU . '</td>';
            echo '<td>' . $row[$track]->SGR_SGR . '</td>';
 
			$total[$ind] += $row[$track]->SGR_PENDAPATAN_TAHUN_INI; 
			$total[++$ind] += $row[$track]->SGR_PENDAPATAN_TAHUN_LALU;  
			$total[++$ind] += $row[$track]->SGR_SGR; 
			 
			$ind++;
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
		
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 9; $i++){
				if($i==2|| $i==5|| $i==8)
				echo '<td> - </td>';
				else
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	 echo '<td>-</td>';
	echo '</tr>';
	}     
    ?>
</tbody>