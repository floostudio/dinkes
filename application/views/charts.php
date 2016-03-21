<?php include 'head.php'; ?>

<section id="container" class="container_12">
    <section class="grid_12">        
        <div class="box">
            <div class="title">
                <span class="icon16_sprite i_3d"></span>
                Laporan Grafik
            </div>
            <div class="inside">
                <div class="in">                    
                    <form class="formee" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="">
                        <!-- ==========Standart Filter(Tahun)============ -->
                        <div class="grid-2-12"><label>Pilih Tahun</label></div>
                        <div class="grid-9-12" style="width: 300px;">
                            <select name="tahun" id="tahun" placeholder="Tahun Rekap" style="width: 295px;" required="require"/>  
                            <?php
                            echo '<option value="">--Select--</option>';
                            foreach ($tahun->result() as $row) {
                                $yearName = $row->TAHUN_TAHUN;
                                $yearId = $row->TAHUN_ID;

                                echo '<option value="' . $yearId . '">' . $yearName . '</option>';
                            }
                            ?>
                            </select>
                        </div><div class="clear"></div>                    
                        <!-- ==========Filter Rumah Sakit============ -->      
                        <div class="grid-2-12"><label>Pilih Rumah Sakit</label></div>
                        <div class="grid-9-12" style="width: 300px">
                            <select name="rs" id="rs" placeholder="rs" style="max-width:300px;" class="chzn-select" tabindex="5"/>  
                            <?php
                            echo '<option value="">Pilih Rumah Sakit...</option>';
                            foreach ($rumah_sakit->result() as $row) {
                                $rs_noreg = $row->RS_NOREG;
                                $rs_nama = $row->RS_NAMA;

                                echo '<option value="' . $rs_noreg . '">' . $rs_nama . '</option>';
                            }
                            //  echo '<option value="add">--Add Year--</option>';
                            ?>
                            </select>
                        </div> <div class="clear"></div>
                        <!-- ==========Standart Filter(BAB)============ -->                        
                        <div class="grid-2-12"><label>Pilih Bab</label></div>
                        <div class="grid-9-12" style="width: 300px;">
                            <select id="bab" name="bab" required="require">
                                <?php
                                echo '<option value="">Pilih Bab...</option>';
                                foreach ($bab->result() as $row) {
                                    $babName = $row->bab_name;
                                    $babId = $row->bab_id;

                                    echo '<option value="' . $babId . '">' . $babName . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- ==========Standart Filter(Kolom)============ -->   
                        <div class="grid-2-12"><label>Pilih Kolom</label></div>
                        <div class="grid-9-12" style="width: 300px;">
                            <select id="kolom" style="width: 300px" name="kolom" required="require">

                            </select>
                        </div>                                                
                        <div class="clear"></div>

                        <!-- ==========Filter Tipe============ -->      
                        <div class="grid-2-12"><label>Pilih Tipe Tabel</label></div>
                        <div class="grid-9-12" style="width: 300px">
                            <select id="tipe" style="width: 300px" name="tipe" required="require">  
                                <option value="">Pilih Tipe Tabel...</option>
                                <option value="1">Pie Chart</option>
                                <option value="2">Basic Chart</option>
                            </select>
                        </div> 
                        <!-- ==========Filter Tipe============ -->
                        <div class="grid-2-12"><label>Pilih Status Kepemilikan</label></div>
                        <div class="grid-9-12" style="width: 300px;">
                            <select id="kepemilikan" style="width: 300px" name="kepemilikan" required="require">
                                <option value="">Pilih Status Kepemilikan...</option>
                                <option value="1">Pemerintah</option>
                                <option value="2">Swasta</option>
                            </select>
                        </div>                                                
                        <div class="clear"></div>

                        <hr />

                        <div class="grid-12-12">
                            <input type="submit" class="right button green" value="Tampilkan" />
                        </div>
                    </form>
                    <?php
                    $kolom = $this->input->post('kolom');
                    $bab = $this->input->post('bab');
                    $tahun = $this->input->post('tahun');
                    $rs_region = $this->input->post('region');
                    $rs_noreg = $this->input->post('rs');
                    $tipe = $this->input->post('tipe');

                    //echo $bab . ' ' . $kolom . ' ' . $tahun.' '.$tipe;
                    ?>

                    <div class="clear"></div><br/>
                </div>                
            </div>
        </div>
    </section>  
    <!-- ======= .grid_12 - block begin ======= -->
    <section class="grid_12">
        <div class="box">
            <div class="title"><span class="icon16_sprite i_network_monitor"></span>Grafik</div>

            <div class="inside">
                <div class="in">

                    <div id="my_graph" style="width: 100%; height: 550px;">
                        <?php
                        include 'Cek_Grafik_ToView.php';
                        ?>
                    </div>

                </div>
            </div>

        </div>
    </section>
</section>

<script>
    jQuery(document).ready(function() {
        jQuery('#userTable1').dataTable();
    });
</script>

<script>
    $("#bab")
            .change(function() {
                var bab_id = $("#bab").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>/charts/getTableList/" + bab_id,
                    success: function(data) {
                        $("#kolom").html(data);
                    }
                });
            })
            .change();
</script>
<script>
    jQuery(document).ready(function() {
        jQuery('#userTable1').dataTable();
    });

    $('#userTable1').dataTable({
        "sScrollX": "100%",
        "bScrollCollapse": true
    });
</script>

<?php include 'footer.php'; ?>