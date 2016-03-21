<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$i = 1;

$row = $data_2_21_2->result();
$rs_count = $num_2_21_2;

$totalLN2 = $totalPN2 = $totalTotN2 = 0;
$totalLN1 = $totalPN1 = $totalTotN1 = 0;
$totalLN = $totalPN = $totalTotN = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $totalLN2 += $row[$track]->irj_pasien_l_n2;
    $totalLN1 += $row[$track]->irj_pasien_l_n1;
    $totalLN += $row[$track]->irj_pasien_l_n;

    $totalPN2 += $row[$track]->irj_pasien_p_n2;
    $totalPN1 += $row[$track]->irj_pasien_p_n1;
    $totalPN += $row[$track]->irj_pasien_p_n;

    $totalTotN2 += $row[$track]->irj_pasien_total_n2;
    $totalTotN1 += $row[$track]->irj_pasien_total_n1;
    $totalTotN += $row[$track]->irj_pasien_total_n;

    $track++;
}
?>
<script>
    (function basic(container) {

        var
                d1 = [[1, <?php echo $totalLN; ?>], [2, <?php echo $totalLN1; ?>], [3, <?php echo $totalLN2; ?>]], // First data series
                d2 = [[1, <?php echo $totalPN; ?>], [2, <?php echo $totalPN1; ?>], [3, <?php echo $totalPN2; ?>]],
                d3 = [[1, <?php echo $totalTotN; ?>], [2, <?php echo $totalTotN1; ?>], [3, <?php echo $totalTotN2; ?>]],
                ticks = [[1, "N"], [2, "N-1"], [3, "N-2"]],
                i, graph;
        // Draw Graph
        graph = Flotr.draw(container, [
            {data: d1, label: 'Instalasi Rawat Jalan: Laki-Laki'},
            {data: d2, label: 'Instalasi Rawat Jalan: Perempuan'},
            {data: d3, label: 'Instalasi Rawat Jalan: Total (L+P)'}
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
            title: "Tingkat Efektifitas Pengelolaan Ruimah Sakit: IRJ Tahun <?php echo $yearName; ?>",
            parseFloat: false,
            xaxis: {
                title: "Tahun",
                min: 1,
                max: 3.2,
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