<thead>
    <tr>
        <th>Tahun</th>
        <th>NO Registrasi</th>
        <th>Nama</th>
        <th>Uraian</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($cost_recovery->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->list_cr_nama . '</td>';
        echo '<td>' . $row->CR_JUMLAH_N2 . '</td>';
        echo '<td>' . $row->CR_JUMLAH_N1 . '</td>';
        echo '<td>' . $row->CR_JUMLAH_N . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>