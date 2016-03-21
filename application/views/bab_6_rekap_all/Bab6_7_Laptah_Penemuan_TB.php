<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 6 Laporan Tahunan Penemuan TB</h4>
<thead>   
    <tr>        
        <th rowspan="4">NO</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode Registrasi</th>
        <th rowspan="4">Nama RS</th>
        
        <th colspan="81">Pasien Baru</th>
        <th colspan="135">Pasien Pengobatan Ulang</th>
    </tr>
    <tr>        
        <th colspan="27">BTA Positif</th>
        <th colspan="27">BTA Negatif/ Ro Pos</th>
        <th colspan="27">Extra Paru</th>
        
        <th colspan="27">Kambuh</th>
        <th colspan="27">Defaulter</th>
        <th colspan="27">Gagal</th>
        <th colspan="27">Kronik</th>   
        <th colspan="27">Lain-Lain</th>
    </tr>
    <tr>
        <?php
        for ($a = 0; $a < 8; $a++) {
            ?>
            <th colspan="6">Anak</th>
            <th colspan="18">Dewasa</th>
            <th colspan="3">Total</th>
        <?php } ?>
    </tr>
    <tr>

        <?php
        for ($a = 0; $a < 8; $a++) {
            ?>
            <th>L</th>
            <th>P</th>
            <th>Total</th>
            <th>L</th>
            <th>P</th>
            <th>Total</th>
            <th>L</th>
            <th>P</th>
            <th>Total</th>
            <th>L</th>
            <th>P</th>
            <th>Total</th>
            <th>L</th>
            <th>P</th>
            <th>Total</th>
            <th>L</th>
            <th>P</th>
            <th>Total</th>
            <th>L</th>
            <th>P</th>
            <th>Total</th>
            <th>L</th>
            <th>P</th>
            <th>Total</th>
            <th>L</th>
            <th>P</th>
            <th>Total L+P</th>
        <?php }
        ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_laptah_tb->result();

    $totalN2 = array(0, 0, 0, 0, 0, 0, 0);
    $totalN1 = array(0, 0, 0, 0, 0, 0, 0);
    $totalN = array(0, 0, 0, 0, 0, 0, 0);

    $totalJumlX1 = $totalJumlX2 = 0;

    $rs_count = $num_laptah_tb;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalJumlX = $totalTB04 = $totalTB514 = $totalTB1524 = $totalTB2334 = $totalTB3544 = $totalTB4554 = $totalTB5565 = $totalTB65 = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 8; $k++) {
            echo '<td>' . $row[$track]->LAPTAH_TB_ANAK_0_4_L . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_ANAK_0_4_P . '</td>';
            $totalTB04 = $row[$track]->LAPTAH_TB_ANAK_0_4_L + $row[$track]->LAPTAH_TB_ANAK_0_4_P;
            echo '<td>' . $totalTB04 . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_ANAK_5_14_L . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_ANAK_5_14_P . '</td>';
            $totalTB514 = $row[$track]->LAPTAH_TB_ANAK_5_14_L + $row[$track]->LAPTAH_TB_ANAK_5_14_P;
            echo '<td>' . $totalTB514 . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_15_24_L . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_15_24_P . '</td>';
            $totalTB1524 = $row[$track]->LAPTAH_TB_DEWASA_15_24_L + $row[$track]->LAPTAH_TB_DEWASA_15_24_P;
            echo '<td>' . $totalTB1524 . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_23_34_L . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_23_34_P . '</td>';
            $totalTB2334 = $row[$track]->LAPTAH_TB_DEWASA_23_34_L + $row[$track]->LAPTAH_TB_DEWASA_23_34_P;
            echo '<td>' . $totalTB2334 . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_35_44_L . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_35_44_P . '</td>';
            $totalTB3544 = $row[$track]->LAPTAH_TB_DEWASA_35_44_L + $row[$track]->LAPTAH_TB_DEWASA_35_44_P;
            echo '<td>' . $totalTB3544 . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_45_54_L . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_45_54_P . '</td>';
            $totalTB4554 = $row[$track]->LAPTAH_TB_DEWASA_45_54_L + $row[$track]->LAPTAH_TB_DEWASA_45_54_P;
            echo '<td>' . $totalTB4554 . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_55_65_L . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_55_65_P . '</td>';
            $totalTB5565 = $row[$track]->LAPTAH_TB_DEWASA_55_65_L + $row[$track]->LAPTAH_TB_DEWASA_55_65_P;
            echo '<td>' . $totalTB5565 . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_65_L . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_DEWASA_65_P . '</td>';
            $totalTB65 = $row[$track]->LAPTAH_TB_DEWASA_65_L + $row[$track]->LAPTAH_TB_DEWASA_65_P;
            echo '<td>' . $totalTB65 . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_TOTAL_L . '</td>';
            echo '<td>' . $row[$track]->LAPTAH_TB_TOTAL_P . '</td>';

            $totalJumlX = $row[$track]->LAPTAH_TB_ANAK_0_4_L + $row[$track]->LAPTAH_TB_ANAK_0_4_P + 
			$row[$track]->LAPTAH_TB_ANAK_5_14_L + $row[$track]->LAPTAH_TB_ANAK_5_14_P +
			$row[$track]->LAPTAH_TB_DEWASA_15_24_L + $row[$track]->LAPTAH_TB_DEWASA_15_24_P + 
			$row[$track]->LAPTAH_TB_DEWASA_23_34_L + $row[$track]->LAPTAH_TB_DEWASA_23_34_P + 
			$row[$track]->LAPTAH_TB_DEWASA_35_44_L + $row[$track]->LAPTAH_TB_DEWASA_35_44_P + 
			$row[$track]->LAPTAH_TB_DEWASA_45_54_L + $row[$track]->LAPTAH_TB_DEWASA_45_54_P + 
			$row[$track]->LAPTAH_TB_DEWASA_55_65_L + $row[$track]->LAPTAH_TB_DEWASA_55_65_P + 
			$row[$track]->LAPTAH_TB_DEWASA_65_L + $row[$track]->LAPTAH_TB_DEWASA_65_P ;

            echo '<td>' . $totalJumlX . '</td>';

            $track++;
        }


        echo '</tr>';
    }
    ?>
</tbody>