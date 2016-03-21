<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 3.3.1 Kelengkapan Perlataan</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>  

        <th colspan="4">1.Kelengkapan Peralatan</th>

    </tr>
    <tr>
        <th>Jumlah Peralatan yg Ada Per Unit RS</th>
        <th>Jumlah Peralatan yg Harusnya Ada Sesuai Standar</th>
        <th>Prosentase</th>
        <th>Analisa</th> 
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data3_3_1->result();
    $rs_count = $num_3_3_1;

    $analisaRest = $analisa->result();
    $trackAnalisa = 0;

    $totJumlPerUnit = 0;
    $totJumlStandart = 0;
    $prosentaseTotal = 0;

    $prosentase = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totX1 = $totX2 = $totX3 = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        echo '<td>' . $row[$track]->JUMLAH_PERALATAN_PER_UNIT . '</td>';
        $totJumlPerUnit += $row[$track]->JUMLAH_PERALATAN_PER_UNIT;
        echo '<td>' . $row[$track]->JUMLAH_PERALATAN_STANDAR . '</td>';
        $totJumlStandart += $row[$track]->JUMLAH_PERALATAN_STANDAR;

        if ($row[$track]->JUMLAH_PERALATAN_STANDAR != 0)
            $prosentase = ($row[$track]->JUMLAH_PERALATAN_PER_UNIT / $row[$track]->JUMLAH_PERALATAN_STANDAR) * 100;
        else
            $prosentase = 0;

        echo '<td>' . $prosentase . '</td>';

        $track++;

        //analisa
        $analisaData = null;
        if (count($analisaRest) != null) {
            for ($trackAnalisa = 0; $trackAnalisa < count($analisaRest); $trackAnalisa++) {
                if ($analisaRest[$trackAnalisa]->RS_NOREG == $row[$track - 1]->RS_NOREG) {
                    $analisaData = $analisaRest[$trackAnalisa]->ANALISA_URAIAN;
                    break;
                }
            }
        }

        if ($analisaData != null)
            echo '<td>' . $analisaData . '</td>';
        else
            echo '<td>-</td>';
        //////////////////

        echo '</tr>';
    }
    if ($totJumlStandart != 0 && $totJumlPerUnit != 0)
        $prosentaseTotal = ($totJumlPerUnit / $totJumlStandart) * 100;

    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        echo '<td>' . $totJumlPerUnit . '</td>';
        echo '<td>' . $totJumlStandart . '</td>';
        echo '<td>' . $prosentaseTotal . '</td>';
        echo '<td> - </td>';
        echo '</tr>';
    }
    ?>
</tbody>