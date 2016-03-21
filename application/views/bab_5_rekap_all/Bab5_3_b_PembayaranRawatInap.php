<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.3.b Pembayaran Rawat Inap</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th> 


        <th colspan="9">Penyakit Dalam</th>  
        <th colspan="9">Bedah</th>  
        <th colspan="9">Kesehatan Anak</th>  
        <th colspan="9">Obstetri</th>  
        <th colspan="9">Gynekologi</th>  
        <th colspan="9">Bedah Syaraf</th>  
        <th colspan="9">Syaraf</th>  
        <th colspan="9">Jiwa </th>  
        <th colspan="9">THT</th>  
        <th colspan="9">Mata</th> 
        <th colspan="9">Kulit Kelamin</th>  
        <th colspan="9">Gigi Mulut</th>  
        <th colspan="9">Kardiologi</th>  
        <th colspan="9">Radioterapi</th>  
        <th colspan="9">Bedah Ortopedi</th> 
        <th colspan="9">Paru-paru</th>  
        <th colspan="9">Kusta</th>  
        <th colspan="9">Umum</th>  
        <th colspan="9">Rehabilitasi Medik</th> 
        <th colspan="9">Isolasi</th>  
        <th colspan="9">Luka Bakar</th>  
        <th colspan="9">ICU</th>  
        <th colspan="9">ICCU</th>  
        <th colspan="9">Perinatal (NICU)</th> 
        <th colspan="9">Lain-lain</th> 

    </tr>
    <tr>
        <?php for ($k = 0; $k < 25; $k++) { ?>
            <td colspan="9">Jumlah Pasien Rawat Inap</td>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 25; $k++) { ?>
            <td rowspan="2">Umum</td>
            <td colspan="2">Asuransi</td>
            <td rowspan="2">Jamkesmas</td>
            <td rowspan="2">Jamkesmasda</td>
            <td rowspan="2">Jamsostek</td>
            <td rowspan="2">SPM</td>
            <td rowspan="2">Lain-Lain</td>
            <td rowspan="2">Total</td>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 25; $k++) { ?>
            <td>ASKES</td>
            <td>Asuransi Lainnya</td>
        <?php } ?>        
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_12->result();

    $rs_count = $num_51_12;
    $total = array_fill(0, 225, 0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 25; $k++) {
            echo '<td>' . $row[$track]->PEMBAYARAN_RI_UMUM . '</td>';
            echo '<td>' . $row[$track]->PEMBAYARAN_RI_ASKES . '</td>';
            echo '<td>' . $row[$track]->PEMBAYARAN_RI_ASURANSI_LAIN . '</td>';
            echo '<td>' . $row[$track]->PEMBAYARAN_RI_JAMKESMAS . '</td>';
            echo '<td>' . $row[$track]->PEMBAYARAN_RI_JAMKESMASDA . '</td>';
            echo '<td>' . $row[$track]->PEMBAYARAN_RI_JAMSOSTEK . '</td>';
            echo '<td>' . $row[$track]->PEMBAYARAN_RI_SPM . '</td>';
            echo '<td>' . $row[$track]->PEMBAYARAN_RI_LAIN . '</td>';
            echo '<td>' . $row[$track]->PEMBAYARAN_RI_TOTAL . '</td>';

            $total[$ind] += $row[$track]->PEMBAYARAN_RI_UMUM;
            $total[++$ind] += $row[$track]->PEMBAYARAN_RI_ASKES;
            $total[++$ind] += $row[$track]->PEMBAYARAN_RI_ASURANSI_LAIN;
            $total[++$ind] += $row[$track]->PEMBAYARAN_RI_JAMKESMAS;
            $total[++$ind] += $row[$track]->PEMBAYARAN_RI_JAMKESMASDA;
            $total[++$ind] += $row[$track]->PEMBAYARAN_RI_JAMSOSTEK;
            $total[++$ind] += $row[$track]->PEMBAYARAN_RI_SPM;
            $total[++$ind] += $row[$track]->PEMBAYARAN_RI_LAIN;
            $total[++$ind] += $row[$track]->PEMBAYARAN_RI_TOTAL;

            $ind++;
            $track++;
        }
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td><b>Total</b></td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($i = 0; $i < 225; $i++) {
            echo '<td>' . $total[$i] . '</td>';
        }
        echo '</tr>';
    }
    ?>
</tbody>