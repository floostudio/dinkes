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
                d1 = [[0, <?php echo $total[45]; ?>]],
                d2 = [[0, <?php echo $total[46]; ?>]],
                d3 = [[0, <?php echo $total[47]; ?>]],
                d4 = [[0, <?php echo $total[48]; ?>]],
                d5 = [[0, <?php echo $total[49]; ?>]],
                d6 = [[0, <?php echo $total[50]; ?>]],
                d7 = [[0, <?php echo $total[52]; ?>]],
                d8 = [[0, <?php echo $total[52]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'USG = <?php echo $total[45]; ?>'},
            {data: d2, label: 'Analog X-Ray = <?php echo $total[46]; ?>'},
            {data: d3, label: 'Protektif Radiasi = <?php echo $total[47]; ?>'},
            {data: d4, label: 'Perlengkapan Proteksi Radiasi = <?php echo $total[48]; ?>'},
            {data: d5, label: 'QA QC Radiofotography = <?php echo $total[49]; ?>'},
            {data: d6, label: 'Emergency Kit = <?php echo $total[50]; ?>'},
            {data: d7, label: 'Peralatan Kamar Gelap = <?php echo $total[51]; ?>',
                pie: {
                    explode: 50
                }
            },
            {data: d8, label: 'Viewing Box = <?php echo $total[52]; ?>'}
        ], {
            HtmlText: false,
            title: "Jumlah Unit Peralatan Radiologi Kelas D",
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
