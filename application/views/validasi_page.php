                <div class="box">
                    <div class="title">
                            <span class="icon16_sprite i_3d"></span>
                            Laporan Validasi
                    </div>

                    <div class="inside">
                    <!-- Forms -->
                        <table id="userTable1" class="display">
                            <thead>
                                <tr>
                                    <th>Nomor Registrasi</th>
                                    <th>Nama RS</th>
                                    <th>Kabupaten / Kota</th>
                                    <th>Tahun Laporan</th>
                                    <th>Bab 2</th>
                                    <th>Bab 3</th>
                                    <th>Bab 4</th>
                                    <th>Bab 5</th>
                                    <th>Bab 6</th>
                                    <th>Lampiran Hemodialisa</th>
                                    <th>Lampiran SPM</th>
                                    <th>RL 4A</th>
                                    <th>RL 4B</th>
                                    <th>Report Error</th>
                                 </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if($tahunSelected) {
                                    foreach($rumahsakit->result() as $row) {
                                        $isUpload = false;
                                        $statusAll = 0;
                                        echo '<tr>';
                                            echo '<td>'.$row->KODE_REGISTRASI.'</td>';
                                            echo '<td>'.$row->RS_NAMA.'</td>';
                                            echo '<td>'.$row->RS_KAB.'</td>';
                                            echo '<td>'.$tahunSelected.'</td>';
                                           // echo '<td>'.$row->TAHUN_ID.'</td>';
                                          //  if($row->ERROR_DETAIL)
                                          //  { $isUpload=true; }

                                            /*
                                                BAB 2
                                             **/

                                            $status = 0;
                                            foreach($history->result() as $h) {
                                                if($h->bab_id== 1 && $h->RS_NOREG == $row->RS_NOREG) {
                                                    if($h->ERROR_DETAIL == 0) { $status = 2; break; }
                                                    else { $status = 1; }
                                                }
                                            }
                                            if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                            else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                            else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                            $statusAll = $statusAll + $status;

                                            /*
                                                BAB 3
                                             *                                                                  */
                                            $status = 0;
                                            foreach($history->result() as $h) {
                                                if($h->bab_id== 2 && $h->RS_NOREG == $row->RS_NOREG) {
                                                    if($h->ERROR_DETAIL == 0) { $status = 2; break; }
                                                    else { $status = 1; }
                                                }
                                            }
                                            if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                            else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                            else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                            $statusAll = $statusAll + $status;

                                            /**
                                                BAB 4
                                             **/

                                            $status = 0;
                                            foreach($history->result() as $h) {
                                                if($h->bab_id== 3 && $h->RS_NOREG == $row->RS_NOREG) {
                                                    if($h->ERROR_DETAIL == 0) { $status = 2; break; }
                                                    else { $status = 1; }
                                                }
                                            }
                                            if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                            else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                            else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                            $statusAll = $statusAll + $status;

                                            /**
                                                BAB 5
                                             **/

                                            $status = 0;
                                            foreach($history->result() as $h) {
                                                if($h->bab_id== 4 && $h->RS_NOREG == $row->RS_NOREG) {
                                                    if($h->ERROR_DETAIL != 1) { $status = 2; break; }
                                                    else { $status = 1; }
                                                }
                                            }
                                            if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                            else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                            else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                            $statusAll = $statusAll + $status;

                                            /**
                                                BAB 6
                                             **/

                                            $status = 0;
                                            foreach($history->result() as $h) {
                                                if($h->bab_id== 5 && $h->RS_NOREG == $row->RS_NOREG) {
                                                    if($h->ERROR_DETAIL == 0) { $status = 2; break; }
                                                    else { $status = 1; }
                                                }
                                            }
                                            if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                            else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                            else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                            $statusAll = $statusAll + $status;
                                            
                                            /**
                                                BAB Lampiran Hemodialisa
                                             **/

                                            $status = 0;
                                            foreach($history->result() as $h) {
                                                if($h->bab_id== 6 && $h->RS_NOREG == $row->RS_NOREG) {
                                                    if($h->ERROR_DETAIL == 0) { $status = 2; break; }
                                                    else { $status = 1; }
                                                }
                                            }
                                            if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                            else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                            else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                            $statusAll = $statusAll + $status;
                                            /**
                                                BAB Lampiran SPM
                                             **/

                                            $status = 0;
                                            foreach($history->result() as $h) {
                                                if($h->bab_id== 7 && $h->RS_NOREG == $row->RS_NOREG) {
                                                    if($h->ERROR_DETAIL == 0) { $status = 2; break; }
                                                    else { $status = 1; }
                                                }
                                            }
                                            if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                            else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                            else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                            $statusAll = $statusAll + $status;
                                            
                                            /**
                                                BAB Lampiran RL4A
                                             **/

                                            $status = 0;
                                            foreach($history->result() as $h) {
                                                if($h->bab_id== 8 && $h->RS_NOREG == $row->RS_NOREG) {
                                                    if($h->ERROR_DETAIL == 0) { $status = 2; break; }
                                                    else { $status = 1; }
                                                }
                                            }
                                            if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                            else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                            else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                            $statusAll = $statusAll + $status;
                                            
                                            /**
                                                BAB Lampiran RL4B
                                             **/

                                            $status = 0;
                                            foreach($history->result() as $h) {
                                                if($h->bab_id== 9 && $h->RS_NOREG == $row->RS_NOREG) {
                                                    if($h->ERROR_DETAIL == 0) { $status = 2; break; }
                                                    else { $status = 1; }
                                                }
                                            }
                                            if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                            else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                            else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                            $statusAll = $statusAll + $status;

                                            if($statusAll>0) {
                                                echo '<td><a href='.site_url().'/validasi/getReport/'.$row->RS_NOREG.'/'.$tahunNow.'>Unduh</a></td>';
                                            }
                                            else {
                                                echo '<td></td>';
                                            }
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
</section>
<div class="clear"></div>

<script>
        jQuery(document).ready(function() {

                jQuery('#userTable1').dataTable();

        });
</script>	


