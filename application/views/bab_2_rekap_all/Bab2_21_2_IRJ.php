<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 2 Instalasi rawat Jalan</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th>   

        <th colspan="9">Jumlah Kunjungan IRJ</th>

        <th rowspan="4">Total</th>
    </tr>    
    <tr>
        <th colspan="9">Tahun</th>
    </tr>
    <tr>
        <th colspan="3">n-2</th>
        <th colspan="3">n-1</th>
        <th colspan="3">n</th>
    </tr>
    <tr>
        <th>L</th>
        <th>P</th>
        <th>Total</th>

        <th>L</th>
        <th>P</th>
        <th>Total</th>

        <th>L</th>
        <th>P</th>
        <th>Total</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_2_21_2->result();
    $rs_count = $num_2_21_2;

    $totalLN2 = $totalPN2 = $totalTotN2 = 0;
    $totalLN1 = $totalPN1 = $totalTotN1 = 0;
    $totalLN = $totalPN = $totalTotN = 0;

    $total = array_fill(0, 10, 0);
    $totalAll = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        echo '<td>' . $row[$track]->irj_pasien_l_n2 . '</td>';
        echo '<td>' . $row[$track]->irj_pasien_p_n2 . '</td>';
        echo '<td>' . $row[$track]->irj_pasien_total_n2 . '</td>';

        echo '<td>' . $row[$track]->irj_pasien_l_n1 . '</td>';
        echo '<td>' . $row[$track]->irj_pasien_p_n1 . '</td>';
        echo '<td>' . $row[$track]->irj_pasien_total_n1 . '</td>';

        echo '<td>' . $row[$track]->irj_pasien_l_n . '</td>';
        echo '<td>' . $row[$track]->irj_pasien_p_n . '</td>';
        echo '<td>' . $row[$track]->irj_pasien_total_n . '</td>';

        $totalLN2 += $row[$track]->irj_pasien_l_n2;
        $totalLN1 += $row[$track]->irj_pasien_l_n1;
        $totalLN += $row[$track]->irj_pasien_l_n;

        $totalPN2 += $row[$track]->irj_pasien_p_n2;
        $totalPN1 += $row[$track]->irj_pasien_p_n1;
        $totalPN += $row[$track]->irj_pasien_p_n;

        $totalTotN2 += $row[$track]->irj_pasien_total_n2;
        $totalTotN1 += $row[$track]->irj_pasien_total_n1;
        $totalTotN += $row[$track]->irj_pasien_total_n;

        $totalX = $row[$track]->irj_pasien_total_n + $row[$track]->irj_pasien_total_n1 + $row[$track]->irj_pasien_total_n2;

        echo '<td>' . $totalX . '</td>';

        $track++;

        echo '</tr>';
    }

    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';

        echo '<td>' . $totalLN2 . '</td>';
        echo '<td>' . $totalPN2 . '</td>';
        echo '<td>' . $totalTotN2 . '</td>';

        echo '<td>' . $totalLN1 . '</td>';
        echo '<td>' . $totalPN1 . '</td>';
        echo '<td>' . $totalTotN1 . '</td>';

        echo '<td>' . $totalLN . '</td>';
        echo '<td>' . $totalPN . '</td>';
        echo '<td>' . $totalTotN . '</td>';

        echo '<td>-</td>';
        echo '</tr>';
    }
    ?>
</tbody>