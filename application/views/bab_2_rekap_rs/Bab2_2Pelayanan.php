<thead>
    <tr>
        <th>Tahun</th>
        <th>NO Registrasi</th>
        <th>Nama</th>
        <th>Pelayanan</th>
        <th>Ketersediaan</th>
        <th>Keterangan</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($pelayanan->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->LP_NAMA . '</td>';
        echo '<td>' . $row->PELAYANAN_KETERSEDIAAN . '</td>';
        echo '<td>' . $row->PELAYANAN_KET . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>