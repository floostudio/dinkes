<?php include 'head.php'; ?>
<!-- ========== Pop Up Style  - block begin ========== -->
<style>
    body { font-size: 75%; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 800px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
</style>
<!-- ========== Pop Up Style  - block end ========== -->

 
<section id="container" class="container_12">
    <section class="grid_12">
        <div class="box">
            <div class="title">
                <span class="icon16_sprite i_3d"></span>
                Rumah Sakit
            </div>

            <div class="inside">
                <!-- Forms -->
                <table id="userTable1" class="display">
                    <thead>
                        <tr>
                            <th>Nomor Registrasi</th>
                            <th>Region</th> 
                            <th>Nama RS</th>
                            <th>Alamat</th>
                            <th>Kabupaten</th>
                            <th>No Telp</th>
                            <th>Jenis RS</th>
                            <th>Kelas RS</th>
			   <th>Kepemilikan</th>
 			    <th>Status</th>
                             
                            <th>Action</th>
		   
                        </tr>                        
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rumah_sakit->result() as $row) {
                            $data = array(
							    'RS_NOREG' => $row->RS_NOREG,
                                'KODE_REGISTRASI' => $row->KODE_REGISTRASI, //new
								'RS_REGION_ID' => $row->RS_REGION_ID,
                                'RS_NAMA' => $row->RS_NAMA,
                                'RS_ALAMAT' => $row->RS_ALAMAT,
                                'RS_KAB' => $row->RS_KAB,
                                'RS_KODEPOS' => $row->RS_KODEPOS,
                                'RS_TELP' => $row->RS_TELP,
                                'RS_FAX' => $row->RS_FAX,
                                'RS_EMAIL' => $row->RS_EMAIL,
                                'RS_TELP_HUMAS' => $row->RS_TELP_HUMAS,
                                'RS_WEBSITE' => $row->RS_WEBSITE,
                                'RS_NAMA_DIREKTUR' => $row->RS_NAMA_DIREKTUR,
                                'RS_PENYELENGGARA' => $row->RS_PENYELENGGARA,
                                'RS_STATUS_PENYELENGGARA' => $row->RS_STATUS_PENYELENGGARA,
                                'RS_KELAS' => $row->RS_KELAS,
                                'RS_JENIS' => $row->RS_JENIS,
                                'RS_LUAS_LAHAN' => $row->RS_LUAS_LAHAN,
                                'RS_LUAS_BANGUNAN' => $row->RS_LUAS_BANGUNAN,
                                'RS_TGL_REG' => $row->RS_TGL_REG,
                                'RS_SIO_NOMOR' => $row->RS_SIO_NOMOR,
                                'RS_SIO_TGL' => $row->RS_SIO_TGL,
                                'RS_SIO_OLEH' => $row->RS_SIO_OLEH,
                                'RS_SIO_SIFAT' => $row->RS_SIO_SIFAT,
                                'RS_SIO_MASABERLAKU' => $row->RS_SIO_MASABERLAKU,
                                'RS_SPK_NOMOR' => $row->RS_SPK_NOMOR,
                                'RS_SPK_TGL' => $row->RS_SPK_TGL,
                                'RS_SPK_OLEH' => $row->RS_SPK_OLEH,
                                'RS_SPK_SIFAT' => $row->RS_SPK_SIFAT,
                                'RS_SPK_MASABERLAKU' => $row->RS_SPK_MASABERLAKU,
                                'RS_AKREDITASI' => $row->RS_AKREDITASI,
                                'RS_AKR_PENTAHAPAN' => $row->RS_AKR_PENTAHAPAN,
                                'RS_AKR_STATUS' => $row->RS_AKR_STATUS,
                                'RS_TGL_AKREDITASI' => $row->RS_TGL_AKREDITASI,
                                'RS_STRENGTH' => $row->RS_STRENGTH,
                                'RS_WEAKNESS' => $row->RS_WEAKNESS,
				'RS_ACTIVE' => $row->RS_ACTIVE,
				'RS_PEMILIK' => $row->RS_PEMILIK
                            );
                            
                            echo '<tr>';
                            echo '<td>' . $data['KODE_REGISTRASI'] . '</td>'; 
			     
							echo '<input type="hidden"  value = '.$data['RS_REGION_ID'].' name="regionhid" id="regionhid"/>'; 
				  
								if( $data['RS_REGION_ID'] == 1)
								echo '<td>R1- RSUD Kabupaten Sidoarjo</td>'; 
								else if( $data['RS_REGION_ID'] == 2)
								echo '<td>R2- RSUD Ibnu Sina Gresik</td>'; 
								else if( $data['RS_REGION_ID'] == 3)
								echo '<td>R3- RSUD Dr Soedono Madiun</td>'; 
								else if( $data['RS_REGION_ID'] == 4)
								echo '<td>R4- RSUD Gambiran Kediri</td>'; 
								else if( $data['RS_REGION_ID'] == 5)
								echo '<td>R5- RSU Haji</td>'; 
								else if( $data['RS_REGION_ID'] == 6)
								echo '<td>R6-RSUD Soewandi Surabaya</td>'; 
								else if( $data['RS_REGION_ID'] == 7)
								echo '<td>R7- RSUD Kabupaten Jombang</td>'; 
								else if( $data['RS_REGION_ID'] == 8)
								echo '<td>R8- RSUD Dr Soebandi Jember</td>'; 
								else if( $data['RS_REGION_ID'] == 9)
								echo '<td>R9- RSUD Kanjuruhan Malang</td>'; 
								else  
								echo '<td>Uncategorized</td>'; 
								
							echo '<input type="hidden"  value = '.$data['RS_NOREG'].' name="idhid" id="idhid"/>'; 
			    echo '<td id="modal-ajax"> <a href="#" class="view_data" >' . $data['RS_NAMA'] . '</a> </td>';
                            echo '<td>' . $data['RS_ALAMAT'] . '</td>';
                            echo '<td>' . $data['RS_KAB'] . '</td>';
                            echo '<td>' . $data['RS_TELP'] . '</td>';

                           					if( $data['RS_JENIS'] == 1)
								echo '<td>RSU</td>'; 
								else  if( $data['RS_JENIS'] == 2)
								echo '<td>RS Jiwa/RSKO</td>'; 
								else  if( $data['RS_JENIS'] == 3)
								echo '<td>RSB</td>'; 
								else  if( $data['RS_JENIS'] == 4)
								echo '<td>RS Mata</td>'; 
								else  if( $data['RS_JENIS'] == 5)
								echo '<td>RS Kanker</td>'; 
								else  if( $data['RS_JENIS'] == 6)
								echo '<td>RSTP</td>'; 
								else  if( $data['RS_JENIS'] == 7)
								echo '<td>RS Kusta</td>'; 
								else  if( $data['RS_JENIS'] == 8)
								echo '<td>RS Penyakit Infeksi</td>'; 
								else  if( $data['RS_JENIS'] == 9)
								echo '<td>RSOP</td>'; 
								else  if( $data['RS_JENIS'] == 10)
								echo '<td>RSK P. Dalam</td>'; 
								else  if( $data['RS_JENIS'] == 11)
								echo '<td>RSK Bedah</td>'; 
								else  if( $data['RS_JENIS'] == 12)
								echo '<td>RS Jantung</td>'; 
								else  if( $data['RS_JENIS'] == 13)
								echo '<td>RSK THT</td>'; 
								else  if( $data['RS_JENIS'] == 14)
								echo '<td>RS Stroke</td>'; 
								else  if( $data['RS_JENIS'] == 15)
								echo '<td>RSAB</td>'; 
								else  if( $data['RS_JENIS'] == 16)
								echo '<td>RSK Anak</td>'; 
								else  if( $data['RS_JENIS'] == 17)
								echo '<td>RSK Syaraf</td>'; 
								else  if( $data['RS_JENIS'] == 18)
								echo '<td>RSK Ginjal</td>'; 
								else  if( $data['RS_JENIS'] == 19)
								echo '<td>RSK GM</td>'; 								
								else  
								echo '<td>Uncategorized</td>'; 
                           

 								if( $data['RS_KELAS'] == 1)
								echo '<td>A</td>'; 
								else if( $data['RS_KELAS'] == 2)
								echo '<td>B</td>'; 
								else if( $data['RS_KELAS'] == 3)
								echo '<td>C</td>'; 
								else if( $data['RS_KELAS'] == 4)
								echo '<td>D</td>'; 
								else  
								echo '<td>Uncategorized</td>'; 

		if( $data['RS_PEMILIK'] == 1)
			echo '<td>Publik</td>'; 
		else if( $data['RS_PEMILIK'] == 2)
			echo '<td>Privat</td>'; 
		else 
			echo '<td>Uncategorized</td>';  


		if( $data['RS_ACTIVE'] == 1)
			echo '<td style="color:green">Aktif</td>'; 
		else 
			echo '<td style="color:red">Nonaktif</td>'; 
		 
                            
                echo '<form class="formee" method="post" action="'.site_url().'/data_rs_edit" enctype="multipart/form-data">';            
			    echo '<input type="hidden" name="rs_id" id="rs_id"  value=' . $data['RS_NOREG'] . '>'; 
			   
			    echo '<td><input type="submit" value=edit '.$data['RS_NOREG'] .'></td>';
                echo '</form>';
			
                
				echo '</tr>';                            
                        }
                        ?>
                    </tbody>
                </table>
                
                <!-- Form footer Begin-->
                <section class="box_footer">
                    <div class="grid-12-12">
					    
                        <a href="<?php echo base_url('/index.php/data_rs_crud') ?>" class="right button green">Tambah Rumah Sakit</a> 
                     
					</div>
                    <div class="clear"></div>
                </section>
                <!-- Form footer End-->

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


<?php include 'footer.php'; ?>
