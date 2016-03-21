<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 2 Tingkat Efisiensi dan Mutu Pengelolaan Rumah Sakit</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th>   

        <th colspan="4" rowspan="3">1.BOR Perinatologi (%)</th>
        <th colspan="4">2.BOR RS</th>
        <th colspan="4">3.TOI(hari)</th>
        <th colspan="4">4.BTO(kali)</th>
        <th colspan="4">5.ALOS(hari)</th>
        <th colspan="12">6.GDR(%)</th>
        <th colspan="12">7.NDR</th>

        <th rowspan="4">Analisa</th>
    </tr>  
    <tr>
        <th colspan="4" rowspan="2">60-85</th>
        <th colspan="4" rowspan="2">1-3</th>
        <th colspan="4" rowspan="2">40-50</th>
        <th colspan="4" rowspan="2">6-9</th>
        <th colspan="4" rowspan="2">6. GDR</th>
        <th colspan="8"><45</th>
        <th colspan="4" rowspan="2">7. NDR</th>
        <th colspan="8"><25</th>
    </tr>
    <tr>
        <th colspan="4">Laki</th>
        <th colspan="4">Perempuan</th>

        <th colspan="4">Laki</th>
        <th colspan="4">Perempuan</th>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 11; $k++) { ?>
            <th>N-2</th>
            <th>N-1</th>
            <th>N</th>
            <th>Rerata</th>
        <?php } ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $analisaRest = $analisa->result();
	$trackAnalisa = 0;
    $row = $data_22->result();
    $rs_count = $num_2_22;

    $totalN2 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $totalN1 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $totalN = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 11; $k++) {
            echo '<td>' . $row[$track]->EFF_NILAI_N2 . '</td>';
            echo '<td>' . $row[$track]->EFF_NILAI_N1 . '</td>';
            echo '<td>' . $row[$track]->EFF_NILAI_N . '</td>';
            echo '<td>' . $row[$track]->EFF_RERATA . '</td>';

            $totalN2[$k] += $row[$track]->EFF_NILAI_N2;
            $totalN1[$k] += $row[$track]->EFF_NILAI_N1;
            $totalN[$k] += $row[$track]->EFF_NILAI_N;

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

    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($l = 0; $l < 11; $l++) {
            echo '<td>' . $totalN2[$l] . '</td>';
            echo '<td>' . $totalN1[$l] . '</td>';
            echo '<td>' . $totalN[$l] . '</td>';
            echo '<td> - </td>';
        }
        echo '<td> - </td>';
        echo '</tr>';
    }
    ?>
</tbody>