<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.6.a Kegiatan Pelayanan KB</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 

        <th colspan="6">IUD</th> 
        <th colspan="6">MOW</th> 
        <th colspan="6">MOP</th> 
        <th colspan="6">Implant</th> 
        <th colspan="6">Pil</th> 
        <th colspan="6">Suntik</th> 
        <th colspan="6">Kondom</th> 
        <th colspan="6">Obat Vaginal</th> 
        <th colspan="6">Lain-lain</th>
        
        <th rowspan="3">Analisa</th>
    </tr>
    <tr>
        <th rowspan="2">Jumlah Peserta</th>
        <th colspan="2">Peserta KB Baru</th>
        <th rowspan="2">Kunjungan Ulang</th>
        <th rowspan="2">Keluhan/ Efek Samping</th>
        <th rowspan="2">Dirujuk ke Atas</th>

        <th rowspan="2">Jumlah Peserta</th>
        <th colspan="2">Peserta KB Baru</th>
        <th rowspan="2">Kunjungan Ulang</th>
        <th rowspan="2">Keluhan/ Efek Samping</th>
        <th rowspan="2">Dirujuk ke Atas</th>

        <th rowspan="2">Jumlah Peserta</th>
        <th colspan="2">Peserta KB Baru</th>
        <th rowspan="2">Kunjungan Ulang</th>
        <th rowspan="2">Keluhan/ Efek Samping</th>
        <th rowspan="2">Dirujuk ke Atas</th>

        <th rowspan="2">Jumlah Peserta</th>
        <th colspan="2">Peserta KB Baru</th>
        <th rowspan="2">Kunjungan Ulang</th>
        <th rowspan="2">Keluhan/ Efek Samping</th>
        <th rowspan="2">Dirujuk ke Atas</th>

        <th rowspan="2">Jumlah Peserta</th>
        <th colspan="2">Peserta KB Baru</th>
        <th rowspan="2">Kunjungan Ulang</th>
        <th rowspan="2">Keluhan/ Efek Samping</th>
        <th rowspan="2">Dirujuk ke Atas</th>

        <th rowspan="2">Jumlah Peserta</th>
        <th colspan="2">Peserta KB Baru</th>
        <th rowspan="2">Kunjungan Ulang</th>
        <th rowspan="2">Keluhan/ Efek Samping</th>
        <th rowspan="2">Dirujuk ke Atas</th>

        <th rowspan="2">Jumlah Peserta</th>
        <th colspan="2">Peserta KB Baru</th>
        <th rowspan="2">Kunjungan Ulang</th>
        <th rowspan="2">Keluhan/ Efek Samping</th>
        <th rowspan="2">Dirujuk ke Atas</th>

        <th rowspan="2">Jumlah Peserta</th>
        <th colspan="2">Peserta KB Baru</th>
        <th rowspan="2">Kunjungan Ulang</th>
        <th rowspan="2">Keluhan/ Efek Samping</th>
        <th rowspan="2">Dirujuk ke Atas</th>

        <th rowspan="2">Jumlah Peserta</th>
        <th colspan="2">Peserta KB Baru</th>
        <th rowspan="2">Kunjungan Ulang</th>
        <th rowspan="2">Keluhan/ Efek Samping</th>
        <th rowspan="2">Dirujuk ke Atas</th>
    </tr>
    <tr>
        <th>Rujukan RI</th>
        <th>Rujukan Obat Jalan</th>

        <th>Rujukan RI</th>
        <th>Rujukan Obat Jalan</th>

        <th>Rujukan RI</th>
        <th>Rujukan Obat Jalan</th>

        <th>Rujukan RI</th>
        <th>Rujukan Obat Jalan</th>

        <th>Rujukan RI</th>
        <th>Rujukan Obat Jalan</th>

        <th>Rujukan RI</th>
        <th>Rujukan Obat Jalan</th>

        <th>Rujukan RI</th>
        <th>Rujukan Obat Jalan</th>

        <th>Rujukan RI</th>
        <th>Rujukan Obat Jalan</th>

        <th>Rujukan RI</th>
        <th>Rujukan Obat Jalan</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;
    
    $analisaRest = $analisa->result();
	$trackAnalisa = 0; 
	
    $row = $data_kb->result();

    $rs_count = $num_kb;
	$total = array_fill(0,54,0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 9; $k++) {
            echo '<td>' . $row[$track]->KB_JUMLAH_PESERTA . '</td>';
            echo '<td>' . $row[$track]->KB_RUJUKAN_RI . '</td>';
            echo '<td>' . $row[$track]->KB_RUJUKAN_JLN . '</td>';
            echo '<td>' . $row[$track]->KB_KUNJUNGAN_ULANG . '</td>';
            echo '<td>' . $row[$track]->KB_KELUHAN . '</td>';
            echo '<td>' . $row[$track]->KB_DIRUJUK . '</td>';
			
			$total[$ind] += $row[$track]->KB_JUMLAH_PESERTA ; 
			$total[++$ind] += $row[$track]->KB_RUJUKAN_RI  ;  
			$total[++$ind] += $row[$track]->KB_RUJUKAN_JLN ;
			$total[++$ind] += $row[$track]->KB_KUNJUNGAN_ULANG  ;  
			$total[++$ind] += $row[$track]->KB_KELUHAN ;
			$total[++$ind] += $row[$track]->KB_DIRUJUK  ;  
			$ind++;
			
            $track++;
        }
        
		//analisa 16
		$analisaData = null;
        if (count($analisaRest)!= null){ 
			for( $trackAnalisa = 0; $trackAnalisa  < count($analisaRest) ; $trackAnalisa++){
				if($analisaRest[$trackAnalisa]->RS_NOREG == $row[$track-1]->RS_NOREG  )
				{ 
						$analisaData = $analisaRest[$trackAnalisa]->ANALISA_URAIAN;
						break; 
				}  
			} 
		}
		
		if($analisaData != null)
			echo '<td>'.$analisaData.'</td>';
		else
			echo '<td>-</td>';
		//////////////////
		
    echo '</tr>';
    }
	if( $row!=null){
	echo '<tr>';
		echo '<td><b>Total</b></td>';
		echo '<td> </td> <td> </td> <td> </td>'; 
			for($i = 0; $i < 54; $i++){
				 echo '<td>' . $total[$i]. '</td>';  
			}  
	echo '<td> - </td>';  
	echo '</tr>';
	}
    ?>
</tbody>