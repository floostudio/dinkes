<thead>
    <tr>
        <th>Tahun</th>
        <th>NO Registrasi</th>
        <th>Nama</th>
        <th>Jenis Tenaga</th>
        <th>Pelatihan yang Telah Diikuti</th>
        <th>Jumlah</th>
        <th>Unit</th>
        <th>Penyelenggara</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($pelatihan_tenaga->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->LIST_TM_NAMA . '</td>';
        echo '<td>' . $row->PELATIHAN_URAIAN . '</td>';
        echo '<td>' . $row->PELATIHAN_JUMLAH . '</td>';
        echo '<td>' . $row->PELATIHAN_PENYELENGGARA . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>