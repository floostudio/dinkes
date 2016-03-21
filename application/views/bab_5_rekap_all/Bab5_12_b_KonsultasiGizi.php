<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.12.b. Konsultasi/Penyuluhan Gizi</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 

        <th colspan="2">Pasien Rawat Jalan</th> 
        <th colspan="2"> Pasien Rawat Inap</th>
        <th rowspan="2"> Total</th>
    </tr>

    <tr>
        <th colspan="1"> Jumlah Pasien</th>  
        <th colspan="1"> Keterangan</th> 

        <th colspan="1"> Jumlah Pasien</th>  
        <th colspan="1"> Keterangan</th> 

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;
    
    $row = $data_gizi->result();
    $rs_count = $num_gizi;

    $track = 0;

    $total = array_fill(0, 2, 0);
    $totalAll = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 2; $k++) {
            echo '<td>' . $row[$track]->KG_JUMLAH . '</td>';
            echo '<td>' . $row[$track]->KG_KETERANGAN . '</td>';

            $nilai = $row[$track]->KG_JUMLAH;
            $totalX += $nilai;

            $total[$ind] += $nilai;
            $ind++;

            $track++;
        }
        echo '<td>' . $totalX . '</td>';
        echo '</tr>';
    }
	if( $row!=null){
    echo '<tr>';
    echo '<td><b>Total</b></td>';

    echo '<td> </td> <td> </td> <td> </td>';
    echo '<td>' . $total[0] . '</td>';
    echo '<td></td>';
    echo '<td>' . $total[1] . '</td>';
    echo '<td></td>';
    $totalAll = $total[0] + $total[1];
    echo '<td>' . $totalAll . '</td>';
    echo '</tr>';
	}
    ?>
</tbody>