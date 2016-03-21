<thead>
    <tr>
        <th rowspan="3" style="padding-top: 2.5%;">Tahun</th>
        <th rowspan="3" style="padding-top: 2.5%;">NO Registrasi</th>
        <th rowspan="3" style="padding-top: 2.5%;">Nama</th>
        <th rowspan="3" style="padding-top: 2.5%;">Uraian</th>
        <th colspan="9" style="padding-left: 25%;">Tahun</th>
    </tr>
    <tr>
        <th colspan="3" style="padding-left: 7%;">n-2</th>
        <th colspan="3" style="padding-left: 7%;">n-1</th>
        <th colspan="3" style="padding-left: 7%;">n</th>
    </tr>
    <tr>
        <th>L</th>
        <th>P</th>
        <th>SUM</th>
        <th>L</th>
        <th>P</th>
        <th>SUM</th>
        <th>L</th>
        <th>P</th>
        <th>SUM</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($igd->result() as $row) {
        echo '<tr>';        
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>Jumlah Kunjungan IGD</td>';
        echo '<td>' . $row->KIGD_PASIEN_L_N2 . '</td>';
        echo '<td>' . $row->KIGD_PASIEN_P_N2 . '</td>';
        echo '<td>' . $row->KIGD_PASIEN_TOTAL_N2 . '</td>';
        echo '<td>' . $row->KIGD_PASIEN_L_N1 . '</td>';
        echo '<td>' . $row->KIGD_PASIEN_P_N1 . '</td>';
        echo '<td>' . $row->KIGD_PASIEN_TOTAL_N1 . '</td>';
        echo '<td>' . $row->KIGD_PASIEN_L_N . '</td>';
        echo '<td>' . $row->KIGD_PASIEN_P_N . '</td>';
        echo '<td>' . $row->KIGD_PASIEN_TOTAL_N . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>