<script>
    (function basic_bars(container, horizontal){

        var
                d1 = [[1, <?php echo $total[0]; ?>], [2, <?php echo $total[1]; ?>], [3, <?php echo $total[2]; ?>], [4, <?php echo $total[3]; ?>], [5, <?php echo $total[4]; ?>], [6, <?php echo $total[5]; ?>], [7, <?php echo $total[6]; ?>], [8, <?php echo $total[7]; ?>], [9, <?php echo $total[8]; ?>]], // First data series
		markers = {data: d1},
                ticks = [[1, "Pendarahan"], [2, "Infeksi"], [3, "Sepsis"],
                    [4, "Pre Eklamsia/Eklampsia"], [5, "Jantung"], [6, "TB Paru"],
                    [7, "Asma"], [8, "Hipertensi"], [9, "Lainnya"]],
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
                title: "Tahun",
                min: 0,
                max: 10,
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