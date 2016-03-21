<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.23.a. Pelayanan Kesehatan Gigi</h4>
<thead>
    <tr>
        <th rowspan="1">No</th>
        <th rowspan="1">Region</th>
        <th rowspan="1">Kode RS</th> 
        <th rowspan="1" >Nama RS</th> 


        <th colspan="1">Tindakan Medik Dasar Umum </th> 
        <th colspan="1">Tumpatan tetap gigi permanen</th>  
        <th colspan="1"> Tumpatan tetap gigi sulung</th>  
        <th colspan="1"> Pengobatan pulpa </th>  
        <th colspan="1">Pencabutan gigi tetap karena keluhan pulpa</th>  
        <th colspan="1">Pencabutan gigi tetap karena penyebab lain </th>  
        <th colspan="1">Pencabutan gigi tetap karena persistensi</th>  
        <th colspan="1">Pencabutan gigi tetap karena persistensi </th>  
        <th colspan="1">Pengobatan periodontal berupa tindakan lainnya </th>  
        <th colspan="1">Tindakan pasca bedah </th>  
        <th colspan="1">Tindakan preventif berupa scaling </th>  
        <th colspan="1">Tindakan preventif berupa topical aplikasi </th>  
        <th colspan="1">Pengobatan abses berupa pemberian obat per oral</th>  
        <th colspan="1">Pengobatan abses dengan cara lain-lain </th>  
        <th colspan="1">Pengobatan abses berupa insisi ekstra/intra oral </th>  
        <th colspan="1">Tindakan Medik Dasar Khusus </th>  
        <th colspan="1">Odontektomi </th>  
        <th colspan="1">Freknotomi </th>  
        <th colspan="1">Excisi Denture Hyper Plasia </th>  
        <th colspan="1">Excisi Torus Paltinus </th>  
        <th colspan="1">Pengelolaan Simple Fraktur Mandibula dan Maxilla </th>  
		<th colspan="1">Total </th> 

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_gigi->result(); 
    $rs_count = $num_gigi;
	
	$total = array_fill(0,30,0);
	$totalAll = 0;
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 21; $k++) {
		
			$nilai = $row[$track]->PEL_GILUT_JUMLAH;
            echo '<td>' . $nilai. '</td>';
            $totalX += $nilai;
            
			$total[$ind] += $nilai;
			$ind++;
			$track++;
			}
		echo '<td>' . $totalX . '</td>';
		$totalAll += $totalX;
        echo '</tr>';
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td>total </td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 21; $i++)
				 echo '<td>' . $total[$i]. '</td>'; 
	 echo '<td>'.$totalAll.'</td>'; 
	echo '</tr>';
	}
    ?>
</tbody>