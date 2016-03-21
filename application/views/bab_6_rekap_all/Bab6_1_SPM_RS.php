<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6.1 Analisa Evaluasi Standar Pelayanan Minimal RS</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Wilayah</th>
        <th rowspan="2"> Jenis RS</th>
        <th rowspan="2">Nama RS</th> 
        <th rowspan="2">Kode Registrasi</th>
        <th rowspan="2">Kelas RS</th>

        <th colspan="2">IGD</th> 
        <th colspan="2">IRJA</th> 
        <th colspan="2">IRNA</th> 
        <th colspan="2">Bedah </th>
        <th colspan="2">Persalinan & Perinatologi  </th>
        <th colspan="2">Pelayanan Intensif   </th>
        <th colspan="2">Radiologi  </th>
        <th colspan="2">Laboratorium </th>
        <th colspan="2">Rehab Medik </th>
        <th colspan="2">Farmasi </th>
        <th colspan="2">Gizi  </th>
        <th colspan="2">Transfusi Darah </th>
        <th colspan="2">Gakin </th>
        <th colspan="2">Rekam Medik  </th>
        <th colspan="2">Limbah  </th>
        <th colspan="2">Admin  </th>
        <th colspan="2">Ambulan  </th>
        <th colspan="2">Pemulasaran Jenazah  </th>
        <th colspan="2">Sarana </th>
        <th colspan="2">Laundry  </th>
        <th colspan="2">Pengendalian Infeksi </th>
        <th rowspan="2"> Analisa</th>
    </tr>
    <tr>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
        <th>Indikator yang memenuhi SPM</th>
        <th>% pencapaian </th>
    </tr>
</thead>
<?php
$i = 1;

$row_spm = $data_spm_rs->result(); 
$rs_count = $num_spm_rs;
$analisaRest = $analisa->result();
$trackAnalisa = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
 
    echo '<tr>';
    echo '<td>' . $i++ . '</td>';
    echo '<td>' . $row_spm[$track]->daftar_list_region . '</td>';
    echo '<td>' . $row_spm[$track]->jenis_rs_nama . '</td>';
    echo '<td>' . $row_spm[$track]->RS_NAMA . '</td>';
    echo '<td>' . $row_spm[$track]->KODE_REGISTRASI . '</td>';
    echo '<td>' . $row_spm[$track]->kelas_rs . '</td>';

    for ($k = 0; $k < 21; $k++) {

        echo '<td>' . $row_spm[$track]->SPM_RS_INDIKATOR . '</td>';
        echo '<td>' . $row_spm[$track]->SPM_RS_PENCAPAIAN . '</td>';
        $track++;
    }
    
	//analisa
		$analisaData = null;
        if (count($analisaRest)!= null){ 
			for( $trackAnalisa = 0; $trackAnalisa  < count($analisaRest) ; $trackAnalisa++){
				if($analisaRest[$trackAnalisa]->RS_NOREG == $row_spm[$track-1]->RS_NOREG  )
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