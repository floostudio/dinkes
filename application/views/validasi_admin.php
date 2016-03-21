<?php include 'head.php'; ?>
<section id="container" class="container_12">
    <section class="grid_12">
        <form class="formee" method="post" action="<?php echo site_url();?>/validasi/<?php echo $link; ?>" enctype="multipart/form-data">
            <div class="box">
                <div class="title">
                    <span class="icon16_sprite i_3d"></span>
                    FILTER
                </div>

                <div class="inside">
                <!-- Forms -->
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
                            ?>
                         </select>
                    </div>
                    <div class="clear"></div>
                    <!-- Form footer Begin-->
                    <section class="box_footer">
                        <div class="grid-12-12">
                            <input type="submit" class="right button green" value="Submit" />
                        </div>
                        <div class="clear"></div>
                    </section>
                    <!-- Form footer End-->
                </div>
            </div>
        </form>
<?php include 'validasi_page.php'; ?>
<?php include 'footer.php'; ?>
