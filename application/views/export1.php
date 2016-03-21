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
								echo '<option value="19">Data Rumah Sakit</option>';
                                echo '<option value="1">Bab II</option>';
                                echo '<option value="2">Bab III</option>';
                                echo '<option value="3">Bab IV</option>';
                                echo '<option value="4">Bab V (IGD-Rujukan) 1</option>'; 
								echo '<option value="5">Bab V (IGD-Rujukan) 2</option>';
								echo '<option value="6">Bab V-IRJ-IRI 1</option>';
								echo '<option value="7">Bab V-IRJ-IRI 2</option>';
                                echo '<option value="8">Bab V-IRJ-IRI 3_1</option>';
								echo '<option value="9">Bab V-IRJ-IRI 3_2</option>';
                                echo '<option value="10">Bab V Bedah-Perinatologi 1</option>';
                                echo '<option value="11">Bab V Bedah-Perinatologi 2</option>'; 
                                echo '<option value="12">Bab VI 1 </option>'; 
                                echo '<option value="13">Bab VI 2 </option>';
								echo '<option value="14">Bab VI MDGS 1 </option>';
								echo '<option value="15">Bab VI MDGS 2 </option>';
								echo '<option value="16">Lampiran</option>';
								echo '<option value="17">SPM 1</option>';
								echo '<option value="18">SPM 1_1</option>';
								echo '<option value="19">SPM 2</option>';								
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
                    </form>
                </div>                
            </div>
        </div>
    </section>
</section>

<?php include 'tabel_rekap_script.php'; ?>
<?php include 'footer.php'; ?>