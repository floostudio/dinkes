<?php include 'head.php'; ?>

<section id="container" class="container_12">
    <section class="grid_12">        
        <div class="box">
            <div class="title">
                <span class="icon16_sprite i_3d"></span>
                Laporan Rekap
            </div>
            <div class="inside">
                <div class="in">                    
                    <?php include 'menu_filter_all_rs.php'; ?>
                    <?php
                    $tabel = $this->input->post('tabel');
                    $bab = $this->input->post('bab');
                    $tahun = $this->input->post('tahun');
                    $rs_noreg = $this->input->post('rs');
                    $rs_region = $this->input->post('region');
                    $rs_kelas = $this->input->post('kelas');
                    $rs_jenis = $this->input->post('jenis');
                    $rs_stat_penyelenggara = $this->input->post('rs_stat_penyelenggara');
                    $rs_penyelenggara = $this->input->post('penyelenggara');
                    echo $bab . ' ' . $tabel . ' ' . $tahun . ' ' . $rs_noreg.' '.$rs_region.' '.$rs_kelas.' '.$rs_jenis.' '.$rs_stat_penyelenggara.' '.$rs_penyelenggara;
                    ?>
                    <!-- Tabel -->
                    <table id="userTable1" class="display">
                        <?php include 'Cek_tampilan_tabel_all_rs.php'; ?>
                    </table> 
                    <div class="clear"></div><br/>
                </div>                
            </div>
        </div>
    </section>    
</section>


<?php include 'tabel_rekap_script.php'; ?>
<?php include 'footer.php'; ?>