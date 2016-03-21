<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 6 MDGs 5</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region RS</th>
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
    $rs_count2 = $num_mdgs5_2;
    $rs_count3 = $num_mdgs5_3;

    $track = 0;
    $track2 = 0;
    $track3 = 0;

    if ($rs_count == $rs_count2 && $rs_count2 == $rs_count3 && $rs_count == $rs_count3) {
        for ($j = 0; $j < $rs_count; $j++) {
            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . $row3[$track3]->daftar_list_region . '</td>';
            echo '<td>' . $row3[$track3]->KODE_REGISTRASI . '</td>';
            echo '<td>' . $row3[$track3]->RS_NAMA . '</td>';

 
    for ($k = 0; $k < 2; $k++) { 
        if($row[$track]->MDGS51_KONDISI == 2)
			echo '<td> Sesuai Standar </td>';
		else if($row[$track]->MDGS51_KONDISI == 1)
			echo '<td> Tidak Sesuai Standar  </td>';
		else  
			echo '<td> Tidak Ada  </td>';
		$track++;
    }
  

            for ($k = 0; $k < 3; $k++) {
                echo '<td>' . $row2[$track2]->MDGS52_JUMLAH . '</td>';
                $track2++;
            }

            if ($row3[$track3]->MDGS53_KONDISI == 1)
                echo '<td>  &#10004 </td>';
            else
                echo '<td> &#10008 </td>';
            $track3++;

            echo '</tr>';
        }
    }
    ?>
</tbody>