<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Lampiran Tenaga Medik Hemodialis</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>  

        <th colspan="7">Keterangan</th>
        
        <th rowspan="2">Total</th>
    </tr>
    <tr>
        <th>1.Konsultasi Ginjal Hipertensi</th>
        <th>2.Dokter SP PD KGH yang Memiliki SIP</th>
        <th>3.Dr Sp Peny Dalam yg Bersertifikat HD oleh Organisasi Profesi</th>

        <th>4.Dokter Bersertifikat HD</th>
        <th>5.Perawat Mahir HD</th>
        <th>6.Teknik Elektromedik dg Pelatihan Khusus Mesin Dialisis</th>

        <th>7.Lain-Lain</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_lamp_e->result();
    $rs_count = $num_lamp_e;

    $tot = array(0,0,0,0,0,0,0);
    $totAll = 0;

    $track = 0;
    echo $rs_count;
    for ($j = 0; $j < $rs_count; $j++) {
        $totX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 0; $k < 7; $k++) {
            $totX += $row[$track]->HEMO_TENAGA_MEDIK_JUMLAH;
            $tot[$k] += $row[$track]->HEMO_TENAGA_MEDIK_JUMLAH;
            echo '<td>' . $row[$track]->HEMO_TENAGA_MEDIK_JUMLAH . '</td>';
            $track++;
        }
        $totAll += $totX;
        echo '<td>' . $totX . '</td>';
        echo '</tr>';
    }
     if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($l = 0; $l < 7; $l++) {
            echo '<td>' . $tot[$l] . '</td>';
        }
        echo '<td>' . $totAll . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>