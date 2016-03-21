<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6 VCT CSt</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region RS</th>
        <th rowspan="3">Kode RS</th>
        <th rowspan="3">Nama RS</th>   

        <th colspan="5"> <1 </th> 
        <th colspan="5">1-4 tahun   </th> 
        <th colspan="5">5-14 tahun</th> 
        <th colspan="5">15-24 tahun</th> 
        <th colspan="5">25-44 tahun</th>  
        <th colspan="5">45-64 tahun </th>  
        <th colspan="5">65+ tahun</th>  
        <th colspan="5">Total </th>  

    <tr>
        <th colspan="3">Klinik VCT</th>  
        <th colspan="2">Klinik CST </th>  

        <th colspan="3">Klinik VCT</th>  
        <th colspan="2">Klinik CST </th>

        <th colspan="3">Klinik VCT</th>  
        <th colspan="2">Klinik CST </th>

        <th colspan="3">Klinik VCT</th>  
        <th colspan="2">Klinik CST </th>

        <th colspan="3">Klinik VCT</th>  
        <th colspan="2">Klinik CST </th>

        <th colspan="3">Klinik VCT</th>  
        <th colspan="2">Klinik CST </th>

        <th colspan="3">Klinik VCT</th>  
        <th colspan="2">Klinik CST </th>

        <th colspan="3">Klinik VCT</th>  
        <th colspan="2">Klinik CST </th>
    </tr>
    <tr>
        <th>Jumlah Pasien</th>
        <th>HIV (-)</th>
        <th>HIV (+)</th>
        <th>Jumlah Pasien</th>
        <th>Pengobatan ARV</th>

        <th>Jumlah Pasien</th>
        <th>HIV (-)</th>
        <th>HIV (+)</th>
        <th>Jumlah Pasien</th>
        <th>Pengobatan ARV</th>

        <th>Jumlah Pasien</th>
        <th>HIV (-)</th>
        <th>HIV (+)</th>
        <th>Jumlah Pasien</th>
        <th>Pengobatan ARV</th>

        <th>Jumlah Pasien</th>
        <th>HIV (-)</th>
        <th>HIV (+)</th>
        <th>Jumlah Pasien</th>
        <th>Pengobatan ARV</th>

        <th>Jumlah Pasien</th>
        <th>HIV (-)</th>
        <th>HIV (+)</th>
        <th>Jumlah Pasien</th>
        <th>Pengobatan ARV</th>

        <th>Jumlah Pasien</th>
        <th>HIV (-)</th>
        <th>HIV (+)</th>
        <th>Jumlah Pasien</th>
        <th>Pengobatan ARV</th>

        <th>Jumlah Pasien</th>
        <th>HIV (-)</th>
        <th>HIV (+)</th>
        <th>Jumlah Pasien</th>
        <th>Pengobatan ARV</th>

        <th>Jumlah Pasien</th>
        <th>HIV (-)</th>
        <th>HIV (+)</th>
        <th>Jumlah Pasien</th>
        <th>Pengobatan ARV</th>
    </tr>
</tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_vct_cst->result();

    $rs_count = $num_vct_cst;
	$total = array_fill(0,40,0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        $jum1 = $jum2 = $jum3 = $jum4 = $jum5 = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 7; $k++) {
            echo '<td>' . $row[$track]->VCT_JUMLAHTOTAL . '</td>';
            $jum1 = $jum1 + $row[$track]->VCT_JUMLAHTOTAL;
            echo '<td>' . $row[$track]->VCT_NEGATIF . '</td>';
            $jum2 = $jum2 + $row[$track]->VCT_NEGATIF;
            echo '<td>' . $row[$track]->VCT_POSITIF . '</td>';
            $jum3 = $jum3 + $row[$track]->VCT_POSITIF;
            echo '<td>' . $row[$track]->CST_JUMLAHTOTAL . '</td>';
            $jum4 = $jum4 + $row[$track]->CST_JUMLAHTOTAL;
            echo '<td>' . $row[$track]->CST_ARV . '</td>';
            $jum5 = $jum5 + $row[$track]->CST_ARV;
			
			$total[$ind] += $row[$track]->VCT_JUMLAHTOTAL; 
			$total[++$ind] += $row[$track]->VCT_NEGATIF;  
			$total[++$ind] += $row[$track]->VCT_POSITIF;
			$total[++$ind] += $row[$track]->CST_JUMLAHTOTAL;  
			$total[++$ind] += $row[$track]->CST_ARV;
			 
			$ind++;
		
            $track++;
        }
        echo '<td>' . $jum1 . '</td>';
        echo '<td>' . $jum2 . '</td>';
        echo '<td>' . $jum3 . '</td>';
        echo '<td>' . $jum4 . '</td>';
        echo '<td>' . $jum5 . '</td>';
		
		$total[$ind] += $jum1; 
		$total[++$ind] += $jum2;  
		$total[++$ind] += $jum3;
		$total[++$ind] += $jum4;  
		$total[++$ind] += $jum5;
			
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 40; $i++){
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	  
	echo '</tr>';
	}
    ?>
</tbody>