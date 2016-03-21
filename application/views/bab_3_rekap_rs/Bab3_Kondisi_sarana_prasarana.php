<thead>
    <tr>
        <th style="padding-top: 2.5%;" rowspan="3">Tahun</th>
        <th style="padding-top: 2.5%;" rowspan="3">NO Registrasi</th>
        <th style="padding-top: 2.5%;" rowspan="3">Nama</th>
        <th style="padding-top: 2.5%;" rowspan="3">Jenis Sarana dan Prasarana</th>
        <th colspan="3" style="padding-left: 15%;">Kondisi*</th>
        <th style="padding-top: 2.5%;" rowspan="3">Keterangan</th>
    </tr>
    <tr>
        <th colspan="2" style="padding-left: 13%;">Ada</th>
        <th rowspan="2" style="padding-top: 2%;">Tidak Ada</th>
    </tr>
    <tr>
        <th>Sesuai Standart</th>
        <th>Tidak Sesuai Standart</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($kondisi_sarpras->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->LIST_SARPRAS_NAMA . '</td>';
        if($row->SARPRAS_KONDISI == 0){
             echo '<td>√</td>';
             echo '<td> </td>';
             echo '<td> </td>';
        } else if($row->SARPRAS_KONDISI == 1){
            echo '<td> </td>';
            echo '<td>√</td>';
            echo '<td> </td>';
        } else if($row->SARPRAS_KONDISI == 2){
            echo '<td> </td>';
            echo '<td> </td>';
            echo '<td>√</td>';
        }       
        echo '<td>' . $row->SARPRAS_KET . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>