<script>
    (function basic_pie(container) {

        var
                d1 = [[0, <?php echo $totalN2[0]; ?>]],
                d2 = [[0, <?php echo $totalN2[1]; ?>]],
                d3 = [[0, <?php echo $totalN2[2]; ?>]],
                d4 = [[0, <?php echo $totalN2[3]; ?>]],
                d5 = [[0, <?php echo $totalN2[4]; ?>]],
                d6 = [[0, <?php echo $totalN2[5]; ?>]],
                d7 = [[0, <?php echo $totalN2[6]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: '<1 Tahun'},
            {data: d2, label: '1-4 Tahun',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: '5-14 Tahun'},
            {data: d4, label: '15-24 Tahun'},
            {data: d5, label: '25-44 Tahun'},
            {data: d6, label: '45-64 Tahun'},
            {data: d7, label: '65+ Tahun'}
        ], {
            HtmlText: false,
            title: "<?php echo $judul; ?>",
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
