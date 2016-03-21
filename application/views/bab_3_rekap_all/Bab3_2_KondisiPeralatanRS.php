<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 3.2 Kondisi Peralatan Rumah Sakit</h4>
<thead>
    <!--tr>
       

        <th colspan="24">1.Pelayanan Obstetri Ginecology</th>
        <th colspan="12">2.Pelayanan Anak</th>
        <th colspan="12">3.Pelayanan Penyakit Dalam</th>
        <th colspan="12">4.Pelayanan Jantung dan Pembuluh Darah</th>
        <th colspan="16">5.Pelayanan Bedah</th>
        <th colspan="16">6.Pelayanan Mata</th>
        <th colspan="16">7.Pelayanan THT</th>
        <th colspan="12">8.Pelayanan Kulit dan Kelamin</th>
        <th colspan="8">9.Pelayanan Gigi dan Mulut</th>
        <th colspan="12">10.Pelayanan Syaraf</th>
        <th colspan="12">11.Pelayanan Jiwa</th>
        <th colspan="4" rowspan="1">12.Pelayanan Gawat Darurat</th>
        <th colspan="4" rowspan="1">13.Kamar Operasi (Bedah Sentra)</th>
        <th colspan="4" rowspan="1">14.Perawatan Intensif</th>
        <th colspan="4" rowspan="1">15.Pelayanan Keperawatan</th>
        <th colspan="4" rowspan="1">16.Pelayanan Anestesi dan Reanimasi</th>
        <th colspan="4" rowspan="1">17.Pelayanan Laboratorium</th>
        <th colspan="4" rowspan="1">18.Pelayanan Radiologi</th>
        <th colspan="4" rowspan="1">19.Pelayanan Rehabilitasi Medik</th>
        <th colspan="4" rowspan="1">20.Pelayanan Keterapian Fisik</th>
        <th colspan="4" rowspan="1">21.Pelayanan Farmasi</th>
        <th colspan="4" rowspan="1">22.Pelayanan Gizi</th>
        <th colspan="4" rowspan="1">23.Pelayanan Sterilisasi Sentral</th>
        <th colspan="4" rowspan="1">24.Pelayanan Rekam medis</th>
        <th colspan="4" rowspan="1">25.Pelayanan Loundry</th>
        <th colspan="4" rowspan="1">26.Pengadaan Air</th>
        <th colspan="4" rowspan="1">27.Listrik</th>
        <th colspan="4" rowspan="1">28.Pemeliharaan Sarana</th>
        <th colspan="4" rowspan="1">29.Pemulasaran Jenazah</th>
        <th colspan="4" rowspan="1">30.Telekomunikasi</th>
        <th colspan="4" rowspan="1">31.Pengelolaan Limbah</th>
        <th colspan="4" rowspan="1">32.Transportasi</th>
		 
    </tr-->
    <tr>
		
		<th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th>  
		
        <!--1-->
        <th colspan="4">Pelayanan Obstetri Gynecology</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Kamar Bersalin</th>
        <th colspan="4">Gawat Darurat</th>
        <th colspan="4">Rawat Inap</th>
        <th colspan="4">Ruang Perinatologi</th>
        <!--2-->
        <th colspan="4">Pelayanan Anak</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Rawat Inap</th>
        <!--3-->
        <th colspan="4">Pelayanan Penyakit Dalam</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Rawat Inap</th>
        <!--4-->
        <th colspan="4">Pelayanan Jantung dan Pembuluh Darah</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Rawat Inap</th>
        <!--5-->
        <th colspan="4">Pelayanan Bedah</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Rawat Inap</th>
        <th colspan="4">Ruang Operasi/Bedah</th>
        <!--6-->
        <th colspan="4">Pelayanan Mata</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Rawat Inap</th>
        <th colspan="4">Ruang Operasi Mata</th>
        <!--7-->
        <th colspan="4">Pelayanan THT</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Rawat Inap</th>
        <th colspan="4">Ruang Operasi THT</th>
        <!--8-->
        <th colspan="4">Pelayanan Kulit dan Kelamin</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Rawat Inap</th>
        <!--9-->
        <th colspan="4">Pelayanan Gigi & Mulut</th>
        <th colspan="4">Rawat Jalan</th>
        <!--10-->
        <th colspan="4">Pelayanan Saraf</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Rawat Inap</th>
        <!--11-->
        <th colspan="4">Pelayanan Jiwa</th>
        <th colspan="4">Rawat Jalan</th>
        <th colspan="4">Rawat Inap</th>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 59; $k++) { ?>
            <th>Sesuai Standar</th>
			<th>Tidak Sesuai Standar</th>
			<th>Tidak Ada</th>
            <th>Keterangan</th>    
        <?php } ?>

    </tr>
     
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data3_2->result();
    $rs_count = $num_3_2;

    $totSes = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $totTdkSes = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $totTdkAda = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    $totX1 = $totX2 = $totX3 = 0;

    $totAllX1 = $totAllX2 = $totAllX3 = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totX1 = $totX2 = $totX3 = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 59; $k++) {
            if ($row[$track]->PERALATAN_STANDAR == 1) {
                echo '<td>√</td>'; 
                $totSes[$k] ++;
                $totX1++;
            } 
			else
			echo '<td></td>';
			
			if ($row[$track]->PERALATAN_TAK_STANDAR == 1) {
                echo '<td>√</td>'; 
                $totTdkSes[$k] ++;
                $totX2++;
            }
			else
			echo '<td></td>';
			
			if ($row[$track]->PERALATAN_TAK_ADA == 1) { 
                echo '<td>√</td>';
                $totTdkAda[$k] ++;
                $totX3++;
            }
			else
			echo '<td></td>';
			 
			echo '<td>' . $row[$track]->PERALATAN_KETERANGAN . '</td>';
            $track++;
        }
        $totAllX3 += $totX3;
        $totAllX2 += $totX2;
        $totAllX1 += $totX1;

        //echo '<td>' . $totX1 . '</td>';
        //echo '<td>' . $totX2 . '</td>';
        //echo '<td>' . $totX3 . '</td>';
        echo '</tr>';
    }
   // if ($row != null) {
     //   echo '<tr>';
       // echo '<td>TOTAL</td>';
        //echo '<td> </td> <td> </td> <td> </td>';
        //for ($l = 0; $l < 59; $l++) {
          //  echo '<td>' . $totSes[$l] . '</td>';
           // echo '<td>' . $totTdkSes[$l] . '</td>';
           // echo '<td>' . $totTdkAda[$l] . '</td>';
           // echo '<td> - </td>';
        //}
        //echo '<td>' . $totAllX1 . '</td>';
        //echo '<td>' . $totAllX2 . '</td>';
        //echo '<td>' . $totAllX3 . '</td>';
       // echo '</tr>';
    //}
    ?>
</tbody>