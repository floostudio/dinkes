<script>
    (function basic_pie(container) {

        var
                d1 = [[0, <?php echo $totalJumlah[0]; ?>]],
                d2 = [[0, <?php echo $totalJumlah[1]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'Dokter Umum'},
            {data: d2, label: 'Dokter Gigi',
                pie: {
                    explode: 50
                }
            }
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