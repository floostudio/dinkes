<html>
    <head>
        <style>
            table {  border-collapse:collapse; }
            table, td, th
            {  border:1px solid black; }

            th{width:200px}
        </style>
    </head>



    <br/>

    ////////////////// SPM RS
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Wilayah</th>
                <th>Jenis RS</th>
                <th>Nama RS</th> 
                <th>Kode Registrasi</th>
                <th>Kelas RS</th>

                <th>IGD Standart</th>
                <th>IGD Capaian</th>
                <th>IRJA Standart</th>
                <th>IRJA Capaian</th>
                <th>IRNA Standart</th>
                <th>IRNA Capaian</th>
                <th>Bedah Standart</th>
                <th>Bedah Capaian</th>
                <th>Persalinan & Perinatologi Standart</th>
                <th>Persalinan & Perinatologi Capaian</th>
                <th>Intensif Standart</th>
                <th>Intensif Capaian</th>
                <th>Radiologi Standart</th>
                <th>Radiologi Capaian</th>
                <th>Laboratorium Standart</th>
                <th>Laboratorium Capaian</th>
                <th>Rehab Medik Standart</th>
                <th>Rehab Medik Capaian</th>
                <th>Farmasi Standart</th>
                <th>Farmasi Capaian</th>
                <th>Gizi Standart</th>
                <th>Gizi Capaian</th>
                <th>Transfusi Darah Standart</th>
                <th>Transfusi Darah Capaian</th>
                <th>Gakin Standart</th>
                <th>Gakin Capaian</th>
                <th>Rekam Medik Standart</th>
                <th>Rekam Medik Capaian</th>
                <th>Limbah Standart</th>
                <th>Limbah Capaian</th>
                <th>Admin Standart</th>
                <th>Admin Capaian</th>
                <th>Ambulan Standart</th>
                <th>Ambulan Capaian</th>
                <th>Pemulasaran Jenazah Standart</th>
                <th>Pemulasaran Jenazah Capaian</th>
                <th>Sarana Standart</th>
                <th>Sarana Capaian</th>
                <th>Laundry Standart</th>
                <th>Laundry Capaian</th>
                <th>Pengendalian Infeksi Standart</th>
                <th>Pengendalian Infeksi Capaian</th>
            </tr>
        </thead>
        <?php
        $i = 1;

        $row_spm = $data_spm->result();

        $rs_count = $num_spm;
        $num_kategori = $kat_spm;

        $track = 0;
        for ($j = 0; $j < $rs_count; $j++) {

            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . $row_spm[$track]->nm_list_regoion . '</td>';
            echo '<td>' . $row_spm[$track]->jenis_rs_nama . '</td>';
            echo '<td>' . $row_spm[$track]->RS_NAMA . '</td>';
            echo '<td>' . $row_spm[$track]->KODE_REGISTRASI . '</td>';
            echo '<td>' . $row_spm[$track]->kelas_rs . '</td>';

            for ($k = 0; $k < $num_kategori; $k++) {

                echo '<td>' . $row_spm[$track]->SPM_RS_INDIKATOR . '</td>';
                echo '<td>' . $row_spm[$track]->SPM_RS_PENCAPAIAN . '</td>';
                $track++;
            }
            echo '</tr>';
        }
        ?>
    </table>

    <br/>



    ////////////////// SURVEY RS
    <table>
        <thead>
            <tr>
                <th>No</th> 
                <th>Kode Registrasi</th>
                <th>Nama RS</th>  

                <th>Parkir Sikap petugas</th>
                <th>Parkir keamanan</th>
                <th>Parkir ketrampilan</th>
                <th>Fasilitas Parkir</th>
                <!--th>Parkir Rata-rata</th-->

                <th>Loket Pendaftaran Keramahan</th>
                <th>Loket Pendaftaran Kecepatan</th>
                <th>Loket Pendaftaran ketrampilan</th>
                <!--th>Loket Pendaftaran Rata-rata</th-->

                <th>Satpam Sikap petugas</th>
                <th>Satpam Kejelasan Informasi</th>
                <th>Satpam Kepedulian</th>
                <!--th>Satpam Rata-rata</th-->

                <th>Pelayanan Administrasi Pasien Sikap petugas</th>
                <th>Pelayanan Administrasi Pasien Kejelasan Informasi</th>
                <th>Pelayanan Administrasi Pasien Kecepatan</th>
                <th>Pelayanan Administrasi Pasien Prosedur Pelayanan</th>
                <th>Pelayanan Administrasi Pasien Persyaratan Pelayanan</th>
                <th>Pelayanan Administrasi Pasien Keadilan</th>
                <!--th>Pelayanan Administrasi Pasien Rata-rata</th--> 

                <th>Ruang/Poli Fasilitas</th>
                <th>Ruang/Poli Kebersihan/Kenyamanan</th>
                <th>Ruang/Poli Kejelasan Petugas</th>
                <th>Ruang/Poli Jadwal Pelayanan</th> 
                <!--th>Ruang/Poli Rata-rata</th-->

                <th>pelayanan laboratorium Sikap Petugas</th>
                <th>pelayanan laboratorium Kecepatan Pelayanan</th>
                <th>pelayanan laboratorium Ketrampilan Petugas</th>
                <th>pelayanan laboratorium Fasilitas</th> 
                <th>pelayanan laboratorium Kenyamanan</th> 
                <th>pelayanan laboratorium Keadilan Pelayanan</th> 
                <!--th>pelayanan laboratorium Rata-rata</th-->

                <th>Pelayanan Gizi Sikap petugas</th>
                <th>Pelayanan Gizi Citarasa</th>
                <th>Pelayanan Gizi Keterampilan petugas</th>
                <th>Pelayanan Gizi Fasilitas parkir</th>
                <th>Pelayanan Gizi Kebersihan</th>
                <!--th>Pelayanan Gizi Rata-rata</th-->

                <th>Pelayanan Gigi dan Mulut Sikap petugas</th>
                <th>Pelayanan Gigi dan Mulut Fasilitas</th>
                <th>Pelayanan Gigi dan Mulut Kecepatan</th>
                <th>Pelayanan Gigi dan Mulut Ketrampilan</th>
                <th>Pelayanan Gigi dan Mulut Kenyamanan</th>
                <th>Pelayanan Gigi dan Mulut Keadilan Pelayanan</th>
                <!--th>Pelayanan Gigi dan Mulut Rata-rata</th-->

                <th>Pelayanan Dokter Sikap</th>
                <th>Pelayanan Dokter Kejelasan Informasi</th>
                <th>Pelayanan Dokter Kecepatan</th>
                <th>Pelayanan Dokter Ketelatenan</th> 
                <th>Pelayanan Dokter Kedisiplinan</th>
                <th>Pelayanan Dokter Tanggung jawab</th>
                <th>Pelayanan Dokter Keadilan pelayanan</th>
                <!--th>Pelayanan Dokter Rata-rata</th-->

                <th>Pelayanan Perawat Sikap petugas</th>
                <th>Pelayanan Perawat Kedisiplinan</th>
                <th>Pelayanan Perawat Kecepatan</th>
                <th>Pelayanan Perawat Ketrampilan</th>
                <th>Pelayanan Perawat Tanggung jawab</th>
                <th>Pelayanan Perawat Kejelasan</th> 
                <!--th>Pelayanan Perawat Rata-rata</th-->

                <th>Pelayanan Farmasi Sikap petugas</th>
                <th>Pelayanan Farmasi Kejelasan</th>
                <th>Pelayanan Farmasi Kecepatan</th>
                <th>Pelayanan Farmasi Prosedur Pelayanan</th>
                <th>Pelayanan Farmasi Persyaratan Pelayanan</th>
                <th>Pelayanan Farmasi Keadilan Pelayanan</th> 
                <!--th>Pelayanan Farmasi Rata-rata</th-->

                <th>Pelayanan Radiologi Sikap petugas</th>
                <th>Pelayanan Radiologi Fasilitas</th>
                <th>Pelayanan Radiologi Kecepatan</th>
                <th>Pelayanan Radiologi Ketrampilan</th>
                <th>Pelayanan Radiologi Kenyamanan</th> 
                <th>Pelayanan Radiologi Keadilan Pelayanan</th> 
                <!--th>Pelayanan Radiologi Rata-rata</th-->

                <th>Pelayanan Fisioterapi Sikap petugas</th>
                <th>Pelayanan Fisioterapi Ketrampilan</th>
                <th>Pelayanan Fisioterapi Kecepatan</th> 
                <th>Pelayanan Fisioterapi Fasilitas</th>
                <th>Pelayanan Fisioterapi Kenyamanan</th> 
                <!--th>Pelayanan Fisioterapi Rata-rata</th-->

                <th>Pelayanan Darah Sikap petugas</th>
                <th>Pelayanan Darah Kejelasan</th>
                <th>Pelayanan Darah Kecepatan</th>
                <th>Pelayanan Darah Prosedur Pelayanan</th>
                <th>Pelayanan Darah Ketrampilan</th>
                <th>Pelayanan Darah Kenyamanan</th> 
                <!--th>Pelayanan Darah Rata-rata</th-->

                <th>Biaya Kewajaran</th>
                <th>Biaya Kepastian</th> 
                <!--th>Biaya Rata-rata</th-->

            </tr>
        </thead>
<?php
$i = 1;

$row = $data_survey->result();

$rs_count = $num_survey;
$num_kategori = $kat_survey;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {

    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';

    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->SURVEY_PELANGGAN_NILAI . '</td>';
        $track++;
    }
    echo '</tr>';
}
?>
    </table>

    <br/>
    ////////////////// KASUS TB RJ

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th colspan="3"> <1 </th> 
                    <th colspan="3">1-4 tahun   </th> 
                    <th colspan="3">5-14 tahun</th> 
                    <th colspan="3">15-24 tahun</th> 
                    <th colspan="3">25-44 tahun</th>  
                    <th colspan="3">45-64 tahun </th>  
                    <th colspan="3">65+ tahun</th>  
                    <th colspan="3">Total </th>   
                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $waw->result();

$rs_count = $num_kasus_tb_rj;
$num_kategori = $kat_kasus_tb_rj;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $jumN2 = $jumN1 = $jumN = 0;
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->KASUS_TB_RJ_N2 . '</td>';
        $jumN2 = $jumN2 + $row[$track]->KASUS_TB_RJ_N2;
        echo '<td>' . $row[$track]->KASUS_TB_RJ_N1 . '</td>';
        $jumN1 = $jumN1 + $row[$track]->KASUS_TB_RJ_N1;
        echo '<td>' . $row[$track]->KASUS_TB_RJ_N . '</td>';
        $jumN = $jumN + $row[$track]->KASUS_TB_RJ_N;
        $track++;
    }
    echo '<td>' . $jumN2 . '</td>';
    echo '<td>' . $jumN1 . '</td>';
    echo '<td>' . $jumN . '</td>';
    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// KASUS TB RJ Per Jenis

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th colspan="3">TB Paru BTA (+) dgn/tanpa biakan kuman TB   </th> 
                    <th colspan="3">TB Paru Lainnya   </th> 
                    <th colspan="3">TB Ekstra Paru </th> 
                    <th colspan="3">TB alat napas lainnya </th> 
                    <th colspan="3">Meningitis TB </th>  
                    <th colspan="3">TB Susunan saraf pusat lainnya </th>  
                    <th colspan="3">TB Tulang dan sendi </th>  
                    <th colspan="3">Limfadenitis TB </th>  
                    <th colspan="3">TB Miller </th>  
                    <th colspan="3">TB Lainnya </th>  
                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_tb_rj_jenis->result();

$rs_count = $num_tb_rj_jenis;
$num_kategori = $kat_tb_rj_jenis;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {

    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->KASUS_TB_RJ_JENIS_N2 . '</td>';
        echo '<td>' . $row[$track]->KASUS_TB_RJ_JENIS_N1 . '</td>';
        echo '<td>' . $row[$track]->KASUS_TB_RJ_JENIS_N . '</td>';
        $track++;
    }
    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// KASUS TB RI 

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th colspan="3"> <1 </th> 
                    <th colspan="3">1-4 tahun   </th> 
                    <th colspan="3">5-14 tahun</th> 
                    <th colspan="3">15-24 tahun</th> 
                    <th colspan="3">25-44 tahun</th>  
                    <th colspan="3">45-64 tahun </th>  
                    <th colspan="3">65+ tahun</th>  
                    <th colspan="3">Total </th>   
                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_tb_ri->result();

$rs_count = $num_tb_ri;
$num_kategori = $kat_tb_ri;


$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $jumN2 = $jumN1 = $jumN = 0;
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->KASUS_TB_RI_N2 . '</td>';
        $jumN2 = $jumN2 + $row[$track]->KASUS_TB_RI_N2;
        echo '<td>' . $row[$track]->KASUS_TB_RI_N1 . '</td>';
        $jumN1 = $jumN1 + $row[$track]->KASUS_TB_RI_N1;
        echo '<td>' . $row[$track]->KASUS_TB_RI_N . '</td>';
        $jumN = $jumN + $row[$track]->KASUS_TB_RI_N;
        $track++;
    }
    echo '<td>' . $jumN2 . '</td>';
    echo '<td>' . $jumN1 . '</td>';
    echo '<td>' . $jumN . '</td>';
    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// KASUS TB RI Per Jenis

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th colspan="3">TB Paru BTA (+) dgn/tanpa biakan kuman TB   </th> 
                    <th colspan="3">TB Paru Lainnya   </th> 
                    <th colspan="3">TB Ekstra Paru </th> 
                    <th colspan="3">TB alat napas lainnya </th> 
                    <th colspan="3">Meningitis TB </th>  
                    <th colspan="3">TB Susunan saraf pusat lainnya </th>  
                    <th colspan="3">TB Tulang dan sendi </th>  
                    <th colspan="3">Limfadenitis TB </th>  
                    <th colspan="3">TB Miller </th>  
                    <th colspan="3">TB Lainnya </th>  
                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_tb_ri_jenis->result();

$rs_count = $num_tb_ri_jenis;
$num_kategori = $kat_tb_ri_jenis;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {

    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->KASUS_TB_RI_JENIS_N2 . '</td>';
        echo '<td>' . $row[$track]->KASUS_TB_RI_JENIS_N1 . '</td>';
        echo '<td>' . $row[$track]->KASUS_TB_RI_JENIS_N . '</td>';
        $track++;
    }
    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// VCT CST

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th colspan="5"> <1 </th> 
                    <th colspan="5">1-4 tahun   </th> 
                    <th colspan="5">5-14 tahun</th> 
                    <th colspan="5">15-24 tahun</th> 
                    <th colspan="5">25-44 tahun</th>  
                    <th colspan="5">45-64 tahun </th>  
                    <th colspan="5">65+ tahun</th>  
                    <th colspan="5">Total </th>   
                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_vct_cst->result();

$rs_count = $num_vct_cst;
$num_kategori = $kat_vct_cst;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $jum1 = $jum2 = $jum3 = $jum4 = $jum5 = 0;
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->VCT_JUMLAHTOTAL . '</td>';
        $jum1 = $jum1 + $row[$track]->VCT_JUMLAHTOTAL;
        echo '<td>' . $row[$track]->VCT_NEGATIF . '</td>';
        $jum2 = $jum2 + $row[$track]->VCT_NEGATIF;
        echo '<td>' . $row[$track]->VCT_POSITIF . '</td>';
        $jum3 = $jum3 + $row[$track]->VCT_POSITIF;
        echo '<td>' . $row[$track]->CST_JUMLAHTOTAL . '</td>';
        $jum4 = $jum4 + $row[$track]->CST_JUMLAHTOTAL;
        echo '<td>' . $row[$track]->CST_ARV . '</td>';
        $jum5 = $jum5 + $row[$track]->CST_ARV;
        $track++;
    }
    echo '<td>' . $jum1 . '</td>';
    echo '<td>' . $jum2 . '</td>';
    echo '<td>' . $jum3 . '</td>';
    echo '<td>' . $jum4 . '</td>';
    echo '<td>' . $jum5 . '</td>';
    echo '</tr>';
}
?>
            </tbody>
        </table>

        <br/>
        ////////////////// KASUS HIV

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th colspan="3"> <1 </th> 
                    <th colspan="3">1-4 tahun   </th> 
                    <th colspan="3">5-14 tahun</th> 
                    <th colspan="3">15-24 tahun</th> 
                    <th colspan="3">25-44 tahun</th>  
                    <th colspan="3">45-64 tahun </th>  
                    <th colspan="3">65+ tahun</th>  
                    <th colspan="3">Total </th>   
                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_hiv->result();

$rs_count = $num_hiv;
$num_kategori = $kat_hiv;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $jumN2 = $jumN1 = $jumN = 0;
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->HIV_JUMLAH . '</td>';
        $jumN2 = $jumN2 + $row[$track]->HIV_JUMLAH;
        echo '<td>' . $row[$track]->HIV_JUMLAH1 . '</td>';
        $jumN1 = $jumN1 + $row[$track]->HIV_JUMLAH1;
        echo '<td>' . $row[$track]->HIV_JUMLAH2 . '</td>';
        $jumN = $jumN + $row[$track]->HIV_JUMLAH2;
        $track++;
    }
    echo '<td>' . $jumN2 . '</td>';
    echo '<td>' . $jumN1 . '</td>';
    echo '<td>' . $jumN . '</td>';
    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// KASUS DBD

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th colspan="4">Dewasa L (Kolom: Suspek, DBD, DBD+Syok, Total) </th> 
                    <th colspan="4">Dewasa P(Kolom: Suspek, DBD, DBD+Syok, Total)   </th> 
                    <th colspan="4">Anak L (Kolom: Suspek, DBD, DBD+Syok, Total)</th> 
                    <th colspan="4">Anak P (Kolom: Suspek, DBD, DBD+Syok, Total)</th> 
                    <th colspan="3">Total (Kolom: Suspek, DBD, DBD+Syok)</th> 				 
                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_dbd->result();

$rs_count = $num_dbd;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $jumN2 = $jumN1 = $jumN = 0;
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';

    $temp = $track;
    $total1 = 0;
    echo '<td>' . $row[$track]->DBD_DEWASA_L . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_DEWASA_L . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_DEWASA_L . '</td>';
    $total = $row[$track]->DBD_DEWASA_L + $row[$track + 1]->DBD_DEWASA_L + $row[$track + 2]->DBD_DEWASA_L;
    echo '<td>' . $total . '</td>';

    echo '<td>' . $row[$track]->DBD_DEWASA_P . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_DEWASA_P . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_DEWASA_P . '</td>';
    $total = $row[$track]->DBD_DEWASA_P + $row[$track + 1]->DBD_DEWASA_P + $row[$track + 2]->DBD_DEWASA_P;
    echo '<td>' . $total . '</td>';

    echo '<td>' . $row[$track]->DBD_ANAK_L . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_ANAK_L . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_ANAK_L . '</td>';
    $total = $row[$track]->DBD_ANAK_L + $row[$track + 1]->DBD_ANAK_L + $row[$track + 2]->DBD_ANAK_L;
    echo '<td>' . $total . '</td>';


    echo '<td>' . $row[$track]->DBD_ANAK_P . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_ANAK_P . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_ANAK_P . '</td>';
    echo '<td>' . $row[$track]->DBD_ANAK_P + $row[$track + 1]->DBD_ANAK_P + $row[$track + 2]->DBD_ANAK_P . '</td>';
    $total = $row[$track]->DBD_ANAK_P + $row[$track + 1]->DBD_ANAK_P + $row[$track + 2]->DBD_ANAK_P;
    echo '<td>' . $total . '</td>';

    //jumlah total per kategori
    $jumN2 = $row[$track]->DBD_DEWASA_L + $row[$track]->DBD_DEWASA_P + $row[$track]->DBD_ANAK_L + $row[$track]->DBD_ANAK_P;
    $jumN1 = $row[$track + 1]->DBD_DEWASA_L + $row[$track + 1]->DBD_DEWASA_P + $row[$track + 1]->DBD_ANAK_L + $row[$track + 1]->DBD_ANAK_P;
    $jumN = $row[$track + 2]->DBD_DEWASA_L + $row[$track + 2]->DBD_DEWASA_P + $row[$track + 2]->DBD_ANAK_L + $row[$track + 2]->DBD_ANAK_P;

    echo '<td>' . $jumN2 . '</td>';
    echo '<td>' . $jumN1 . '</td>';
    echo '<td>' . $jumN . '</td>';

    $track = $temp;

    echo '</tr>';
    $track+=3;
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// KASUS DBD BARU PULANG DAN MENINGGAL

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th colspan="4">DBD_II_MRS_DEWASA (Kolom: Suspek, DBD, DBD+Syok, Total) </th> 
                    <th colspan="4">DBD_II_MRS_ANAK (Kolom: Suspek, DBD, DBD+Syok, Total)   </th> 
                    <th colspan="4">DBD_II_DEWASA_MDB24 (Kolom: Suspek, DBD, DBD+Syok, Total)</th> 
                    <th colspan="4">DBD_II_DEWASA_MDA24 (Kolom: Suspek, DBD, DBD+Syok, Total)</th> 
                    <th colspan="4">DBD_II_DEWASA_SEMBUH (Kolom: Suspek, DBD, DBD+Syok, Total) </th> 
                    <th colspan="4">DBD_II_ANAK_MDB24 (Kolom: Suspek, DBD, DBD+Syok, Total)   </th> 
                    <th colspan="4">DBD_II_ANAK_MDA24 (Kolom: Suspek, DBD, DBD+Syok, Total)</th> 
                    <th colspan="4">DBD_II_ANAK_SEMBUH (Kolom: Suspek, DBD, DBD+Syok, Total)</th> 
                    <th colspan="3">DBD_II_TOTAL (Kolom: Suspek, DBD, DBD+Syok)</th> 		


                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_dbd2->result();

$rs_count = $num_dbd2;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $jumN2 = $jumN1 = $jumN = 0;
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';

    $temp = $track;
    $total1 = 0;
    echo '<td>' . $row[$track]->DBD_II_MRS_DEWASA . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_II_MRS_DEWASA . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_II_MRS_DEWASA . '</td>';
    $total = $row[$track]->DBD_II_MRS_DEWASA + $row[$track + 1]->DBD_II_MRS_DEWASA + $row[$track + 2]->DBD_II_MRS_DEWASA;
    echo '<td>' . $total . '</td>';

    echo '<td>' . $row[$track]->DBD_II_MRS_ANAK . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_II_MRS_ANAK . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_II_MRS_ANAK . '</td>';
    $total = $row[$track]->DBD_II_MRS_ANAK + $row[$track + 1]->DBD_II_MRS_ANAK + $row[$track + 2]->DBD_II_MRS_ANAK;
    echo '<td>' . $total . '</td>';

    echo '<td>' . $row[$track]->DBD_II_DEWASA_MDB24 . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_II_DEWASA_MDB24 . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_II_DEWASA_MDB24 . '</td>';
    $total = $row[$track]->DBD_II_DEWASA_MDB24 + $row[$track + 1]->DBD_II_DEWASA_MDB24 + $row[$track + 2]->DBD_II_DEWASA_MDB24;
    echo '<td>' . $total . '</td>';


    echo '<td>' . $row[$track]->DBD_II_DEWASA_MDA24 . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_II_DEWASA_MDA24 . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_II_DEWASA_MDA24 . '</td>';
    $total = $row[$track]->DBD_II_DEWASA_MDA24 + $row[$track + 1]->DBD_II_DEWASA_MDA24 + $row[$track + 2]->DBD_II_DEWASA_MDA24;
    echo '<td>' . $total . '</td>';

    echo '<td>' . $row[$track]->DBD_II_DEWASA_SEMBUH . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_II_DEWASA_SEMBUH . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_II_DEWASA_SEMBUH . '</td>';
    $total = $row[$track]->DBD_II_DEWASA_SEMBUH + $row[$track + 1]->DBD_II_DEWASA_SEMBUH + $row[$track + 2]->DBD_II_DEWASA_SEMBUH;
    echo '<td>' . $total . '</td>';

    echo '<td>' . $row[$track]->DBD_II_ANAK_MDB24 . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_II_ANAK_MDB24 . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_II_ANAK_MDB24 . '</td>';
    $total = $row[$track]->DBD_II_ANAK_MDB24 + $row[$track + 1]->DBD_II_ANAK_MDB24 + $row[$track + 2]->DBD_II_ANAK_MDB24;
    echo '<td>' . $total . '</td>';

    echo '<td>' . $row[$track]->DBD_II_ANAK_MDA24 . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_II_ANAK_MDA24 . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_II_ANAK_MDA24 . '</td>';
    $total = $row[$track]->DBD_II_ANAK_MDA24 + $row[$track + 1]->DBD_II_ANAK_MDA24 + $row[$track + 2]->DBD_II_ANAK_MDA24;
    echo '<td>' . $total . '</td>';


    echo '<td>' . $row[$track]->DBD_II_ANAK_SEBUH . '</td>';
    echo '<td>' . $row[$track + 1]->DBD_II_ANAK_SEBUH . '</td>';
    echo '<td>' . $row[$track + 2]->DBD_II_ANAK_SEBUH . '</td>';
    $total = $row[$track]->DBD_II_ANAK_SEBUH + $row[$track + 1]->DBD_II_ANAK_SEBUH + $row[$track + 2]->DBD_II_ANAK_SEBUH;
    echo '<td>' . $total . '</td>';

    //jumlah total per kategori
    $jumN2 = $row[$track]->DBD_II_TOTAL;
    $jumN1 = $row[$track + 1]->DBD_II_TOTAL;
    $jumN = $row[$track + 2]->DBD_II_TOTAL;

    echo '<td>' . $jumN2 . '</td>';
    echo '<td>' . $jumN1 . '</td>';
    echo '<td>' . $jumN . '</td>';

    $track = $temp;

    echo '</tr>';
    $track+=3;
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// JUMLAH KEMATIAN MATERNAL

    <body>
        <table>
            <thead>
                <tr>
                    <th>No</th> 
                    <th>Kode RS</th>  
                    <th>Nama RS</th>   

                    <th colspan="2"> Ibu Hamil (kolom 1: rujukan, kolom 2: Datang Sendiri)  </th> 
                    <th colspan="2"> Ibu Bersalin (kolom 1: rujukan, kolom 2: Datang Sendiri)   </th> 
                    <th colspan="2">Ibu Nifas (kolom 1: Persalinan di RS Lain, kolom 2: Persalinan di RS ) </th> 
                    <th colspan="1">Total Kematian</th>  
                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_kematian_maternal->result();

$rs_count = $num_kematian_maternal;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    echo '<td>' . $row[$track]->JKI_IBUHAMIL_RUJUKAN . '</td>';
    echo '<td>' . $row[$track]->JKI_IBUHAMIL_DTGSENDIRI . '</td>';
    echo '<td>' . $row[$track]->JKI_IBUBERSALIN_RUJUKAN . '</td>';
    echo '<td>' . $row[$track]->JKI_IBUBERHASIL_DTGSENDIRI . '</td>';
    echo '<td>' . $row[$track]->JKI_IBUNIFAS_RSLAIN . '</td>';
    echo '<td>' . $row[$track]->JKI_IBUNIFAS_RS . '</td>';
    echo '<td>' . $row[$track]->JKI_TOTAL . '</td>';
    echo '</tr>';
    $track++;
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// SEBAB KEMATIAN IBU

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th> Perdarahan </th> 
                    <th> Infeksi </th> 
                    <th> Sepsis </th> 
                    <th> Pre Eklamsia/Eklampsia </th> 
                    <th> Jantung </th> 
                    <th> TB Paru </th> 
                    <th> Asma </th> 
                    <th> Hipertensi </th> 
                    <th> Lainnya </th> 

                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_sebab_kematian_ibu->result();

$rs_count = $num_sebab_kematian_ibu;
$num_kategori = $kat_sebab_kematian_ibu;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->JKIF_FAKTOR . '</td>';
        $track++;
    }
    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// KEMATIAN IBU KARENA PERSALINAN

    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kode RS</th>
                    <th rowspan="2">Nama RS</th>   

                    <th colspan="4"> Total Kematian Ibu (tribulan I, II, III, IV) </th>
                    <th colspan="4"> Perdarahan = 1% (tribulan I, II, III, IV) </th> 
                    <th colspan="4"> Eklampsia =30% (tribulan I, II, III, IV)</th> 
                    <th colspan="4"> Sepsis = 0.2 % (tribulan I, II, III, IV)</th> 


                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_kematian_persalinan->result();

$rs_count = $num_kematian_persalinan;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';

    $total1 = 0;

    echo '<td>' . $row[$track]->KIP_TOTAL . '</td>';
    echo '<td>' . $row[$track + 1]->KIP_TOTAL . '</td>';
    echo '<td>' . $row[$track + 2]->KIP_TOTAL . '</td>';
    echo '<td>' . $row[$track + 3]->KIP_TOTAL . '</td>';

    echo '<td>' . $row[$track]->KIP_PENDARAHAN . '</td>';
    echo '<td>' . $row[$track + 1]->KIP_PENDARAHAN . '</td>';
    echo '<td>' . $row[$track + 2]->KIP_PENDARAHAN . '</td>';
    echo '<td>' . $row[$track + 3]->KIP_PENDARAHAN . '</td>';

    echo '<td>' . $row[$track]->KIP_EKLAMPSIA . '</td>';
    echo '<td>' . $row[$track + 1]->KIP_EKLAMPSIA . '</td>';
    echo '<td>' . $row[$track + 2]->KIP_EKLAMPSIA . '</td>';
    echo '<td>' . $row[$track + 3]->KIP_EKLAMPSIA . '</td>';

    echo '<td>' . $row[$track]->KIP_SEPSIS . '</td>';
    echo '<td>' . $row[$track + 1]->KIP_SEPSIS . '</td>';
    echo '<td>' . $row[$track + 2]->KIP_SEPSIS . '</td>';
    echo '<td>' . $row[$track + 3]->KIP_SEPSIS . '</td>';


    $track+=4;
    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// MDGS 4

    <body>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode RS</th>
                    <th>Nama RS</th>   

                    <th> Rumah sakit melaksanakan Audit Maternal Perinatal </th> 
                    <th> Rumah sakit menerapkan "Buku Saku Pelayanan Kesehatan Anak di RS" </th> 
                    <th> Rumah Sakit memenuhi kecukupan obat dan alat sesuai Buku Saku Pelayanan Kesehatan Anak di RS </th> 
                    <th> Rumah Sakit memiliki dokter spesialis anak minimal 1 orang </th> 
                    <th> Rumah Sakit melaksanakan sistim rujukan (protap/pedoman/SOP dan instrumen) sesuai dengan standar </th> 
                    <th> Jumlah perinatologi set yang dimiliki Rumah Sakit sebanyak</th> 

                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_mdgs4_1->result();
$row2 = $data_mdgs4_2->result();
$rs_count = $num_mdgs4_1;

$track = 0;
$track2 = 0;
for ($j = 0; $j < $rs_count; $j++) {
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < 5; $k++) {
        echo '<td>' . $row[$track]->MDGS41_KONDISI . '</td>';
        $track++;
    }
    echo '<td>' . $row2[$track2]->MDGS42_JUMLAH . '</td>';
    $track2++;

    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// MDGS 5

    <body>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode RS</th>
                    <th>Nama RS</th>   

                    <th> Pelaksanaan Pelayanan Obstetrik Neonatal Emergensi Komprehensif (PONEK) Rumah Sakit </th> 
                    <th> Kondisi sarana dan peralatan rumah sakit PONEK</th> 
                    <th> Jumlah Kunjungan pembinaan Tim PONEK  RS ke puskesmas PONED dalam 1 tahun sebanyak </th> 
                    <th> Jumlah Kunjungan pembinaan Tim PONEK  RS ke klinik/RS sekitarnya dalam 1 tahun sebanyak </th> 
                    <th> Jumlah Audit Maternal Perinatal (AMP) termasuk surveilans kematian ibu yang dilaksanakan sebanyak </th> 
                    <th> Rumah Sakit sudah memiliki SK Tim PONEK RS</th> 

                </tr>
            </thead>
            <tbody>
<?php
$i = 1;

$row = $data_mdgs5_1->result();
$row2 = $data_mdgs5_2->result();
$row3 = $data_mdgs5_3->result();

$rs_count = $num_mdgs5_1;

$track = 0;
$track2 = 0;
$track3 = 0;
for ($j = 0; $j < $rs_count; $j++) {
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';

    for ($k = 0; $k < 2; $k++) {
        echo '<td>' . $row[$track]->MDGS51_KONDISI . '</td>';
        $track++;
    }

    for ($k = 0; $k < 3; $k++) {
        echo '<td>' . $row2[$track2]->MDGS52_JUMLAH . '</td>';
        $track2++;
    }

    echo '<td>' . $row3[$track3]->MDGS53_KONDISI . '</td>';
    $track3++;

    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// MDGS 6

    <body>
        <table>
            <thead>
                <tr>
                    <th>No</th>
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

$track = 0;
$track2 = 0;

for ($j = 0; $j < $rs_count; $j++) {
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';

    for ($k = 0; $k < 22; $k++) {
        echo '<td>' . $row[$track]->MDGS61_KONDISI . '</td>';
        $track++;
    }

    for ($k = 0; $k < 6; $k++) {
        echo '<td>' . $row2[$track2]->MDGS62_JUMLAH . '</td>';
        $track2++;
    }

    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// MATERNAL ESENSIAL

    <body>
        <table>
            <thead>
                <tr>
                    <th>No</th>
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
$num_kategori = $kat_maternal_esensial;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->PM_JUMLAH . '</td>';
        $track++;
    }
    echo '</tr>';
}
?>
            </tbody>
        </table> 

        <br/>
        ////////////////// NEONATAL ESENSIAL

    <body>
        <table>
            <thead>
                <tr>
                    <th>No</th>
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
$num_kategori = $kat_neonatal_esensial;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';
    for ($k = 0; $k < $num_kategori; $k++) {
        echo '<td>' . $row[$track]->PN_JUMLAH . '</td>';
        $track++;
    }
    echo '</tr>';
}
?>
            </tbody>
        </table> 


    </body>
</html>