<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$i = 1;

$row = $data3_4->result();
$rs_count = $num_3_4;

$totalJumlah = array(0, 0, 0, 0, 0);
$totTdkTetap = array(0, 0, 0, 0, 0);
$totTetap = array(0, 0, 0, 0, 0);

$totAll = $totAllTetap = $totAllTdkTetap = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 24; $k < 29; $k++) {
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
                d1 = [[1, <?php echo $totalJumlah[24]; ?>], [2, <?php echo $totalJumlah[25]; ?>], [3, <?php echo $totalJumlah[26]; ?>], [4, <?php echo $totalJumlah[27]; ?>], [5, <?php echo $totalJumlah[28]; ?>]], // First data series
                d2 = [[1, <?php echo $totTetap[24]; ?>], [2, <?php echo $totTetap[25]; ?>], [3, <?php echo $totTetap[26]; ?>], [4, <?php echo $totTetap[27]; ?>], [5, <?php echo $totTetap[28]; ?>]],
                d3 = [[1, <?php echo $totTdkTetap[24]; ?>], [2, <?php echo $totTdkTetap[25]; ?>], [3, <?php echo $totTdkTetap[26]; ?>], [4, <?php echo $totTdkTetap[27]; ?>], [5, <?php echo $totTdkTetap[28]; ?>]],
                ticks = [[1, "1.Dr Spesialis Anestesiologi"], [2, "2.Dr Spesialis Radiologi"], [3, "3.Dr Spesialis Rehab Medik"], [4, "4.Dr Spesialis Patologi Klinik"], [5, "5.Dr Spesialis Patologi Anatomi"]],
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
                max: 5.5,
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