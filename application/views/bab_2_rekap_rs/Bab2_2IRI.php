<thead>
    <tr>
        <th rowspan="2" style="padding-top: 2%">Tahun</th>
        <th rowspan="2" style="padding-top: 2%">NO Registrasi</th>
        <th rowspan="2" style="padding-top: 2%">Nama</th>
        <th rowspan="2" style="padding-top: 2%">Uraian</th>
        <th colspan="3" style="padding-left: 7%">Jumlah</th>
    </tr>
    <tr>
        <th style="padding-left: 0.5%">n-2</th>
        <th style="padding-left: 0.5%">n-1</th>
        <th style="padding-left: 0.5%">n</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($iri->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->PRI_NAMA . '</td>';
        echo '<td>' . $row->IRI_JUMLAH_N2 . '</td>';
        echo '<td>' . $row->IRI_JUMLAH_N1 . '</td>';
        echo '<td>' . $row->IRI_JUMLAH_N . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>