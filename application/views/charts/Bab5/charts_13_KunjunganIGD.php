<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$row = $data_51_1->result();

$rs_count = $num_51_1;

$t1 = $t2 = $t3 = $t4 = $t5 = $t6 = $t7 = $t8 = $t9 = $t10 = 0;
$t11 = $t12 = $t13 = $t14 = $t15 = $t16 = $t17 = $t18 = $t19 = $t20 = 0;
$t21 = $t22 = $t23 = $t24 = $t25 = $t26 = $t27 = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $t1+= $row[$track]->TJK_UMUM;
    $t2+= $row[$track + 1]->TJK_UMUM;
    $t3+= $row[$track + 2]->TJK_UMUM;

    $t4+= $row[$track]->TJK_ASKES;
    $t5+= $row[$track + 1]->TJK_ASKES;
    $t6+= $row[$track + 2]->TJK_ASKES;

    $t7+= $row[$track]->TJK_ASURANSI_LAIN;
    $t8+= $row[$track + 1]->TJK_ASURANSI_LAIN;
    $t9+= $row[$track + 2]->TJK_ASURANSI_LAIN;

    $t10+= $row[$track]->TJK_JAMKESMAS;
    $t11+= $row[$track + 1]->TJK_JAMKESMAS;
    $t12+= $row[$track + 2]->TJK_JAMKESMAS;


    $t13+= $row[$track]->TJK_JAMKESDA;
    $t14+= $row[$track + 1]->TJK_JAMKESDA;
    $t15+= $row[$track + 2]->TJK_JAMKESDA;

    $t16+= $row[$track]->TJK_JAMSOSTEK;
    $t17+= $row[$track + 1]->TJK_JAMSOSTEK;
    $t18+= $row[$track + 2]->TJK_JAMSOSTEK;

    $t19+= $row[$track]->TJK_SPM;
    $t20+= $row[$track + 1]->TJK_SPM;
    $t21+= $row[$track + 2]->TJK_SPM;

    $t22+= $row[$track]->TJK_LAIN;
    $t23+= $row[$track + 1]->TJK_LAIN;
    $t24+= $row[$track + 2]->TJK_LAIN;

    $track+=3;
}
?>
<script>
    (function basic(container) {

        var
                d1 = [[1, <?php echo $t1; ?>], [2, <?php echo $t4; ?>],
                    [3, <?php echo $t7; ?>], [4, <?php echo $t10; ?>],
                    [5, <?php echo $t13; ?>], [6, <?php echo $t16; ?>],
                    [7, <?php echo $t19; ?>], [8, <?php echo $t22; ?>]], // First data series
                d2 = [[1, <?php echo $t2; ?>], [2, <?php echo $t5; ?>],
                    [3, <?php echo $t8; ?>], [4, <?php echo $t11; ?>],
                    [5, <?php echo $t14; ?>], [6, <?php echo $t17; ?>],
                    [7, <?php echo $t20; ?>], [8, <?php echo $t23; ?>]],
                d3 = [[1, <?php echo $t3; ?>], [2, <?php echo $t6; ?>],
                    [3, <?php echo $t9; ?>], [4, <?php echo $t12; ?>],
                    [5, <?php echo $t15; ?>], [6, <?php echo $t18; ?>],
                    [7, <?php echo $t21; ?>], [8, <?php echo $t24; ?>]],
                ticks = [[1, "1.Umum"], [2, "2.Askes"],
                    [3, "3.Asuransi Lainnya"], [4, "4.Jamkesmas"],
                    [5, "5.Jamkesda"], [6, "6.Jamsostek"],
                    [7, "7.SPM"], [8, "8.Lain-Lain"]],
                i, graph;
        // Draw Graph
        graph = Flotr.draw(container, [
            {data: d1, label: 'N-2'},
            {data: d2, label: 'N-1'},
            {data: d3, label: 'N'}
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
            title: "Trend Jumlah Kunjungan IGD Tahun <?php echo $yearName; ?>",
            parseFloat: false,
            xaxis: {
                title: "Tahun",
                min: 0,
                max: 8.5,
                ticks: ticks
            },
            yaxis: {
                title: "Jumlah Pasien",
                minorTickFreq: 2000,
                min: 0,
                max: 10000
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