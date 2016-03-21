<form class="formee" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return viewTabel()">
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
    </div>
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
            <?php
            echo '<option value="">Pilih Bab...</option>';
            foreach ($bab->result() as $row) {
                $babName = $row->bab_name;
                $babId = $row->bab_id;

                echo '<option value="' . $babId . '">' . $babName . '</option>';
            }
            //  echo '<option value="add">--Add Year--</option>';
            ?>
        </select>
    </div>
    <!-- ==========Standart Filter(Tabel)============ -->   
    <div class="grid-2-12"><label>Pilih Tabel</label></div>
    <div class="grid-9-12" style="width: 300px;">
        <select id="tabel" style="width: 300px" name="tabel" required="require">

        </select>
    </div>     
    <div class="clear"></div>
    <hr />

    <div class="grid-12-12">
        <input type="submit" class="right button green" value="Tampilkan" />
    </div>
</form>