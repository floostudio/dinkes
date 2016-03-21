<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.5.b Hasil Perinatologi Neonatalogi</h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th> 

        <th colspan="20">Kasus Neonatal 0 - 7 hari</th>
        <th colspan="20">Asphyxia</th>
        <th colspan="20">Trauma Kelahiran</th>
        <th colspan="20">BBLR</th>
        <th colspan="20">Tetanus Neonatorum</th>
        <th colspan="20">Kelainan Congenital</th>
        <th colspan="20">ISPA</th>
        <th colspan="20">Diare</th>
        <th colspan="20">Lain-Lain</th>

        <th colspan="20">Kasus Neonatal 8-28 hari</th>
        <th colspan="20">Asphyxia</th>
        <th colspan="20">Trauma Kelahiran</th>
        <th colspan="20">BBLR</th>
        <th colspan="20">Tetanus Neonatorum</th>
        <th colspan="20">Kelainan Congenital</th>
        <th colspan="20">ISPA</th>
        <th colspan="20">Diare</th>
        <th colspan="20">Lain-Lain</th>
        
        <th colspan="20">Kelahiran Mati</th>  
    </tr>
    <tr>
        <?php for ($k = 0; $k < 19; $k++) { ?>
            <th colspan="5">Tribulan I</th>
            <th colspan="5">Tribulan II</th>
            <th colspan="5">Tribulan III</th>
            <th colspan="5">Tribulan IV</th>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 19; $k++) { ?>
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
        <?php for ($k = 0; $k < 19; $k++) { ?>
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

    $row = $data_51_18->result();

    $rs_count = $num_51_18;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->nm_list_regoion . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 19; $k++) {
            echo '<td>' . $row[$track]->PERINATOLOGI_RUJUKAN_TOTAL_T1 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_RUJUKAN_MENINGGAL_T1 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_SENDIRI_TOTAL_T1 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_SENDIRI_MENINGGAL_T1 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_DIRUJUK_T1 . '</td>';

            echo '<td>' . $row[$track]->PERINATOLOGI_RUJUKAN_TOTAL_T2 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_RUJUKAN_MENINGGAL_T2 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_SENDIRI_TOTAL_T2 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_SENDIRI_MENINGGAL_T2 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_DIRUJUK_T2 . '</td>';

            echo '<td>' . $row[$track]->PERINATOLOGI_RUJUKAN_TOTAL_T3 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_RUJUKAN_MENINGGAL_T3 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_SENDIRI_TOTAL_T3 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_SENDIRI_MENINGGAL_T3 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_DIRUJUK_T3 . '</td>';

            echo '<td>' . $row[$track]->PERINATOLOGI_RUJUKAN_TOTAL_T4 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_RUJUKAN_MENINGGAL_T4 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_SENDIRI_TOTAL_T4 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_SENDIRI_MENINGGAL_T4 . '</td>';
            echo '<td>' . $row[$track]->PERINATOLOGI_DIRUJUK_T4 . '</td>';
            $track++;
        }
        echo '</tr>';
    }
    ?>
</tbody>