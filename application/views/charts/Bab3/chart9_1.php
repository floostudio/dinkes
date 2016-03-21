<script>
    (function basic_pie(container) {

        var
                d1 = [[0, <?php echo $totalJumlah[0]; ?>]],
                d2 = [[0, <?php echo $totalJumlah[1]; ?>]],
                d3 = [[0, <?php echo $totalJumlah[2]; ?>]],
                d4 = [[0, <?php echo $totalJumlah[3]; ?>]],
                d5 = [[0, <?php echo $totalJumlah[4]; ?>]],
                d6 = [[0, <?php echo $totalJumlah[5]; ?>]],
                d7 = [[0, <?php echo $totalJumlah[6]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: '1.Bedah Mulut'},
            {data: d2, label: '2.Konservasi Endodonsi',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: '3.Periodonti'},
            {data: d4, label: '4.Orthodonti'},
            {data: d5, label: '5.Prosthodonti'},
            {data: d5, label: '6.Pedodonsi'},
            {data: d6, label: '7.Penyakit Mulut'}
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
