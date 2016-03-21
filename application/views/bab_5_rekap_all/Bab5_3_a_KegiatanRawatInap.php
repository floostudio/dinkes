<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.3.a Kegiatan Rawat Inap</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th> 


        <th colspan="15">Penyakit Dalam</th>  
        <th colspan="15">Bedah</th>  
        <th colspan="15">Kesehatan Anak</th>  
        <th colspan="15">Obstetri</th>  
        <th colspan="15">Gynekologi</th>  
        <th colspan="15">Bedah Syaraf</th>  
        <th colspan="15">Syaraf</th>  
        <th colspan="15">Jiwa </th>  
        <th colspan="15">THT</th>  
        <th colspan="15">MAta</th> 
        <th colspan="15">Kulit Kelamin</th>  
        <th colspan="15">Gigi Mulut</th>  
        <th colspan="15">Kardiologi</th>  
        <th colspan="15">Radioterapi</th>  
        <th colspan="15">Bedah Ortopedi</th> 
        <th colspan="15">Paru-paru</th>  
        <th colspan="15">Kusta</th>  
        <th colspan="15">Umum</th>  
        <th colspan="15">Rehabilitasi Medik</th> 
        <th colspan="15">Isolasi</th>  
        <th colspan="15">Luka Bakar</th>  
        <th colspan="15">ICU</th>  
        <th colspan="15">ICCU</th>  
        <th colspan="15">Perinatal (NICU)</th> 
        <th colspan="15">Lain-lain</th>  

    </tr>
    <tr>
        <?php for ($k = 0; $k < 25; $k++) { ?>
            <th rowspan="3">Jml Px</th>
            <th colspan="2">Pasien Keluar Hidup</th>
            <th colspan="4">Pasien Keluar Mati</th>
            <th rowspan="3">Jumlah Lama Dirawat</th>
            <th rowspan="3">Jumlah Hari Dirawat</th>
            <th colspan="5">Perincian Total Hari Rawat</th>
            <th rowspan="3">Keterangan</th>
        <?php } ?>
    </tr>
    <tr> 
        <?php for ($k = 0; $k < 25; $k++) { ?>
            <th rowspan="2">L</th>
            <th rowspan="2">P</th>
            <th colspan="2"><48Jam</th>
            <th colspan="2">>48Jam</th>
            <th rowspan="2">VVIP</th>
            <th rowspan="2">VIP</th>
            <th rowspan="2">Kelas 1</th>
            <th rowspan="2">Kelas 2</th>
            <th rowspan="2">Kelas 3</th>
        <?php } ?>

    </tr>
    <tr>
        <?php for ($k = 0; $k < 25; $k++) { ?>
            <th>L</th>
            <th>P</th>
            <th>L</th>
            <th>P</th>
        <?php } ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_11->result();

    $rs_count = $num_51_11;

    $total = array_fill(0, 400, 0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 25; $k++) {
            echo '<td>' . $row[$track]->KRI_TOTAL . '</td>';
            echo '<td>' . $row[$track]->KRI_PASIENHIDUP_L . '</td>';
            echo '<td>' . $row[$track]->KRI_PASIENHIDUP_P . '</td>';
            echo '<td>' . $row[$track]->KRI_PASIENMATI_K48_L . '</td>';
            echo '<td>' . $row[$track]->KRI_PASIENMATI_K48_P . '</td>';
            echo '<td>' . $row[$track]->KRI_PASIENMATI_L48_L . '</td>';
            echo '<td>' . $row[$track]->KRI_PASIENMATI_L48_P . '</td>';
            echo '<td>' . $row[$track]->KRI_LAMARAWAT . '</td>';
            echo '<td>' . $row[$track]->KRI_HARIRAWAT . '</td>';
            echo '<td>' . $row[$track]->KRI_VVIP . '</td>';
            echo '<td>' . $row[$track]->KRI_VIP . '</td>';
            echo '<td>' . $row[$track]->KRI_KLSI . '</td>';
            echo '<td>' . $row[$track]->KRI_KLSII . '</td>';
            echo '<td>' . $row[$track]->KRI_KLSIII . '</td>';
            echo '<td>' . $row[$track]->KRI_KETERANGAN . '</td>';

            $total[$ind] += $row[$track]->KRI_TOTAL;
            $total[++$ind] += $row[$track]->KRI_PASIENHIDUP_L;
            $total[++$ind] += $row[$track]->KRI_PASIENHIDUP_P;
            $total[++$ind] += $row[$track]->KRI_PASIENMATI_K48_L;
            $total[++$ind] += $row[$track]->KRI_PASIENMATI_K48_P;
            $total[++$ind] += $row[$track]->KRI_PASIENMATI_L48_L;
            $total[++$ind] += $row[$track]->KRI_PASIENMATI_L48_P;
            $total[++$ind] += $row[$track]->KRI_LAMARAWAT;
            $total[++$ind] += $row[$track]->KRI_HARIRAWAT;
            $total[++$ind] += $row[$track]->KRI_VVIP;
            $total[++$ind] += $row[$track]->KRI_VIP;
            $total[++$ind] += $row[$track]->KRI_KLSI;
            $total[++$ind] += $row[$track]->KRI_KLSII;
            $total[++$ind] += $row[$track]->KRI_KLSIII;
            $total[++$ind] = '-';
            $ind++;

            $track++;
        }
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td><b>Total</b></td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($i = 0; $i < 375; $i++) {
            echo '<td>' . $total[$i] . '</td>';
        }
        echo '</tr>';
    }
    ?>
</tbody>