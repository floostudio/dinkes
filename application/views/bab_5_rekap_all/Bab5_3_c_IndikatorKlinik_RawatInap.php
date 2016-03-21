<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.3.c Indikator Klinik Rawat Inap</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 

        <th colspan="5">Indikator Klinik</th>
        
        <th rowspan="2">Analisa</th>
    </tr>
    <tr>
        <th>Angka Dekubitus</th>  
        <th>Angka Infeksi Saluran Kencing </th> 
        <th>Angka Infeksi Luka Operasi </th> 
        <th>Angka Infeksi karena jarum infus </th> 
        <th>Lain-lain</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_13->result();
    
    $analisaRest = $analisa->result();
	$trackAnalisa = 0;

    
    $rs_count = $num_51_13;
	$total = array_fill(0,5,0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 5; $k++) {
            echo '<td>' . $row[$track]->IK_NILAI . '</td>';
			
			$total[$ind] += $row[$track]->IK_NILAI ;  
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
		//////////////////
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 5; $i++){
				 echo '<td>' . $total[$i]/$rs_count. '</td>';  
			}  
	echo '<td>-</td>';
	echo '</tr>';
	}
    ?>
</tbody>