<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Lampiran Peralatan Hemodialis</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>  

        <th colspan="7">Jenis Peralatan</th>
        <th rowspan="2">Total</th>
    </tr>
    <tr>
        <th>1.Mesin Hemodialis</th>
        <th>2.Tempat Tidur Pasien HD</th>
        <th>3.Peralatan Medik Dasar</th>

        <th>4.Reuse Dialiser</th>
        <th>5.Peralatan Pengolahan Air Sesuai Standar</th>
        <th>6.Peralatan Sterilisasi Alat Medis</th>

        <th>7.Generator Listrik</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_lamp_d->result();
    $row1 = $data_lamp_d_1->result();

    $rs_count = $num_lamp_d;
    $rs_count1 = $num_lamp_d_1;

    $ya = $tidak = 0;

    $track = 0;
    $track1 = 0;
    echo $rs_count . ' ' . $rs_count1;
    if ($rs_count == $rs_count1) {
        for ($j = 0; $j < $rs_count; $j++) {
            $totX = 0;
            echo '<tr>';
            echo '<td>' . $i ++ . '</td>';
            echo '<td>' . $row [$track]->daftar_list_region . '</td>';
            echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
            echo '<td>' . $row[$track]->RS_NAMA . '</td>';

            for ($k = 0; $k < 2; $k++) {                
                echo '<td>'.$row[$track]->PHEMO_JUMLAH . '</td>';
                $totX += $row[$track]->PHEMO_JUMLAH;
                $track++;
            }
            for ($k = 0; $k < 5; $k ++) {
                if ($row1[$track1]->PHEMO2_KONDISI == 0) {
                    echo '<td>Tidak </td>';
                } else if ($row1[$track1]->PHEMO2_KONDISI == 1) {
                    echo '<td>Ya</td>';
                }
                $track1++;
            }


            echo '<td>' . $totX . '</td>';
            echo '</tr>';
        }
    }
    ?>
</tbody>