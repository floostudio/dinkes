<thead>
    <tr>
        <th>Tahun</th>
        <th>NO Registrasi</th>
        <th>Nama</th>
        <th>Peralatan</th>
        <th>Jumlah</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($peralatan->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->LPC_NAMA . '</td>';
        echo '<td>' . $row->PC_JUMLAH . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>