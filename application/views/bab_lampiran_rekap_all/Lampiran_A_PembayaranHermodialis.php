<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Lampiran Pembayaran Hemodialis</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 

        <th colspan="18">n-2</th>
        <th colspan="18">n-1</th>
        <th colspan="18">n</th>

        <th rowspan="3">Analisa</th>
        <th rowspan="3">Total</th>
    </tr>
    <tr>
        <th colspan="2">Umum</th> 
        <th colspan="2">ASKES</th>    
        <th colspan="2">Asuransi lainnya</th> 
        <th colspan="2">Jamkesmas</th>    
        <th colspan="2">Jamkesmasda</th> 
        <th colspan="2">Jamsostek</th>   
        <th colspan="2">SPM</th> 
        <th colspan="2">Lain-lain</th>   
        <th colspan="2">Total</th> 

        <th colspan="2">Umum</th> 
        <th colspan="2">ASKES</th>    
        <th colspan="2">Asuransi lainnya</th> 
        <th colspan="2">Jamkesmas</th>    
        <th colspan="2">Jamkesmasda</th> 
        <th colspan="2">Jamsostek</th>   
        <th colspan="2">SPM</th> 
        <th colspan="2">Lain-lain</th>   
        <th colspan="2">Total</th> 

        <th colspan="2">Umum</th> 
        <th colspan="2">ASKES</th>    
        <th colspan="2">Asuransi lainnya</th> 
        <th colspan="2">Jamkesmas</th>    
        <th colspan="2">Jamkesmasda</th> 
        <th colspan="2">Jamsostek</th>   
        <th colspan="2">SPM</th> 
        <th colspan="2">Lain-lain</th>   
        <th colspan="2">Total</th> 
    </tr>
    <tr>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>

        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>

        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
        <th>Rujukan</th>
        <th>Non Rujukan</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_lamp_a->result();
    $rs_count = $num_lamp_a;
    $analisaRest = $analisa;
    
    $tot1 = array(0, 0, 0);
    $tot2 = array(0, 0, 0);
    $tot3 = array(0, 0, 0);
    $tot4 = array(0, 0, 0);
    $tot5 = array(0, 0, 0);
    $tot6 = array(0, 0, 0);
    $tot7 = array(0, 0, 0);
    $tot8 = array(0, 0, 0);
    $tot9 = array(0, 0, 0);
    $tot10 = array(0, 0, 0);
    $tot11 = array(0, 0, 0);
    $tot12 = array(0, 0, 0);
    $tot13 = array(0, 0, 0);
    $tot14 = array(0, 0, 0);
    $tot15 = array(0, 0, 0);
    $tot16 = array(0, 0, 0);
    $tot17 = array(0, 0, 0);
    $tot18 = array(0, 0, 0);
    
    $totalAll = 0;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 3; $k++) {
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_UMUM_RUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_UMUM_NONRUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_ASKES_RUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_ASKES_NONRUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_LAIN_RUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_LAIN_NONRUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_JAMKESMAS_RUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_JAMKESMAS_NONRUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_JAMKESMASDA_RUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_JAMKESMASDA_NONRUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_JAMSOSTEK_RUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_JAMSOSTEK_NONRUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_SPM_RUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_SPM_NONRUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_LAINLAIN_RUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_LAINLAIN_NONRUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_TOTAL_RUJUK . '</td>';
            echo '<td>' . $row[$track]->HEMODIALIS_BYR_TOTAL_NONRUJUK . '</td>';
            
            $totalX = $row[$track]->HEMODIALIS_BYR_UMUM_RUJUK + $row[$track]->HEMODIALIS_BYR_UMUM_NONRUJUK
                    + $row[$track]->HEMODIALIS_BYR_ASKES_RUJUK + $row[$track]->HEMODIALIS_BYR_ASKES_NONRUJUK
                    + $row[$track]->HEMODIALIS_BYR_LAIN_RUJUK + $row[$track]->HEMODIALIS_BYR_LAIN_NONRUJUK
                    + $row[$track]->HEMODIALIS_BYR_JAMKESMAS_RUJUK + $row[$track]->HEMODIALIS_BYR_JAMKESMAS_NONRUJUK
                    + $row[$track]->HEMODIALIS_BYR_JAMKESMASDA_RUJUK + $row[$track]->HEMODIALIS_BYR_JAMKESMASDA_NONRUJUK
                    + $row[$track]->HEMODIALIS_BYR_JAMSOSTEK_RUJUK + $row[$track]->HEMODIALIS_BYR_JAMSOSTEK_NONRUJUK
                    + $row[$track]->HEMODIALIS_BYR_SPM_RUJUK + $row[$track]->HEMODIALIS_BYR_SPM_NONRUJUK
                    + $row[$track]->HEMODIALIS_BYR_LAINLAIN_RUJUK + $row[$track]->HEMODIALIS_BYR_LAINLAIN_NONRUJUK
                    + $row[$track]->HEMODIALIS_BYR_TOTAL_RUJUK + $row[$track]->HEMODIALIS_BYR_TOTAL_NONRUJUK;

            $totalAll += $totalX;
            
            $tot1[$k] += $row[$track]->HEMODIALIS_BYR_UMUM_RUJUK;
            $tot2[$k] += $row[$track]->HEMODIALIS_BYR_UMUM_NONRUJUK;
            $tot3[$k] += $row[$track]->HEMODIALIS_BYR_ASKES_RUJUK;
            $tot4[$k] += $row[$track]->HEMODIALIS_BYR_ASKES_NONRUJUK;
            $tot5[$k] += $row[$track]->HEMODIALIS_BYR_LAIN_RUJUK;
            $tot6[$k] += $row[$track]->HEMODIALIS_BYR_LAIN_NONRUJUK;
            $tot7[$k] += $row[$track]->HEMODIALIS_BYR_JAMKESMAS_RUJUK;
            $tot8[$k] += $row[$track]->HEMODIALIS_BYR_JAMKESMAS_NONRUJUK;
            $tot9[$k] += $row[$track]->HEMODIALIS_BYR_JAMKESMASDA_RUJUK;
            $tot10[$k] += $row[$track]->HEMODIALIS_BYR_JAMKESMASDA_NONRUJUK;
            $tot11[$k] += $row[$track]->HEMODIALIS_BYR_JAMSOSTEK_RUJUK;
            $tot12[$k] += $row[$track]->HEMODIALIS_BYR_JAMSOSTEK_NONRUJUK;
            $tot13[$k] += $row[$track]->HEMODIALIS_BYR_SPM_RUJUK;
            $tot14[$k] += $row[$track]->HEMODIALIS_BYR_SPM_NONRUJUK;
            $tot15[$k] += $row[$track]->HEMODIALIS_BYR_LAINLAIN_RUJUK;
            $tot16[$k] += $row[$track]->HEMODIALIS_BYR_LAINLAIN_NONRUJUK;
            $tot17[$k] += $row[$track]->HEMODIALIS_BYR_TOTAL_RUJUK;
            $tot18[$k] += $row[$track]->HEMODIALIS_BYR_TOTAL_NONRUJUK;
            
            $track++;
        }
        echo '<td>Analisa</td>';
        echo '<td>'.$totalX.'</td>';
        echo '</tr>';
    }
    
    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($l = 0; $l < 3; $l++) {
            echo '<td>' . $tot1[$l] . '</td>';
            echo '<td>' . $tot2[$l] . '</td>';
            echo '<td>' . $tot3[$l] . '</td>';
            echo '<td>' . $tot4[$l] . '</td>';
            echo '<td>' . $tot5[$l] . '</td>';
            echo '<td>' . $tot6[$l] . '</td>';
            echo '<td>' . $tot7[$l] . '</td>';
            echo '<td>' . $tot8[$l] . '</td>';
            echo '<td>' . $tot9[$l] . '</td>';
            echo '<td>' . $tot10[$l] . '</td>';
            echo '<td>' . $tot11[$l] . '</td>';
            echo '<td>' . $tot12[$l] . '</td>';
            echo '<td>' . $tot13[$l] . '</td>';
            echo '<td>' . $tot14[$l] . '</td>';
            echo '<td>' . $tot15[$l] . '</td>';
            echo '<td>' . $tot16[$l] . '</td>';
            echo '<td>' . $tot17[$l] . '</td>';
            echo '<td>' . $tot18[$l] . '</td>';            
        }
        echo '<td> - </td>';
        echo '<td>' . $totalAll . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>