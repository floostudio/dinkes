<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.5.a Hasil Pelayanan Persalinan</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th>  
        
        <th colspan="20">1.Yan Ibu Hamil</th>
        <th colspan="20">Hipermesis</th>
        
        <th colspan="20">2.Yan Persalinan & Nifas</th>
        <th colspan="20">Total Persalinan (a+b+c)</th>
        <th colspan="20">a.Persalinan Normal</th>
        <th colspan="20">b.Persalinan dengan Komplikasi</th>
        <th colspan="20">Pendarahan Sebelum Bersalin</th>
        <th colspan="20">Pendarahan Sedusah Persalinan</th>
        <th colspan="20">Pre Eklampsi</th>
        <th colspan="20">Eklamsi</th>
        <th colspan="20">Infeksi</th>
        <th colspan="20">Lain-Lain</th>
        
        <th colspan="20">c.Seksio Sesaria</th>
        <th colspan="20">d.Indikasi Seksio</th>
        <th colspan="20">CPD</th>
        <th colspan="20">Partus Macet</th>
        <th colspan="20">Bekas SC</th>
        <th colspan="20">Kelainan Panggul</th>
        <th colspan="20">Pendarahan Antepartum</th>
        <th colspan="20">Tumor Menjalani Jalan Lahir</th>
        <th colspan="20">Kegagalan Induksi Persalinan</th>
        <th colspan="20">Persistent Fetal Distress</th>
        <th colspan="20">Malpresentasi</th>
        <th colspan="20">Gawat Janin</th>
        <th colspan="20">Gamely</th>
        <th colspan="20">Anak Mahal</th>
        <th colspan="20">Prolapsus funikuli & bayi masih hidup</th>
        <th colspan="20">Permintaan Sendiri</th>
        
        <th colspan="20">Hasil Persalinan</th>
        <th colspan="20">Abortus</th>
        <th colspan="20">Prematur</th>
        <th colspan="20">Lahir Hidup</th>
        <th colspan="20">Lahir Mati</th>
        <th colspan="20">BB > 2500gr</th>
        <th colspan="20">BB < 2500gr</th>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 35; $k++) { ?>
            <th colspan="5">Tribulan I</th>
            <th colspan="5">Tribulan II</th>
            <th colspan="5">Tribulan III</th>
            <th colspan="5">Tribulan IV</th>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 35; $k++) { ?>
            <th colspan="2">Rujukan</th>
            <th colspan="2">Datang Sendiri</th>
            <th rowspan="2">Dirujuk</th>
            <th colspan="2">Rujukan</th>
            <th colspan="2">Datang Sendiri</th>
            <th rowspan="2">Dirujuk</th>
            <th colspan="2">Rujukan</th>
            <th colspan="2">Datang Sendiri</th>
            <th rowspan="2">Dirujuk</th>
            <th colspan="2">Rujukan</th>
            <th colspan="2">Datang Sendiri</th>
            <th rowspan="2">Dirujuk</th>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 35; $k++) { ?>
            <th>Jumlah</th>
            <th>Meninggal</th>
            <th>Jumlah</th>
            <th>Meninggal</th>
			
            <th>Jumlah</th>
            <th>Meninggal</th>
            <th>Jumlah</th>
            <th>Meninggal</th>
			
            <th>Jumlah</th>
            <th>Meninggal</th>
            <th>Jumlah</th>
            <th>Meninggal</th>
			
            <th>Jumlah</th>
            <th>Meninggal</th>
            <th>Jumlah</th>
            <th>Meninggal</th>   
        <?php } ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_17->result();

    $rs_count = $num_51_17;
    $total = array_fill(0, 700, 0);
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 35; $k++) {
            echo '<td>' . $row[$track]->PERSALINAN_RUJUKAN_TOTAL_T1 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_RUJUKAN_MENINGGAL_T1 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_SENDIRI_TOTAL_T1 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_SENDIRI_MENINGGAL_T1 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_DIRUJUK_T1 . '</td>';

            echo '<td>' . $row[$track]->PERSALINAN_RUJUKAN_TOTAL_T2 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_RUJUKAN_MENINGGAL_T2 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_SENDIRI_TOTAL_T2 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_SENDIRI_MENINGGAL_T2 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_DIRUJUK_T2 . '</td>';

            echo '<td>' . $row[$track]->PERSALINAN_RUJUKAN_TOTAL_T3 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_RUJUKAN_MENINGGAL_T3 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_SENDIRI_TOTAL_T3 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_SENDIRI_MENINGGAL_T3 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_DIRUJUK_T3 . '</td>';

            echo '<td>' . $row[$track]->PERSALINAN_RUJUKAN_TOTAL_T4 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_RUJUKAN_MENINGGAL_T4 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_SENDIRI_TOTAL_T4 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_SENDIRI_MENINGGAL_T4 . '</td>';
            echo '<td>' . $row[$track]->PERSALINAN_DIRUJUK_T4 . '</td>';

            /*$total[$ind] += $row[$track]->PERSALINAN_RUJUKAN_TOTAL_T1;
            $total[++$ind] += $row[$track]->PERSALINAN_RUJUKAN_MENINGGAL_T1;
            $total[++$ind] += $row[$track]->PERSALINAN_SENDIRI_TOTAL_T1;
            $total[++$ind] += $row[$track]->PERSALINAN_SENDIRI_MENINGGAL_T1;
            $total[++$ind] += $row[$track]->PERSALINAN_DIRUJUK_T1;

            $total[++$ind] += $row[$track]->PERSALINAN_RUJUKAN_TOTAL_T2;
            $total[++$ind] += $row[$track]->PERSALINAN_RUJUKAN_MENINGGAL_T2;
            $total[++$ind] += $row[$track]->PERSALINAN_SENDIRI_TOTAL_T2;
            $total[++$ind] += $row[$track]->PERSALINAN_SENDIRI_MENINGGAL_T2;
            $total[++$ind] += $row[$track]->PERSALINAN_DIRUJUK_T2;

            $total[++$ind] += $row[$track]->PERSALINAN_RUJUKAN_TOTAL_T3;
            $total[++$ind] += $row[$track]->PERSALINAN_RUJUKAN_MENINGGAL_T3;
            $total[++$ind] += $row[$track]->PERSALINAN_SENDIRI_TOTAL_T3;
            $total[++$ind] += $row[$track]->PERSALINAN_SENDIRI_MENINGGAL_T3;
            $total[++$ind] += $row[$track]->PERSALINAN_DIRUJUK_T3;

            $total[++$ind] += $row[$track]->PERSALINAN_RUJUKAN_TOTAL_T4;
            $total[++$ind] += $row[$track]->PERSALINAN_RUJUKAN_MENINGGAL_T4;
            $total[++$ind] += $row[$track]->PERSALINAN_SENDIRI_TOTAL_T4;
            $total[++$ind] += $row[$track]->PERSALINAN_SENDIRI_MENINGGAL_T4;
            $total[++$ind] += $row[$track]->PERSALINAN_DIRUJUK_T4;

            $ind++;*/

            $track++;
        }
        echo '</tr>';
    }
    ?>
</tbody>