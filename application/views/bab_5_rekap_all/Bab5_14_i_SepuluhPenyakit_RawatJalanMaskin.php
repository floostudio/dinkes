<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.14.i Sepuluh Penyakit Rawat Jalan Maski</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 

        <th colspan="30">n-2</th>
        <th colspan="30">n-1</th>
        <th colspan="30">n</th>

        <th rowspan="3">Total</th>
    </tr>
    <tr>
        <?php for ($a = 0; $a < 3; $a++) { ?>
            <th colspan="3">No 1</th>  
            <th colspan="3">No 2</th>  
            <th colspan="3">No 3</th> 
            <th colspan="3">No 4</th> 
            <th colspan="3">No 5</th> 
            <th colspan="3">No 6</th> 
            <th colspan="3">No 7</th> 
            <th colspan="3">No 8</th> 
            <th colspan="3">No 9</th> 
            <th colspan="3">No 10</th>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 30; $k++) { ?>
            <th>Kode ICD10</th>
            <th>Nama</th>
            <th>Jumlah</th>
        <?php } ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_maskin9->result();

    $rs_count = $num_maskin9;

    $total = 0;
    $track = 0;

    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 30; $k++) {
            echo '<td>' . $row[$track]->ICD10_CODE . '</td>';
            echo '<td>' . $row[$track]->PENYAKIT_MASKIN_RJ_NAMA . '</td>';
            echo '<td>' . $row[$track]->PENYAKIT_MASKIN_RJ_JML . '</td>';
            $total += $row[$track]->PENYAKIT_MASKIN_RJ_JML;
            $track++;
        }
        echo '<td>' . $total . ' </td>';
        echo '</tr>';
    }
    ?>
</tbody>