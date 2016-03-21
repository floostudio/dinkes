<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<?php
$i = 1;

$row = $data2_21_1->result();
$rs_count = $num_2_21_1;

$nilaiMax = 0;

$totalNilai = $total = array(0, 0, 0);

/* $totalLN2 = $totalPN2 = $totalTotN2 = 0;
  $totalLN1 = $totalPN1 = $totalTotN1 = 0;
  $totalLN = $totalPN = $totalTotN = 0; */

$totalAll = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $totalNilai[0] += $row[$track]->KIGD_PASIEN_L_N2;
    $totalNilai[1] += $row[$track]->KIGD_PASIEN_P_N2;
    $totalNilai[2] += $row[$track]->KIGD_PASIEN_TOTAL_N2;

    $track++;
}
$max = 10;
$monothick = 0;
$nilaiMax = max($totalNilai);
$i = 0;

while($nilaiMax>10){
    $nilaiMax  = $nilaiMax/10;
    $i++;
}

for($j=0; $j<$i; $j++){
    $max = $max*10;
}

$monothick = $max/5;

echo $totalNilai[0].' '.$totalNilai[1].' '.$totalNilai[2].'<br/>';
//echo 'Mono thick '.$monothick.' '.$max;

?>
<script>
    (function basic_bars(container, horizontal) {

        var
                d1 = [[1, <?php echo $totalNilai[0]; ?>], [2, <?php echo $totalNilai[1]; ?>], [3, <?php echo $totalNilai[2]; ?>]], // First data series                
                ticks = [[1, "Laki-Laki"], [2, "Perempuan"], [3, "Total"]],
		markers = {data: d1},
                i, graph;
        // Draw Graph
        graph = Flotr.draw(container, [
            {data: d1}
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
            title: "Tingkat Efektifitas Pengelolaan Ruimah Sakit: IGD Tahun <?php echo $yearName; ?>",
            parseFloat: false,
            bars: {
                show: true,
                horizontal: horizontal,
                shadowSize: 0,
                barWidth: 0.75
            },
	    markers: {
                show: true,
                position: 'ct'
            },
            xaxis: {
                title: "Tahun",
                min: 0,
                max: 4,
                ticks: ticks
            },
            yaxis: {
                title: "Jumlah Pasien",
                minorTickFreq: <?php echo $monothick; ?>,
                min: 0,
                max: <?php echo $max; ?>
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