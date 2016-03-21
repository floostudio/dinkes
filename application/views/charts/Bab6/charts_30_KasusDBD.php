<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$row = $data_dbd->result();

$rs_count = $num_dbd;
$total3 = array(0, 0, 0);
$total2 = array(0, 0, 0);
$total1 = array(0, 0, 0);
$total = array(0, 0, 0);
$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $ind = 0;
    for ($k = 0; $k < 3; $k++) {
        $total3[$ind] += $row[$track]->DBD_DEWASA_L;
        $total2[$ind] += $row[$track]->DBD_DEWASA_P;
        $total1[$ind] += $row[$track]->DBD_ANAK_L;
        $total[$ind] += $row[$track]->DBD_ANAK_P;
        $ind++;
        $track++;
    }
}
?>
<script>
    (function basic(container) {

        var
                d1 = [[1, <?php echo $total3[0]; ?>], [2, <?php echo $total2[0]; ?>], [3, <?php echo $total1[0]; ?>], [4, <?php echo $total[0]; ?>]], // First data series
                d2 = [[1, <?php echo $total3[1]; ?>], [2, <?php echo $total2[1]; ?>], [3, <?php echo $total1[1]; ?>], [4, <?php echo $total[1]; ?>]],
                d3 = [[1, <?php echo $total3[2]; ?>], [2, <?php echo $total2[2]; ?>], [3, <?php echo $total1[2]; ?>], [4, <?php echo $total[2]; ?>]],
      		markers = {data: d1},
                ticks = [[1, "Dewasa L"], [2, "Dewasa P"], [3, "Anak <18 Tahun L"],
                    [4, "Anak <18 Tahun P"]],
                i, graph;
        // Draw Graph
        graph = Flotr.draw(container, [
            {data: d1, label: 'Suspek'},
            {data: d2, label: 'DBD'},
            {data: d3, label: 'DBD+Syok'}
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
            title: "Jumlah Pasie DBD Dirawat Berdasarkan Usia dan Jenis Kelamin Tahun <?php echo $yearName; ?>",
            parseFloat: false,
            xaxis: {
                title: "Tahun",
                min: 0,
                max: 4.5,
                ticks: ticks
            },
	    markers: {
                show: true,
                position: 'ct'
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