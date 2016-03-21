<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$i = 1;

$row = $data3_4->result();
$rs_count = $num_3_4;

$totalJumlah = array(0, 0);
$totTdkTetap = array(0, 0);
$totTetap = array(0, 0);

$totAll = $totAllTetap = $totAllTdkTetap = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 50; $k < 69; $k++) {
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
                d1 = [[1, <?php echo $totalJumlah[50]; ?>], [2, <?php echo $totalJumlah[51]; ?>],
                    [3, <?php echo $totalJumlah[52]; ?>], [4, <?php echo $totalJumlah[53]; ?>],
                    [5, <?php echo $totalJumlah[54]; ?>], [6, <?php echo $totalJumlah[55]; ?>],
                    [7, <?php echo $totalJumlah[56]; ?>], [8, <?php echo $totalJumlah[57]; ?>],
                    [9, <?php echo $totalJumlah[58]; ?>], [10, <?php echo $totalJumlah[59]; ?>],
                    [11, <?php echo $totalJumlah[60]; ?>], [12, <?php echo $totalJumlah[61]; ?>],
                    [13, <?php echo $totalJumlah[62]; ?>], [14, <?php echo $totalJumlah[63]; ?>],
                    [15, <?php echo $totalJumlah[64]; ?>], [16, <?php echo $totalJumlah[65]; ?>],
                    [17, <?php echo $totalJumlah[66]; ?>], [18, <?php echo $totalJumlah[67]; ?>],
                    [19, <?php echo $totalJumlah[68]; ?>]], // First data series
                d2 = [[1, <?php echo $totTetap[50]; ?>], [2, <?php echo $totTetap[51]; ?>],
                    [3, <?php echo $totTetap[52]; ?>], [4, <?php echo $totTetap[53]; ?>],
                    [5, <?php echo $totTetap[54]; ?>], [6, <?php echo $totTetap[55]; ?>],
                    [7, <?php echo $totTetap[56]; ?>], [8, <?php echo $totTetap[57]; ?>],
                    [9, <?php echo $totTetap[58]; ?>], [10, <?php echo $totTetap[59]; ?>],
                    [11, <?php echo $totTetap[60]; ?>], [12, <?php echo $totTetap[61]; ?>],
                    [13, <?php echo $totTetap[62]; ?>], [14, <?php echo $totTetap[63]; ?>],
                    [15, <?php echo $totTetap[64]; ?>], [16, <?php echo $totTetap[65]; ?>],
                    [17, <?php echo $totTetap[66]; ?>], [18, <?php echo $totTetap[67]; ?>],
                    [19, <?php echo $totTetap[68]; ?>]],
                d3 = [[1, <?php echo $totTdkTetap[50]; ?>], [2, <?php echo $totTdkTetap[51]; ?>],
                    [3, <?php echo $totTdkTetap[52]; ?>], [4, <?php echo $totTdkTetap[53]; ?>],
                    [5, <?php echo $totTdkTetap[54]; ?>], [6, <?php echo $totTdkTetap[55]; ?>],
                    [7, <?php echo $totTdkTetap[56]; ?>], [8, <?php echo $totTdkTetap[57]; ?>],
                    [9, <?php echo $totTdkTetap[58]; ?>], [10, <?php echo $totTdkTetap[59]; ?>],
                    [11, <?php echo $totTdkTetap[60]; ?>], [12, <?php echo $totTdkTetap[61]; ?>],
                    [13, <?php echo $totTdkTetap[62]; ?>], [14, <?php echo $totTdkTetap[63]; ?>],
                    [15, <?php echo $totTdkTetap[64]; ?>], [16, <?php echo $totTdkTetap[65]; ?>],
                    [17, <?php echo $totTdkTetap[66]; ?>], [18, <?php echo $totTdkTetap[67]; ?>],
                    [19, <?php echo $totTdkTetap[68]; ?>]],
                ticks = [[1, "1.SPK"], [2, "1.a"],
                    [3, "1.b"], [4, "1.c"],
                    [5, "1.d"], [6, "2.D3Bidan"],
                    [7, "2.a"], [8, "2.b"],
                    [9, "3.D1Gizi"], [10, "3.a"],
                    [11, "3.b"], [12, "4.D3Anestesi"],
                    [13, "5.D3Rekam Medik"], [14, "6.D3TL"],
                    [15, "7.D3T.Medik"], [16, "8.D3Farmasi"],
                    [17, "9.D3 Analis Kes"], [18, "10.D3Radiologi"],
                    [19, "11.D3Fisioterapi"]],
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
            title: "Gambaran Ketenagaan RS: Tenaga Medik Dasar  Tahun <?php echo $yearName; ?>",
            parseFloat: false,
            xaxis: {
                title: "Jenis Ketenagaan",
                min: 0,
                max: 19.5,
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