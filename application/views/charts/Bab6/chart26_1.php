<script>
    (function basic_bars(container, horizontal) {

        var
                d1 = [[1, <?php echo $totalN2[0]; ?>], [2, <?php echo $totalN2[1]; ?>], [3, <?php echo $totalN2[2]; ?>], [4, <?php echo $totalN2[3]; ?>], [5, <?php echo $totalN2[4]; ?>], [6, <?php echo $totalN2[5]; ?>], [7, <?php echo $totalN2[6]; ?>], [8, <?php echo $totalN2[7]; ?>], [9, <?php echo $totalN2[8]; ?>], [10, <?php echo $totalN2[9]; ?>]], // First data series

                ticks = [[1, "TB Paru BTA"], [2, "TB Paru Lain"], [3, "TB Ekstra Paru"],
                    [4, "TB Alat Nafas Lain"], [5, "Meningitis TB"], [6, "Susunan Saraf Pst Lain"],
                    [7, "TB Tulang Sendi"], [8, "Limfa Dentis TB"], [9, "TB Miller"],
                    [10, "TB Lainnya"]],
		markers = {data: d1},
                i, graph;
        // Draw Graph
        graph = Flotr.draw(container, [
            {data: d1, label: 'N-2'}
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
                max: 11,
                ticks: ticks
            },
            yaxis: {
                title: "Jumlah Pasien",
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