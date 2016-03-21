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
            <div class="title"><span class="icon16_sprite i_network_monitor"></span>Tambah Rumah Sakit </div>

           
				 
        <!--p class="validateTips">All form fields are required.</p-->
        <form class="formee" method="post" action="<?php echo site_url();?>/data_rs_crud/add" enctype="multipart/form-data">
            
			 <div class="inside">

                <div class="in">				
		 
				
                <div class="grid-3-12"><label for="rs_kodereg">Kode Registrasi</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_kodereg" id="newrs_kodereg" required="required" class="sizew300 text ui-widget-content ui-corner-all"></div>
		<!--kepemilikan-->
		<div class="grid-3-12"><label for="rs_stat">Kepemilikan</label></div>
		<div class="grid-9-12">
		<?php
		echo '<option value="">--Select--</option>';		
		foreach ($region->result() as $row) {
			$pemilik = $row->RS_PEMILIK;
			if(pemilik == 1)
				echo '<option value="' . $pemilik . '">Pemerintah</option>';
			if(pemilik == 2)
				echo '<option value="' . $pemilik . '">Swasta</option>';
			if(pemilik == 3)
				echo '<option value="' . $pemilik . '">TNI/POLRI</option>';
			if(pemilik == 4)
				echo '<option value="' . $pemilik . '">BUMN</option>';

		}
		?>
		</select>
		</div>
                <div class="grid-3-12"><label for="rs_region">Region</label></div>
                
				<div class="grid-9-12"><select name="newrs_region" id="newrs_region" required="require" placeholder="Region" style="width: 300px;"/>  
					<?php
					echo '<option value="">--Select--</option>';
					foreach ($region->result() as $row) {
						$region_id = $row->id_list_region;
						$region_nama = $row->daftar_list_region;

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

						echo '<option value="' . $kelas_rs_id . '">' . $kelas_rs . '</option>';
					}
					?>
				</select> </div>
		
                <div class="grid-3-12"><label for="rs_nama">Nama Rumah Sakit</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_nama" id="newrs_nama" value="" required="required" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_alamat">Alamat</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_alamat" id="newrs_alamat" value="" required="required" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_kabupaten">Kabupaten</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_kabupaten" id="newrs_kabupaten" value="" required="required" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_kodepos">Kode Pos</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_kodepos" id="newrs_kodepos" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_telp">Nomor Telepon</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_telp" id="newrs_telp" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_fax">Faximile</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_fax" id="newrs_fax" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_email">Email</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_fax" id="newrs_email" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_humas">Telp Humas</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_humas" id="newrs_humas" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_website">Website</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_website" id="newrs_website" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_direktur">Direktur</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_direktur" id="newrs_direktur" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_penyelenggara">Penyelenggara</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_penyelenggara" id="newrs_penyelenggara" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_statpenyelenggara">Status Penyelenggara</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_statpenyelenggara" id="newrs_statpenyelenggara" value="" class="text ui-widget-content ui-corner-all"></div>                
                <div class="grid-3-12"><label for="newrs_tgl_reg">Tanggal Registrasi</label></div>
                <div class="grid-9-12"> <input type="text" name="newrs_tgl_reg" id="newrs_tgl_reg" value="" class="sizew300"></div>
                <div class="grid-3-12"><label for="newrs_lahan">Luas Lahan</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_lahan" id="newrs_lahan" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_bangunan">Luas Bangunan</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_bangunan" id="newrs_bangunan" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_no_sio">SIO-Nomor</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_no_sio" id="newrs_no_sio" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_tgl_sio">SIO-Tanggal</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_tgl_sio" id="newrs_tgl_sio" value="" class="sizew300 text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_oleh_sio">SIO-Oleh</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_oleh_sio" id="newrs_oleh_sio" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_sifat_sio">SIO-Sifat</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_sifat_sio" id="newrs_sifat_sio" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_berlaku_sio">SIO-Masa Berlaku</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_berlaku_sio" id="newrs_berlaku_sio" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_no_spk">SPK-Nomor</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_no_spk" id="newrs_no_spk" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_tgl_spk">SPK-Tanggal</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_tgl_spk" id="newrs_tgl_spk" value="" class="sizew300 text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_oleh_spk">SPK-Oleh</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_oleh_spk" id="newrs_oleh_spk" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_sifat_spk">SPK-Sifat</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_sifat_spk" id="newrs_sifat_spk" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_berlaku_spk">SPK-Masa Berlaku</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_berlaku_spk" id="newrs_berlaku_spk" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_akreditasi">Akreditasi</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_akreditasi" id="newrs_akreditasi" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_pentahapan">AKR Pentahapan</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_pentahapan" id="newrs_pentahapan" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_status">AKR Status</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_status" id="newrs_status" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_tgl_akreditasi">Tanggal Akreditasi</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_tgl_akreditasi" id="newrs_tgl_akreditasi" value="" class="sizew300 text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_strength">Strength</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_strength" id="newrs_strength" value="" class="text ui-widget-content ui-corner-all"></div>
                <div class="grid-3-12"><label for="newrs_weakness">Weakness</label></div>
                <div class="grid-9-12"><input type="text" name="newrs_weakness" id="newrs_weakness" value="" class="text ui-widget-content ui-corner-all"></div>
             
			    <input type="submit" class="right button green" value="Tambah Rumah Sakit" />
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