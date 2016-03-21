<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 6.3.d.3 Kematian Ibu Karena Persalinan</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region RS</th>
        <th rowspan="2">Kode RS</th>
        <th rowspan="2">Nama RS</th>   

        <th colspan="4"> Total Kematian Ibu </th>
        <th colspan="4"> Perdarahan = 1% </th> 
        <th colspan="4"> Eklampsia =30%  </th> 
        <th colspan="4"> Sepsis = 0.2 % </th> 

    </tr>

    <tr>
        <th>Tribulan I</th>
        <th>Tribulan II</th>
        <th>Tribulan III</th>
        <th>Tribulan IV</th> 

        <th>Tribulan I</th>
        <th>Tribulan II</th>
        <th>Tribulan III</th>
        <th>Tribulan IV</th> 

        <th>Tribulan I</th>
        <th>Tribulan II</th>
        <th>Tribulan III</th>
        <th>Tribulan IV</th> 

        <th>Tribulan I</th>
        <th>Tribulan II</th>
        <th>Tribulan III</th>
        <th>Tribulan IV</th> 
    </tr>

</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_kip->result();

    $rs_count = $num_kip;
    $totalAll = array_fill(0, 16, 0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        $total1 = 0;

        echo '<td>' . $row[$track]->KIP_TOTAL . '</td>';
        echo '<td>' . $row[$track + 1]->KIP_TOTAL . '</td>';
        echo '<td>' . $row[$track + 2]->KIP_TOTAL . '</td>';
        echo '<td>' . $row[$track + 3]->KIP_TOTAL . '</td>';

        $totalAll[$ind] += $row[$track]->KIP_TOTAL;
        $totalAll[++$ind] += $row[$track + 1]->KIP_TOTAL;
        $totalAll[++$ind] += $row[$track + 2]->KIP_TOTAL;
        $totalAll[++$ind] += $row[$track + 3]->KIP_TOTAL;


        echo '<td>' . $row[$track]->KIP_PENDARAHAN . '</td>';
        echo '<td>' . $row[$track + 1]->KIP_PENDARAHAN . '</td>';
        echo '<td>' . $row[$track + 2]->KIP_PENDARAHAN . '</td>';
        echo '<td>' . $row[$track + 3]->KIP_PENDARAHAN . '</td>';

        $totalAll[++$ind] += $row[$track]->KIP_PENDARAHAN;
        $totalAll[++$ind] += $row[$track + 1]->KIP_PENDARAHAN;
        $totalAll[++$ind] += $row[$track + 2]->KIP_PENDARAHAN;
        $totalAll[++$ind] += $row[$track + 3]->KIP_PENDARAHAN;

        echo '<td>' . $row[$track]->KIP_EKLAMPSIA . '</td>';
        echo '<td>' . $row[$track + 1]->KIP_EKLAMPSIA . '</td>';
        echo '<td>' . $row[$track + 2]->KIP_EKLAMPSIA . '</td>';
        echo '<td>' . $row[$track + 3]->KIP_EKLAMPSIA . '</td>';

        $totalAll[++$ind] += $row[$track]->KIP_EKLAMPSIA;
        $totalAll[++$ind] += $row[$track + 1]->KIP_EKLAMPSIA;
        $totalAll[++$ind] += $row[$track + 2]->KIP_EKLAMPSIA;
        $totalAll[++$ind] += $row[$track + 3]->KIP_EKLAMPSIA;

        echo '<td>' . $row[$track]->KIP_SEPSIS . '</td>';
        echo '<td>' . $row[$track + 1]->KIP_SEPSIS . '</td>';
        echo '<td>' . $row[$track + 2]->KIP_SEPSIS . '</td>';
        echo '<td>' . $row[$track + 3]->KIP_SEPSIS . '</td>';

        $totalAll[++$ind] += $row[$track]->KIP_SEPSIS;
        $totalAll[++$ind] += $row[$track + 1]->KIP_SEPSIS;
        $totalAll[++$ind] += $row[$track + 2]->KIP_SEPSIS;
        $totalAll[++$ind] += $row[$track + 3]->KIP_SEPSIS;

        $track+=4;
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td><b>Total</b></td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($i = 0; $i < 16; $i++) {
            echo '<td>' . $totalAll[$i] . '</td>';
        }

        echo '</tr>';
    }
    ?>
</tbody>