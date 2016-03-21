<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.25.a. Jumlah Kunjungan Kegiatan Kesehatan Jiwa</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region</th>
        <th>Kode RS</th> 
        <th>Nama RS</th> 


        <th colspan="1">Psikotest</th> 
        <th colspan="1">Konsultasi </th>  
        <th colspan="1">Therapi Medikamentosa</th>  
        <th colspan="1">Elektromedik </th>  
        <th colspan="1">Psikoterapi </th>  
        <th colspan="1">Play Therapi </th>  
        <th colspan="1">TOTAL </th>   

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_jiwa->result();

    $rs_count = $num_jiwa;
	$total = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	$totalAll = 0;
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region. '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 6; $k++) {
			$nilai = $row[$track]->JIWA_TOTAL;
            echo '<td>' . $nilai. '</td>';
            $totalX += $nilai;
            $track++;
			
			$total[$ind] += $nilai;
			$ind++;
        }
		
        echo '<td>' . $totalX . '</td>';
		$totalAll += $totalX;
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td>total </td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 6; $i++)
				 echo '<td>' . $total[$i]. '</td>'; 
	 echo '<td>'.$totalAll.'</td>'; 
	echo '</tr>';
	}
    ?>
</tbody>