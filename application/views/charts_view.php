<?php include 'head.php'; ?> 

<section id="container" class="container_12">


    <!-- ======= .grid_12 - block begin ======= -->
    <section class="grid_12">
        <div class="box">
            <div class="title"><span class="icon16_sprite i_network_monitor"></span>Grafik</div>

            <div class="inside">
                <div class="in">

                    <div id="grafik" style="width: 100%; height: 550px;"></div>

                </div>
            </div>

        </div>
    </section>

    <section class="grid_12">
        <div class="box"> 
            <div class="title"><span class="icon16_sprite i_network_monitor"></span>Ganti Mode Grafik</div>
            <div class="inside">
                <div class="formee"  action="#" >
                    <div class="in" >
                        <div class="grid-3-12"><label>Tipe Grafik</label></div>

                        <div class="grid-9-12">
                            <div class="grid-2-12" > <input type="radio" name="bar" value="line">Lines   </div>
                            <div class="grid-2-12" > <input type="radio" name="bar" value="bar">Bar </div>
                            <div class="grid-2-12"> <input type="radio" name="bar" value="pie_chart">Pie Chart </div>
                            <input type="submit" class="right button green" value="Ubah Grafik" />
                        </div>
                    </div>
                </div>   
            </div>
        </div> 

    </section>
    <!-- ======= .grid_12 - block end ======= -->

    <section class="grid_12">
        <div class="box"> 
            <div class="title"><span class="icon16_sprite i_network_monitor"></span>Grafik Lain di Bab ini</div>
            <div class="inside">
                <div class="formee"  >
                    <div class="in" >
                        <div class="grid-3-12"><label>Pilih Grafik</label></div>

                        <div class="grid-9-12">
                            <div class="grid-6-12">
                                <select >
                                    <option value="bab2">Pilih Grafik...</option>
                                    <option value="bab2">Grafik 1</option>
                                    <option value="bab3">Grafik 2</option>
                                    <option value="bab4">Grafik 3</option>
                                    <option value="bab5">Grafik 4</option>
                                    <option value="bab6">Grafik 5</option>
                                </select>

                            </div>
                            <input type="submit" class="right button green" value="Tampilkan" />
                        </div>
                    </div>
                </div>   
            </div>
        </div> 

    </section>

    <div class="clear"></div>

</section>

<?php

if ($tipe != null)
    $data = $tipe;
else {
    $data = 3;
}

if ($data == 1) {
    include 'charts/chart1.php';
} else if ($data == 2) {
    include 'charts/chart2.php';
} else {
    include 'charts/chart3.php';
}

include 'footer.php';
?>