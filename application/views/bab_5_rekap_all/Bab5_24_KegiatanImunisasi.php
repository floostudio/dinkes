<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.24. Kegiatan Imunisasi</h4>
<thead>
    <tr>
        <th rowspan="3" >No</th>
        <th rowspan="3" >Region</th>
        <th rowspan="3" >Kode RS</th> 
        <th rowspan="3" >Nama RS</th> 


        <th colspan="9">BCG</th> 
        <th colspan="9">DTP</th>  
        <th colspan="9">Poliomelitis</th>  
        <th colspan="9">Tetanus Toxoid </th>  
        <th colspan="9">D T</th>
        <th colspan="9">Campak</th> 
        <th colspan="9">Hepatitis B</th> 
        <th colspan="9">Lainnya</th> 
    </tr>
    <tr>
        <th rowspan="2">Jumlah Kegiatan</th>
        <th colspan="3">IMUNISASI DASAR</th>
        <th colspan="4">BOOSTER</th>
        <th rowspan="2">Keterangan</th>

        <th rowspan="2">Jumlah Kegiatan</th>
        <th colspan="3">IMUNISASI DASAR</th>
        <th colspan="4">BOOSTER</th>
        <th rowspan="2">Keterangan</th>

        <th rowspan="2">Jumlah Kegiatan</th>
        <th colspan="3">IMUNISASI DASAR</th>
        <th colspan="4">BOOSTER</th>
        <th rowspan="2">Keterangan</th>

        <th rowspan="2">Jumlah Kegiatan</th>
        <th colspan="3">IMUNISASI DASAR</th>
        <th colspan="4">BOOSTER</th>
        <th rowspan="2">Keterangan</th>

        <th rowspan="2">Jumlah Kegiatan</th>
        <th colspan="3">IMUNISASI DASAR</th>
        <th colspan="4">BOOSTER</th>
        <th rowspan="2">Keterangan</th>

        <th rowspan="2">Jumlah Kegiatan</th>
        <th colspan="3">IMUNISASI DASAR</th>
        <th colspan="4">BOOSTER</th>
        <th rowspan="2">Keterangan</th>

        <th rowspan="2">Jumlah Kegiatan</th>
        <th colspan="3">IMUNISASI DASAR</th>
        <th colspan="4">BOOSTER</th>
        <th rowspan="2">Keterangan</th>

        <th rowspan="2">Jumlah Kegiatan</th>
        <th colspan="3">IMUNISASI DASAR</th>
        <th colspan="4">BOOSTER</th>
        <th rowspan="2">Keterangan</th>
    </tr>
    <tr>
        <th>Ke-1</th>
        <th>Ke-2</th>
        <th>Ke-3</th>
        <th>1 Thn</th>
        <th>6 Thn</th>
        <th>12 Thn</th>
        <th>Jumlah</th>

        <th>Ke-1</th>
        <th>Ke-2</th>
        <th>Ke-3</th>
        <th>1 Thn</th>
        <th>6 Thn</th>
        <th>12 Thn</th>
        <th>Jumlah</th>

        <th>Ke-1</th>
        <th>Ke-2</th>
        <th>Ke-3</th>
        <th>1 Thn</th>
        <th>6 Thn</th>
        <th>12 Thn</th>
        <th>Jumlah</th>

        <th>Ke-1</th>
        <th>Ke-2</th>
        <th>Ke-3</th>
        <th>1 Thn</th>
        <th>6 Thn</th>
        <th>12 Thn</th>
        <th>Jumlah</th>

        <th>Ke-1</th>
        <th>Ke-2</th>
        <th>Ke-3</th>
        <th>1 Thn</th>
        <th>6 Thn</th>
        <th>12 Thn</th>
        <th>Jumlah</th>

        <th>Ke-1</th>
        <th>Ke-2</th>
        <th>Ke-3</th>
        <th>1 Thn</th>
        <th>6 Thn</th>
        <th>12 Thn</th>
        <th>Jumlah</th>

        <th>Ke-1</th>
        <th>Ke-2</th>
        <th>Ke-3</th>
        <th>1 Thn</th>
        <th>6 Thn</th>
        <th>12 Thn</th>
        <th>Jumlah</th>

        <th>Ke-1</th>
        <th>Ke-2</th>
        <th>Ke-3</th>
        <th>1 Thn</th>
        <th>6 Thn</th>
        <th>12 Thn</th>
        <th>Jumlah</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_imunisasi->result();

    $rs_count = $num_imunisasi;
	$total = array_fill(0,100,0); 
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 8; $k++) {
            echo '<td>' . $row[$track]->IMUNISASI_JML_KEGIATAN . '</td>';
            echo '<td>' . $row[$track]->IMUNISASI_DASAR1 . '</td>';
            echo '<td>' . $row[$track]->IMUNISASI_DASAR2 . '</td>';
            echo '<td>' . $row[$track]->IMUNISASI_DASAR3 . '</td>';
            echo '<td>' . $row[$track]->IMUNISASI_BOOSTER1 . '</td>';
            echo '<td>' . $row[$track]->IMUNISASI_BOOSTER6 . '</td>';
            echo '<td>' . $row[$track]->IMUNISASI_BOOSTER12 . '</td>';
            echo '<td>' . $row[$track]->IMUNISASI_BOOSTER_JML . '</td>';
            echo '<td>' . $row[$track]->IMUNISASI_KETERANGAN . '</td>';
            
			$total[$ind] += $row[$track]->IMUNISASI_JML_KEGIATAN ;
			$ind++;
			$total[$ind] += $row[$track]->IMUNISASI_DASAR1 ;
			$ind++;
			$total[$ind] += $row[$track]->IMUNISASI_DASAR2 ;
			$ind++;
			$total[$ind] += $row[$track]->IMUNISASI_DASAR3 ;
			$ind++;
			$total[$ind] += $row[$track]->IMUNISASI_BOOSTER1 ;
			$ind++;
			$total[$ind] += $row[$track]->IMUNISASI_BOOSTER6 ;
			$ind++;
			$total[$ind] += $row[$track]->IMUNISASI_BOOSTER12 ;
			$ind++;
			$total[$ind] += $row[$track]->IMUNISASI_BOOSTER_JML ;
			$ind++;
			$total[$ind] = 0 ;
			$ind++;
			
			$track++;
			
        }
        echo '</tr>';
		
    }
	if( $row!=null){
    echo '<tr>';
    echo '<td><b>Total</b></td>';
    echo '<td> </td> <td> </td> <td> </td>';
    for ($i = 0; $i < 72; $i++) {
		if(($i+1)%9 == 0)
		echo '<td> - </td>';  
		else
        echo '<td>' . $total[$i] . '</td>'; 
    } 
    echo '</tr>';
	}
 
    ?>
</tbody>