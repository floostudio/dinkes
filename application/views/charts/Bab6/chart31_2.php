<script>
    (function basic_pie(container) {

        var
                d1 = [[0, <?php echo $total[0]; ?>]],
                d2 = [[0, <?php echo $total[1]; ?>]],
                d3 = [[0, <?php echo $total[2]; ?>]],
                d4 = [[0, <?php echo $total[3]; ?>]],
                d5 = [[0, <?php echo $total[4]; ?>]],
                d6 = [[0, <?php echo $total[5]; ?>]],
                d7 = [[0, <?php echo $total[6]; ?>]],
                d8 = [[0, <?php echo $total[7]; ?>]],
                d9 = [[0, <?php echo $total[8]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'Pendarahan'},
            {data: d2, label: 'Infeksi',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: 'Sepsis'},
            {data: d4, label: 'Pre Eklamsia/Eklampsia'},
            {data: d5, label: 'Jantung'},
            {data: d6, label: 'TB Paru'},
            {data: d7, label: 'Asma'},
            {data: d8, label: 'Hipertensi'},
            {data: d9, label: 'Lainnya'}
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
