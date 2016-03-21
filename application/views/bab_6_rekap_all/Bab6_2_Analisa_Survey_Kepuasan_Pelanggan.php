<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 6.2 Analisa Survey Kepuasan Pelanggan</h4>
<thead>
    <tr>
        <th rowspan="2">No</th> 
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode Registrasi</th>
        <th rowspan="2">Nama RS</th>  

        <th colspan="5">Parkir</th> 

        <th colspan="4">Loket Pendaftaran</th> 

        <th colspan="4">Satpam</th> 

        <th colspan="7">Pelayanan Administrasi Pasien </th>

        <th colspan="5">Ruang/Poli </th> 

        <th colspan="7">Pelayanan Laboratorium  </th>

        <th colspan="6">Pelayanan Gizi  </th> 

        <th colspan="7">Pelayanan Gigi dan Mulut  </th>

        <th colspan="8">Pelayanan Dokter </th>

        <th colspan="7">Pelayanan Perawat</th> 

        <th colspan="7">Pelayanan Farmasi</th> 

        <th colspan="7">Pelayanan Radiologi </th>


        <th colspan="6">Pelayanan Fisioterapi</th>

        <th colspan="7">Pelayanan Darah</th>


        <th colspan="3" >Biaya</th>

        <th rowspan="2" >Analisa</th>

    </tr>
    <tr>
        <th>Sikap petugas</th>
        <th>keamanan</th>
        <th>ketrampilan</th>
        <th>Parkir</th>
        <th>Rata-rata</th>

        <th>Keramahan</th>
        <th>Kecepatan</th>
        <th>ketrampilan</th>
        <th>Rata-rata</th>

        <th>Sikap petugas</th>
        <th>Kejelasan Informasi</th>
        <th>Kepedulian</th>
        <th>Rata-rata</th>

        <th>Sikap petugas</th>
        <th>Kejelasan Informasi</th>
        <th>Kecepatan</th>
        <th>Prosedur Pelayanan</th>
        <th>Persyaratan Pelayanan</th>
        <th>Keadilan</th>
        <th>Rata-rata</th> 

        <th>Fasilitas</th>
        <th>Kebersihan/Kenyamanan</th>
        <th>Kejelasan Petugas</th>
        <th>Jadwal Pelayanan</th> 
        <th>Rata-rata</th>
        <th>Sikap Petugas</th>
        <th>Kecepatan Pelayanan</th>
        <th>Ketrampilan Petugas</th>
        <th>Fasilitas</th> 
        <th>Kenyamanan</th> 
        <th>Keadilan Pelayanan</th> 
        <th>Rata-rata</th>
        <th>Sikap petugas</th>
        <th>Citarasa</th>
        <th>Keterampilan petugas</th>
        <th>Fasilitas parkir</th>
        <th>Kebersihan</th>
        <th>Rata-rata</th>
        <th>Sikap petugas</th>
        <th>Fasilitas</th>
        <th>Kecepatan</th>
        <th>Ketrampilan</th>
        <th>Kenyamanan</th>
        <th>Keadilan Pelayanan</th>
        <th>Rata-rata</th>
        <th>Sikap</th>
        <th>Kejelasan Informasi</th>
        <th>Kecepatan</th>
        <th>Ketelatenan</th> 
        <th>Kedisiplinan</th>
        <th>Tanggung jawab</th>
        <th>Keadilan pelayanan</th>
        <th>Rata-rata</th>
        <th>Sikap petugas</th>
        <th>Kedisiplinan</th>
        <th>Kecepatan</th>
        <th>Ketrampilan</th>
        <th>Tanggung jawab</th>
        <th>Kejelasan</th> 
        <th>Rata-rata</th>

        <th>Sikap petugas</th>
        <th>Kejelasan</th>
        <th>Kecepatan</th>
        <th>Prosedur Pelayanan</th>
        <th>Persyaratan Pelayanan</th>
        <th>Keadilan Pelayanan</th> 
        <th>Rata-rata</th>

        <th>Sikap petugas</th>
        <th>Fasilitas</th>
        <th>Kecepatan</th>
        <th>Ketrampilan</th>
        <th>Kenyamanan</th> 
        <th>Keadilan Pelayanan</th> 
        <th>Rata-rata</th>

        <th>Sikap petugas</th>
        <th>Ketrampilan</th>
        <th>Kecepatan</th> 
        <th>Fasilitas</th>
        <th>Kenyamanan</th> 
        <th>Rata-rata</th>

        <th>Sikap petugas</th>
        <th>Kejelasan</th>
        <th>Kecepatan</th>
        <th>Prosedur Pelayanan</th>
        <th>Ketrampilan</th>
        <th>Kenyamanan</th> 
        <th>Rata-rata</th>

        <th>Kewajaran</th>
        <th>Kepastian</th>  
        <th>Rata-rata</th>
    </tr>
</thead>
<?php
$i = 1;

$row = $data_survey->result();
$rs_count = $num_survey;
$analisaRest = $analisa->result();
$trackAnalisa = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {

    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row[$track]->daftar_list_region . '</td>';
    echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row[$track]->RS_NAMA . '</td>';

    for ($k = 0; $k < 90; $k++) {
        if ($k == 4) {
            echo '<td>';
            echo ($row[$track - 4]->SURVEY_PELANGGAN_NILAI + $row[$track - 1]->SURVEY_PELANGGAN_NILAI + $row[$track - 2]->SURVEY_PELANGGAN_NILAI + $row[$track - 3]->SURVEY_PELANGGAN_NILAI) / 4;
            echo '</td>';
            $track--;
        } else if ($k == 8) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 12) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 19) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 24) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 31) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 37) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 44) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 52) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 59) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 66) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 73) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 79) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 86) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else if ($k == 89) {
            echo '<td>';
            echo ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;
            echo '</td>';
            $track--;
        } else
            echo '<td>' . $row[$track]->SURVEY_PELANGGAN_NILAI . '</td>';
        $track++;
    }

    //analisa
		$analisaData = null;
        if (count($analisaRest)!= null){ 
			for( $trackAnalisa = 0; $trackAnalisa  < count($analisaRest) ; $trackAnalisa++){
				if($analisaRest[$trackAnalisa]->RS_NOREG == $row[$track-1]->RS_NOREG  )
				{ 
						$analisaData = $analisaRest[$trackAnalisa]->ANALISA_URAIAN;
						break; 
				}  
			} 
		}
		
		if($analisaData != null)
			echo '<td>'.$analisaData.'</td>';
		else
			echo '<td>-</td>';
	//////////////////
	
    echo '</tr>';
}
?>
</tbody>