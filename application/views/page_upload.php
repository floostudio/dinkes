<?php include 'head.php'; ?>
<section id="container" class="container_12">


    <!-- ========== Form Upload  - block begin ========== -->

    <!-- Forms -->


    <section class="grid_12">
        <div class="box">
            <div class="title">
                <span class="icon16_sprite i_book"></span>
                Form Unggah Dokumen Excelicious
            </div>
            <form class="formee" method="post" action="<?php echo site_url();?>/page_upload/submit" enctype="multipart/form-data">
           
                  <div class="inside">
                      
                    <!-- Forms -->
                        <div class="in">

                            <!-- ====================== -->

                            <div class="grid-3-12"><label>Tahun Rekap</label></div>
                                <div class="grid-3-12">
                                     <select required="required" name="tahun" id="tahun" placeholder="Tahun Rekap" />  
                                        <?php
                                            echo '<option value="">--Select--</option>';
                                            foreach($tahun->result() as $row)
                                            {
                                                    $yearName = $row->TAHUN_TAHUN;
                                                    $yearId = $row->TAHUN_ID;

                                                    echo '<option value="'.$yearId.'">'.$yearName.'</option>';
                                            }
                                           //  echo '<option value="add">--Add Year--</option>';
                                        ?>
                                     </select>
                                </div>
                            <div class="clear"></div>
                            <hr />

                            <!-- ====================== -->
                            
                            <!-- ====================== -->

                            <div class="grid-3-12"><label>Rumah Sakit</label></div>
                                <div class="grid-3-12">
                                    <select name="no_reg" id="no_reg" placeholder="Rumah Sakit" style="max-width:300px;" class="chzn-select" tabindex="5"/>   
                                    <?php
                                            echo '<option value="">--Select--</option>';
                                            foreach($rumahsakit->result() as $row)
                                            {
                                                    $rsName     = $row->RS_NAMA;
                                                    $rsJenis    = $row->RS_JENIS;
                                                    $rsKodeReg  = $row->KODE_REGISTRASI;
						    $rsID	= $row->RS_NOREG;

                                                    echo '<option value="'.$rsID.'">'. $rsKodeReg .' - '.$rsName.'</option>';
                                            }
                                           //  echo '<option value="add">--Add Year--</option>';
                                    ?>
                                    </select>

                                </div>
                            <div class="clear"></div>
                            <hr />

                            <!-- ====================== -->
                            
                             <!-- ====================== -->

                            <div class="grid-3-12"><label>Jenis Dokumen</label></div>
                                <div class="grid-3-12">
                                    <select required="required" name="doctype" id="doctype" placeholder="Jenis Dokumen" /> 
                                        <option value="">--Select--</option>
                                        <option value="1">Bab 2</option>
                                        <option value="2">Bab 3</option>
                                        <option value="3">Bab 4</option>
                                        <option value="4">Bab 5</option>
                                        <option value="5">Bab 6</option>
                                        <option value="6">Lampiran Hemodialisa</option>
                                        <option value="7">Lampiran SPM</option>
                                        <option value="8">RL4A</option>
                                        <option value="9">RL4B</option>
                                    </select>

                                </div>
                            <div class="clear"></div>
                            <hr />

                            <!-- ====================== -->

                            <!-- ====================== -->

                            <div class="grid-3-12"><label>Upload Dokumen (.xls / .xlsx) </label></div>
                            <div class="grid-9-12">
                                <input required="required" type="file" id="file_upload" name="userfile" />
                                <span class="subtip">Max. file size 30720 Kb.</span>
                            </div>
                            <div class="clear"></div>
                            <hr />

                        </div>

                        <!-- Form footer Begin-->
                        <section class="box_footer">
                            <div class="grid-12-12">
                                <input type="reset" class="right button red" value="Clear" />
                                <input type="submit" class="right button green" value="Upload" />
                            </div>
                            <div class="clear"></div>
                        </section>
                        <!-- Form footer End-->
                    </form>
                </div>
        </div>
    </section>
</section>
<div class="clear"></div>



<?php include 'footer.php'; ?>
