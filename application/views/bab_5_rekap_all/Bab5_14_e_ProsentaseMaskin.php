<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.14.e Persentase Maskin</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="3">Keluhan terhadap layanan dari Petugas</th> 
        <th colspan="3">Keluhan terhadap komunikasi petugas </th>  
        <th colspan="3">Keluhan terhadap sikap/tingkah laku petugas</th>  
        <th colspan="3">Sarana prasarana/alat medis </th>  
        <th colspan="3">Sarana prasarana non medis (parkir/gedung) </th>  
        <th colspan="3">Lainnya  </th>  
        <th colspan="3">T O T A L </th>  
    </tr>
    <tr>
        <th>Jumlah Keluhan yang Ditangani</th>
        <th>Jumlah keluhan</th>
        <th>%</th>
        
        <th>Jumlah Keluhan yang Ditangani</th>
        <th>Jumlah keluhan</th>
        <th>%</th>
        
        <th>Jumlah Keluhan yang Ditangani</th>
        <th>Jumlah keluhan</th>
        <th>%</th>
        
        <th>Jumlah Keluhan yang Ditangani</th>
        <th>Jumlah keluhan</th>
        <th>%</th>
        
        <th>Jumlah Keluhan yang Ditangani</th>
        <th>Jumlah keluhan</th>
        <th>%</th>
        
        <th>Jumlah Keluhan yang Ditangani</th>
        <th>Jumlah keluhan</th>
        <th>%</th>
        
        <th>Jumlah Keluhan yang Ditangani</th>
        <th>Jumlah keluhan</th>
        <th>%</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_maskin5->result();

    $rs_count = $num_maskin5;
	$total = array_fill(0, 21, 0);
    $totalAll1 = 0;
	$totalAll2 = 0;
	$totalAll3 = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		 $ind = 0;
        $total1 = $total2 = $total3 = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 6; $k++) {
            echo '<td>' . $row[$track]->KELUHAN_MASKIN_DITANGANI . '</td>';
            echo '<td>' . $row[$track]->KELUHAN_MASKIN_JUMLAH . '</td>';
            echo '<td>' . $row[$track]->KELUHAN_MASKIN_PERSENTASE . '</td>';
			
			
			
            $total1 += $row[$track]->KELUHAN_MASKIN_DITANGANI;
            $total2 += $row[$track]->KELUHAN_MASKIN_JUMLAH;
            $total3 += $row[$track]->KELUHAN_MASKIN_PERSENTASE;
			
			$total[$ind] += $row[$track]->KELUHAN_MASKIN_DITANGANI ; 
			$total[++$ind] += $row[$track]->KELUHAN_MASKIN_JUMLAH  ;  
			$total[++$ind] += $row[$track]->KELUHAN_MASKIN_PERSENTASE ;
			 
			$ind++;
            $track++;
        }
        echo '<td>' . $total1 . '</td>';
        echo '<td>' . $total2 . '</td>';
        echo '<td>' . $total3 . '</td>';
		$totalAll1 += $total1;
		$totalAll2 += $total2;
		$totalAll3 += $total3;
        echo '</tr>';
    }
	if( $row!=null){
    echo '<tr>';
    echo '<td><b>Total</b></td>';
    echo '<td> </td> <td> </td> <td> </td>';
    for ($i = 0; $i < 18; $i++) {
	if(($i+1)%3 == 0)
	 echo '<td> - </td>'; 
	else
        echo '<td>' . $total[$i] . '</td>'; 
    } 
	echo '<td>' . $totalAll1 . '</td>'; 
	echo '<td>' . $totalAll2 . '</td>'; 
	echo '<td> - </td>'; 
    echo '</tr>';
	}
    ?>
</tbody>