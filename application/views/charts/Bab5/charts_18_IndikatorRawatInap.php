<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php
$row = $data_51_13->result();

$rs_count = $num_51_13;
$total = array(0, 0, 0, 0, 0);
$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 0; $k < 5; $k++) {
        $total[$k] += $row[$track]->IK_NILAI;
        $track++;
    }
}
if ($tipe == 1) {
    ?>
    <script>
        (function basic_pie(container) {

            var
                    d1 = [[0, <?php echo $total[0]; ?>]],
                    d2 = [[0, <?php echo $total[1]; ?>]],
                    d3 = [[0, <?php echo $total[2]; ?>]],
                    d4 = [[0, <?php echo $total[3]; ?>]],
                    d5 = [[0, <?php echo $total[4]; ?>]],
                    graph;

            graph = Flotr.draw(container, [
                {data: d1, label: 'Dekubitus'},
                {data: d2, label: 'Infeksi Saluran Kencing'},
                {data: d3, label: 'Infeksi Luka Operasi',
                    pie: {
                        explode: 50
                    }
                },
                {data: d4, label: 'Infeksi Krn Jarum Infus'},
                {data: d5, label: 'Lain-Lain'}
            ], {
                HtmlText: false,
                title: "Indikator Rawat Inap Tahun <?php echo $yearName; ?>",
                parseFloat: false,
                grid: {
                    verticalLines: true,
                    horizontalLines: true
                },
                xaxis: {showLabels: true},
                yaxis: {showLabels: true},
                pie: {
                    show: true,
                    explode: 6
                },
                mouse: {
                    track: true,
                    relative: true,
                    trackDecimals: 0},
                legend: {
                    position: 'se',
                    backgroundColor: '#D2E8FF'
                }
            });
        })(document.getElementById("my_graph"));
    </script> 
    <?php
} else if ($tipe == 2) {
    $max = 10;
    $monothick = 0;
    $nilaiMax = max($total);
    $i = 0;

    while ($nilaiMax > 10) {
        $nilaiMax = $nilaiMax / 10;
        $i++;
    }

    for ($j = 0; $j < $i; $j++) {
        $max = $max * 10;
    }

    $monothick = $max / 5;
    ?>
    <script>
        (function basic_bars(container, horizontal) {

            var
                    d1 = [[1, <?php echo $total[0]; ?>], [2, <?php echo $total[1]; ?>], [3, <?php echo $total[2]; ?>], [4, <?php echo $total[3]; ?>], [5, <?php echo $total[4]; ?>]], // First data series                
                    ticks = [[1, "Dekubitus"], [2, "Infeksi Saluran Kencing"], [3, "Infeksi Luka Operasi"],
                        [4, "Infeksi Krn Jarum Infus"], [5, "Lain-Lain"]],
		    markers = {data: d1},
                    i, graph;
            // Draw Graph
            graph = Flotr.draw(container, [
                {data: d1}
            ], {
                colors: ['#2C93E1', '#6B8E23', '#C71585', '#CD5C5C', '#9440ED'],
                grid: {
                    verticalLines: false,
                    backgroundColor: {
                        colors: [[0, '#ccc'], [1, '#ccc']],
                        start: 'top',
                        end: 'bottom'
                    }
                },
                shadowSize: 0,
                title: "Indikator Rawat Inap Tahun: <?php echo $yearName; ?>",
                parseFloat: false,
                bars: {
                    show: true,
                    horizontal: horizontal,
                    shadowSize: 0,
                    barWidth: 0.75
                },
		markers: {
                    show: true,
                    position: 'ct'
                },
                xaxis: {
                    title: "Jenis",
                    min: 0,
                    max: 6,
                    ticks: ticks
                },
                yaxis: {
                    title: "Jumlah",
                    minorTickFreq: <?php echo $monothick; ?>,
                    min: 0,
                    max: <?php echo $max; ?>
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
    <?php
}
?>