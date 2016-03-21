<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Lampiran Kunjungan Pasien Hemodialis</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th>  

        <th colspan="6">n-2</th>
        <th colspan="6">n-1</th>
        <th colspan="6">n</th>

        <th rowspan="4">Total</th>

        <th rowspan="4">Analisa</th>
    </tr>
    <tr>
        <th colspan="6">Kunjungan</th>
        <th colspan="6">Kunjungan</th>
        <th colspan="6">Kunjungan</th>
    </tr>
    <tr>
        <th colspan="3">Lama</th>
        <th colspan="3">Baru</th>

        <th colspan="3">Lama</th>
        <th colspan="3">Baru</th>

        <th colspan="3">Lama</th>
        <th colspan="3">Baru</th>
    </tr>
    <tr>
        <th>L</th>
        <th>P</th>
        <th>TOTAL</th>

        <th>L</th>
        <th>P</th>
        <th>TOTAL</th>

        <th>L</th>
        <th>P</th>
        <th>TOTAL</th>

        <th>L</th>
        <th>P</th>
        <th>TOTAL</th>

        <th>L</th>
        <th>P</th>
        <th>TOTAL</th>

        <th>L</th>
        <th>P</th>
        <th>TOTAL</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_lamp_b->result();
    $rs_count = $num_lamp_b;
    $analisaRest = $analisa;

    $tot1 = array(0, 0, 0);
    $tot2 = array(0, 0, 0);
    $tot3 = array(0, 0, 0);
    $tot4 = array(0, 0, 0);
    $tot5 = array(0, 0, 0);
    $tot6 = array(0, 0, 0);

    $totalAll = $totalAlldata = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalAll = $totalx1 = $totalx2 = $totalx3 = $totalx4 = $totalx5 = $totalx6 = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 0; $k < 3; $k++) {
            echo '<td>' . $row[$track]->PH_LAMA_L . '</td>';
            echo '<td>' . $row[$track]->PH_LAMA_P . '</td>';
            echo '<td>' . $row[$track]->PH_LAMA_TOTAL . '</td>';
            echo '<td>' . $row[$track]->PH_BARU_L . '</td>';
            echo '<td>' . $row[$track]->PH_BARU_P . '</td>';
            echo '<td>' . $row[$track]->PH_BARU_TOTAL . '</td>';

            $totalx1 += $row[$track]->PH_LAMA_L;
            $totalx2 += $row[$track]->PH_LAMA_P;
            $totalx3 += $row[$track]->PH_LAMA_TOTAL;
            $totalx4 += $row[$track]->PH_BARU_L;
            $totalx5 += $row[$track]->PH_BARU_P;
            $totalx6 += $row[$track]->PH_BARU_TOTAL;

            $tot1[$k] += $row[$track]->PH_LAMA_L;
            $tot2[$k] += $row[$track]->PH_LAMA_P;
            $tot3[$k] += $row[$track]->PH_LAMA_TOTAL;
            $tot4[$k] += $row[$track]->PH_BARU_L;
            $tot5[$k] += $row[$track]->PH_BARU_P;
            $tot6[$k] += $row[$track]->PH_BARU_TOTAL;

            $totalAll = $totalx1 + $totalx2 + $totalx3 + $totalx4 + $totalx5 + $totalx6;
        }
        $totalAlldata += $totalAll;
        echo '<td>' . $totalAll . '</td>';
        echo '<td>Analisa</td>';
        echo '</tr>';
    }


    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($l = 0; $l < 3; $l++) {
            echo '<td>' . $tot1[$l] . '</td>';
            echo '<td>' . $tot2[$l] . '</td>';
            echo '<td>' . $tot3[$l] . '</td>';
            echo '<td>' . $tot4[$l] . '</td>';
            echo '<td>' . $tot5[$l] . '</td>';
            echo '<td>' . $tot6[$l] . '</td>';
        }
        echo '<td>' . $totalAlldata . '</td>';
        echo '<td> - </td>';
        echo '</tr>';
    }
    ?>
</tbody>