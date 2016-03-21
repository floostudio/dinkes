<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 5.14.h Upaya Perbaikan Masyarakat Miskin</h4>
<thead>
    <tr>
        <th>No</th>
        <th>Region</th>
        <th>Kode RS</th> 
        <th>Nama RS</th> 


        <th>Upaya 1</th> 
        <th>Upaya 2</th>
        <th>Upaya 3</th>
        <th>Upaya 4</th>
        <th>Upaya 5</th>
        <th>Upaya 6</th>
        <th>Upaya 7</th>
        <th>Upaya 8</th>
        <th>Upaya 9</th>
        <th>Upaya 10</th>
    </tr>
</thead>
<tbody>
     <?php
    $i = 1;

    $row = $data_maskin8->result();

    $rs_count = $num_maskin8;

    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->nm_list_regoion . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 10; $k++) {
			if($k<= count($data_maskin8)){
            echo '<td>' . $row[$track]->PERBAIKANMASKIN_URAIAN . '</td>';
            $track++;
		   }
		   else{
			echo '<td>-</td>';
			}
            
        }
        echo '</tr>';
    }
    ?>
</tbody>