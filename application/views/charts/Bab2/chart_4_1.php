<script>
    (function basic_pie(container) {

        var
                d1 = [[0, <?php echo $totalN2; ?>]],
                d2 = [[0, <?php echo $totalN1; ?>]],
                d3 = [[0, <?php echo $totalN; ?>]],
		legend: {labelFormatter: myLabelFunc}
                i,graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'N-2'},
            {data: d2, label: 'N-1'},
            {data: d3, label: 'N'}
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