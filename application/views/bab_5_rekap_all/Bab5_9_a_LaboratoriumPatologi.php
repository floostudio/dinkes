<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.9.a Jumlah Pemeriksaan Pelayanan Laboratorium Patologi</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 

        <th colspan="9"> Patologi Klinik</th> 
        <th colspan="9"> Patologi Anatomi</th>  

    </tr>
    <tr>
        <th colspan="3"> N-2</th> 
        <th colspan="3"> N-1</th> 
        <th colspan="3"> N</th> 
        <th colspan="3"> N-2</th> 
        <th colspan="3"> N-1</th> 
        <th colspan="3"> N</th>  

    </tr>
    <tr>
        <th colspan="1"> Sederhana</th> 
        <th colspan="1"> Sedang</th> 
        <th colspan="1"> Canggih</th> 

        <th colspan="1"> Sederhana</th> 
        <th colspan="1"> Sedang</th> 
        <th colspan="1"> Canggih</th> 

        <th colspan="1"> Sederhana</th> 
        <th colspan="1"> Sedang</th> 
        <th colspan="1"> Canggih</th> 

        <th colspan="1"> Sederhana</th> 
        <th colspan="1"> Sedang</th> 
        <th colspan="1"> Canggih</th> 

        <th colspan="1"> Sederhana</th> 
        <th colspan="1"> Sedang</th> 
        <th colspan="1"> Canggih</th> 

        <th colspan="1"> Sederhana</th> 
        <th colspan="1"> Sedang</th> 
        <th colspan="1"> Canggih</th> 


    </tr>

</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_lab1->result();

    $rs_count = $num_lab1;
    $total = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 2; $k++) {
            echo '<td>' . $row[$track]->LAB_P_SEDERHANA_N2 . '</td>';
            echo '<td>' . $row[$track]->LAB_P_SEDANG_N2 . '</td>';
            echo '<td>' . $row[$track]->LAB_P_CANGGIH_N2 . '</td>';
            echo '<td>' . $row[$track]->LAB_P_SEDANG_N1 . '</td>';
            echo '<td>' . $row[$track]->LAB_P_SEDERHANA_N1 . '</td>';
            echo '<td>' . $row[$track]->LAB_P_CANGGIH_N1 . '</td>';
            echo '<td>' . $row[$track]->LAB_P_SEDANG_N . '</td>';
            echo '<td>' . $row[$track]->LAB_P_SEDERHANA_N . '</td>';
            echo '<td>' . $row[$track]->LAB_P_CANGGIH_N . '</td>';

            $total[$ind] += $row[$track]->LAB_P_SEDERHANA_N2;
            $ind++;
            $total[$ind] += $row[$track]->LAB_P_SEDANG_N2;
            $ind++;
            $total[$ind] += $row[$track]->LAB_P_CANGGIH_N2;
            $ind++;
            $total[$ind] += $row[$track]->LAB_P_SEDANG_N1;
            $ind++;
            $total[$ind] += $row[$track]->LAB_P_SEDERHANA_N1;
            $ind++;
            $total[$ind] += $row[$track]->LAB_P_CANGGIH_N1;
            $ind++;
            $total[$ind] += $row[$track]->LAB_P_SEDANG_N;
            $ind++;
            $total[$ind] += $row[$track]->LAB_P_SEDERHANA_N;
            $ind++;
            $total[$ind] += $row[$track]->LAB_P_CANGGIH_N;
            $ind++;
            $track++;
        }

        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td>total </td>';
        echo '<td> </td> <td> </td> <td> </td>';

        for ($i = 0; $i < 18; $i++)
            echo '<td>' . $total[$i] . '</td>';

        echo '</tr>';
    }
    ?>

</tbody>