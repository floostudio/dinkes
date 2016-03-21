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
    for ($k = 29; $k < 43; $k++) {
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
                d1 = [[1, <?php echo $totalJumlah[29]; ?>], [2, <?php echo $totalJumlah[30]; ?>], [3, <?php echo $totalJumlah[31]; ?>],
                    [1, <?php echo $totalJumlah[32]; ?>], [2, <?php echo $totalJumlah[33]; ?>], [3, <?php echo $totalJumlah[34]; ?>],
                    [1, <?php echo $totalJumlah[35]; ?>], [2, <?php echo $totalJumlah[36]; ?>], [3, <?php echo $totalJumlah[37]; ?>],
                    [1, <?php echo $totalJumlah[38]; ?>], [2, <?php echo $totalJumlah[39]; ?>], [3, <?php echo $totalJumlah[40]; ?>],
                    [1, <?php echo $totalJumlah[41]; ?>], [2, <?php echo $totalJumlah[42]; ?>]], // First data series
                d2 = [[1, <?php echo $totTetap[29]; ?>], [2, <?php echo $totTetap[30]; ?>], [3, <?php echo $totTetap[31]; ?>],
                    [1, <?php echo $totTetap[32]; ?>], [2, <?php echo $totTetap[33]; ?>], [3, <?php echo $totTetap[34]; ?>],
                    [1, <?php echo $totTetap[35]; ?>], [2, <?php echo $totTetap[36]; ?>], [3, <?php echo $totTetap[37]; ?>],
                    [1, <?php echo $totTetap[38]; ?>], [2, <?php echo $totTetap[39]; ?>], [3, <?php echo $totTetap[40]; ?>],
                    [1, <?php echo $totTetap[41]; ?>], [2, <?php echo $totTetap[42]; ?>]],
                d3 = [[1, <?php echo $totTdkTetap[29]; ?>], [2, <?php echo $totTdkTetap[30]; ?>], [3, <?php echo $totTdkTetap[31]; ?>],
                    [1, <?php echo $totTdkTetap[32]; ?>], [2, <?php echo $totTdkTetap[33]; ?>], [3, <?php echo $totTdkTetap[34]; ?>],
                    [1, <?php echo $totTdkTetap[35]; ?>], [2, <?php echo $totTdkTetap[36]; ?>], [3, <?php echo $totTdkTetap[37]; ?>],
                    [1, <?php echo $totTdkTetap[38]; ?>], [2, <?php echo $totTdkTetap[39]; ?>], [3, <?php echo $totTdkTetap[40]; ?>],
                    [1, <?php echo $totTdkTetap[41]; ?>], [2, <?php echo $totTdkTetap[42]; ?>]]
        ,
                ticks = [[1, "1.Dr Mata"], [2, "2.Dr THT"], [3, "3.Dr Syaraf"], [4, "4.Dr Jantung"],
                        [5, "4.a.Intervefensi"], [6, "4.b.Rehab"], [7, "5.Kulit Kel"], [8, "6.Jiwa"],
                        [9, "7.Paru"], [10, "8.Orthopedik"], [11, "9.Urologi"], [12, "10.Bdh Syaraf"],
                        [13, "11.Bdh Plastik"], [14, "12.Forensik"]],
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
                                max: 14.5,
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