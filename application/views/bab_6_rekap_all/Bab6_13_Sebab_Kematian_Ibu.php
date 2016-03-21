<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6.3.d.2 Sebab Kematian Ibu</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region RS</th>
        <th>Kode RS</th>
        <th>Nama RS</th>   

        <th> Perdarahan </th> 
        <th> Infeksi </th> 
        <th> Sepsis </th> 
        <th> Pre Eklamsia/Eklampsia </th> 
        <th> Jantung </th> 
        <th> TB Paru </th> 
        <th> Asma </th> 
        <th> Hipertensi </th> 
        <th> Lainnya </th> 
		<th> Total </th> 

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_ski->result();

    $rs_count = $num_ski;
	$total = array_fill(0,10,0);
	
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$totalX = 0;
		$ind =0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 9; $k++) {
            echo '<td>' . $row[$track]->JKIF_FAKTOR . '</td>';
			$total[$ind] += $row[$track]->JKIF_FAKTOR; 
			$totalX += $row[$track]->JKIF_FAKTOR;
			
			$ind++;
            $track++;
        }
		echo '<td>' . $totalX . '</td>';
		$total[$ind] += $totalX; 
        echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 10; $i++){
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	  
	echo '</tr>';
	} 
    ?>
</tbody>