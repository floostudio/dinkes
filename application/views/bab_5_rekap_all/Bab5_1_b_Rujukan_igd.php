<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.1.B Kegiatan Rujukan IGD</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 

        <th colspan="8">Bedah</th>  
        <th colspan="8">Non Bedah</th>  
        <th colspan="8">Kebidanan</th>  
        <th colspan="8">Psikiatri</th>  
        <th colspan="8">Anak</th>   

        <th rowspan="3">Total</th>
    </tr>
    <tr>
        <th colspan="2">Total Pasien</th>
        <th colspan="3">Tindak Lanjut Pelayanan</th>
        <th colspan="3">Kematian IGD</th>

        <th colspan="2">Total Pasien</th>
        <th colspan="3">Tindak Lanjut Pelayanan</th>
        <th colspan="3">Kematian IGD</th>

        <th colspan="2">Total Pasien</th>
        <th colspan="3">Tindak Lanjut Pelayanan</th>
        <th colspan="3">Kematian IGD</th>

        <th colspan="2">Total Pasien</th>
        <th colspan="3">Tindak Lanjut Pelayanan</th>
        <th colspan="3">Kematian IGD</th>

        <th colspan="2">Total Pasien</th>
        <th colspan="3">Tindak Lanjut Pelayanan</th>
        <th colspan="3">Kematian IGD</th>
    </tr>
    <tr>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Dirawat</th>
        <th>Dirujuk</th>
        <th>Pulang</th>
        <th>Total Kematian</th>
        <th>Sebelum Ditangani</th>
        <th>Setelah Ditangani</th>

        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Dirawat</th>
        <th>Dirujuk</th>
        <th>Pulang</th>
        <th>Total Kematian</th>
        <th>Sebelum Ditangani</th>
        <th>Setelah Ditangani</th>

        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Dirawat</th>
        <th>Dirujuk</th>
        <th>Pulang</th>
        <th>Total Kematian</th>
        <th>Sebelum Ditangani</th>
        <th>Setelah Ditangani</th>

        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Dirawat</th>
        <th>Dirujuk</th>
        <th>Pulang</th>
        <th>Total Kematian</th>
        <th>Sebelum Ditangani</th>
        <th>Setelah Ditangani</th>

        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Dirawat</th>
        <th>Dirujuk</th>
        <th>Pulang</th>
        <th>Total Kematian</th>
        <th>Sebelum Ditangani</th>
        <th>Setelah Ditangani</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_5->result();

    $rs_count = $num_51_5;
    $total = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $track = 0;
    $totalAllX = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 5; $k++) {
            echo '<td>' . $row[$track]->RUJUKAN_IGD_JML_RUJUKAN . '</td>';
            echo '<td>' . $row[$track]->RUJUKAN_IGD_JML_NON_RUJUKAN . '</td>';
            echo '<td>' . $row[$track]->RUJUKAN_IGD_DIRAWAT . '</td>';
            echo '<td>' . $row[$track]->RUJUKAN_IGD_DIRUJUK . '</td>';
            echo '<td>' . $row[$track]->RUJUKAN_IGD_PULANG . '</td>';
            echo '<td>' . $row[$track]->RUJUKAN_IGD_TOTAL_KEMATIAN . '</td>';
            echo '<td>' . $row[$track]->RUJUKAN_IGD_SEBELUM . '</td>';
            echo '<td>' . $row[$track]->RUJUKAN_IGD_SETELAH . '</td>';

            $total[$ind] += $row[$track]->RUJUKAN_IGD_JML_RUJUKAN;
            $ind++;
            $total[$ind] += $row[$track]->RUJUKAN_IGD_JML_NON_RUJUKAN;
            $ind++;
            $total[$ind] += $row[$track]->RUJUKAN_IGD_DIRAWAT;
            $ind++;
            $total[$ind] += $row[$track]->RUJUKAN_IGD_DIRUJUK;
            $ind++;
            $total[$ind] += $row[$track]->RUJUKAN_IGD_PULANG;
            $ind++;
            $total[$ind] += $row[$track]->RUJUKAN_IGD_TOTAL_KEMATIAN;
            $ind++;
            $total[$ind] += $row[$track]->RUJUKAN_IGD_SEBELUM;
            $ind++;
            $total[$ind] += $row[$track]->RUJUKAN_IGD_SETELAH;
            $ind++;

            $totalX = $row[$track]->RUJUKAN_IGD_JML_RUJUKAN + $row[$track]->RUJUKAN_IGD_JML_NON_RUJUKAN + $row[$track]->RUJUKAN_IGD_DIRAWAT + $row[$track]->RUJUKAN_IGD_DIRUJUK + $row[$track]->RUJUKAN_IGD_PULANG + $row[$track]->RUJUKAN_IGD_TOTAL_KEMATIAN + $row[$track]->RUJUKAN_IGD_SEBELUM + $row[$track]->RUJUKAN_IGD_SETELAH;

            $track++;
        }
        $totalAllX += $totalX;

        echo '<td>' . $totalX . '</td>';
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';

        for ($i = 0; $i < 40; $i++) {
            echo '<td>' . $total[$i] . '</td>';
        }
        echo '<td>' . $totalAllX . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>