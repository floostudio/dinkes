<thead>
    <tr>
        <th>Tahun</th>
        <th>NO Registrasi</th>
        <th>Nama</th>
        <th>Kelengkapan Peralatan</th>        
    </tr>
    <tr>
        <th>Jumlah Peralatan yang ada Per unit Pelayanan di Rumah Sakit</th>
    </tr>
    <tr>
        <th>Jumlah Peralatan yang harusnya ada sesuai standart</th>
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