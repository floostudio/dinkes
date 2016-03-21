<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.14.b Survey Maskin</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region</th>
        <th>Kode RS</th> 
        <th>Nama RS</th> 


        <th>Prosedur Pelaksanaan (SOP)</th> 
        <th>Tim Pelaksana Survey</th>  
        <th>Internal RS</th>  
        <th>Eksternal RS</th> 
        <th>Media </th>  
        <th>Kuestioner</th>  
        <th>Kotak Saran</th> 
        <th>Media Massa</th>
        <th>Pelaporan</th> 
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_maskin2->result();

    $rs_count = $num_maskin2;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 9; $k++) {
            if ($row[$track]->KONDISI == 0)
                echo '<td>Tidak</td>';
            else if ($row[$track]->KONDISI == 1)
                echo '<td>Ya</td>';
            $track++;
        }
        echo '</tr>';
    }
    ?>
</tbody>