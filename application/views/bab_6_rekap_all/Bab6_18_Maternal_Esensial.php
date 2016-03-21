<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6 MDGs Peralatan Maternal Esensial</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region RS</th>
        <th>Kode RS</th>
        <th>Nama RS</th>   

        <th> Kotak Resusitasi </th> 
        <th> Inkubator </th> 
        <th> Penghangat (Radiant Warmer) </th> 
        <th> Ekstraktor Vakum </th> 
        <th> Forceps naegele </th> 
        <th> AVM</th> 
        <th> Pompa Vakum Listrik </th> 
        <th> Monitor denyut jantung/pernapasan </th> 
        <th> Foetal Doppler </th> 
        <th>Set Sectio Saesaria</th>

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_maternal_esensial->result();

    $rs_count = $num_maternal_esensial;

    $total = array_fill(0, 10, 0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 10; $k++) {
            echo '<td>' . $row[$track]->PM_JUMLAH . '</td>';
            $total[$ind] += $row[$track]->PM_JUMLAH;
            $ind++;
            $track++;
        }
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td><b>Total</b></td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($i = 0; $i < 10; $i++) {
            echo '<td>' . $total[$i] . '</td>';
        }

        echo '</tr>';
    }
    ?>
</tbody>