<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.14.d Keluhan Maskin Terhadap Petugas</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th> 


        <th colspan="6">Tenaga Spesialis</th> 
        <th colspan="6">Dokter Umum </th>  
        <th colspan="6">Perawat</th> 
        <th colspan="6">Bidan</th> 
        <th colspan="6">Tenaga Paramedis Lain </th>  
        <th colspan="6">Petugas Administrasi (Petugas loket/keuangan)</th>  
        <th colspan="6">Petugas lain</th> 
    </tr>
    <tr>
        <th colspan="6">Unit Pelayanan</th>
        <th colspan="6">Unit Pelayanan</th>
        <th colspan="6">Unit Pelayanan</th>
        <th colspan="6">Unit Pelayanan</th>
        <th colspan="6">Unit Pelayanan</th>
        <th colspan="6">Unit Pelayanan</th>
        <th colspan="6">Unit Pelayanan</th>
    </tr>
    <tr>
        <td colspan="2">UGD</td>
        <td colspan="2">IRJA</td>
        <td colspan="2">IRNA</td>
        
        <td colspan="2">UGD</td>
        <td colspan="2">IRJA</td>
        <td colspan="2">IRNA</td>
        
        <td colspan="2">UGD</td>
        <td colspan="2">IRJA</td>
        <td colspan="2">IRNA</td>
        
        <td colspan="2">UGD</td>
        <td colspan="2">IRJA</td>
        <td colspan="2">IRNA</td>
        
        <td colspan="2">UGD</td>
        <td colspan="2">IRJA</td>
        <td colspan="2">IRNA</td>
        
        <td colspan="2">UGD</td>
        <td colspan="2">IRJA</td>
        <td colspan="2">IRNA</td>
        
        <td colspan="2">UGD</td>
        <td colspan="2">IRJA</td>
        <td colspan="2">IRNA</td>
    </tr>
    <tr>
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
        <td>Kasus</td>
        <td>%</td>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_maskin4->result();

    $rs_count = $num_maskin4;
	$total = array_fill(0,42,0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 7; $k++) {
            echo '<td>' . $row[$track]->SV_MASKIN_UGD . '</td>';
            echo '<td>' . $row[$track]->SV_MASKIN_UGD_P . '</td>';
            echo '<td>' . $row[$track]->SV_MASKIN_IRJA . '</td>';
            echo '<td>' . $row[$track]->SV_MASKIN_IRJA_P . '</td>';
            echo '<td>' . $row[$track]->SV_MASKIN_IRNA . '</td>';
            echo '<td>' . $row[$track]->SV_MASKIN_IRNA_P . '</td>';
			
			$total[$ind] += $row[$track]->SV_MASKIN_UGD ; 
			$total[++$ind] += $row[$track]->SV_MASKIN_UGD_P  ;  
			$total[++$ind] += $row[$track]->SV_MASKIN_IRJA ;
			$total[++$ind] += $row[$track]->SV_MASKIN_IRJA_P  ;  
			$total[++$ind] += $row[$track]->SV_MASKIN_IRNA ;
			$total[++$ind] += $row[$track]->SV_MASKIN_IRNA_P  ;   
			$ind++;

            $track++;
        }
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 42; $i++){
			if(($i+1)%2 == 0)
				echo '<td> - </td>';  
				else
				echo '<td>' . $total[$i]. '</td>';  
			}  
	echo '</tr>';
	}
    ?>
</tbody>