<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$row = $data_51_10->result();
$rs_count = $num_51_10;

$total = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$kodeicd10 = array('', '', '', '', '', '', '', '', '', '');

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 0; $k < 10; $k++) {
        $kodeicd10[$k] = $row[$track]->ICD10_CODE;
        $total[$k] += $row[$track]->PENY_RJ_JUMLAH;
        $track++;
    }
}
$judul = "Sepuluh Besar Penyakit Rawat Jalan Tahun ".$yearName;

if($tipe == 1){
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
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: '<?php echo $kodeicd10[0]; ?>'},
            {data: d2, label: '<?php echo $kodeicd10[1]; ?>'},
            {data: d3, label: '<?php echo $kodeicd10[2]; ?>'},
            {data: d4, label: '<?php echo $kodeicd10[3]; ?>'},
            {data: d5, label: '<?php echo $kodeicd10[4]; ?>'},
            {data: d6, label: '<?php echo $kodeicd10[5]; ?>'},
            {data: d7, label: '<?php echo $kodeicd10[6]; ?>',
                pie: {
                    explode: 50
                }
            },
            {data: d8, label: '<?php echo $kodeicd10[7]; ?>'},
            {data: d9, label: '<?php echo $kodeicd10[8]; ?>'},
            {data: d10, label: '<?php echo $kodeicd10[9]; ?>'}
        ], {
            HtmlText: false,
            title: "Sepuluh penyakit Terbanyak Rawat Jalan Tahun <?php echo $yearName; ?>",
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
                    d1 = [[1, <?php echo $total[0]; ?>], [2, <?php echo $total[1]; ?>], [3, <?php echo $total[2]; ?>], [4, <?php echo $total[3]; ?>], [5, <?php echo $total[4]; ?>],
                        [6, <?php echo $total[5]; ?>], [7, <?php echo $total[6]; ?>], [8, <?php echo $total[7]; ?>], [9, <?php echo $total[8]; ?>], [10, <?php echo $total[9]; ?>]], // First data series                
                    ticks = [[1, "<?php echo $kodeicd10[0]; ?>"], [2, "<?php echo $kodeicd10[1]; ?>"], [3, "<?php echo $kodeicd10[2]; ?>"], [4, "<?php echo $kodeicd10[3]; ?>"], [5, "<?php echo $kodeicd10[4]; ?>"],
                        [6, "<?php echo $kodeicd10[5]; ?>"], [7, "<?php echo $kodeicd10[6]; ?>"], [8, "<?php echo $kodeicd10[7]; ?>"], [9, "<?php echo $kodeicd10[8]; ?>"], [10, "<?php echo $kodeicd10[9]; ?>"]],
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
                title: "Sepuluh besar Penyakit Rawat Jalan Tahun: <?php echo $yearName; ?>",
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
                    max: 11,
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