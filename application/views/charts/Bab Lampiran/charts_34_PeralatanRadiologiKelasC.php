<?php
$row = $data_lamp_f->result();
$rs_count = $num_lamp_f;

$total = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
    0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
    0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
    0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
    0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    for ($k = 0; $k < 93; $k++) {
        $total[$k] += $row[$track]->PERALATAN_RADIOLOGI_RS_JUMLAH;
        $track++;
    }
}
if ($tipe == 1) {
?>
<script>
    (function basic_pie(container) {

        var
                d1 = [[0, <?php echo $total[35]; ?>]],
                d2 = [[0, <?php echo $total[36]; ?>]],
                d3 = [[0, <?php echo $total[37]; ?>]],
                d4 = [[0, <?php echo $total[38]; ?>]],
                d5 = [[0, <?php echo $total[39]; ?>]],
                d6 = [[0, <?php echo $total[40]; ?>]],
                d7 = [[0, <?php echo $total[41]; ?>]],
                d8 = [[0, <?php echo $total[42]; ?>]],
                d9 = [[0, <?php echo $total[43]; ?>]],
                d10 = [[0, <?php echo $total[44]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'USG = <?php echo $total[35]; ?>'},
            {data: d2, label: 'Analog X-Ray = <?php echo $total[36]; ?>'},
            {data: d3, label: 'Mobile X-Rae = <?php echo $total[37]; ?>'},
            {data: d4, label: 'Dental X-Ray = <?php echo $total[38]; ?>'},
            {data: d5, label: 'Protektif Radiasi = <?php echo $total[39]; ?>'},
            {data: d6, label: 'Perlengkapan Proteksi Radiasi = <?php echo $total[40]; ?>'},
            {data: d7, label: 'QA QC Radiofotography = <?php echo $total[41]; ?>',
                pie: {
                    explode: 50
                }
            },
            {data: d8, label: 'Emergency Kit = <?php echo $total[42]; ?>'},
            {data: d9, label: 'Peralatan Kamar Gelap = <?php echo $total[43]; ?>'},
            {data: d10, label: 'Viewing Box = <?php echo $total[44]; ?>'}
        ], {
            HtmlText: false,
            title: "Jumlah Unit Peralatan Radiologi Kelas C",
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
<?php } else if ($tipe == 1) { ?>
    <p>Cannot Shown as Bar Chart</p>
<?php } ?>
