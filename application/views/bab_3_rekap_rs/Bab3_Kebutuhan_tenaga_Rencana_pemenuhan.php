<thead>
    <tr>
        <th>Tahun</th>
        <th>NO Registrasi</th>
        <th>Nama</th>
        <th>Kebutuhan Tenaga RS</th>
        <th>Rencana Pemenuhan Tahun (n+1)</th>
        <th>Upaya Pemenuhan<br/>(Mis. MOU, Pendidikan Lanjutan)</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($keb_tenaga->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->LIST_TM_NAMA . '</td>';
        echo '<td>' . $row->KEB_RENCANA . '</td>';
        echo '<td>' . $row->KEB_UPAYA . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>