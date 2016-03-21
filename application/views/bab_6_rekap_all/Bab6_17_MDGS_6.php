<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 6 MDGs 6</h4> 
<thead>
    <tr>
        <th>No</th>
        <th>Region RS</th>
        <th>Kode RS</th>
        <th>Nama RS</th>   

        <th> Rumah Sakit memberikan pelatihan KT (Konseling  dan Test)  bagi tim  di fasilitas  kesehatan</th> 
        <th> Layanan KT di Rumah Sakit memiliki sarana dan operasional untuk mendukung layanan konseling, dan test HIV</th> 
        <th> Rumah Sakit memberikan pelatihan IMS bagi tim  di fasilitas  kesehatan </th> 
        <th> Rumah sakit memberikan pelatihan layanan PTRM</th> 
        <th> Rumah sakit memberikan pelatihan PMTCT</th> 
        <th> Rumah sakit memberikan pelatihan tim CST bagi petugas kesehatan</th> 

        <th>Rumah sakit memiliki pelayanan pemeriksaan CD4</th>
        <th>Rumah sakit memiliki pelayanan pemeriksaan viral load</th>
        <th>Rumah sakit menyelenggarakan pelayanan rujukan bagi Orang dengan HIV dan AIDS (ODHA)</th>
        <th>RS telah dilatih dan melaksanakan pelayanan TB sesuai strategi DOTS</th>
        <th>Rumah Sakit memiliki tim DOTS terlatih</th>
        <th>Rumah Sakit melaksanakan pengendalian infeksi airborne dalam implementasi DOTS</th>
        <th>Laboratorium RS melaksanakan pengendalian infeksi TB dalam pemeriksaan kultur</th>
        <th>Rumah Sakit  memiliki SK Direktur tentang pembentukan Tim DOTS</th>
        <th>Rumah Sakit memiliki sarana yang dapat member pelayanan TB dengan strategi DOTS</th>
        <th>Rumah Sakit memiliki formularium obat TB sesuai panduan standar pengobatan TB strategi DOTS</th>
        <th>Laboratorium RS memiliki mikroskop dan bahan laboratorium yang sesuai standard dan berfungsi dengan baik</th>
        <th>Rumah Sakit memiliki bahan lab sesuai dengan fungsinya dalam jumlah yang cukup</th>
        <th>RS memiliki ruang isolasi untuk TB HIV</th>
        <th>RS memiliki ruang isolasi untuk MDR TB</th>
        <th>Tersedianya Obat Anti Tuberkulosis (OAT) sesuai standar</th>
        <th>RS memiliki media KIE untuk program TB</th> 

        <th>Jumlah tim yang dilatih dalam pelatihan KT bagi tim di fasilitas kesehatan di Rumah Sakit sebanyak</th>
        <th>Jumlah tim yang dilatih dalam pelatihan IMS bagi tim di fasilitas kesehatan di Rumah Sakit sebanyak</th>
        <th>Jumlah petugas kesehatan yang dilatih PTRM sebanyak</th>
        <th>Jumlah petugas kesehatan yang dilatih PMTCT sebanyak</th>
        <th>Pertemuan jejaring internal dan eksternal dalam implementasi strategi DOTS dalam setahun sebanyak</th>
        <th>Jumlah tenaga lab yang dilatih dan  mengirimkan slide untuk dilakukan cross check secara teratur setiap triwulan sebanyak</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_mdgs6_1->result();
    $row2 = $data_mdgs6_2->result();
    $rs_count = $num_mdgs6_1;
    $rs_count2 = $num_mdgs6_2;

    $track = 0;
    $track2 = 0;

    if ($rs_count == $rs_count2) {
        for ($j = 0; $j < $rs_count; $j++) {
            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . $row[$track]->daftar_list_region . '</td>';
            echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
            echo '<td>' . $row[$track]->RS_NAMA . '</td>';

            for ($k = 0; $k < 22; $k++) {
                if ($row[$track]->MDGS61_KONDISI == 1)
                    echo '<td>  &#10004 </td>';
                else
                    echo '<td> &#10008 </td>';
                $track++;
            }

            for ($k = 0; $k < 6; $k++) {
                echo '<td>' . $row2[$track2]->MDGS62_JUMLAH . '</td>';
                $track2++;
            }

            echo '</tr>';
        }
    }
    ?>
</tbody>