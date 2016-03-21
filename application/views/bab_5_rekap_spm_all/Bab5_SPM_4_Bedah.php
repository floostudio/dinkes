<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5 SPM Pelayanan Bedah</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>  
        
        <th colspan="4">Waktu tunggu operasi elektif</th> 
        <th colspan="4">Kejadian kematian di meja operasi</th>  
        <th colspan="4">Tidak adanya kejadian operasi salah sisi </th>  
        <th colspan="4">Tidak adanya kejadian operasi salah orang</th>
        <th colspan="4">Tidak adanya kejadian salah tindakan pada operasi</th>  
        <th colspan="4">Tidak adanya kejadian tertinggalnya benda asing/lain pada tubuh pasien setelah operasi </th>   
        <th colspan="4">Komplikasi anestesi karena overdosis,reaksi anestesi, dan salah penempatan endotracheal tube</th>  
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
         
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_spm->result();

    $rs_count = $num_spm;

    $track = 0; //indikator kategori starting id
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 0; $k <= 6; $k++) {
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