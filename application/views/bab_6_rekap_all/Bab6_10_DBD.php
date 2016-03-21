<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6.3.c.1 Kasus DBD</h4>

<thead>
    <tr>

        <th rowspan="3">No</th>
        <th rowspan="3">Region RS</th>
        <th rowspan="3">Kode RS</th>
        <th rowspan="3">Nama RS</th>   

        <th colspan="8">Dewasa</th>  
        <th colspan="8">Anak </th>  
        <th colspan="3" rowspan ="2">Total </th> 				 
    </tr>
    <tr>
        <th colspan="4">L </th> 
        <th  colspan="4">P </th> 

        <th colspan="4">L </th> 
        <th  colspan="4">P </th> 
    </tr>
    <tr>
        <th>Suspek </th> 
        <th>DBD </th> 
        <th>DBD+Syok</th> 
        <th>Total </th> 

        <th>Suspek </th> 
        <th>DBD </th> 
        <th>DBD+Syok</th> 
        <th>Total </th> 

        <th>Suspek </th> 
        <th>DBD </th> 
        <th>DBD+Syok</th> 
        <th>Total </th> 

        <th>Suspek </th> 
        <th>DBD </th> 
        <th>DBD+Syok</th> 
        <th>Total </th> 

        <th>Suspek </th> 
        <th>DBD </th> 
        <th>DBD+Syok</th> 
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_dbd->result();

    $rs_count = $num_dbd;
	$totalAll = array_fill(0,24,0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $jumN2 = $jumN1 = $jumN = 0;
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';

        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        $temp = $track;
        $total1 = 0;
        echo '<td>' . $row[$track]->DBD_DEWASA_L . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_DEWASA_L . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_DEWASA_L . '</td>';
        $total = $row[$track]->DBD_DEWASA_L + $row[$track + 1]->DBD_DEWASA_L + $row[$track + 2]->DBD_DEWASA_L;
        echo '<td>' . $total . '</td>';
		
		$totalAll[$ind] += $row[$track]->DBD_DEWASA_L; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_DEWASA_L;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_DEWASA_L ; 
		$totalAll[++$ind] += $total ;

        echo '<td>' . $row[$track]->DBD_DEWASA_P . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_DEWASA_P . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_DEWASA_P . '</td>';
        $total = $row[$track]->DBD_DEWASA_P + $row[$track + 1]->DBD_DEWASA_P + $row[$track + 2]->DBD_DEWASA_P;
        echo '<td>' . $total . '</td>';
		
		$totalAll[++$ind] += $row[$track]->DBD_DEWASA_P; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_DEWASA_P;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_DEWASA_P ; 
		$totalAll[++$ind] += $total ;

        echo '<td>' . $row[$track]->DBD_ANAK_L . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_ANAK_L . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_ANAK_L . '</td>';
        $total = $row[$track]->DBD_ANAK_L + $row[$track + 1]->DBD_ANAK_L + $row[$track + 2]->DBD_ANAK_L;
        echo '<td>' . $total . '</td>';
		
		$totalAll[++$ind] += $row[$track]->DBD_ANAK_L; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_ANAK_L;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_ANAK_L ; 
		$totalAll[++$ind] += $total ;


        echo '<td>' . $row[$track]->DBD_ANAK_P . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_ANAK_P . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_ANAK_P . '</td>';
        echo '<td>' . $row[$track]->DBD_ANAK_P + $row[$track + 1]->DBD_ANAK_P + $row[$track + 2]->DBD_ANAK_P . '</td>';
        $total = $row[$track]->DBD_ANAK_P + $row[$track + 1]->DBD_ANAK_P + $row[$track + 2]->DBD_ANAK_P;
        echo '<td>' . $total . '</td>';
		
		$totalAll[++$ind] += $row[$track]->DBD_ANAK_P; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_ANAK_P;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_ANAK_P ; 
		$totalAll[++$ind] += $total ;

        //jumlah total per kategori
        $jumN2 = $row[$track]->DBD_DEWASA_L + $row[$track]->DBD_DEWASA_P + $row[$track]->DBD_ANAK_L + $row[$track]->DBD_ANAK_P;
        $jumN1 = $row[$track + 1]->DBD_DEWASA_L + $row[$track + 1]->DBD_DEWASA_P + $row[$track + 1]->DBD_ANAK_L + $row[$track + 1]->DBD_ANAK_P;
        $jumN = $row[$track + 2]->DBD_DEWASA_L + $row[$track + 2]->DBD_DEWASA_P + $row[$track + 2]->DBD_ANAK_L + $row[$track + 2]->DBD_ANAK_P;

		$totalAll[++$ind] += $jumN2 ; 
		$totalAll[++$ind] += $jumN1 ;  
		$totalAll[++$ind] += $jumN; 
		
        echo '<td>' . $jumN2 . '</td>';
        echo '<td>' . $jumN1 . '</td>';
        echo '<td>' . $jumN . '</td>';

        $track = $temp;

        echo '</tr>';
        $track+=3;
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 19; $i++){
				 echo '<td>' . $totalAll[$i]. '</td>';  
			}  
	  
	echo '</tr>';
	}
    ?>
</tbody>