<script>
    (function basic_bars(container, horizontal) {

        var
                d1 = [[1, <?php echo $totalJumlah[0]; ?>], [2, <?php echo $totalJumlah[1]; ?>], [3, <?php echo $totalJumlah[2]; ?>],
                    [4, <?php echo $totalJumlah[3]; ?>], [5, <?php echo $totalJumlah[4]; ?>], [6, <?php echo $totalJumlah[5]; ?>],
                    [7, <?php echo $totalJumlah[6]; ?>], [8, <?php echo $totalJumlah[7]; ?>], [9, <?php echo $totalJumlah[8]; ?>],
                    [10, <?php echo $totalJumlah[9]; ?>], [11, <?php echo $totalJumlah[10]; ?>], [12, <?php echo $totalJumlah[11]; ?>],
                    [13, <?php echo $totalJumlah[12]; ?>], [14, <?php echo $totalJumlah[13]; ?>], [15, <?php echo $totalJumlah[14]; ?>],
                    [16, <?php echo $totalJumlah[15]; ?>], [17, <?php echo $totalJumlah[16]; ?>], [18, <?php echo $totalJumlah[17]; ?>],
                    [19, <?php echo $totalJumlah[18]; ?>]], // First data series
                ticks = [[1, "1.SPK"], [2, "1.a"],
                    [3, "1.b"], [4, "1.c"],
                    [5, "1.d"], [6, "2.D3Bidan"],
                    [7, "2.a"], [8, "2.b"],
                    [9, "3.D1Gizi"], [10, "3.a"],
                    [11, "3.b"], [12, "4.D3Anestesi"],
                    [13, "5.D3Rekam Medik"], [14, "6.D3TL"],
                    [15, "7.D3T.Medik"], [16, "8.D3Farmasi"],
                    [17, "9.D3 Analis Kes"], [18, "10.D3Radiologi"],
                    [19, "11.D3Fisioterapi"]],
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
                max: 20,
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