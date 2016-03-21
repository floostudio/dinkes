<thead>
    <tr>
        <th rowspan="2">Tahun</th>
        <th rowspan="2">NO Registrasi</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">Jenis Ketenagaan</th>
        <th rowspan="2">Jumlah SDM</th>
        <th colspan="2">Status Ketenagaan</th>
        <!---<th rowspan="3">Analisa Ketenagaan</th>-->
    </tr>
    <tr>
        <th>Tetap/PNS</th>
        <th>Tidak tetap/ Kontrak</th>
        <!---<th>Jumlah Tenaga RS</th>
        <th>Jumlah Tenaga yang Seharusnya Ada</th>
        <th>Persentase</th>-->
    </tr>
</thead>
<tbody>
    <?php
    foreach ($g_ketenagaan->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->LK_NAMA . '</td>';
        echo '<td>' . $row->KETENAGAAN_JUMLAH . '</td>';
        echo '<td>' . $row->KETENAGAAN_TETAP . '</td>';
        echo '<td>' . $row->KETENAGAAN_KONTRAK . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>