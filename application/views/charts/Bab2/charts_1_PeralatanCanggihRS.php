<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php
$i = 1;

$row = $data2_20->result();
$rs_count = $num_2_20;

$total = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

$totalAll = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $totalX = 0;
    for ($k = 0; $k < 12; $k++) {

        $total[$k] += $row[$track]->PC_JUMLAH;

        $track++;
    }
}

$max = 10;
$monothick = 0;
$nilaiMax = max($total);
$i = 0;

while($nilaiMax>10){
    $nilaiMax  = $nilaiMax/10;
    $i++;
}

for($j=0; $j<$i; $j++){
    $max = $max*10;
}

$monothick = $max/5;

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
                    d6 = [[0, <?php echo $total[5]; ?>]],
                    d7 = [[0, <?php echo $total[6]; ?>]],
                    d8 = [[0, <?php echo $total[7]; ?>]],
                    d9 = [[0, <?php echo $total[8]; ?>]],
                    d10 = [[0, <?php echo $total[9]; ?>]],
                    d11 = [[0, <?php echo $total[10]; ?>]],
                    d12 = [[0, <?php echo $total[11]; ?>]],
                    graph;

            graph = Flotr.draw(container, [
                {data: d1, label: 'DSA = <?php echo $total[0]; ?>'},
                {data: d2, label: 'MRI = <?php echo $total[1]; ?>'},
                {data: d3, label: 'CT Scanner = <?php echo $total[2]; ?>'},
                {data: d4, label: 'Fluoroskopi = <?php echo $total[3]; ?>'},
                {data: d5, label: 'Endoscopy = <?php echo $total[4]; ?>'},
                {data: d6, label: 'USG 4D = <?php echo $total[5]; ?>'},
                {data: d7, label: 'Hemodialisa = <?php echo $total[6]; ?>',
                    pie: {
                        explode: 50
                    }
                },
                {data: d8, label: 'Linac = <?php echo $total[7]; ?>'},
                {data: d9, label: 'Mammography X-Ray = <?php echo $total[8]; ?>'},
                {data: d10, label: 'Cateterization Lab = <?php echo $total[9]; ?>'},
                {data: d11, label: 'Telegama Cobalt-60 = <?php echo $total[10]; ?>'},
                {data: d12, label: 'Hiperbaric Chamber = <?php echo $total[11]; ?>'}
            ], {
                HtmlText: false,
                title: "Jumlah Unit Peralatan Canggih Tahun: <?php echo $yearName; ?>",
                parseFloat: false,
                grid: {
                    verticalLines: true,
                    horizontalLines: true
                },
                xaxis: {showLabels: false},
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
    ?>
    <script>
        (function basic_bars(container, horizontal) {

            var
                    d1 = [[1, <?php echo $total[0]; ?>], [2, <?php echo $total[1]; ?>], [3, <?php echo $total[2]; ?>], [4, <?php echo $total[3]; ?>], [5, <?php echo $total[4]; ?>],
                        [6, <?php echo $total[5]; ?>], [7, <?php echo $total[6]; ?>], [8, <?php echo $total[7]; ?>], [9, <?php echo $total[8]; ?>], [10, <?php echo $total[9]; ?>],
                        [11, <?php echo $total[10]; ?>], [12, <?php echo $total[11]; ?>]], // First data series                
                    ticks = [[1, "DSA"], [2, "MRI"], [3, "CT-Scanner"], [4, "Fluoroskopi"], [5, "Endoscopy"],
                            [6, "USG4D"], [7, "Hemodialisa"], [8, "Linac"], [9, "Mam XRay"], [10, "Cateterization Lab"], [11, "Telegama CObalt-60"], [12, "Hiperbaric Chamber"]],
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
                title: "Jumlah Unit Peralatan Canggih Tahun: <?php echo $yearName; ?>",
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
                    max: 13,
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