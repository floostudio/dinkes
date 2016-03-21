<?php include 'head.php'; ?>
	<section id="container" class="container_12">
		<section class="grid_12">
                    <form class="formee" method="post" action="<?php echo site_url();?>/validasi" enctype="multipart/form-data">
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
                                                   //  echo '<option value="add">--Add Year--</option>';
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
							<th>Tahun Laporan</th>
							<th>Bab 2</th>
							<th>Bab 3</th>
							<th>Bab 4</th>
							<th>Bab 5</th>
							<th>Bab 6</th>
                                                        <th>Lampiran Hemodialisa dan Radiologi</th>
                                                        <th>Report Error</th>
                                                     </tr>
						</thead>
						<tbody>
                                                    <?php 
                                                    if($tahunSelected)
                                                    {
                                                        foreach($rumahsakit->result() as $row)
                                                        {
                                                            $isUpload = false;
                                                            $statusAll = 0;
                                                            echo '<tr>';
                                                                echo '<td>'.$row->KODE_REGISTRASI.'</td>';
                                                                echo '<td>'.$row->RS_NAMA.'</td>';
                                                                echo '<td>'.$tahunSelected.'</td>';
                                                               // echo '<td>'.$row->TAHUN_ID.'</td>';
                                                              //  if($row->ERROR_DETAIL)
                                                              //  { $isUpload=true; }
                                                                
                                                                /*
                                                                    BAB 2
                                                                 *                                                                  */
                                                                $status = 0;
                                                                foreach($history->result() as $h)
                                                                {
                                                                    if($h->bab_id== 1 && $h->RS_NOREG == $row->RS_NOREG)
                                                                    {
                                                                        if(!empty($h->ERROR_DETAIL))
                                                                        {
                                                                            $status = 2;
                                                                            break;
                                                                        }
                                                                        else {
                                                                            $status = 1;
                                                                        }
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
                                                                foreach($history->result() as $h)
                                                                {
                                                                    if($h->bab_id== 2 && $h->RS_NOREG == $row->RS_NOREG)
                                                                    {
                                                                        if(!empty($h->ERROR_DETAIL))
                                                                        {
                                                                            $status = 2;
                                                                            break;
                                                                        }
                                                                        else {
                                                                            $status = 1;
                                                                        }
                                                                    }
                                                                }
                                                                if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                                                else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                                                else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                                                $statusAll = $statusAll + $status;
                                                                
                                                                /*
                                                                    BAB 4
                                                                 *                                                                  */
                                                                $status = 0;
                                                                foreach($history->result() as $h)
                                                                {
                                                                    if($h->bab_id== 3 && $h->RS_NOREG == $row->RS_NOREG)
                                                                    {
                                                                        if(!empty($h->ERROR_DETAIL))
                                                                        {
                                                                            $status = 2;
                                                                            break;
                                                                        }
                                                                        else {
                                                                            $status = 1;
                                                                        }
                                                                    }
                                                                }
                                                                if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                                                else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                                                else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                                                $statusAll = $statusAll + $status;
                                                                
                                                                /*
                                                                    BAB 5
                                                                 *                                                                  */
                                                                $status = 0;
                                                                foreach($history->result() as $h)
                                                                {
                                                                    if($h->bab_id== 4 && $h->RS_NOREG == $row->RS_NOREG)
                                                                    {
                                                                        if(!empty($h->ERROR_DETAIL))
                                                                        {
                                                                            $status = 2;
                                                                            break;
                                                                        }
                                                                        else {
                                                                            $status = 1;
                                                                        }
                                                                    }
                                                                }
                                                                if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                                                else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                                                else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                                                $statusAll = $statusAll + $status;
                                                                
                                                                /*
                                                                    BAB 6
                                                                 *                                                                  */
                                                                $status = 0;
                                                                foreach($history->result() as $h)
                                                                {
                                                                    if($h->bab_id== 5 && $h->RS_NOREG == $row->RS_NOREG)
                                                                    {
                                                                        if(!empty($h->ERROR_DETAIL))
                                                                        {
                                                                            $status = 2;
                                                                            break;
                                                                        }
                                                                        else {
                                                                            $status = 1;
                                                                        }
                                                                    }
                                                                }
                                                                if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                                                else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                                                else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                                                $statusAll = $statusAll + $status;
                                                                /*
                                                                    BAB Lampiran
                                                                 *                                                                  */
                                                                $status = 0;
                                                                foreach($history->result() as $h)
                                                                {
                                                                    if($h->bab_id== 6 && $h->RS_NOREG == $row->RS_NOREG)
                                                                    {
                                                                        if(!empty($h->ERROR_DETAIL))
                                                                        {
                                                                            $status = 2;
                                                                            break;
                                                                        }
                                                                        else {
                                                                            $status = 1;
                                                                        }
                                                                    }
                                                                }
                                                                if($status==2) { echo '<td><font color="red">Error Upload</font></td>';}
                                                                else if($status==1) { echo '<td><font color="green">Sukses Upload</font></td>';}
                                                                else if($status==0) { echo '<td><font color="blue">Belum Upload</font></td>';}
                                                                $statusAll = $statusAll + $status;
                                                                if($statusAll>0)
                                                                {
                                                                    echo '<td><a href='.site_url().'/validasi/getReport/'.$row->RS_NOREG.'/'.$tahunNow.'>Unduh</a></td>';
                                                                }
                                                            echo '<tr>';
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
                        
			//jQuery('#userTable1').dataTable();
                        var oTable = $('#userTable.1').dataTable({
                            "bProcessing": true,
                            "sAjaxSource": "sources/objects.txt",
                            "aoColumns": [
                              { "mData": "Field1", sDefaultContent: "n/a" },
                              { "mData": "Field2", sDefaultContent: "" },
                              { "mData": "Field3", sDefaultContent: "" },
                            ]
                          });
                        $('a').click(showDialog);
                        
                        function showDialog(){
                            var tes = "<p></p>";
                            var bab = $(this).attr('value');
                                
                            $.ajax({
                                type   :   "POST",
                                url    :   "http://localhost/svn_dinkes/validasi/getData/"+bab,
                                dataType: "text",
                                success: function(data){
                                    tes = data;
                                    $.fallr('show', {
                                    content : tes,
                                    position: 'center',
                                    width : 1200,
                                    height : 500,
                                    });
                                }   
                            });
                            
                        }
                        
                        
                        jQuery('a[href^="#fallr-"]').click(function(){
                                var id = jQuery(this).attr('href').substring(7);
                                method[id].apply(this,[this]);
                                return false;
                        });
		});
	</script>	


<?php include 'footer.php'; ?>
