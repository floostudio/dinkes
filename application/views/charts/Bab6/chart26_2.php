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
                d8 = [[0, <?php echo $totalN2[7]; ?>]],
                d9 = [[0, <?php echo $totalN2[8]; ?>]],
                d10 = [[0, <?php echo $totalN2[9]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'TB Paru BTA'},
            {data: d2, label: 'TB Paru Lain',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: 'TB Ekstra Paru'},
            {data: d4, label: 'TB Alat Nafas Lain'},
            {data: d5, label: 'Meningitis TB'},
            {data: d6, label: 'Susunan Saraf Pst Lain'},
            {data: d7, label: 'TB Tulang Sendi'},
            {data: d8, label: 'Limfa Dentis TB'},
            {data: d9, label: 'TB Miller'},
            {data: d10, label: 'TB Lainnya'}
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
