<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.14.d Keluhan Masyarakat Miskin terhadap Pelayanan Petugas di Rumah Sakit</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region</th>
        <th>Kode RS</th> 
        <th>Nama RS</th> 


        <th colspan="1"> Prosedur Pengelolaan </th>  
        <th colspan="1"> Pelaksanaan Pengelolaan</th>  
        <th colspan="1"> Tempat Pengaduan dan penyelesaian Pengaduan/Keluhan</th> 
        <th colspan="1"> Catatan proses pengaduan</th> 
        <th colspan="1"> Catatan/Dokumen tindak lanjut</th>  
        <th colspan="1"> Pelaporan</th> 

    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_maskin3->result();

    $rs_count = $num_maskin3;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 6; $k++) {
            if ($row[$track]->KELOLA_MASKIN_KONDISI == 0)
                echo '<td>TIDAK</td>';
            else if ($row[$track]->KELOLA_MASKIN_KONDISI == 1)
                echo '<td>YA</td>';
            $track++;
        }
        echo '</tr>';
    }
    ?>
</tbody>