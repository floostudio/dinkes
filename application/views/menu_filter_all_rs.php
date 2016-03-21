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
    <div class="clear"></div>
    <!-- ==========Standart Filter(BAB)============ -->                        
    <div class="grid-2-12"><label>Pilih Bab</label></div>
    <div class="grid-9-12" style="width: 300px">
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
    <!-- ==========Standart Filter(Tabel)============ -->   
    <div class="grid-2-12"><label>Pilih Tabel</label></div>
    <div class="grid-9-12" style="width: 300px;">
        <select id="tabel" style="width: 300px" name="tabel" required="require">

        </select>
    </div>   
    <!-- ==========Standart Region============ -->
    <div class="grid-2-12"><label>Pilih Region</label></div>
    <div class="grid-9-12" style="width: 300px;">
        <select name="region" id="region" placeholder="Region" style="width: 300px;"/>  
        <?php
        echo '<option value="">--Select--</option>';
        foreach ($region->result() as $row) {
            $region_id = $row->id_list_region;
            $region_nama = $row->daftar_list_region;

            echo '<option value="' . $region_id . '">' . $region_nama . '</option>';
        }
        ?>
        </select>
    </div>
    <!-- ==========Standart Kelas============ -->
    <div class="grid-2-12"><label>Pilih Kelas</label></div>
    <div class="grid-9-12" style="width: 300px;">
        <select name="kelas" id="kelas" placeholder="Kelas" style="width: 300px;"/>  
        <?php
        echo '<option value="">--Select--</option>';
        foreach ($kelas->result() as $row) {
            $kelas_rs_id = $row->kelas_rs_id;
            $kelas_rs_nama = $row->kelas_rs_nama;

            echo '<option value="' . $kelas_rs_id . '">' . $kelas_rs_nama . '</option>';
        }
        ?>
        </select>
    </div> 
     <!-- ==========Standart Jenis============ -->
    <div class="grid-2-12"><label>Pilih Jenis</label></div>
    <div class="grid-9-12" style="width: 300px;">
        <select name="jenis" id="jenis" placeholder="Jenis" style="width: 300px;"/>  
        <?php
        echo '<option value="">--Select--</option>';
        foreach ($jenis->result() as $row) {
            $rs_jenis_id = $row->rs_jenis_id;
            $rs_jenis_nama = $row->rs_jenis_nama;

            echo '<option value="' . $rs_jenis_id . '">' . $rs_jenis_nama . '</option>';
        }
        ?>
        </select>
    </div>
    <!-- ==========Standart Pemilik============ -->
    <div class="grid-2-12"><label>Pilih Penyelenggara</label></div>
    <div class="grid-9-12" style="width: 300px;">
        <select name="penyelenggara" id="pemilik" placeholder="Penyelenggara" style="width: 300px;"/>  
        <?php
        echo '<option value="">--Select--</option>';
        foreach ($penyelenggara->result() as $row) {
            $rs_penyelenggara_id = $row->rs_penyelenggara_id;
            $rs_penyelenggara_nama = $row->rs_penyelenggara_nama;

            echo '<option value="' . $rs_penyelenggara_id . '">' . $rs_penyelenggara_nama . '</option>';
        }
        ?>
        </select>
    </div> 
    <!-- ==========Standart Status Penyelenggara============ -->
    <div class="grid-2-12"><label>Pilih Status Penyelenggara</label></div>
    <div class="grid-9-12" style="width: 300px;">
        <select name="rs_stat_penyelenggara" id="rs_stat_penyelenggara" placeholder="Rs_stat_penyelenggara" style="width: 300px;"/>  
        <?php
        echo '<option value="">--Select--</option>';
        foreach ($stat_penyelenggara->result() as $row) {
            $rs_stat_id = $row->rs_stat_id;
            $rs_stat_nama = $row->rs_stat_nama;

            echo '<option value="' . $rs_stat_id . '">' . $rs_stat_nama . '</option>';
        }
        ?>
        </select>
    </div> 
    <div class="clear"></div>
    <hr />

    <div class="grid-12-12">
        <input type="submit" class="right button green" value="Tampilkan" />
    </div>
</form>