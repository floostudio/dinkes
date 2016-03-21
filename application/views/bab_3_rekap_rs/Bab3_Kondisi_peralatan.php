<thead>
    <tr>
        <th rowspan="2" style="padding-top: 2%;">Tahun</th>
        <th rowspan="2" style="padding-top: 2%;">NO Registrasi</th>
        <th rowspan="2" style="padding-top: 2%;">Nama</th>
        <th rowspan="2" style="padding-top: 2%;">Pelayanan</th>
        <th colspan="3" style="padding-left: 15%;">Kondisi Peralatan*</th>
        <th rowspan="2" style="padding-top: 2%;">Keterangan</th>
    </tr>
    <tr>
        <th>Sesuai Standart</th>
        <th>Tidak Sesuai Standart</th>
        <th>Tidak Ada</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($peralatan->result() as $row) {
        echo '<tr>';
        echo '<td>' . $row->TAHUN_TAHUN . '</td>';
        echo '<td>' . $row->RS_NOREG . '</td>';
        echo '<td>' . $row->RS_NAMA . '</td>';
        echo '<td>' . $row->LIST_PERALATAN_PELAYANAN . '</td>';
         if($row->PERALATAN_KONDISI == 0){
             echo '<td>√</td>';
             echo '<td> </td>';
             echo '<td> </td>';
        } else if($row->PERALATAN_KONDISI == 1){
            echo '<td> </td>';
            echo '<td>√</td>';
            echo '<td> </td>';
        } else if($row->PERALATAN_KONDISI == 2){
            echo '<td> </td>';
            echo '<td> </td>';
            echo '<td>√</td>';
        }
        echo '<td>' . $row->PERALATAN_KETERANGAN . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>