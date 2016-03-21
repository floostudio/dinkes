<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;    
}
?>
<?php
$i = 1;

$row = $data_kasus_tb_rj_jenis->result();

$rs_count = $num_kasus_tb_rj_jenis;

$totalN2 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$totalN1 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$totalN = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

$totalAll = 0;

$track = 0;
for ($j = 0; $j < $rs_count; $j++) {
    $ind = 0;
    for ($k = 0; $k < 10; $k++) {
        $totalN2[$ind] += $row[$track]->KASUS_TB_RJ_JENIS_N2;
        $totalN1[$ind] += $row[$track]->KASUS_TB_RJ_JENIS_N1;
        $totalN[$ind] += $row[$track]->KASUS_TB_RJ_JENIS_N;

        $ind++;
        $track++;
    }
}
?>
<script>
    (function basic(container) {

        var
                d1 = [[1, <?php echo $totalN2[0]; ?>], [2, <?php echo $totalN2[1]; ?>], [3, <?php echo $totalN2[2]; ?>], [4, <?php echo $totalN2[3]; ?>], [5, <?php echo $totalN2[4]; ?>], [6, <?php echo $totalN2[5]; ?>], [7, <?php echo $totalN2[6]; ?>], [8, <?php echo $totalN2[7]; ?>], [9, <?php echo $totalN2[8]; ?>], [10, <?php echo $totalN2[9]; ?>]], // First data series
                d2 = [[1, <?php echo $totalN1[0]; ?>], [2, <?php echo $totalN1[1]; ?>], [3, <?php echo $totalN1[2]; ?>], [4, <?php echo $totalN1[3]; ?>], [5, <?php echo $totalN1[4]; ?>], [6, <?php echo $totalN1[5]; ?>], [7, <?php echo $totalN1[6]; ?>], [8, <?php echo $totalN1[7]; ?>], [9, <?php echo $totalN1[8]; ?>], [10, <?php echo $totalN1[9]; ?>]],
                d3 = [[1, <?php echo $totalN[0]; ?>], [2, <?php echo $totalN[1]; ?>], [3, <?php echo $totalN[2]; ?>], [4, <?php echo $totalN[3]; ?>], [5, <?php echo $totalN[4]; ?>], [6, <?php echo $totalN[5]; ?>], [7, <?php echo $totalN[6]; ?>], [8, <?php echo $totalN[7]; ?>], [9, <?php echo $totalN[8]; ?>], [10, <?php echo $totalN[9]; ?>]],
                ticks = [[1, "TB Paru BTA"], [2, "TB Paru Lain"], [3, "TB Ekstra Paru"],
                    [4, "TB Alat Nafas Lain"], [5, "Meningitis TB"], [6, "Susunan Saraf Pst Lain"],
                    [7, "TB Tulang Sendi"], [8, "Limfa Dentis TB"], [9, "TB Miller"],
                    [10, "TB Lainnya"]],
		markers = {data: d1},
                i, graph;
        // Draw Graph
        graph = Flotr.draw(container, [
            {data: d1, label: 'N-2'},
            {data: d2, label: 'N-1'},
            {data: d3, label: 'N'}
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
            title: "Kasus TB Rawat Jalan Berdasarkan Jenisnya Tahun <?php echo $yearName; ?>",
            parseFloat: false,
	    markers: {
                show: true,
                position: 'ct'
            },
            xaxis: {
                title: "Tahun",
                min: 0,
                max: 11.5,
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