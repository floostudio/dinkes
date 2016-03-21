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
    foreach ($irj->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->pasien_kategori_id . '</td>';
        echo '<td>' . $row->irj_pasien_l_n2 . '</td>';
        echo '<td>' . $row->irj_pasien_p_n2 . '</td>';
        echo '<td>' . $row->irj_pasien_total_n2 . '</td>';
        echo '<td>' . $row->irj_pasien_l_n1 . '</td>';
        echo '<td>' . $row->irj_pasien_p_n1 . '</td>';
        echo '<td>' . $row->irj_pasien_total_n1 . '</td>';
        echo '<td>' . $row->irj_pasien_l_n . '</td>';
        echo '<td>' . $row->irj_pasien_p_n . '</td>';
        echo '<td>' . $row->irj_pasien_total_n . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>