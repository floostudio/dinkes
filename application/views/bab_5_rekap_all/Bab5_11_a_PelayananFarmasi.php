<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.11.a. Pelayanan Obat</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 


        <th colspan="7"> Obat generik berlogo</th> 
        <th colspan="7"> Obat generik tdk berlogo</th>  
        <th colspan="7"> Obat sesuai Formularium</th>  
        <th colspan="7"> Obat paten</th>  
        <th rowspan="3"> Analisa</th>		

    </tr>

    <tr>
        <th rowspan="2">Jumlah Item Persediaan</th>
        <th colspan="4">Jumlah Resep yang ditulis</th>
        <th colspan="2">Jumlah Resep yang dilayani</th>

        <th rowspan="2">Jumlah Item Persediaan</th>
        <th colspan="4">Jumlah Resep yang ditulis</th>
        <th colspan="2">Jumlah Resep yang dilayani</th>

        <th rowspan="2">Jumlah Item Persediaan</th>
        <th colspan="4">Jumlah Resep yang ditulis</th>
        <th colspan="2">Jumlah Resep yang dilayani</th>

        <th rowspan="2">Jumlah Item Persediaan</th>
        <th colspan="4">Jumlah Resep yang ditulis</th>
        <th colspan="2">Jumlah Resep yang dilayani</th>

    </tr>

    <tr>

        <th colspan="1">IGD</th> 
        <th colspan="1">IRJA</th> 
        <th colspan="1">IRNA</th> 
        <th colspan="1">Total</th> 
        <th colspan="1">Jumlah Total</th> 
        <th colspan="1">%</th> 

        <th colspan="1">IGD</th> 
        <th colspan="1">IRJA</th> 
        <th colspan="1">IRNA</th> 
        <th colspan="1">Total</th> 
        <th colspan="1">Jumlah Total</th> 
        <th colspan="1">%</th> 

        <th colspan="1">IGD</th> 
        <th colspan="1">IRJA</th> 
        <th colspan="1">IRNA</th> 
        <th colspan="1">Total</th> 
        <th colspan="1">Jumlah Total</th> 
        <th colspan="1">%</th> 

        <th colspan="1">IGD</th> 
        <th colspan="1">IRJA</th> 
        <th colspan="1">IRNA</th> 
        <th colspan="1">Total</th> 
        <th colspan="1">Jumlah Total</th> 
        <th colspan="1">%</th> 

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;
    
    $analisaRest = $analisa->result();
	$trackAnalisa = 0;

    $row = $data_farmasi->result();
    $rs_count = $num_farmasi;

    $total = array_fill(0, 30, 0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 4; $k++) {
            echo '<td>' . $row[$track]->PF_JUMLAH_ITEM . '</td>';
            echo '<td>' . $row[$track]->PF_JML_IGD . '</td>';
            echo '<td>' . $row[$track]->PF_JML_IRJA . '</td>';
            echo '<td>' . $row[$track]->PF_JML_IRNA . '</td>';
            echo '<td>' . $row[$track]->PF_JML_RESEP_TOTAL . '</td>';
            echo '<td>' . $row[$track]->PF_JML_RESEP_DILAYANI . '</td>';
            echo '<td>' . $row[$track]->PF_JML_RESEP_PERSEN . '</td>';

            $total[$ind] += $row[$track]->PF_JUMLAH_ITEM;
            $ind++;
            $total[$ind] += $row[$track]->PF_JML_IGD;
            $ind++;
            $total[$ind] += $row[$track]->PF_JML_IRJA;
            $ind++;
            $total[$ind] += $row[$track]->PF_JML_IRNA;
            $ind++;
            $total[$ind] += $row[$track]->PF_JML_RESEP_TOTAL;
            $ind++;
            $total[$ind] += $row[$track]->PF_JML_RESEP_DILAYANI;
            $ind++;
            $total[$ind] += $row[$track]->PF_JML_RESEP_PERSEN;
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
    for ($i = 0; $i < 28; $i++) {
        if ($i != 6 && $i != 13 && $i != 20 && $i != 27)
            echo '<td>' . $total[$i] . '</td>';
        else {
            $rerata = $total[$i] / $rs_count;
            echo '<td>' . round($rerata, 2) . '</td>';
        }
    }
	echo '<td> - </td>';
    echo '</tr>';
	}
    ?>
</tbody>