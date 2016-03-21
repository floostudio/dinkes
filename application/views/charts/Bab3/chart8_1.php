<script>
    (function basic_pie(container) {

        var
                d1 = [[0, <?php echo $totalJumlah[0]; ?>]],
                d2 = [[0, <?php echo $totalJumlah[1]; ?>]],
                d3 = [[0, <?php echo $totalJumlah[2]; ?>]],
                d4 = [[0, <?php echo $totalJumlah[3]; ?>]],
                d5 = [[0, <?php echo $totalJumlah[4]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: '1.AnestesioLogi'},
            {data: d2, label: '2.Radiologi',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: '3.Rehab Medik'},
            {data: d4, label: '4.Patologi Klinik'},
            {data: d5, label: '5.Patologi Anatomi'}
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
