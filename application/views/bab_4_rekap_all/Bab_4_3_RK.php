<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<h4>Tahun <?php echo $yearName.': '; ?>Bab 4.3  Rasio Keuangan</h4>
<thead>
    <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Region</th>
        <th rowspan="2">Kode RS</th> 
        <th rowspan="2">Nama RS</th> 


        <th colspan="3">Current Ratio</th>  
        <th colspan="3">Quick Ratio </th>  
        <th colspan="3">Cash Ratio </th>  
		<th colspan="3">Return of Investment </th>  
		<th colspan="3">Debt of Total Asset Ratio </th>  
        <th colspan="3">Debt To Equity Ratio </th>  
		 
    </tr>
    <tr>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
        <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
		 <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
		 <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
		 <th>n-2</th>
        <th>n-1</th>
        <th>n</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_rk->result();

    $rs_count = $num_rk;
 
	$total = array_fill(0,21,0);
	 
    $track = 0;
    for ($j = 0; $j < $rs_count; $j++) {
		$ind = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 6; $k++) {
            echo '<td>' . $row[$track]->RK_N2 . '</td>'; 
            echo '<td>' . $row[$track]->RK_N1 . '</td>';
            echo '<td>' . $row[$track]->RK_N . '</td>';
			 
            $track++;
        }
		 
        echo '</tr>';
    }
	  
    ?>
</tbody>