<thead>
    <tr>
        <th rowspan="2" style="padding-top: 2%">Tahun</th>
        <th rowspan="2" style="padding-top: 2%">No Registrasi</th>
        <th rowspan="2" style="padding-top: 2%">Nama</th>
        <th rowspan="2" style="padding-top: 2%">Rasio Keuangan</th>
        <th clospan="3" style="padding-left: 12%">Tahun</th>
    </tr>
    <tr>        
        <th>n-2 (%)</th>
        <th>n-1 (%)</th>
        <th>n (%)</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($rasio_keuangan->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->list_rk_nama . '</td>';
        echo '<td>' . $row->RK_N2 . '</td>';
        echo '<td>' . $row->RK_N1 . '</td>';
        echo '<td>' . $row->RK_N . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>