<script>
    (function basic_pie(container) {

        var
                d1 = [[0, <?php echo $totalNilai[0]; ?>]],
                d2 = [[0, <?php echo $totalNilai[1]; ?>]],
                d3 = [[0, <?php echo $totalNilai[2]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'Laki-Laki'},
            {data: d2, label: 'Perempuan',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: 'Total'}
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