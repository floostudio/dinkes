<?php include 'head.php'; ?>
<form action="<?php echo site_url(); ?>/test_page/viewTabel">
    <section class="box_footer">
        <div class="grid-12-12">
            <input type="submit" class="right button green" value="Tampilkan" />
        </div>
        <div class="clear"></div>
    </section> 
</form>
<!-- Tabel -->
<section id="container" class="container_12">
    <section class="grid_12">
        <div class="box">
            <div class="title">
                <span class="icon16_sprite i_3d"></span>
                Laporan Validasi
            </div>
            <div class="inside">
                <table id="userTable1" class="display">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>NO Registrasi</th>
                            <th>Nama</th>
                            <th>Pelayanan</th>
                            <th>Ketersediaan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pelayanan->result() as $row) {
                            echo '<tr>';
                            echo '<td>' . $row->TAHUN_TAHUN . '</td>';
                            echo '<td>' . $row->RS_NOREG . '</td>';
                            echo '<td>' . $row->RS_NAMA . '</td>';
                            echo '<td>' . $row->LP_NAMA . '</td>';
                            if($row->PELAYANAN_KETERSEDIAAN == 1)
                                echo '<td>ya</td>';
                            else 
                                echo '<td>tidak</td>';
                            echo '<td>' . $row->PELAYANAN_KET . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>    
                </table>
            </div>
        </div>
    </section>
</section>

<script>
    jQuery(document).ready(function() {
        jQuery('#userTable1').dataTable();
    });
    
    $('#userTable1').dataTable({
        "sScrollY": "200px",
        "sScrollX": "100%",
        "sScrollXInner": "110%",
        "bScrollCollapse": true
    });
</script>

<?php include 'footer.php'; ?>