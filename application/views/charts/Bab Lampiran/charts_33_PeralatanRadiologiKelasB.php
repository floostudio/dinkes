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
                d1 = [[0, <?php echo $total[19]; ?>]],
                d2 = [[0, <?php echo $total[20]; ?>]],
                d3 = [[0, <?php echo $total[21]; ?>]],
                d4 = [[0, <?php echo $total[22]; ?>]],
                d5 = [[0, <?php echo $total[23]; ?>]],
                d6 = [[0, <?php echo $total[24]; ?>]],
                d7 = [[0, <?php echo $total[25]; ?>]],
                d8 = [[0, <?php echo $total[26]; ?>]],
                d9 = [[0, <?php echo $total[27]; ?>]],
                d10 = [[0, <?php echo $total[28]; ?>]],
                d11 = [[0, <?php echo $total[29]; ?>]],
                d12 = [[0, <?php echo $total[30]; ?>]],
                d13 = [[0, <?php echo $total[31]; ?>]],
                d14 = [[0, <?php echo $total[32]; ?>]],
                d15 = [[0, <?php echo $total[33]; ?>]],
                d16 = [[0, <?php echo $total[34]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'CT Multislice = <?php echo $total[19]; ?>'},
            {data: d2, label: 'Fluoroskopi = <?php echo $total[20]; ?>'},
            {data: d3, label: 'USG = <?php echo $total[21]; ?>'},
            {data: d4, label: 'Analog X-Ray = <?php echo $total[22]; ?>'},
            {data: d5, label: 'Mobile X-Ray = <?php echo $total[23]; ?>'},
            {data: d6, label: 'Mammography = <?php echo $total[24]; ?>'},
            {data: d7, label: 'C-ARM = <?php echo $total[25]; ?>',
                pie: {
                    explode: 50
                }
            },
            {data: d8, label: 'Panoramic/Cephalometri = <?php echo $total[26]; ?>'},
            {data: d9, label: 'Dental X-Ray = <?php echo $total[27]; ?>'},
            {data: d10, label: 'Protektif Radiasi = <?php echo $total[28]; ?>'},
            {data: d11, label: 'Perlengkapan Proteksi Radiasi = <?php echo $total[29]; ?>'},
            {data: d12, label: 'Peralatan QA QC = <?php echo $total[30]; ?>'},
            {data: d13, label: 'Emergency Kit = <?php echo $total[31]; ?>'},
            {data: d14, label: 'Peralatan Kamar Gelap = <?php echo $total[32]; ?>'},
            {data: d15, label: 'Peralatan Pelindung Diri = <?php echo $total[33]; ?>'},
            {data: d16, label: 'Peralatan Viewing Box = <?php echo $total[34]; ?>'}
        ], {
            HtmlText: false,
            title: "Jumlah Unit Peralatan Radiologi Kelas B",
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
