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
                d20 = [[0, <?php echo $totalJumlah[19]; ?>]],
                d21 = [[0, <?php echo $totalJumlah[20]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: '1.Spesialis Bedah'},
            {data: d2, label: '1.a.Bedah Digesih',
                pie: {
                    explode: 50
                }
            },
            {data: d3, label: '1.b.Bedah Onkologi'},
            {data: d4, label: '2. Spesialis Dalam'},
            {data: d5, label: '2.a.Sp.PD KGH'},
            {data: d6, label: '2.b.Sp.PD KHOM'},
            {data: d7, label: '2.c.Sp.PD KEMD'},
            {data: d8, label: '2.d.Sp.PD KGEH'},
            {data: d9, label: '2.e.Sp.PD Kger'},
            {data: d10, label: '2.f.Alergi Imunologi'},
            {data: d11, label: '2.g.Sp.PD KKV'},
            {data: d12, label: '2.h.Nutrisi Metabolik'},
            {data: d13, label: '3.Spesialis Anak'},
            {data: d14, label: '3.a.Perinatologi'},
            {data: d15, label: '3.b.Alergi Imunologi'},
            {data: d16, label: '3.c.Pediatri Gawat Darurat'},
            {data: d17, label: '3.d.Nutrisi Metabolik'},
            {data: d18, label: '4.Obgyn'},
            {data: d19, label: '4.a.Sp.OG K.Onk'},
            {data: d20, label: '4.b.Sp.OG KFM'},
            {data: d21, label: '4.c.Sp.OG KFER'}
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
