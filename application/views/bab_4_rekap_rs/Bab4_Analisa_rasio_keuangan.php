<thead>
    <tr>
        <th rowspan="3" style="padding-top: 2.5%;">Tahun</th>
        <th rowspan="3" style="padding-top: 2.5%;">NO Registrasi</th>
        <th rowspan="3" style="padding-top: 2.5%;">Nama</th>
        <th rowspan="3" style="padding-top: 2.5%;">Rasio Keuangan</th>
        <th colspan="2" style="padding-left: 15%;">Analisa</th>
    </tr>
    <tr>
        <th style="padding-left: 6.5%;">Trend</th>
        <th style="padding-left: 3%;">NO Kesimpulan</th>        
    </tr>
    <tr>
        <th style="padding-left: 3%;">(naik/turun/fluktuatif)</th>
        <th style="padding-left: 3%;">(baik/tidak baik)</th>        
    </tr>
</thead>
<tbody>
    <?php
    foreach ($analisa_rasio_keuangan->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->list_rk_nama . '</td>';
        echo '<td>' . $row->ARK_TREND . '</td>';
        echo '<td>' . $row->ARK_KESIMPULAN . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>