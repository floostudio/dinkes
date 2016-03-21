<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.10.a. Kegiatan Rehabilitasi Medik</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region</th>
        <th>Kode RS</th> 
        <th>Nama RS</th> 


        <th colspan="1"> Medis</th> 
        <th colspan="1"> Fisioterapi</th>  
        <th colspan="1"> Okupasiterapi</th>  
        <th colspan="1"> Terapi Wicara</th> 
        <th colspan="1"> Psikologi</th> 
        <th colspan="1"> Sosial Medis</th> 
        <th colspan="1"> Ortotik Prostetik</th> 
        <th colspan="1"> Kunjungan Rumah</th> 
        <th colspan="1"> Total</th> 


    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_rm->result();
    $rs_count = $num_rm;

    $total = array_fill(0, 10, 0);
    $totalAll = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 8; $k++) {

            $nilai = $row[$track]->RM_JUMLAH;
            echo '<td>' . $nilai . '</td>';
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
    for ($i = 0; $i < 8; $i++) {
        echo '<td>' . $total[$i] . '</td>';
        $totalAll += $total[$i];
    }
    echo '<td>' . $totalAll . '</td>';
    echo '</tr>';
	}
    ?>
</tbody>