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

<section id="container" class="container_12" style="min-height:430px;">
<section class="grid_12">
        <div class="box">
            <div class="title"><span class="icon16_sprite i_network_monitor"></span>Edit Data Rumah Sakit </div>

           
				 
        <!--p class="validateTips">All form fields are required.</p-->
        <form class="formee" method="post" action="<?php echo site_url();?>/data_rs_edit/update" enctype="multipart/form-data">
            
			 <div class="inside">

                <div class="in">
				
				<?php
                       $row = $rumah_sakit->result(); 
					  // echo count($row);
					   //echo 'id cek'.$idcek;
					   $data = array(
							    'RS_NOREG' => $row[0]->RS_NOREG,
                                'KODE_REGISTRASI' => $row[0]->KODE_REGISTRASI, //new
								'RS_REGION_ID' => $row[0]->RS_REGION_ID,
                                'RS_NAMA' => $row[0]->RS_NAMA,
                                'RS_ALAMAT' => $row[0]->RS_ALAMAT,
                                'RS_KAB' => $row[0]->RS_KAB,
                                'RS_KODEPOS' => $row[0]->RS_KODEPOS,
                                'RS_TELP' => $row[0]->RS_TELP,
                                'RS_FAX' => $row[0]->RS_FAX,
                                'RS_EMAIL' => $row[0]->RS_EMAIL,
                                'RS_TELP_HUMAS' => $row[0]->RS_TELP_HUMAS,
                                'RS_WEBSITE' => $row[0]->RS_WEBSITE,
                                'RS_NAMA_DIREKTUR' => $row[0]->RS_NAMA_DIREKTUR,
                                'RS_PENYELENGGARA' => $row[0]->RS_PENYELENGGARA,
                                'RS_STATUS_PENYELENGGARA' => $row[0]->RS_STATUS_PENYELENGGARA,
                                'RS_KELAS' => $row[0]->RS_KELAS,
                                'RS_JENIS' => $row[0]->RS_JENIS,
                                'RS_LUAS_LAHAN' => $row[0]->RS_LUAS_LAHAN,
                                'RS_LUAS_BANGUNAN' => $row[0]->RS_LUAS_BANGUNAN,
                                'RS_TGL_REG' => $row[0]->RS_TGL_REG,
                                'RS_SIO_NOMOR' => $row[0]->RS_SIO_NOMOR,
                                'RS_SIO_TGL' => $row[0]->RS_SIO_TGL,
                                'RS_SIO_OLEH' => $row[0]->RS_SIO_OLEH,
                                'RS_SIO_SIFAT' => $row[0]->RS_SIO_SIFAT,
                                'RS_SIO_MASABERLAKU' => $row[0]->RS_SIO_MASABERLAKU,
                                'RS_SPK_NOMOR' => $row[0]->RS_SPK_NOMOR,
                                'RS_SPK_TGL' => $row[0]->RS_SPK_TGL,
                                'RS_SPK_OLEH' => $row[0]->RS_SPK_OLEH,
                                'RS_SPK_SIFAT' => $row[0]->RS_SPK_SIFAT,
                                'RS_SPK_MASABERLAKU' => $row[0]->RS_SPK_MASABERLAKU,
                                'RS_AKREDITASI' => $row[0]->RS_AKREDITASI,
                                'RS_AKR_PENTAHAPAN' => $row[0]->RS_AKR_PENTAHAPAN,
                                'RS_AKR_STATUS' => $row[0]->RS_AKR_STATUS,
                                'RS_TGL_AKREDITASI' => $row[0]->RS_TGL_AKREDITASI,
                                'RS_STRENGTH' => $row[0]->RS_STRENGTH,
				'RS_PEMILIK' => $row[0]->RS_PEMILIK,
                                'RS_WEAKNESS' => $row[0]->RS_WEAKNESS
                            );
							 
				?>
               
	        <div class="grid-3-12"><label for="rs_stat">Status Aktif</label></div>
            	<div class="grid-9-12">
			<input type="radio" name="rs_stat" value="1" checked> Aktif<br>
			<input type="radio" name="rs_stat" value="0" > Tidak Aktif<br>
            	</div>
			
		<div class="grid-3-12"><label for="rs_pemilik">Kepemilikan</label></div>
            	<div class="grid-9-12">
			<?php 
				if($data['RS_PEMILIK'] == 1){
			?>
			<input type="radio" name="rs_pemilik" value="1" checked> Publik<br>
			<input type="radio" name="rs_pemilik" value="2" > Privat<br>
			<?php } else if($data['RS_PEMILIK'] == 2){
			?>
			<input type="radio" name="rs_pemilik" value="1" > Publik<br>
			<input type="radio" name="rs_pemilik" value="2" checked> Privat<br>
			<?php } else{ ?>
			<input type="radio" name="rs_pemilik" value="1" > Publik<br>
			<input type="radio" name="rs_pemilik" value="2" > Privat<br>
			<?php } ?>
            	</div>

		
                <div class="grid-3-12"><label for="rs_kodereg">Kode Registrasi</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_kodereg" id="newrs_kodereg" required="required" value='<?php echo $data['KODE_REGISTRASI'] ?>' class="sizew300 text ui-widget-content ui-corner-all"></div>
				 
                <div class="grid-3-12"><label for="rs_region">Region</label></div>
                
				<div class="grid-9-12"><select name="newrs_region" id="newrs_region" required="require" placeholder="Region" style="width: 300px;"/>  
					<?php
					echo '<option value="">--Select--</option>';
					foreach ($region->result() as $row) {
						$region_id = $row->id_list_region;
						$region_nama = $row->daftar_list_region;
                        if($data['RS_REGION_ID'] == $region_id)  
							echo '<option value="' . $region_id . '" selected>' . $region_nama . '</option>';
						else
							echo '<option value="' . $region_id . '">' . $region_nama . '</option>';
					}
					?>
				</select> </div>
				
		<div class="grid-3-12"><label for="rs_jenis">Jenis</label></div>
                <div class="grid-9-12"><select name="newrs_jenis" id="newrs_jenis" placeholder="Jenis" style="width: 300px;"/>  
					<?php
					echo '<option value="">--Select--</option>';
					foreach ($jenis->result() as $row) {
						$jenis_rs_id = $row->jenis_rs_id;
						$jenis_rs_nama = $row->jenis_rs_nama;
						if($data['RS_JENIS'] == $jenis_rs_id)  
						echo '<option value="' . $jenis_rs_id . '" selected>' . $jenis_rs_nama . '</option>';
						else
						echo '<option value="' . $jenis_rs_id . '">' . $jenis_rs_nama . '</option>';
						
					}
					?>
				</select></div>
				
		<div class="grid-3-12"><label for="rs_kelas">Kelas</label></div>
                <div class="grid-9-12"><select name="newrs_kelas" id="newrs_kelas" placeholder="Kelas" style="width: 300px;"/>  
					<?php
					echo '<option value="">--Select--</option>';
					foreach ($kelas->result() as $row) {
						$kelas_rs_id = $row->kelas_rs_id;
						$kelas_rs = $row->kelas_rs;
						if($data['RS_KELAS'] == $kelas_rs_id)  
						echo '<option value="' . $kelas_rs_id . '" selected>' . $kelas_rs . '</option>';
						else
						echo '<option value="' . $kelas_rs_id . '">' . $kelas_rs . '</option>';
					}
					?>
				</select> </div>
				
				
		
                <div class="grid-3-12"><label for="rs_nama">Nama Rumah Sakit</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_nama" id="newrs_nama"  required="required" value='<?php echo $data['RS_NAMA'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_alamat">Alamat</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_alamat" id="newrs_alamat" value='<?php echo $data['RS_ALAMAT'] ?>' required="required" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_kabupaten">Kabupaten</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_kabupaten" id="newrs_kabupaten" value='<?php echo $data['RS_KAB'] ?>' required="required" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_kodepos">Kode Pos</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_kodepos" id="newrs_kodepos" value='<?php echo $data['RS_KODEPOS'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_telp">Nomor Telepon</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_telp" id="newrs_telp" value='<?php echo $data['RS_TELP'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_fax">Faximile</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_fax" id="newrs_fax" value='<?php echo $data['RS_FAX'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_email">Email</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_fax" id="newrs_email" value='<?php echo $data['RS_EMAIL'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_humas">Telp Humas</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_humas" id="newrs_humas" value='<?php echo $data['RS_TELP_HUMAS'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_website">Website</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_website" id="newrs_website" value='<?php echo $data['RS_WEBSITE'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_direktur">Direktur</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_direktur" id="newrs_direktur" value='<?php echo $data['RS_NAMA_DIREKTUR'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_penyelenggara">Penyelenggara</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_penyelenggara" id="newrs_penyelenggara" value='<?php echo $data['RS_PENYELENGGARA'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_statpenyelenggara">Status Penyelenggara</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_statpenyelenggara" id="newrs_statpenyelenggara" value='<?php echo $data['RS_STATUS_PENYELENGGARA'] ?>' class="text ui-widget-content ui-corner-all"></div>                
                <div class="grid-3-12"><label for="newrs_tgl_reg">Tanggal Registrasi</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_tgl_reg" id="newrs_tgl_reg" value='<?php echo $data['RS_TGL_REG'] ?>' class="sizew300"></div>
                <div class="grid-3-12"><label for="newrs_lahan">Luas Lahan</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_lahan" id="newrs_lahan" value='<?php echo $data['RS_LUAS_LAHAN'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_bangunan">Luas Bangunan</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_bangunan" id="newrs_bangunan" value='<?php echo $data['RS_LUAS_BANGUNAN'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_no_sio">SIO-Nomor</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_no_sio" id="newrs_no_sio" value='<?php echo $data['RS_SIO_NOMOR'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_tgl_sio">SIO-Tanggal</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_tgl_sio" id="newrs_tgl_sio" value='<?php echo $data['RS_SIO_TGL'] ?>' class="sizew300 text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_oleh_sio">SIO-Oleh</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_oleh_sio" id="newrs_oleh_sio" value='<?php echo $data['RS_SIO_OLEH'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_sifat_sio">SIO-Sifat</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_sifat_sio" id="newrs_sifat_sio" value='<?php echo $data['RS_SIO_SIFAT'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_berlaku_sio">SIO-Masa Berlaku</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_berlaku_sio" id="newrs_berlaku_sio" value='<?php echo $data['RS_SIO_MASABERLAKU'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_no_spk">SPK-Nomor</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_no_spk" id="newrs_no_spk" value='<?php echo $data['RS_SPK_NOMOR'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_tgl_spk">SPK-Tanggal</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_tgl_spk" id="newrs_tgl_spk" value='<?php echo $data['RS_SPK_TGL'] ?>' class="sizew300 text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_oleh_spk">SPK-Oleh</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_oleh_spk" id="newrs_oleh_spk" value='<?php echo $data['RS_SPK_OLEH'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_sifat_spk">SPK-Sifat</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_sifat_spk" id="newrs_sifat_spk" value='<?php echo $data['RS_SPK_SIFAT'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_berlaku_spk">SPK-Masa Berlaku</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_berlaku_spk" id="newrs_berlaku_spk" value='<?php echo $data['RS_SPK_MASABERLAKU'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_akreditasi">Akreditasi</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_akreditasi" id="newrs_akreditasi" value='<?php echo $data['RS_AKREDITASI'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_pentahapan">AKR Pentahapan</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_pentahapan" id="newrs_pentahapan" value='<?php echo $data['RS_AKR_PENTAHAPAN'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_status">AKR Status</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_status" id="newrs_status" value='<?php echo $data['RS_AKR_STATUS'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_tgl_akreditasi">Tanggal Akreditasi</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_tgl_akreditasi" id="newrs_tgl_akreditasi" value='<?php echo $data['RS_TGL_AKREDITASI'] ?>' class="sizew300 text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_strength">Strength</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_strength" id="newrs_strength" value='<?php echo $data['RS_STRENGTH'] ?>' class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_weakness">Weakness</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_weakness" id="newrs_weakness" value='<?php echo $data['RS_WEAKNESS'] ?>' class="text ui-widget-content ui-corner-all"></div>
             
			    <input type="hidden" name="rs_id" id="rs_id"  value='<?php echo $data['RS_NOREG'] ?>' /> 
			   
			    <input type="submit" class="right button green" value="Edit Rumah Sakit" />
			 </div>
				</div>
	
        </form>
    
	
	
	
	</div>
	</section>
		</section>
		
<script>
    
	jQuery(function() {
	jQuery( "#newrs_tgl_reg" ).datepicker({
		showAnim: 'slide',
		dateFormat: 'yy-mm-dd'
	});
	jQuery( "#newrs_tgl_sio" ).datepicker({
		showAnim: 'slide',
		dateFormat: 'yy-mm-dd'
	});
	jQuery( "#newrs_tgl_spk" ).datepicker({
		showAnim: 'slide',
		dateFormat: 'yy-mm-dd'
	});
	jQuery( "#newrs_tgl_akreditasi" ).datepicker({
		showAnim: 'slide',
		dateFormat: 'yy-mm-dd'
	});
	});
	
    
	
</script>
 
<?php include 'footer.php'; ?>