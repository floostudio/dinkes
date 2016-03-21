<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Lampiran Sarana Prasarana Hemodialis</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>  

        <th colspan="8">Sarana dan Prasarana</th>
        
        <th colspan="2">Total</th>
    </tr>
    <tr>
        <th>1.Ruang Peralatan dan mesin HD untuk Kapasitas 4 Mesin HD</th>
        <th>2.Ruang Pemeriksaan Dokter Konsultasi</th>
        <th>3.Ruang Tindakan</th>

        <th>4.Ruang Perawatan</th>
        <th>5.Ruang Sterilisasi</th>
        <th>6.Ruang penyimpanan Obat</th>

        <th>7.Ruang Penunjang Medik</th>
        <th>8.Ruang Administrasi dan Ruang tunggu Pasien</th>
        
        <th>Ya</th>
        <th>Tidak</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_lamp_c->result();
    $rs_count = $num_lamp_c;

    $ya = $tidak = 0;

    $track = 0;
    echo $rs_count;
    for ($j = 0; $j < $rs_count; $j++) {
        $ya = $tidak = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 0; $k < 8; $k++) {
            if ($row[$track]->HEMO_SARPRAS_KONDISI == 0) {
                $tidak ++;
                echo '<td>Tidak</td>';
            } else if ($row[$track]->HEMO_SARPRAS_KONDISI == 1) {
                $ya ++;
                echo '<td>Ya</td>';
            }
            $track++;
        }
        echo '<td>'.$ya.'</td>';
        echo '<td>'.$tidak.'</td>';
        echo '</tr>';
    }
    ?>
</tbody>