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
                d8 = [[0, <?php echo $totalJumlah[7]; ?>]],
                d9 = [[0, <?php echo $totalJumlah[8]; ?>]],
                d10 = [[0, <?php echo $totalJumlah[9]; ?>]],
                d11 = [[0, <?php echo $totalJumlah[10]; ?>]],
                d12 = [[0, <?php echo $totalJumlah[11]; ?>]],
                d13 = [[0, <?php echo $totalJumlah[12]; ?>]],
                d14 = [[0, <?php echo $totalJumlah[13]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: '1.Mata'},
            {data: d2, label: '2.THT',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: '3.Syaraf'},
            {data: d4, label: '4.Jantung&Pembuluh Darah'},
            {data: d5, label: '4.a.Intervansi'},
            {data: d6, label: '4.b.Rehab'},
            {data: d7, label: '5.Kulit Kelamin'},
            {data: d8, label: '6.Jiwa'},
            {data: d9, label: '7.Paru'},
            {data: d10, label: '8.Orthopedik'},
            {data: d11, label: '9.Urologi'},
            {data: d12, label: '10.Bedah Syaraf'},
            {data: d13, label: '11.Bedah Plastik'},
            {data: d14, label: '12.Forensik'}
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
