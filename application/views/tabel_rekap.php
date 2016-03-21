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
                    <?php include 'menu_filter.php'; ?>
                    <?php
                    $bab = $this->input->post('bab');
                    $tabel = $this->input->post('tabel');
                    $tahun = $this->input->post('tahun');
                    $rs_noreg = $this->input->post('rs');
                    echo $bab.' '.$tabel.' '.$tahun.' '.$rs_noreg;
                    ?>
                    <!-- Tabel -->
                    <table id="userTable1" class="display">
<?php include 'Cek_tampilan_tabel.php'; ?>
                    </table> 
                </div>                
            </div>
        </div>
    </section>
</section>

<?php include 'tabel_rekap_script.php'; ?>
<?php include 'footer.php'; ?>