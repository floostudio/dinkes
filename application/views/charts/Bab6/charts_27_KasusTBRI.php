<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$row = $data_kasus_tb_ri->result();

$totalN2 = array(0, 0, 0, 0, 0, 0, 0);
$totalN1 = array(0, 0, 0, 0, 0, 0, 0);
$totalN = array(0, 0, 0, 0, 0, 0, 0);

$rs_count = $num_kasus_tb_ri;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $ind = 0;
    for ($k = 0; $k < 7; $k++) {
        $totalN2[$ind] += $row[$track]->KASUS_TB_RI_N2;
        $totalN1[$ind] += $row[$track]->KASUS_TB_RI_N1;
        $totalN[$ind] += $row[$track]->KASUS_TB_RI_N;

        $ind++;

        $track++;
    }
}
?>
<script>
    (function basic(container) {

        var
                d1 = [[1, <?php echo $totalN2[0]; ?>], [2, <?php echo $totalN2[1]; ?>], [3, <?php echo $totalN2[2]; ?>], [4, <?php echo $totalN2[3]; ?>], [5, <?php echo $totalN2[4]; ?>], [6, <?php echo $totalN2[5]; ?>], [7, <?php echo $totalN2[6]; ?>]], // First data series
                d2 = [[1, <?php echo $totalN1[0]; ?>], [2, <?php echo $totalN1[1]; ?>], [3, <?php echo $totalN1[2]; ?>], [4, <?php echo $totalN1[3]; ?>], [5, <?php echo $totalN1[4]; ?>], [6, <?php echo $totalN1[5]; ?>], [7, <?php echo $totalN1[6]; ?>]],
                d3 = [[1, <?php echo $totalN[0]; ?>], [2, <?php echo $totalN[1]; ?>], [3, <?php echo $totalN[2]; ?>], [4, <?php echo $totalN[3]; ?>], [5, <?php echo $totalN[4]; ?>], [6, <?php echo $totalN[5]; ?>], [7, <?php echo $totalN[6]; ?>]],
                markers = {data: d1},
		ticks = [[1, "<1 Tahun"], [2, "1-4 Tahun"], [3, "5-14 Tahun"],
                    [4, "15-24 Tahun"], [5, "25-44 Tahun"], [6, "45-64 Tahun"],
                    [7, "65+ Tahun"]],
                i, graph;
        // Draw Graph
        graph = Flotr.draw(container, [
            {data: d1, label: 'N-2'},
            {data: d2, label: 'N-1'},
            {data: d3, label: 'N'}
        ], {
            colors: ['#2C93E1', '#6B8E23', '#C71585', '#CD5C5C', '#9440ED'],
            grid: {
                verticalLines: true,
                backgroundColor: {
                    colors: [[0, '#ccc'], [1, '#ccc']],
                    start: 'top',
                    end: 'bottom'
                }
            },
            shadowSize: 0,
            title: "Kasus TB Rawat Inap Tahun <?php echo $yearName; ?>",
            parseFloat: false,
	    markers: {
                show: true,
                position: 'ct'
            },
            xaxis: {
                title: "Tahun",
                min: 0,
                max: 7.5,
                ticks: ticks
            },
            yaxis: {
                title: "Jumlah",
                minorTickFreq: 20,
                min: 0,
                max: 100
            },
            mouse: {
                track: true,
                relative: true,
                trackDecimals: 0},
            grid : {
                verticalLines: true,
                backgroundColor: {
                    colors: [[0, '#fff'], [1, '#ccc']],
                    start: 'top',
                    end: 'bottom'
                }
            },
            legend: {
                position: 'nw'
            }
        });
    })(document.getElementById("my_graph"));
</script>