<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 3.6 Kebutuhan Tenaga di Rumah Sakit Tahun (n) dan Rencana Pemenuhan</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th>  

        <th colspan="6">Kebutuhan Tenaga RS</th>
    </tr>
    <tr>
        <th colspan="2">Tenaga Medis</th>
        <th colspan="2">Tenaga Paramedis dan Tenaga Kesehatan lain</th>
        <th colspan="2">Tenaga non Medis</th>
    </tr>
    <tr>
        <th>Rencana Pemenuhan Tenaga Pada Tahun (N+1)</th>
        <th>Upaya Pemenuhan (MOU, Pendidikan Lanjutan)</th>

        <th>Rencana Pemenuhan Tenaga Pada Tahun (N+1)</th>
        <th>Upaya Pemenuhan (MOU, Pendidikan Lanjutan)</th>

        <th>Rencana Pemenuhan Tenaga Pada Tahun (N+1)</th>
        <th>Upaya Pemenuhan (MOU, Pendidikan Lanjutan)</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_3_6->result();
    $rs_count = $num_3_6;

    $prosentase = 0;

    $track = 0;
    
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 0; $k < 3; $k++) {
            echo '<td>' . $row[$track]->KEB_RENCANA . '</td>';
            echo '<td>' . $row[$track]->KEB_UPAYA . '</td>';
            $track++;
        }        
        echo '</tr>';
    }
    ?>
</tbody>