<thead>
    <tr>
        <th rowspan="2" style="padding-top: 2%">Tahun</th>
        <th rowspan="2" style="padding-top: 2%">NO Registrasi</th>
        <th rowspan="2" style="padding-top: 2%">Nama</th>
        <th rowspan="2" style="padding-top: 2%">Tahun</th>
        <th rowspan="2" style="padding-top: 2%">Pendapatan Tahun Ini</th>
        <th rowspan="2" style="padding-top: 2%">Pendapatan Tahun Sebelumnya</th>
        <th style="padding-left: 2.2%">Pdptn Th ini - Pdpt Th Sblmny</th>
        <th rowspan="2" style="padding-top: 2%">SGR(%)</th>
    </tr>
    <tr>
        <th style="padding-left: 5%">Pdpt Th Sblmny</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($sales_growth_rate->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->LIST_TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->SGR_PENDAPATAN_TAHUN_INI . '</td>';
        echo '<td>' . $row->SGR_PENDAPATAN_TAHUN_LALU . '</td>';
        echo '<td>' . $row->SGR_PERBANDINGAN . '</td>';
        echo '<td>' . $row->SGR_SGR . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>