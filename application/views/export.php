<?php include 'head.php'; ?>

<section id="container" class="container_12">
    <section class="grid_12">        
        <div class="box">
            <div class="title">
                <span class="icon16_sprite i_3d"></span>
                Halaman Export File
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
                        </div> 

                        <!-- ==========Standart Filter(BAB)============ -->                        
                        <div class="grid-2-12"><label>Pilih Bab</label></div>
                        <div class="grid-9-12" style="width: 300px">
                            <select id="bab" name="bab" required="require">
                                <option value="">Pilih Bab...</option> 

                                echo '<option value="1">Bab II</option>';
                                echo '<option value="2">Bab III</option>';
                                echo '<option value="3">Bab IV</option>';
                                echo '<option value="4">Bab V (IGD - Rawat Inap)</option>';
                                echo '<option value="5">Bab V (Perinatologi - Lab)</option>';
                                echo '<option value="6">Bab V (Rehab Medik - Transfusi)</option>';
                                echo '<option value="7">Bab V (Maskin)</option>';
                                echo '<option value="8">Bab V (Rekam Medik - Jiwa)</option>';
                                echo '<option value="9">Bab VI </option>';
                                echo '<option value="10">Bab VI MDGS </option>';
                                echo '<option value="11">Lampiran Hemodialisa </option>';


                            </select>
                        </div>

                        <div class="clear"></div>
                        <hr />

                        <div class="grid-12-12">
                            <input type="submit" class="right button green" value="Export" />
                        </div>
                    </form>
                    <?php
                    $bab = $this->input->post('bab');
                    $tahun = $this->input->post('tahun');
                    echo $bab . ' ' . $tahun;
                    include 'export_controller.php';
                    ?>

                    <!--div class="clear"></div><br/>
                     <div class="grid-12-12"> 
                        <h4 style="">Bab II</h4>
                            <a style="margin-left: 20px;" href="<?php echo site_url('/export/generateExportBab2') ?>">Export Bab II</a>
                        <br/>
                                                    <h4 style="">Bab III</h4>
                            <a style="margin-left: 20px;" href="<?php echo site_url('/export/generateExportBab3') ?>">Export Bab III</a>
                        <br/> 
                                                    <h4 style="">Bab IV</h4>
                            <a style="margin-left: 20px;" href="<?php echo site_url('/export/generateExportBab4') ?>">Export Bab IV</a>
                        <br/> 
                        <h4 style="">Bab VI</h4>
                        <a style="margin-left: 20px;" href="<?php echo site_url('/export/generateExportBab6') ?>">Export Bab VI</a>
                        <br/>                            
                        <a style="margin-left: 20px;" href="<?php echo site_url('/export/generateExportBab6mdgs') ?>">Export Bab VI MDGS</a>

                                                    <br/>                            
                        <a style="margin-left: 20px;" href="<?php echo site_url('/export/generateExportLampiran') ?>">Export Lampiran Hemodialis dan Radiologi</a>

                    </div-->
                    </form>
                </div>                
            </div>
        </div>
    </section>
</section>

<?php include 'tabel_rekap_script.php'; ?>
<?php include 'footer.php'; ?>