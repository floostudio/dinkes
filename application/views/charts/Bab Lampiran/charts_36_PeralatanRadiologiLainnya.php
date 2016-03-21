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
                d1 = [[0, <?php echo $total[52]; ?>]],
                d2 = [[0, <?php echo $total[53]; ?>]],
                d3 = [[0, <?php echo $total[54]; ?>]],
                d4 = [[0, <?php echo $total[55]; ?>]],
                d5 = [[0, <?php echo $total[56]; ?>]],
                d6 = [[0, <?php echo $total[57]; ?>]],
                d7 = [[0, <?php echo $total[58]; ?>]],
                d8 = [[0, <?php echo $total[59]; ?>]],
                d9 = [[0, <?php echo $total[60]; ?>]],
                d10 = [[0, <?php echo $total[61]; ?>]],
                d11 = [[0, <?php echo $total[62]; ?>]],
                d12 = [[0, <?php echo $total[63]; ?>]],
                d13 = [[0, <?php echo $total[64]; ?>]],
                d14 = [[0, <?php echo $total[65]; ?>]],
                d15 = [[0, <?php echo $total[66]; ?>]],
                d16 = [[0, <?php echo $total[67]; ?>]],
                d17 = [[0, <?php echo $total[68]; ?>]],
                d18 = [[0, <?php echo $total[69]; ?>]],
                d19 = [[0, <?php echo $total[70]; ?>]],
                d20 = [[0, <?php echo $total[71]; ?>]],
                d21 = [[0, <?php echo $total[72]; ?>]],
                d22 = [[0, <?php echo $total[73]; ?>]],
                d23 = [[0, <?php echo $total[74]; ?>]],
                d24 = [[0, <?php echo $total[75]; ?>]],
                d25 = [[0, <?php echo $total[76]; ?>]],
                d26 = [[0, <?php echo $total[77]; ?>]],
                d27 = [[0, <?php echo $total[78]; ?>]],
                d28 = [[0, <?php echo $total[79]; ?>]],
                d29 = [[0, <?php echo $total[80]; ?>]],
                d30 = [[0, <?php echo $total[81]; ?>]],
                d31 = [[0, <?php echo $total[82]; ?>]],
                d32 = [[0, <?php echo $total[83]; ?>]],
                d33 = [[0, <?php echo $total[84]; ?>]],
                d34 = [[0, <?php echo $total[85]; ?>]],
                d35 = [[0, <?php echo $total[86]; ?>]],
                d36 = [[0, <?php echo $total[87]; ?>]],
                d37 = [[0, <?php echo $total[88]; ?>]],
                d38 = [[0, <?php echo $total[89]; ?>]],
                d39 = [[0, <?php echo $total[90]; ?>]],
                d40 = [[0, <?php echo $total[91]; ?>]],
                d41 = [[0, <?php echo $total[92]; ?>]],
                d42 = [[0, <?php echo $total[93]; ?>]],
                graph;

        graph = Flotr.draw(container, [
            {data: d1, label: 'MGT'},
            {data: d2, label: 'Phoenix'},
            {data: d3, label: 'Bactec'},
            {data: d4, label: 'Dimention RL'},
            {data: d5, label: 'Advia Centaur'},
            {data: d6, label: 'Rubi'},
            {data: d7, label: 'CS2100',
                pie: {
                    explode: 50
                }
            },
            {data: d8, label: 'CA1500'},
            {data: d9, label: 'Sysmex2100'},
            {data: d10, label: 'HPLC'},
            {data: d11, label: 'Electropheresis Sebia'},
            {data: d12, label: 'Mini Capilarie Electropheresis Sebia'},
            {data: d13, label: 'USG-DC7'},
            {data: d14, label: 'CT Scan Somatom Emotion 16'},
            {data: d15, label: 'Digital Radiografi'},
            {data: d16, label: 'Digital Radiografi & Fuoroskopi'},
            {data: d17, label: 'Computer Radiografi'},
            {data: d18, label: 'Linac V 2100C'},
            {data: d19, label: 'Linac V 600C/D'},
            {data: d20, label: 'Cobalt-60 Shiva FCC 8000F'},
            {data: d21, label: 'HDR GammaMed iXPlus 3D'},
            {data: d22, label: 'Simulator Simulix-Hp'},
            {data: d23, label: 'Simulator Simscan Mecaserto'},
            {data: d24, label: 'RTPS Eclipse 3D IMIX'},
            {data: d25, label: 'RTPS ISIS 3D'},
            {data: d26, label: 'RTPD ISIS 2D'},
            {data: d27, label: 'Mouldign Manual Negastoscope'},
            {data: d28, label: 'Mouldign Hek Autimo 2D'},
            {data: d29, label: 'Mesin Pemanas Masker'},
            {data: d30, label: 'Absolute Dosimeter PTW'},
            {data: d31, label: 'Relative Dosimeter In-Vivo'},
            {data: d32, label: 'Digital Personal Dosimeter'},
            {data: d33, label: 'Survey meter Baby Line 81'},
            {data: d34, label: 'Survey Meter RGD STEP'},
            {data: d35, label: 'RFA (Radiation Field Analyzer)'},
            {data: d36, label: 'Waterphantom'},
            {data: d37, label: 'Wheelhofer'},
            {data: d38, label: 'Tissue Processort'},
            {data: d39, label: 'Auto Stainner'},
            {data: d40, label: 'Cryo Cut'},
            {data: d41, label: 'Miscorscope 5 headed'},
            {data: d42, label: 'Tissue Embadding System'}
            
        ], {
            HtmlText: false,
            title: "Jumlah Unit Peralatan Radiologi Lainnya",
            parseFloat: false,
            grid: {
                verticalLines: true,
                horizontalLines: true
            },
            xaxis: {showLabels: false},
            yaxis: {showLabels: false},
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
<?php } else if ($tipe == 2) { ?>
    <p>Cannot Shown as Bar Chart</p>
<?php } ?>
