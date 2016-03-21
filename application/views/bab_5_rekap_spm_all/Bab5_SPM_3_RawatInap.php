<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5 SPM Pelayanan Rawat Inap</h4>
<thead>
    <tr>
         <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 
        
        <th colspan="4">Pemberi pelayanan di Rawat Inap</th> 
        <th colspan="4">Dokter penanggung jawab pasien rawat inap</th>  
        <th colspan="4"> Ketersediaan Pelayanan Rawat Inap </th>  
        <th colspan="4">Jam Visite Dokter Spesialis</th>
        <th colspan="4"> Kejadian infeksi pasca operasi</th>  
        <th colspan="4"> Kepuasan Pelanggan </th>  
        <th colspan="4"> a. Penegakan diagnosis TB melalui pemeriksaan mikroskop TB (untuk RS yang telah melaksanakan TB DOTS) </th>  
        <th colspan="4"> b. Terlaksananya kegiatan pencatatan dan pelaporan TB di rumah sakit</th>  
        <th colspan="4"> Ketersediaan Pelayanan Rawat Inap di RS yg memberikan pelayanan jiwa </th> 
        <th colspan="4"> Tidak adanya kejadian kematian pasien gangguan jiwa karena bunuh diri </th>  
        <th colspan="4"> Kejadian re-admission pasien gangguan jiwa dalam waktu = 1 bulan </th>  
        <th colspan="4"> Lama hari perawatan pasien gangguan jiwa </th>  
    </tr>
    
    <tr>
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
         
    </tr>
    
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_spm->result();

    $rs_count = $num_spm;

    $track = 18; //indikator kategori starting id
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 26; $k <= 41; $k++) {
            echo '<td>' . $row[$track]->SPM_STANDAR . '</td>';
            echo '<td>' . $row[$track]->SPM_NUMERATOR . '</td>';
            echo '<td>' . $row[$track]->SPM_DENUMERATOR . '</td>';
            echo '<td>' . $row[$track]->SPM_PENCAPAIAN . '</td>';
            $track++;
        }
        $track = $track + 100 - 16;
        echo '</tr>';
    }
    ?>
</tbody>