<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6 MDGs 4</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region RS</th>
        <th>Kode RS</th>

        <th>Nama RS</th>   

        <th> Rumah sakit melaksanakan Audit Maternal Perinatal </th> 
        <th> Rumah sakit menerapkan "Buku Saku Pelayanan Kesehatan Anak di RS </th> 
        <th> Rumah Sakit memenuhi kecukupan obat dan alat sesuai Buku Saku Pelayanan Kesehatan Anak di RS </th> 
        <th> Rumah Sakit memiliki dokter spesialis anak minimal 1 orang </th> 
        <th> Rumah Sakit melaksanakan sistim rujukan (protap/pedoman/SOP dan instrumen) sesuai dengan standar </th> 
        <th> Jumlah perinatologi set yang dimiliki Rumah Sakit</th> 

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_mdgs4_1->result();
    $row2 = $data_mdgs4_2->result();
    $rs_count = $num_mdgs4_1;
    $rs_count2 = $num_mdgs4_2;

    $track = 0;
    $track2 = 0;
    if ($rs_count == $rs_count2) {
        for ($j = 0; $j < $rs_count; $j++) {
            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . $row[$track]->daftar_list_region . '</td>';
            echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
            echo '<td>' . $row[$track]->RS_NAMA . '</td>';
            for ($k = 0; $k < 5; $k++) {
                if ($row[$track]->MDGS41_KONDISI == 1)
                    echo '<td>  &#10004 </td>';
                else
                    echo '<td> &#10008 </td>';
                $track++;
            }
            echo '<td>' . $row2[$track2]->MDGS42_JUMLAH . '</td>';
            $track2++;

            echo '</tr>';
        }
    }
    ?>
</tbody>