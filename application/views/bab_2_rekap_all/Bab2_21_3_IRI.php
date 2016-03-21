<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 2 Instalasi Rawat Inap</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th>   

        <th colspan="3" rowspan="2">Jumlah TT</th>
        <th colspan="6">Jumlah Pasien Masuk</th>
        <th colspan="6">Jumlah Pasien Keluar</th>
        <th colspan="6">Jumlah Keluar Mati</th>
        <th colspan="6">Pasien Mati < 48 Jam</th>
        <th colspan="6">Pasien Mati > 48 Jam</th>
        <th colspan="3" rowspan="2">Jumlah Lama Rawat</th>
        <th colspan="3" rowspan="2">Jumlah Hari Perawatan</th>

        <th rowspan="3">Total</th>
    </tr>  
    <tr>
        <th colspan="3">a.Laki</th>
        <th colspan="3">b.Perempuan</th>

        <th colspan="3">a.Laki</th>
        <th colspan="3">b.Perempuan</th>

        <th colspan="3">a.Laki</th>
        <th colspan="3">b.Perempuan</th>

        <th colspan="3">a.Laki</th>
        <th colspan="3">b.Perempuan</th>

        <th colspan="3">a.Laki</th>
        <th colspan="3">b.Perempuan</th>
    </tr>
    <tr>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>

        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>

        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>

        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>

        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>

        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>

        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>

        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_2_21_3->result();
    $rs_count = $num_2_21_3;

    $totalN2 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $totalN1 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $totalN = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        
        for ($k = 0; $k < 13; $k++) {
            echo '<td>' . $row[$track]->IRI_JUMLAH_N2 . '</td>';
            echo '<td>' . $row[$track]->IRI_JUMLAH_N1 . '</td>';
            echo '<td>' . $row[$track]->IRI_JUMLAH_N . '</td>';
            
            $totalN2[$k] += $row[$track]->IRI_JUMLAH_N2;            
            $totalN1[$k] += $row[$track]->IRI_JUMLAH_N1;
            $totalN[$k] += $row[$track]->IRI_JUMLAH_N;

            $totalX += $row[$track]->IRI_JUMLAH_N2;
            
            $totalX += $row[$track]->IRI_JUMLAH_N1;
            
            $totalX += $row[$track]->IRI_JUMLAH_N;

            $track++;
        }
        echo '<td>'.$totalX.'</td>';
        echo '</tr>';
    }
    
    if ($row != null) {
        echo '<tr>';        
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($l = 0; $l < 13; $l++) {
            echo '<td>' . $totalN2[$l] . '</td>';
            echo '<td>' . $totalN1[$l] . '</td>';
            echo '<td>' . $totalN[$l] . '</td>';
        }
        echo '<td>-</td>';
        echo '</tr>';
    }
    ?>
</tbody>