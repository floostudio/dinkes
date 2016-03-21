<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 2 Peralatan Canggih</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>   

        <th colspan="12">Peralatan</th>

        <th rowspan="2">Total</th>
    </tr>    
    <tr>
        <th>1.DSA</th>
        <th>2.MRI</th>
        <th>3.CT Scanner</th>
        <th>4.Flouoroskopi</th>
        <th>5.Endoscopy</th>
        <th>6.USG 4 D</th>
        <th>7.Hermodialisa</th>
        <th>8.Linac</th>
        <th>9.Mammography X-ray</th>
        <th>10.Cateterization Lab</th>
        <th>11.Telegama Cobalt-60</th>
        <th>12.Hiperbaric Chamber</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data2_20->result();
    $rs_count = $num_2_20;

    $total = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    $totalAll = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 12; $k++) {
            echo '<td>' . $row[$track]->PC_JUMLAH . '</td>';

            $total[$k] += $row[$track]->PC_JUMLAH;

            $totalX += $row[$track]->PC_JUMLAH;

            $track++;
        }

        echo '<td>' . $totalX . '</td>';
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($l = 0; $l < 12; $l++) {
            echo '<td>' . $total[$l] . '</td>';
        }
        echo '<td>-</td>';
        echo '</tr>';
    }
    ?>
</tbody>