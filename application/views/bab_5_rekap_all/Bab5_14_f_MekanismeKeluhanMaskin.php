<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.14.f. Mekanisme Pengaduan Masalah Maskin di RS</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 

        <th colspan="6">Media Masa</th> 
        <th colspan="6">Media Elektronik (TV, Radio, Internet dll) </th>  
        <th colspan="6">Kotak Saran</th>  
        <th colspan="6">Telepon/SMS/Hotlines </th>  
        <th colspan="6">Tim Pengendali Pelayanan </th>
    </tr>
    <tr>
        <th colspan="3">Tahun</th>
        <th rowspan="2">Jumlah</th>
        <th rowspan="2">Rerata</th>
        <th rowspan="2">Tren</th>
        
        <th colspan="3">Tahun</th>
        <th rowspan="2">Jumlah</th>
        <th rowspan="2">Rerata</th>
        <th rowspan="2">Tren</th>
        
        <th colspan="3">Tahun</th>
        <th rowspan="2">Jumlah</th>
        <th rowspan="2">Rerata</th>
        <th rowspan="2">Tren</th>
        
        <th colspan="3">Tahun</th>
        <th rowspan="2">Jumlah</th>
        <th rowspan="2">Rerata</th>
        <th rowspan="2">Tren</th>
        
        <th colspan="3">Tahun</th>
        <th rowspan="2">Jumlah</th>
        <th rowspan="2">Rerata</th>
        <th rowspan="2">Tren</th>
    </tr>
    <tr>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_maskin6->result();

    $rs_count = $num_maskin6;
	$total = array_fill(0, 30, 0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->nm_list_regoion . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 5; $k++) {
            echo '<td>' . $row[$track]->MEKANISME_PENGADUAN_N2 . '</td>';
            echo '<td>' . $row[$track]->MEKANISME_PENGADUAN_N1 . '</td>';
            echo '<td>' . $row[$track]->MEKANISME_PENGADUAN_N . '</td>';
            echo '<td>' . $row[$track]->MEKANISME_PENGADUAN_JML . '</td>';
            echo '<td>';
            echo ($row[$track]->MEKANISME_PENGADUAN_N2 + $row[$track]->MEKANISME_PENGADUAN_N1 + $row[$track]->MEKANISME_PENGADUAN_N) / 3;
            echo '</td>';
            echo '<td>' . $row[$track]->MEKANISME_PENGADUAN_TREN . '</td>';
			
			$total[$ind] += $row[$track]->MEKANISME_PENGADUAN_N2 ; 
			$total[++$ind] += $row[$track]->MEKANISME_PENGADUAN_N1  ;  
			$total[++$ind] += $row[$track]->MEKANISME_PENGADUAN_N ;
			$total[++$ind] += $row[$track]->MEKANISME_PENGADUAN_JML  ;  
			$total[++$ind] = 0 ;
			$total[++$ind] = 0 ;
			 
			$ind++;
			
            $track++;
        }
        echo '</tr>';
    }
	if( $row!=null){
    echo '<tr>';
    echo '<td><b>Total</b></td>';
    echo '<td> </td> <td> </td> <td> </td>';
    for ($i = 0; $i < 30; $i++) {
		if(($i+1)%5 == 0)
		echo '<td> - </td>'; 
		else if (($i+1)% 6 == 0)
		echo '<td> - </td>'; 
		else
        echo '<td>' . $total[$i] . '</td>'; 
    } 
    echo '</tr>';
	}
    ?>
</tbody>