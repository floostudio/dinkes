<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$row = $data_2_21_3->result();
$rs_count = $num_2_21_3;

$totalN2 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$totalN1 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$totalN = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 0; $k < 13; $k++) {
        $totalN2[$k] += $row[$track]->IRI_JUMLAH_N2;
        $totalN1[$k] += $row[$track]->IRI_JUMLAH_N1;
        $totalN[$k] += $row[$track]->IRI_JUMLAH_N;
        
        $track++;
    }
}
?>
<script>
    (function basic(container) {

        var
                d1 = [[1, <?php echo $totalN2[0];?>], [2, <?php echo $totalN2[1];?>], [3, <?php echo $totalN2[2];?>], [4, <?php echo $totalN2[3];?>], [5, <?php echo $totalN2[4];?>], [6, <?php echo $totalN2[5];?>], [7, <?php echo $totalN2[6];?>], [8, <?php echo $totalN2[7];?>], [9, <?php echo $totalN2[8];?>], [10, <?php echo $totalN2[9];?>], [11, <?php echo $totalN2[10];?>], [12, <?php echo $totalN2[11];?>], [13, <?php echo $totalN2[12];?>]], // First data series
                d2 = [[1, <?php echo $totalN1[0];?>], [2, <?php echo $totalN1[1];?>], [3, <?php echo $totalN1[2];?>], [4, <?php echo $totalN1[3];?>], [5, <?php echo $totalN1[4];?>], [6, <?php echo $totalN1[5];?>], [7, <?php echo $totalN1[6];?>], [8, <?php echo $totalN1[7];?>], [9, <?php echo $totalN1[8];?>], [10, <?php echo $totalN1[9];?>], [11, <?php echo $totalN1[10];?>], [12, <?php echo $totalN1[11];?>], [13, <?php echo $totalN1[12];?>]],
                d3 = [[1, <?php echo $totalN[0];?>], [2, <?php echo $totalN[1];?>], [3, <?php echo $totalN[2];?>], [4, <?php echo $totalN[3];?>], [5, <?php echo $totalN[4];?>], [6, <?php echo $totalN[5];?>], [7, <?php echo $totalN[6];?>], [8, <?php echo $totalN[7];?>], [9, <?php echo $totalN[8];?>], [10, <?php echo $totalN[9];?>], [11, <?php echo $totalN[10];?>], [12, <?php echo $totalN[11];?>], [13, <?php echo $totalN[12];?>]],
                ticks = [[1, "TT"], [2, "Masuk L"], [3, "Masuk P"], 
                    [4, "Keluar Hidup L"], [5, "Keluar Hidup P"], [6, "Keluar Mati L"], 
                    [7, "Keluar Mati P"], [8, "Mati<48 L"], [9, "Mati<48 P"], 
                    [10, "Mati>48 L"], [11, "Mati>48 P"], [12, "Lama Dirawat"],
                    [13, "Hari Perawatan"]],
                i, graph;
        // Draw Graph
        graph = Flotr.draw(container, [
            {data: d1, label: 'N-2'},
            {data: d2, label: 'N-1'},
            {data: d3, label: 'N'}
        ], {
            colors: ['#2C93E1', '#6B8E23', '#C71585', '#CD5C5C', '#9440ED'],
            grid: {
                verticalLines: false,
                backgroundColor: {
                    colors: [[0, '#ccc'], [1, '#ccc']],
                    start: 'top',
                    end: 'bottom'
                }
            },
            shadowSize: 0,
            title: "Tingkat Efektifitas Pengelolaan Ruimah Sakit: IRI Tahun <?php echo $yearName; ?>",
            parseFloat: false,
            xaxis: {
                title: "Tahun",
                min: 0,
                max: 13.5,
                ticks: ticks
            },
            yaxis: {
                title: "Jumlah Pasien",
                minorTickFreq: 20,
                min: 0,
                max: 100
            },
            mouse: {
                track: true,
                relative: true,
                trackDecimals: 0},
            grid : {
                verticalLines: true,
                backgroundColor: {
                    colors: [[0, '#fff'], [1, '#ccc']],
                    start: 'top',
                    end: 'bottom'
                }
            },
            legend: {
                position: 'nw'
            }
        });
    })(document.getElementById("my_graph"));
</script>