<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.3.e Jumlah Kematian Rawat Inap</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="5">No 1 </th>  
        <th colspan="5">No 2 </th>  
        <th colspan="5">No 3 </th> 
        <th colspan="5">No 4 </th> 
        <th colspan="5">No 5 </th> 
        <th colspan="5">No 6 </th> 
        <th colspan="5">No 7 </th> 
        <th colspan="5">No 8 </th> 
        <th colspan="5">No 9 </th> 
        <th colspan="5">No 10 </th>  
        <th rowspan="2">Total </th>  

    </tr>
    <tr>
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
        
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
        
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
        
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
        
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
        
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
        
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
        
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
        
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
        
        <th>Kode ICD10</th>
        <th>Jenis Penyakit</th>
        <th>Jumlah Kasus</th>
        <th>Jumlah Kematian</th>
        <th>Persentase</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_15->result();

    $rs_count = $num_51_15;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 10; $k++) {
            echo '<td>' . $row[$track]->ICD10_CODE . '</td>';
            echo '<td>' . $row[$track]->DK_JENIS_PENYAKIT . '</td>';
            echo '<td>' . $row[$track]->DK_JML_KASUS . '</td>';
            echo '<td>' . $row[$track]->DK_JML_KEMATIAN. '</td>';
            echo '<td>' . $row[$track]->DK_PERSEN. '</td>';
            $track++;
        }
        echo '<td></td>';
        echo '</tr>';
    }
    ?>
</tbody>