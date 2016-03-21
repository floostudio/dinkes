<script>
    (function basic_bars(container, horizontal) {

        var
                d1 = [[1, <?php echo $totalJumlah[0]; ?>], [2, <?php echo $totalJumlah[1]; ?>], [3, <?php echo $totalJumlah[2]; ?>],
                    [4, <?php echo $totalJumlah[3]; ?>], [5, <?php echo $totalJumlah[4]; ?>], [6, <?php echo $totalJumlah[5]; ?>],
                    [7, <?php echo $totalJumlah[6]; ?>]], // First data series

                ticks = [[1, "1.Bedah Mulut"], [2, "2.Endodonsi"],
                    [3, "3.Periodonti"], [4, "4.Orthodonti"],
                    [5, "5.Prosthodonti"], [6, "6.Pedodonsi"],
                    [7, "7.Penyakit Mulut"]],
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
                max: 8,
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