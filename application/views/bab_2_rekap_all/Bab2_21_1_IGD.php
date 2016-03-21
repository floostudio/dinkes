<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 2 Instalasi gawat Darurat</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th>   

        <th colspan="9">Jumlah Kunjungan IGD</th>
        <th rowspan="4">Total</th>
    </tr>    
    <tr>
        <th colspan="9">Tahun</th>
    </tr>
    <tr>
        <th colspan="3">n-2</th>
        <th colspan="3">n-1</th>
        <th colspan="3">n</th>
    </tr>
    <tr>
        <th>L</th>
        <th>P</th>
        <th>Total</th>

        <th>L</th>
        <th>P</th>
        <th>Total</th>

        <th>L</th>
        <th>P</th>
        <th>Total</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data2_21_1->result();
    $rs_count = $num_2_21_1;

    $totalLN2 = $totalPN2 = $totalTotN2 = 0;
    $totalLN1 = $totalPN1 = $totalTotN1 = 0;
    $totalLN = $totalPN = $totalTotN = 0;
    
    $totalAll = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        
        echo '<td>' . $row[$track]->KIGD_PASIEN_L_N2 . '</td>';
        echo '<td>' . $row[$track]->KIGD_PASIEN_P_N2 . '</td>';
        echo '<td>' . $row[$track]->KIGD_PASIEN_TOTAL_N2 . '</td>';
        
        echo '<td>' . $row[$track]->KIGD_PASIEN_L_N1 . '</td>';
        echo '<td>' . $row[$track]->KIGD_PASIEN_P_N1 . '</td>';
        echo '<td>' . $row[$track]->KIGD_PASIEN_TOTAL_N1 . '</td>';
        
        echo '<td>' . $row[$track]->KIGD_PASIEN_L_N . '</td>';
        echo '<td>' . $row[$track]->KIGD_PASIEN_P_N . '</td>';
        echo '<td>' . $row[$track]->KIGD_PASIEN_TOTAL_N . '</td>';
        
        $totalLN2 += $row[$track]->KIGD_PASIEN_L_N2;
        $totalLN1 += $row[$track]->KIGD_PASIEN_L_N1;
        $totalLN += $row[$track]->KIGD_PASIEN_L_N;
        
        $totalPN2 += $row[$track]->KIGD_PASIEN_P_N2;
        $totalPN1 += $row[$track]->KIGD_PASIEN_P_N1;
        $totalPN += $row[$track]->KIGD_PASIEN_P_N;
        
        $totalTotN2 += $row[$track]->KIGD_PASIEN_TOTAL_N2;
        $totalTotN1 += $row[$track]->KIGD_PASIEN_TOTAL_N1;
        $totalTotN += $row[$track]->KIGD_PASIEN_TOTAL_N;
        
        $totalX = $row[$track]->KIGD_PASIEN_TOTAL_N + $row[$track]->KIGD_PASIEN_TOTAL_N1 + $row[$track]->KIGD_PASIEN_TOTAL_N2;
        
        echo '<td>'.$totalX.'</td>';
        
        $track++;
        
        echo '</tr>';
    }
    
    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';

        echo '<td>'.$totalLN2.'</td>';
        echo '<td>'.$totalPN2.'</td>';
        echo '<td>'.$totalTotN2.'</td>';
        
        echo '<td>'.$totalLN1.'</td>';
        echo '<td>'.$totalPN1.'</td>';
        echo '<td>'.$totalTotN1.'</td>';
        
        echo '<td>'.$totalLN.'</td>';
        echo '<td>'.$totalPN.'</td>';
        echo '<td>'.$totalTotN.'</td>';

        echo '<td>-</td>';
        echo '</tr>';
    }
    
    ?>
</tbody>