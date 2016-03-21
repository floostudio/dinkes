<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5 SPM IGD</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="4">1.Kemampuan menangani life saving anak dan dewasa</th> 
        <th colspan="4">2.Jam buka pelayanan gawat darurat</th>  
        <th colspan="4">3.Pemberi pelayanan kegawatdaruratan yang bersertifikat yang masih berlaku </th>  
        <th colspan="4">4.Ketersediaan tim Penanggulangan bencana</th>
        <th colspan="4">5.Waktu tanggap pelayanan Dokter di Gawat Darurat </th>  
        <th colspan="4">6.Kepuasan Pelanggan</th>  
        <th colspan="4">7.Kematian pasien  <= 24 jam </th>  
        <th colspan="4">8.Khusus untuk RS Jiwa Pasien dapat ditenangkan dalam waktu = 48 jam </th>  
        <th colspan="4">9.Tidak adanya pasien yang diharuskan membayar uang muka </th>  
    </tr>
    <tr>  
        <?php for ($k = 0; $k < 9; $k++) { ?>
        <th>Standar</th> 
        <th>Hasil Numerator</th> 
        <th>Hasil Denumenrator</th>  
        <th>Nilai</th>  
        <?php } ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_spm->result();

    $rs_count = $num_spm;

    $track = 0; //indikator kategori starting id
    $index = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 0; $k < 9; $k++) {
            echo '<td>' . $row[$track]->SPM_STANDAR . '</td>';
            echo '<td>' . $row[$track]->SPM_NUMERATOR . '</td>';
            echo '<td>' . $row[$track]->SPM_DENUMERATOR . '</td>';
            echo '<td>' . $row[$track]->SPM_PENCAPAIAN . '</td>';
            $track++;
        }
        
        echo '</tr>';
    }
    ?>
</tbody>