<script>
    (function basic_bars(container, horizontal) {

        var
                d1 = [[1, <?php echo $totalJumlah[0]; ?>], [2, <?php echo $totalJumlah[1]; ?>], [3, <?php echo $totalJumlah[2]; ?>],
                    [4, <?php echo $totalJumlah[3]; ?>], [5, <?php echo $totalJumlah[4]; ?>], [6, <?php echo $totalJumlah[5]; ?>],
                    [7, <?php echo $totalJumlah[6]; ?>], [8, <?php echo $totalJumlah[7]; ?>], [9, <?php echo $totalJumlah[8]; ?>],
                    [10, <?php echo $totalJumlah[9]; ?>], [11, <?php echo $totalJumlah[10]; ?>], [12, <?php echo $totalJumlah[11]; ?>],
                    [13, <?php echo $totalJumlah[12]; ?>], [14, <?php echo $totalJumlah[13]; ?>]], // First data series
                ticks = [[1, "1.Dr Mata"], [2, "2.Dr THT"], [3, "3.Dr Syaraf"], [4, "4.Dr Jantung"],
                    [5, "4.a.Intervefensi"], [6, "4.b.Rehab"], [7, "5.Kulit Kel"], [8, "6.Jiwa"],
                    [9, "7.Paru"], [10, "8.Orthopedik"], [11, "9.Urologi"], [12, "10.Bdh Syaraf"],
                    [13, "11.Bdh Plastik"], [14, "12.Forensik"]],
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
                max: 15,
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