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
                d15 = [[0, <?php echo $totalJumlah[14]; ?>]],
                d16 = [[0, <?php echo $totalJumlah[15]; ?>]],
                d17 = [[0, <?php echo $totalJumlah[16]; ?>]],
                d18 = [[0, <?php echo $totalJumlah[17]; ?>]],
                d19 = [[0, <?php echo $totalJumlah[18]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: '1.SPK'},
            {data: d2, label: '1.a.D1Perawat',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: '1.b.D3Perawat'},
            {data: d4, label: '1.c.S1Perawat'},
            {data: d5, label: '1.d.S2Perawat'},
            {data: d6, label: '2.D3Bidan'},
            {data: d7, label: '2.a.S1Bidan'},
            {data: d8, label: '2.b.Apoteker'},
            {data: d9, label: '3.D1Gizi'},
            {data: d10, label: '3.a.D3Gizi'},
            {data: d11, label: '3.b.S1Gizi'},
            {data: d12, label: '4.D3Anestesi'},
            {data: d13, label: '5.D3RekamMedik'},
            {data: d14, label: '6.D3Teknik Lingkungan'},
            {data: d15, label: '7.D3Teknik Medik'},
            {data: d16, label: '8.D3farmasi'},
            {data: d17, label: '9.D3Analis Kesehatan'},
            {data: d18, label: '10.D3Radiologi'},
            {data: d19, label: '11.D3Fisioterapi'}
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
