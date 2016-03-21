<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 2 Ketersediaan Pelayanan</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th>   

        <th colspan="8">A.Pelayanan Medik Umum</th> 
        <th colspan="4">B.Pelayanan Gawat Darurat</th> 
        <th colspan="10">C.Pelayanan Medik Dasar</th>  
        <th colspan="12">D.Pelayanan Spesialis Penunjang Medik</th> 
        <th colspan="26">E.Pelayanan Medik Spesialis Lain</th>
        <th colspan="16">F.Pelayanan Medik Spesialis Gigi Mulut</th>
        <th colspan="28">G.Pelayanan medik Subspesialis</th>
        <th colspan="6">H.Pelayanan Keperawatan dan kebidanan</th>
        <th colspan="14">I.Pelayanan Penunjang Klinik</th>
        <th colspan="24">J.Pelayanan Penunjang Non Klinik</th>
        <th colspan="16">K.Pelayanan Khusus</th>
    </tr>
    <tr>
        <th colspan="2">A. Pelayanan Medik Umum</th>
        <th colspan="2">1. Pelayanan Medik Dasar</th>
        <th colspan="2">2. Pelayanan Medik Gigi Mulut</th>
        <th colspan="2">3. Pelayanan KIA/KB</th>

        <th colspan="2">B. Pelayanan Gawat Darurat</th>
        <th colspan="2">24 Jam & 7 Hari Seminggu</th>

        <th colspan="2">C. Pelayanan Medik Dasar</th>
        <th colspan="2">1. Pelayanan Dalam</th>
        <th colspan="2">2. Kesehatan Anak</th>
        <th colspan="2">3. Bedah</th>
        <th colspan="2">4. Obstetri & Ginekologi</th>

        <th colspan="2">D. Pelayanan Spesialis Penunjang Medik</th>
        <th colspan="2">1. Radiologi</th>
        <th colspan="2">2. Patologi Klinik</th>
        <th colspan="2">3. Anestesiologi</th>
        <th colspan="2">4. Rehabilitasi Medik</th>
        <th colspan="2">5. Patologi Anatomi</th>

        <th colspan="2">E.Pelayanan Medik Spesialis Lain</th>
        <th colspan="2">1. Mata</th>
        <th colspan="2">2. Telinga Hidup Tenggorokan</th>
        <th colspan="2">3. Syaraf</th>
        <th colspan="2">4. Jantung dan Pembuluh Darah</th>
        <th colspan="2">5. Kulit dan Kelamin</th>
        <th colspan="2">6. Kedokteran Jiwa</th>
        <th colspan="2">7. Paru</th>
        <th colspan="2">8. Orthopedi</th>
        <th colspan="2">9. Urologi</th>
        <th colspan="2">10. Bedah Syaraf</th>
        <th colspan="2">11. Bedah Plastik</th>
        <th colspan="2">12. Kedokteran Forensik</th>

        <th colspan="2">F.Pelayanan Medik Spesialis Gigi Mulut</th>
        <th colspan="2">1. Bedah Mulut</th>
        <th colspan="2">2. Konservasi/Endodonsi</th>
        <th colspan="2">3. Orthodonti</th>
        <th colspan="2">4. Periodonti</th>
        <th colspan="2">5. Prosthodonti</th>
        <th colspan="2">6. Pedodonsi</th>
        <th colspan="2">7. Penyakit Mulut</th>

        <th colspan="2">G.Pelayanan medik Subspesialis</th>
        <th colspan="2">1. Bedah</th>
        <th colspan="2">2. Penyakit Dalam</th>
        <th colspan="2">3. Kesehatan Anak</th>
        <th colspan="2">4. Obstetri & Ginekologi</th>
        <th colspan="2">5. Mata</th>
        <th colspan="2">6. Telinga Hidup Tenggorokan</th>
        <th colspan="2">7. Syaraf</th>
        <th colspan="2">8. Jantung dan Pembuluh Darah</th>
        <th colspan="2">9. Kulit dan Kelamin</th>
        <th colspan="2">10. Jiwa</th>
        <th colspan="2">11. Paru</th>
        <th colspan="2">12. Orthopedi</th>
        <th colspan="2">13. Gigi Mulut</th>

        <th colspan="2">H.Pelayanan Keperawatan dan kebidanan</th>
        <th colspan="2">1. Asuhan Keperawatan</th>
        <th colspan="2">2. Asuhan Kebidanan</th>

        <th colspan="2">I.Pelayanan Penunjang Klinik</th>
        <th colspan="2">1. Perawatan Intensif</th>
        <th colspan="2">2. Pelayanan Darah</th>
        <th colspan="2">3. Gizi</th>
        <th colspan="2">4. Farmasi</th>
        <th colspan="2">5. Sterilisasi Instrumen</th>
        <th colspan="2">6. Rekam Medik</th>

        <th colspan="2">J.Pelayanan Penunjang Non Klinik</th>
        <th colspan="2">1. Laundry/Linen</th>
        <th colspan="2">2. Jasa Boga/Dapur</th>
        <th colspan="2">3. Teknik dan Pemeliharaan Fasilitas</th>
        <th colspan="2">4. Pengelolaan Limbah</th>
        <th colspan="2">5. gudang</th>
        <th colspan="2">6. Ambulance</th>
        <th colspan="2">7. Komunikasi</th>
        <th colspan="2">8. Kamar Jenazah</th>
        <th colspan="2">9. Pemadam Kebakaran</th>
        <th colspan="2">10. Pengelolaan Gas Medik</th>
        <th colspan="2">11. Penampungan Air Bersih</th>

        <th colspan="2">K.Pelayanan Khusus</th>
        <th colspan="2">1. Akupuntur</th>
        <th colspan="2">2. Hiperbarik</th>
        <th colspan="2">3. Herbal/Jamu</th>
        <th colspan="2">4. Lainnya (Sebutkan)</th>
    </tr>

    <tr>
        <?php for ($k = 0; $k < 79; $k++) { ?>
            <th>Ketersediaan</th>
            <th>Keterangan</th>        
        <?php } ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data2_19->result();
    $rs_count = $num_2_19;

    $track = 0;
    for ($j = 0; $j < $rs_count-4; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        if(isset($row[$track]->daftar_list_region)){
        	echo '<td>' . $row[$track]->daftar_list_region . '</td>';
	} else{
		echo '<td>Uncategorize</td>';
	}
	if(isset($row[$track]->KODE_REGISTRASI)){
        	echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
	} else{
		echo '<td>Uncategorize</td>';
	}
	if(isset($row[$track]->RS_NAMA)){
        	echo '<td>' . $row[$track]->RS_NAMA . '</td>';
	} else{
		echo '<td>Uncategorize</td>';
	}
        for ($k = 0; $k < 79; $k++) {
	    if(isset($row[$track]->PELAYANAN_KETERSEDIAAN)){
            	echo '<td>' . $row[$track]->PELAYANAN_KETERSEDIAAN . '</td>';
            	echo '<td>' . $row[$track]->PELAYANAN_KET . '</td>';

            	$track++;
	    } else{
		echo '<td>'.$rs_count.'</td>';
            	echo '<td>NULL</td>';
	    }
        }
        echo '</tr>';
    }
    ?>
</tbody>