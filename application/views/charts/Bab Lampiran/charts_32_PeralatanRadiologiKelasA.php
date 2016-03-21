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
                    d1 = [[0, <?php echo $total[0]; ?>]],
                    d2 = [[0, <?php echo $total[1]; ?>]],
                    d3 = [[0, <?php echo $total[2]; ?>]],
                    d4 = [[0, <?php echo $total[3]; ?>]],
                    d5 = [[0, <?php echo $total[4]; ?>]],
                    d6 = [[0, <?php echo $total[5]; ?>]],
                    d7 = [[0, <?php echo $total[6]; ?>]],
                    d8 = [[0, <?php echo $total[7]; ?>]],
                    d9 = [[0, <?php echo $total[8]; ?>]],
                    d10 = [[0, <?php echo $total[9]; ?>]],
                    d11 = [[0, <?php echo $total[10]; ?>]],
                    d12 = [[0, <?php echo $total[11]; ?>]],
                    d13 = [[0, <?php echo $total[12]; ?>]],
                    d14 = [[0, <?php echo $total[13]; ?>]],
                    d15 = [[0, <?php echo $total[14]; ?>]],
                    d16 = [[0, <?php echo $total[15]; ?>]],
                    d17 = [[0, <?php echo $total[16]; ?>]],
                    d18 = [[0, <?php echo $total[17]; ?>]],
                    d19 = [[0, <?php echo $total[18]; ?>]],
                    graph;

            graph = Flotr.draw(container, [
                {data: d1, label: 'DSA = <?php echo $total[0]; ?>'},
                {data: d2, label: 'MRI = <?php echo $total[1]; ?>'},
                {data: d3, label: 'CT Multislice = <?php echo $total[2]; ?>'},
                {data: d4, label: 'Fluoroskopi = <?php echo $total[3]; ?>'},
                {data: d5, label: 'USG = <?php echo $total[4]; ?>'},
                {data: d6, label: 'Analog X-Ray = <?php echo $total[5]; ?>'},
                {data: d7, label: 'Mobile X-Ray = <?php echo $total[6]; ?>',
                    pie: {
                        explode: 50
                    }
                },
                {data: d8, label: 'Mammography = <?php echo $total[7]; ?>'},
                {data: d9, label: 'Panoramic/Cephalometri = <?php echo $total[8]; ?>'},
                {data: d10, label: 'Dental X-Ray = <?php echo $total[9]; ?>'},
                {data: d11, label: 'C-ARM = <?php echo $total[10]; ?>'},
                {data: d12, label: 'Computer Radiography = <?php echo $total[11]; ?>'},
                {data: d13, label: 'PACS = <?php echo $total[12]; ?>'},
                {data: d14, label: 'Protektif Radiasi = <?php echo $total[13]; ?>'},
                {data: d15, label: 'Perlengkapan Proteksi Radiasi = <?php echo $total[14]; ?>'},
                {data: d16, label: 'QA QC Radiofotography = <?php echo $total[15]; ?>'},
                {data: d17, label: 'Emergency Kit = <?php echo $total[16]; ?>'},
                {data: d18, label: 'Viewing Box = <?php echo $total[17]; ?>'},
                {data: d19, label: 'Generator Set = <?php echo $total[18]; ?>'}
            ], {
                HtmlText: false,
                title: "Jumlah Unit Peralatan Radiologi Kelas A",
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
