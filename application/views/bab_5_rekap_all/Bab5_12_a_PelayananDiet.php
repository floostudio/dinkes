<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.12.a. Jumlah Pelayanan Diet</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 


        <th colspan="7">TKTP</th> 
        <th colspan="7"> Bubur Halus</th>  
        <th colspan="7"> Rendah Serat</th>  
        <th colspan="7"> Rendah Garam</th>  
        <th colspan="7"> Rendah Lemak</th> 
        <th colspan="7"> Lain - Lain</th>  

        <th rowspan="3">Analisa</th>
    </tr>

    <tr>
        <th colspan="7"> Jumlah Pasien Yang Membutuhkan Diet</th>
        <th colspan="7"> Jumlah Pasien Yang Membutuhkan Diet</th>
        <th colspan="7"> Jumlah Pasien Yang Membutuhkan Diet</th>
        <th colspan="7"> Jumlah Pasien Yang Membutuhkan Diet</th>
        <th colspan="7"> Jumlah Pasien Yang Membutuhkan Diet</th>
        <th colspan="7"> Jumlah Pasien Yang Membutuhkan Diet</th>         
    </tr>

    <tr>
        <th>VVIP</th>
        <th>VIP</th>
        <th>Kelas I</th>
        <th>Kelas III</th>
        <th>Kelas II</th>
        <th>Kelas I</th>
        <th>Jumlah</th>

        <th>VVIP</th>
        <th>VIP</th>
        <th>Kelas I</th>
        <th>Kelas III</th>
        <th>Kelas II</th>
        <th>Kelas I</th>
        <th>Jumlah</th>

        <th>VVIP</th>
        <th>VIP</th>
        <th>Kelas I</th>
        <th>Kelas III</th>
        <th>Kelas II</th>
        <th>Kelas I</th>
        <th>Jumlah</th>

        <th>VVIP</th>
        <th>VIP</th>
        <th>Kelas I</th>
        <th>Kelas III</th>
        <th>Kelas II</th>
        <th>Kelas I</th>
        <th>Jumlah</th>

        <th>VVIP</th>
        <th>VIP</th>
        <th>Kelas I</th>
        <th>Kelas III</th>
        <th>Kelas II</th>
        <th>Kelas I</th>
        <th>Jumlah</th>

        <th>VVIP</th>
        <th>VIP</th>
        <th>Kelas I</th>
        <th>Kelas III</th>
        <th>Kelas II</th>
        <th>Kelas I</th>
        <th>Jumlah</th>

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $analisaRest = $analisa->result();
	$trackAnalisa = 0;

    $row = $data_diet->result();

    $rs_count = $num_diet;

    $total = array_fill(0, 50, 0);

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 6; $k++) {
            echo '<td>' . $row[$track]->DIIT_VVIP . '</td>';
            echo '<td>' . $row[$track]->DIIT_VIP . '</td>';
            echo '<td>' . $row[$track]->DIIT_KLS1 . '</td>';
            echo '<td>' . $row[$track]->DIIT_KLS3 . '</td>';
            echo '<td>' . $row[$track]->DIIT_KLS2 . '</td>';
            echo '<td>' . $row[$track]->DIIT_KLS1_1 . '</td>';
            echo '<td>' . $row[$track]->DIIT_JUMLAH . '</td>';

            $total[$ind] += $row[$track]->DIIT_VVIP;
            $ind++;
            $total[$ind] += $row[$track]->DIIT_VIP;
            $ind++;
            $total[$ind] += $row[$track]->DIIT_KLS1;
            $ind++;
            $total[$ind] += $row[$track]->DIIT_KLS3;
            $ind++;
            $total[$ind] += $row[$track]->DIIT_KLS2;
            $ind++;
            $total[$ind] += $row[$track]->DIIT_KLS1_1;
            $ind++;
            $total[$ind] += $row[$track]->DIIT_JUMLAH;
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
    for ($i = 0; $i < 42; $i++) {
        echo '<td>' . $total[$i] . '</td>';
    }
    echo '<td>-</td>';
    echo '</tr>';
	}
    ?>
</tbody>