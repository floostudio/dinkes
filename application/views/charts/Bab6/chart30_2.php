<script>
    (function basic_pie(container) {

        var
                d1 = [[0, <?php echo $total[0]; ?>]],
                d2 = [[0, <?php echo $total[1]; ?>]],
                d3 = [[0, <?php echo $total[2]; ?>]],
                d4 = [[0, <?php echo $total[3]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'TB Paru BTA'},
            {data: d2, label: 'TB Paru Lain',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: 'TB Ekstra Paru'},
            {data: d4, label: 'TB Alat Nafas Lain'}
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
