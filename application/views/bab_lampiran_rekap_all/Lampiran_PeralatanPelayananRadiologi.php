<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Lampiran Peralatan Pelayanan Radiologi</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th>  

        <th colspan="95">Keterangan</th>
        
        <th rowspan="3">Total</th>
    </tr>
    <tr>
        <th colspan="19">1.Rumah Sakit Kelas A</th>
        <th colspan="16">2.Rumah Sakit Kelas B</th>
        <th colspan="10">3.Rumah Sakit Kelas C</th>
        <th colspan="8">4.Rumah Sakit Kelas D</th>
        <th colspan="42">5.Peralatan radiologi Lainnya</th>
    </tr>
    <tr>
        <th>1.DSA</th>
        <th>2.MRI</th>
        <th>3.CT MultiSlice</th>
        <th>4.Fluroskopi</th>
        <th>5.USG</th>
        <th>6.Analog X-Ray Fixed Unitdan/atau Digital</th>
        <th>7.Mobile X-Ray</th>
        <th>8.Mammography</th>
        <th>9.Peralatan Digital Panoramic/Chepalometri</th>
        <th>10.Perlataan Dental X-Ray</th>
        <th>11.C-ARM</th>
        <th>12.Computed Radiography</th>
        <th>13.Picture Archiving Communication System</th>
        <th>14.Peralatan Protektif Radiasi</th>
        <th>15.Perlengkapan Proteksi Radiasi</th>
        <th>16.Peralatan Quality Assurance dan Quality Control (Kendali Mutu) Radiofotografi</th>
        <th>17.Emergency Kit</th>
        <th>18.Viewing Box</th>
        <th>19.Generator Set</th>

        <th>1.CT Multislice</th>
        <th>2.Fluoroskopi</th>
        <th>3.USG</th>
        <th>4.Analog X-Ray Fixed Unit dan/atau Digital</th>
        <th>5.Mobile X-Ray</th>
        <th>6.Mammography</th>
        <th>7.Peralatan C-Arm</th>
        <th>8.Perlaatan Digital Panoramic/Cephanometri</th>
        <th>9.Peralatan Dental X-Ray</th>
        <th>10.Peralatan Proteksi Radiasi</th>
        <th>11.Perlengkapan Proteksi</th>
        <th>12.Peralatan Quality Assurance dan Quality Control</th>
        <th>13.Emergency KIT</th>
        <th>14.Peralatan Kamar Gelap</th>
        <th>15.PEralatan Alat Pelindung</th>
        <th>16.Peralatan Viewing Box</th>

        <th>1.Peralatan USG</th>
        <th>2.Analog X-Ray Fixed Unit dan/atau Digital</th>
        <th>3.Mobile X-Ray</th>
        <th>4.Peralatan Dental X-Ray</th>
        <th>5.Peralatan proteksi Radiasi</th>
        <th>6.Perlengkapan Proteksi Radiasi</th>
        <th>7.Perlataan Quality Assurance dan Quality Control</th>
        <th>8.Emergency Kit</th>
        <th>9.Peralatan Kamar Gelap</th>
        <th>10.Peralatan Viewing Box</th>

        <th>1.Peralatan USG</th>
        <th>2.Analog X-Ray Fixed Unit dan/atau Digital</th>
        <th>3.Perlatan Proteksi Radiasi</th>
        <th>4.Perlengkapan Proteksi</th>
        <th>5.Perlataan Quality Assurance dan Quality Control</th>
        <th>6.Emergency Kit</th>
        <th>7.Perlatan Kamar Gelap</th>
        <th>8.Perlatan Viewing Box</th>

        <th>1.MGIT</th>
        <th>2.Phoenix</th>
        <th>3.BacTec</th>
        <th>4.Dimention RL</th>
        <th>5.Advia Centaur</th>
        <th>6.Rubi</th>
        <th>7.CS 2100</th>
        <th>8.CA 1500</th>
        <th>9.Sysmex 2100</th>
        <th>10.HPLC</th>
        <th>11.Electropheresis Sebia</th>
        <th>12.Mini Capilarie Electropheresis Sebia</th>
        <th>13.USG DC-7</th>
        <th>14.CT Scan Somatom Emotion 16</th>
        <th>15.Digital Radiografi</th>
        <th>16.Digital Radiografi&Flouroskopi</th>
        <th>17.Computer Radiografi</th>
        <th>18.Linac Varian 2100C</th>
        <th>19.Linac Varian 600C/D</th>
        <th>20.Cobalt-60 Shinva FCC 8000F</th>
        <th>21.HDR GammaMediXPlus 3D</th>
        <th>22.Simulator Simulix-Hp</th>
        <th>23.Simulator Simscan Mecaserto</th>
        <th>24.RTPS Eclipse 3D IMX</th>
        <th>25.RTPS ISIS 3D</th>
        <th>26.RTPD ISIS 2D</th>
        <th>27.Moulding Manual Negatoscope</th>
        <th>28.Moulding Hek Autimo 2D</th>
        <th>29.Mesin Pemanas Masker</th>
        <th>30.Absolute Dosimeter In-Vivo</th>
        <th>31.Relative Dosimeter In-Vivo</th>
        <th>32.Digital Personal Dosimetri</th>
        <th>33.Survey Meter Baby Line 81</th>
        <th>34.Survey Meter RGD STEP</th>
        <th>35.RFA (Radiation Field Analyzer)</th>
        <th>36.Waterphantom</th>
        <th>37.Wheelhofer</th>
        <th>38.Tissue Processor</th>
        <th>39.Auto Stainner</th>
        <th>40.Cryo Cut</th>
        <th>41.Mescroscope 5 Headed</th>
        <th>42.Tissue embadding System</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_lamp_f->result();
    $rs_count = $num_lamp_f;

    $tot = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $totAll = 0;

    $track = 0;
    echo $rs_count;
    for ($j = 0; $j < $rs_count; $j++) {
        $totX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 0; $k < 95; $k++) {
            echo '<td>' . $row[$track]->PERALATAN_RADIOLOGI_RS_JUMLAH . '</td>';            
            $totX += $row[$track]->PERALATAN_RADIOLOGI_RS_JUMLAH;
            $tot[$k] += $row[$track]->PERALATAN_RADIOLOGI_RS_JUMLAH;
            $track++;
        }
		
        $totAll += $totX;
        echo '<td>' . $totX . '</td>';
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td>TOTAL</td>';
        echo '<td> </td> <td> </td> <td> </td>';
        for ($l = 0; $l < 95; $l++) {
            echo '<td>' . $tot[$l] . '</td>';
        }
        echo '<td>' . $totAll . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>