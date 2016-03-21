<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.1.C. Tenaga SDM IGD</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 

        <th colspan="3">Dr. Subspesialis </th>  
        <th colspan="3">Dr. Spesialis </th>  
        <th colspan="3">Dr. PPDS </th>  
        <th colspan="3">Dr. Umum </th>  
        <th colspan="3">Perawat Kepala </th>  
        <th colspan="3">Perawat </th>  
        <th colspan="3">Non Medis </th>  

    </tr>
    <tr>
        <th>Jumlah</th>
        <th>Yang Sudah Dilatih</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Yang Sudah Dilatih</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Yang Sudah Dilatih</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Yang Sudah Dilatih</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Yang Sudah Dilatih</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Yang Sudah Dilatih</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Yang Sudah Dilatih</th>
        <th>Keterangan</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_3->result();

    $rs_count = $num_51_3;
    $total = array_fill(0, 21, 0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 7; $k++) {
            echo '<td>' . $row[$track]->IGD_JUMLAH . '</td>';
            $total[$ind] += $row[$track]->IGD_JUMLAH;
            $ind++;
            echo '<td>' . $row[$track]->IGD_JUMLAH_TERLATIH . '</td>';
 
            $total[$ind] += $row[$track]->IGD_JUMLAH_TERLATIH;
            $ind++;
            $total[$ind] += $row[$track]->IGD_JUMLAH_TERLATIH;
            $ind++;
			// onsite == 1
            if ($row[$track]->IGD_KETERANGAN == 1)
                echo '<td> On Site</td>';
            else
                echo '<td> On Call</td>';
 
            $track++;
        }
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td><b>Total</b></td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($i = 0; $i < 21; $i++) {
            if ($i == 2 || $i == 5 || $i == 8 || $i == 11 || $i == 14 || $i == 17 || $i == 20)
                echo '<td> </td>';
            else
                echo '<td>' . $total[$i] . '</td>';
        }
        echo '</tr>';
    }
    ?>
</tbody>