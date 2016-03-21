<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$i = 1;

$row = $data3_4->result();
$rs_count = $num_3_4;

$totalJumlah = array(0, 0, 0, 0);
$totTdkTetap = array(0, 0, 0, 0);
$totTetap = array(0, 0, 0, 0);

$totAll = $totAllTetap = $totAllTdkTetap = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 2; $k < 23; $k++) {
        $totalJumlah[$k] += $row[$track]->KETENAGAAN_JUMLAH;
        $totTetap[$k] += $row[$track]->KETENAGAAN_TETAP;
        $totTdkTetap[$k] += $row[$track]->KETENAGAAN_KONTRAK;

        $track++;
    }
}
?>
<script>
    (function basic(container) {

        var
                d1 = [[1, <?php echo $totalJumlah[2]; ?>], [2, <?php echo $totalJumlah[3]; ?>], [3, <?php echo $totalJumlah[4]; ?>],
                    [4, <?php echo $totalJumlah[5]; ?>], [5, <?php echo $totalJumlah[6]; ?>], [6, <?php echo $totalJumlah[7]; ?>],
                    [7, <?php echo $totalJumlah[8]; ?>], [8, <?php echo $totalJumlah[9]; ?>], [9, <?php echo $totalJumlah[10]; ?>],
                    [10, <?php echo $totalJumlah[11]; ?>], [11, <?php echo $totalJumlah[12]; ?>], [12, <?php echo $totalJumlah[13]; ?>],
                    [13, <?php echo $totalJumlah[14]; ?>], [14, <?php echo $totalJumlah[15]; ?>], [15, <?php echo $totalJumlah[16]; ?>],
                    [16, <?php echo $totalJumlah[17]; ?>], [17, <?php echo $totalJumlah[18]; ?>], [18, <?php echo $totalJumlah[19]; ?>],
                    [19, <?php echo $totalJumlah[20]; ?>], [20, <?php echo $totalJumlah[21]; ?>], [21, <?php echo $totalJumlah[22]; ?>]], // First data series
                d2 = [[1, <?php echo $totTetap[2]; ?>], [2, <?php echo $totTetap[3]; ?>], [3, <?php echo $totTetap[4]; ?>],
                    [4, <?php echo $totTetap[5]; ?>], [5, <?php echo $totTetap[6]; ?>], [6, <?php echo $totTetap[7]; ?>],
                    [7, <?php echo $totTetap[8]; ?>], [8, <?php echo $totTetap[9]; ?>], [9, <?php echo $totTetap[10]; ?>],
                    [10, <?php echo $totTetap[11]; ?>], [11, <?php echo $totTetap[12]; ?>], [12, <?php echo $totTetap[13]; ?>],
                    [13, <?php echo $totTetap[14]; ?>], [14, <?php echo $totTetap[15]; ?>], [15, <?php echo $totTetap[16]; ?>],
                    [16, <?php echo $totTetap[17]; ?>], [17, <?php echo $totTetap[18]; ?>], [18, <?php echo $totTetap[19]; ?>],
                    [19, <?php echo $totTetap[20]; ?>], [20, <?php echo $totTetap[21]; ?>], [21, <?php echo $totTetap[22]; ?>]], 
                d3 = [[1, <?php echo $totTdkTetap[2]; ?>], [2, <?php echo $totTdkTetap[3]; ?>], [3, <?php echo $totTdkTetap[4]; ?>],
                    [4, <?php echo $totTdkTetap[5]; ?>], [5, <?php echo $totTdkTetap[6]; ?>], [6, <?php echo $totTdkTetap[7]; ?>],
                    [7, <?php echo $totTdkTetap[8]; ?>], [8, <?php echo $totTdkTetap[9]; ?>], [9, <?php echo $totTdkTetap[10]; ?>],
                    [10, <?php echo $totTdkTetap[11]; ?>], [11, <?php echo $totTdkTetap[12]; ?>], [12, <?php echo $totTdkTetap[13]; ?>],
                    [13, <?php echo $totTdkTetap[14]; ?>], [14, <?php echo $totTdkTetap[15]; ?>], [15, <?php echo $totTdkTetap[16]; ?>],
                    [16, <?php echo $totTdkTetap[17]; ?>], [17, <?php echo $totTdkTetap[18]; ?>], [18, <?php echo $totTdkTetap[19]; ?>],
                    [19, <?php echo $totTdkTetap[20]; ?>], [20, <?php echo $totTdkTetap[21]; ?>], [21, <?php echo $totTdkTetap[22]; ?>]], 
                ticks = [[1, "1.Dr Spesialis Bedah"], [2, "1.a"], [3, "1.b"], [4, "2.Dr Spesialis Peny.Dalam"], [5, "2.a"], [6, "2.b"],
                    [7, "2.c"], [8, "2.d"], [9, "2.e"], [10, "2.f"], [11, "2.g"], [12, "2.h"],
                    [13, "3.Dr Spesialis Anak"], [14, "3.a"], [15, "3.b"], [16, "3.c"], [17, "3.d"],
                    [18, "4.Dr Spesialis Obgyn"], [19, "4.a"], [20, "4.b"], [21, "4.c"]],
                i, graph;
        // Draw Graph
        graph = Flotr.draw(container, [
            {data: d1, label: 'Jumlah SDM'},
            {data: d2, label: 'Status Ketenagaan Tetap'},
            {data: d3, label: 'Status Ketenagaan Kontrak'}
        ], {
            colors: ['#2C93E1', '#6B8E23', '#C71585', '#CD5C5C', '#9440ED'],
            grid: {
                verticalLines: true,
                backgroundColor: {
                    colors: [[0, '#ccc'], [1, '#ccc']],
                    start: 'top',
                    end: 'bottom'
                }
            },
            shadowSize: 0,
            title: "Gambaran Ketenagaan RS: Tenaga Medik Spesialis Dasar Tahun <?php echo $yearName; ?>",
            parseFloat: false,
            xaxis: {
                title: "Jenis Ketenagaan",
                min: 0,
                max: 21.5,
                ticks: ticks
            },
            yaxis: {
                title: "Jumlah",
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