<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.1.d. Sepuluh Besar Kasus/Penyakit Rujukan</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th>

        <th colspan="10">Urutan 1 </th>  
        <th colspan="10">Urutan 2 </th>  
        <th colspan="10">Urutan 3 </th> 
        <th colspan="10">Urutan 4 </th> 
        <th colspan="10">Urutan 5 </th> 
        <th colspan="10">Urutan 6 </th> 
        <th colspan="10">Urutan 7 </th> 
        <th colspan="10">Urutan 8 </th> 
        <th colspan="10">Urutan 9 </th> 
        <th colspan="10">Urutan 10 </th>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 10; $k++) { ?>
            <td rowspan="2">Kasus</td>
            <td colspan="6">Rujukan Dari Bawah</td>
            <td colspan="3">Rujukan Dari Atas</td>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 10; $k++) { ?>
            <td>Diterima dari Puskesmas</td>
            <td>Diterima dari Fas Kes Lain</td>
            <td>Diterima dari RS Lain</td>
            <td>Dikembalikan ke Puskesmas</td>
            <td>Dikembalikan ke Fas Lain</td>
            <td>Dikembalikan ke RS Asal</td>
            <td>Pasien Rujukan</td>
            <td>Pasien Datang Sendiri</td>
            <td>Diterima Kembali</td>
        <?php } ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_7->result();

    $rs_count = $num_51_7;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 10; $k++) {
            echo '<td>' . $row[$track]->SRJKN_KASUS . '</td>';
            echo '<td>' . $row[$track]->SRJKN_PUSKESMAS . '</td>';
            echo '<td>' . $row[$track]->SRJKN_FASIL_LAIN . '</td>';
            echo '<td>' . $row[$track]->SRJKN_RS_LAIN . '</td>';
            echo '<td>' . $row[$track]->SRJKN_KEMBALI_PUSAT . '</td>';
            echo '<td>' . $row[$track]->SRJKN_KEMBALI_FASLAIN . '</td>';
            echo '<td>' . $row[$track]->SRJKN_KEMBALI_RS . '</td>';
            echo '<td>' . $row[$track]->SRJKN_RUJUKAN . '</td>';
            echo '<td>' . $row[$track]->SRJKN_RUJUKAN . '</td>';
            echo '<td>' . $row[$track]->SRJKN_DITERIMA_KEMBALI . '</td>';
            $track++;
        }
        echo '</tr>';
    }
    ?>
</tbody>