<thead>
    <tr>
        <th rowspan="2">Tahun</th>
        <th rowspan="2">NO Registrasi</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">Uraian</th>
        <th colspan="3">Tahun</th>
        <th rowspan="2">Rerata</th>
        <th rowspan="2">Standar</th>
    </tr>
    <tr>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
    </tr>
</thead>
<tbody>

    <?php
    foreach ($tingkat_efisiensi->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->DEFF_NAMA . '</td>';
        echo '<td>' . $row->EFF_NILAI_N2 . '</td>';
        echo '<td>' . $row->EFF_NILAI_N1 . '</td>';
        echo '<td>' . $row->EFF_NILAI_N . '</td>';
        echo '<td>' . $row->EFF_RERATA . '</td>';
        echo '<td>' . $row->DEFF_STANDAR_A . ' - ' . $row->DEFF_STANDAR_B . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>