<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 3.7 Gambaran Pelatihan Tenaga Medis, Paramedis, dan Non Medis Rumah Sakit</h4>
<thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">Region</th>
        <th rowspan="3">Kode RS</th> 
        <th rowspan="3">Nama RS</th> 

        <th colspan="80">Tenaga Medis</th>
        <th colspan="80">Tenaga Paramedis</th>
        <th colspan="80">Tenaga non Medis</th>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 3; $k++) { ?>
            <th colspan="4">1</th>
            <th colspan="4">2</th>
            <th colspan="4">3</th>
            <th colspan="4">4</th>
            <th colspan="4">5</th>
            <th colspan="4">6</th>
            <th colspan="4">7</th>
            <th colspan="4">8</th>
            <th colspan="4">9</th>
            <th colspan="4">10</th>
            <th colspan="4">11</th>
            <th colspan="4">12</th>
            <th colspan="4">13</th>
            <th colspan="4">14</th>
            <th colspan="4">15</th>
            <th colspan="4">16</th>
            <th colspan="4">17</th>
            <th colspan="4">18</th>
            <th colspan="4">19</th>
            <th colspan="4">20</th>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 60; $k++) { ?>
            <th>Pelatihan yang Telah Diikuti</th>
            <th>Jumlah</th>
            <th>Unit</th>
            <th>Penyelenggara</th> <!--60-->    
        <?php } ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_3_7->result();
    $rs_count = $num_3_7;

    $prosentase = 0;

    $track = 0;
    
    for ($j = 0; $j < $rs_count; $j++) {
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';

        for ($k = 0; $k < 60; $k++) {
			if($k<count($data_3_7)){
            echo '<td>' . $row[$track]->PELATIHAN_URAIAN . '</td>';
            echo '<td>' . $row[$track]->PELATIHAN_JUMLAH . '</td>';
            echo '<td>' . $row[$track]->UNIT_NAMA . '</td>';
            echo '<td>' . $row[$track]->PELATIHAN_PENYELENGGARA . '</td>';
            $track++;
			}
			else
			{
			echo '<td>-</td>';
            echo '<td>-</td>';
			echo '<td>-</td>';
            echo '<td>-</td>';
			}
        }
        echo '</tr>';
    }
    ?>
</tbody>