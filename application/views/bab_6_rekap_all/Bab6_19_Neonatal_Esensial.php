<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 6 MDGs Peralatan Neonatal Esensial</h4>
NEONATAL ESENSIAL

<thead>
    <tr>
        <th>No</th>
        <th>Region RS</th>
        <th>Kode RS</th>
        <th>Nama RS</th>   

        <th> Inkubator</th> 
        <th> Infant Warmer </th> 
        <th> Pulse Oxymeter Neonatus </th> 
        <th> Therapy Sinar </th> 
        <th> Syringe Pump </th> 
        <th> Tabung Oksigen</th> 
        <th> Lampu Tindakan</th> 
        <th> Alat-Alat Resusitasi Neonatus </th> 
        <th> CPAP (Continous Positive Airways Preassure </th> 
        <th> Inkubator Transport</th>

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_neonatal_esensial->result();

    $rs_count = $num_neonatal_esensial;

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
            echo '<td>' . $row[$track]->PN_JUMLAH . '</td>';
            $total[$ind] += $row[$track]->PN_JUMLAH;
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