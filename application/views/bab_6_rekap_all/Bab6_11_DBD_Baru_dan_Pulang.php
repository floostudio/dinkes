<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6.3.c.2 Kasus DBD Baru Pulang dan Meninggal</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th>
        <th rowspan="4">Nama RS</th>   

        <th colspan="8" >MRS Masuk  </th> 
        <th colspan="24">Pulang  </th>  
        <th colspan="3" rowspan="3">TOTAL</th> 		

    </tr>
    <tr>
        <th colspan="4" rowspan="2" >Dewasa </th> 
        <th colspan="4" rowspan="2" >Anak </th> 

        <th colspan="12"  >Dewasa </th> 
        <th colspan="12"  >Anak </th> 
    </tr>

    <tr>
        <th colspan="4"  >Meninggal < 24 Jam </th>   
        <th colspan="4"  >Meninggal > 24 Jam </th>  
        <th colspan="4"  >Sembuh </th>  

        <th colspan="4"  >Meninggal < 24 Jam </th>   
        <th colspan="4"  >Meninggal > 24 Jam </th>  
        <th colspan="4"  >Sembuh </th>  
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

    $row = $data_dbd2->result();

    $rs_count = $num_dbd2;
	$totalAll = array_fill(0,35,0);
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
        echo '<td>' . $row[$track]->DBD_II_MRS_DEWASA . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_II_MRS_DEWASA . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_II_MRS_DEWASA . '</td>';
        $total = $row[$track]->DBD_II_MRS_DEWASA + $row[$track + 1]->DBD_II_MRS_DEWASA + $row[$track + 2]->DBD_II_MRS_DEWASA;
        echo '<td>' . $total . '</td>';
		
		$totalAll[$ind] += $row[$track]->DBD_II_MRS_DEWASA; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_II_MRS_DEWASA;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_II_MRS_DEWASA ; 
		$totalAll[++$ind] += $total ;

        echo '<td>' . $row[$track]->DBD_II_MRS_ANAK . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_II_MRS_ANAK . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_II_MRS_ANAK . '</td>';
        $total = $row[$track]->DBD_II_MRS_ANAK + $row[$track + 1]->DBD_II_MRS_ANAK + $row[$track + 2]->DBD_II_MRS_ANAK;
        echo '<td>' . $total . '</td>';
		
		$totalAll[++$ind] += $row[$track]->DBD_II_MRS_ANAK; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_II_MRS_ANAK;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_II_MRS_ANAK ; 
		$totalAll[++$ind] += $total ;

        echo '<td>' . $row[$track]->DBD_II_DEWASA_MDB24 . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_II_DEWASA_MDB24 . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_II_DEWASA_MDB24 . '</td>';
        $total = $row[$track]->DBD_II_DEWASA_MDB24 + $row[$track + 1]->DBD_II_DEWASA_MDB24 + $row[$track + 2]->DBD_II_DEWASA_MDB24;
        echo '<td>' . $total . '</td>';
		
		$totalAll[++$ind] += $row[$track]->DBD_II_DEWASA_MDB24; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_II_DEWASA_MDB24;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_II_DEWASA_MDB24 ; 
		$totalAll[++$ind] += $total ;


        echo '<td>' . $row[$track]->DBD_II_DEWASA_MDA24 . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_II_DEWASA_MDA24 . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_II_DEWASA_MDA24 . '</td>';
        $total = $row[$track]->DBD_II_DEWASA_MDA24 + $row[$track + 1]->DBD_II_DEWASA_MDA24 + $row[$track + 2]->DBD_II_DEWASA_MDA24;
        echo '<td>' . $total . '</td>';
		
		$totalAll[++$ind] += $row[$track]->DBD_II_DEWASA_MDA24; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_II_DEWASA_MDA24;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_II_DEWASA_MDA24 ; 
		$totalAll[++$ind] += $total ;

        echo '<td>' . $row[$track]->DBD_II_DEWASA_SEMBUH . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_II_DEWASA_SEMBUH . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_II_DEWASA_SEMBUH . '</td>';
        $total = $row[$track]->DBD_II_DEWASA_SEMBUH + $row[$track + 1]->DBD_II_DEWASA_SEMBUH + $row[$track + 2]->DBD_II_DEWASA_SEMBUH;
        echo '<td>' . $total . '</td>';
		
		$totalAll[++$ind] += $row[$track]->DBD_II_DEWASA_SEMBUH; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_II_DEWASA_SEMBUH;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_II_DEWASA_SEMBUH ; 
		$totalAll[++$ind] += $total ;

        echo '<td>' . $row[$track]->DBD_II_ANAK_MDB24 . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_II_ANAK_MDB24 . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_II_ANAK_MDB24 . '</td>';
        $total = $row[$track]->DBD_II_ANAK_MDB24 + $row[$track + 1]->DBD_II_ANAK_MDB24 + $row[$track + 2]->DBD_II_ANAK_MDB24;
        echo '<td>' . $total . '</td>';

		$totalAll[++$ind] += $row[$track]->DBD_II_ANAK_MDB24; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_II_ANAK_MDB24;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_II_ANAK_MDB24 ; 
		$totalAll[++$ind] += $total ;
		
        echo '<td>' . $row[$track]->DBD_II_ANAK_MDA24 . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_II_ANAK_MDA24 . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_II_ANAK_MDA24 . '</td>';
        $total = $row[$track]->DBD_II_ANAK_MDA24 + $row[$track + 1]->DBD_II_ANAK_MDA24 + $row[$track + 2]->DBD_II_ANAK_MDA24;
        echo '<td>' . $total . '</td>';


		$totalAll[++$ind] += $row[$track]->DBD_II_ANAK_MDA24; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_II_ANAK_MDA24;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_II_ANAK_MDA24 ; 
		$totalAll[++$ind] += $total ;
		
        echo '<td>' . $row[$track]->DBD_II_ANAK_SEBUH . '</td>';
        echo '<td>' . $row[$track + 1]->DBD_II_ANAK_SEBUH . '</td>';
        echo '<td>' . $row[$track + 2]->DBD_II_ANAK_SEBUH . '</td>';
        $total = $row[$track]->DBD_II_ANAK_SEBUH + $row[$track + 1]->DBD_II_ANAK_SEBUH + $row[$track + 2]->DBD_II_ANAK_SEBUH;
        echo '<td>' . $total . '</td>';
		
		$totalAll[++$ind] += $row[$track]->DBD_II_ANAK_SEBUH; 
		$totalAll[++$ind] += $row[$track + 1]->DBD_II_ANAK_SEBUH;  
		$totalAll[++$ind] += $row[$track + 2]->DBD_II_ANAK_SEBUH ; 
		$totalAll[++$ind] += $total ;

        //jumlah total per kategori
        $jumN2 = $row[$track]->DBD_II_TOTAL;
        $jumN1 = $row[$track + 1]->DBD_II_TOTAL;
        $jumN = $row[$track + 2]->DBD_II_TOTAL;
		
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
			for($i = 0; $i < 35; $i++){
				 echo '<td>' . $totalAll[$i]. '</td>';  
			}  
	  
	echo '</tr>';
	}
	
    ?>
</tbody>