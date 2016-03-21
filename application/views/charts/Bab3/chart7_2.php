<script>
    (function basic_bars(container, horizontal) {

        var
                d1 = [[1, <?php echo $totalJumlah[0]; ?>], [2, <?php echo $totalJumlah[1]; ?>], [3, <?php echo $totalJumlah[2]; ?>],
                    [4, <?php echo $totalJumlah[3]; ?>], [5, <?php echo $totalJumlah[4]; ?>], [6, <?php echo $totalJumlah[5]; ?>],
                    [7, <?php echo $totalJumlah[6]; ?>], [8, <?php echo $totalJumlah[7]; ?>], [9, <?php echo $totalJumlah[8]; ?>],
                    [10, <?php echo $totalJumlah[9]; ?>], [11, <?php echo $totalJumlah[10]; ?>], [12, <?php echo $totalJumlah[11]; ?>],
                    [13, <?php echo $totalJumlah[12]; ?>], [14, <?php echo $totalJumlah[13]; ?>], [15, <?php echo $totalJumlah[14]; ?>],
                    [16, <?php echo $totalJumlah[15]; ?>], [17, <?php echo $totalJumlah[16]; ?>], [18, <?php echo $totalJumlah[17]; ?>],
                    [19, <?php echo $totalJumlah[18]; ?>], [20, <?php echo $totalJumlah[19]; ?>], [21, <?php echo $totalJumlah[20]; ?>]], // First data series

                ticks = [[1, "1.Dr Spesialis Bedah"], [2, "1.a"], [3, "1.b"], [4, "2.Dr Spesialis Peny.Dalam"], [5, "2.a"], [6, "2.b"],
                    [7, "2.c"], [8, "2.d"], [9, "2.e"], [10, "2.f"], [11, "2.g"], [12, "2.h"],
                    [13, "3.Dr Spesialis Anak"], [14, "3.a"], [15, "3.b"], [16, "3.c"], [17, "3.d"],
                    [18, "4.Dr Spesialis Obgyn"], [19, "4.a"], [20, "4.b"], [21, "4.c"]],
		markers = {data: d1},
                i, graph;
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
            title: "<?php echo $judul; ?>",
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
                max: 22,
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