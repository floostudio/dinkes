<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_rumahsakit extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    } 
    
//new
    public function inputRSAll($rs_noreg, $rs_region, $rs_nama, $rs_alamat, $rs_kab, $rs_kodepos, $rs_telp, $rs_fax, $rs_email, $rs_telp_humas, $rs_website,
            $nama_direktur, $in_penyelenggara,  $in_status_pemyelenggara, $in_kelas, $in_jenis, 
            $in_luasLahan, $in_luasBangunan, 
            $tgl_registrasi, $in_sionomor, $in_siotgl, $in_sio_oleh, $in_siosifat, $in_siomasaberlaku, $in_spkNomor, $in_spkTgl, $in_spkOleh, $in_spkSifat, $in_spkMasaBerlaku,
            $in_akreditasi, $in_pentahapan, $in_status, $in_tggl_akreditasi,
            $in_strength, $in_weakness,$in_active,$in_pemilik) 
            {
        $status = false;

        $noreg = $rs_noreg;
		$region = $rs_region; //new
        $nama = $rs_nama;
        $alamat = $rs_alamat;
        $kab = $rs_kab;
        $kodepos = $rs_kodepos;
        $telp = $rs_telp;
        $fax = $rs_fax;
        $email = $rs_email;
        $telp_humas = $rs_telp_humas;
        $website = $rs_website;
 
        $namaDirektur = $nama_direktur;
        $penyelenggara = $in_penyelenggara;
        $status_pemyelenggara = $in_status_pemyelenggara;
        $kelas = $in_kelas;
        $jenis = $in_jenis;
        $luasLahan = $in_luasLahan;
        $luasBangunan = $in_luasBangunan;
         
        $tglReg = $tgl_registrasi;
        $sioNomor = $in_sionomor;
        $sioTgl = $in_siotgl;
        $sioOleh = $in_sio_oleh;
        $sioSifat = $in_siosifat;
        $sioMasaBerlaku = $in_siomasaberlaku;
        $spkNomor = $in_spkNomor;
        $spkTgl = $in_spkTgl;
        $spkOleh = $in_spkOleh;
        $spkSifat = $in_spkSifat;
        $spkMasaBerlaku = $in_spkMasaBerlaku;
        
        $akreditasi = $in_akreditasi;
        $pentahapan = $in_pentahapan;
        $status = $in_status;
        $tanggal = $in_tggl_akreditasi;
        
        $strength = $in_strength;
        $weakness = $in_weakness; 

		$active = $in_active;
		$pemilik = $in_pemilik;
        
        $data = array(
		    
            'KODE_REGISTRASI' => $noreg, //new
			'rs_region_id' => $region, //new
            'rs_nama' => $nama,
            'rs_alamat' => $alamat,
            'rs_kab' => $kab,
            'rs_kodepos' => $kodepos,
            'rs_telp' => $telp,
            'rs_fax' => $fax,
            'rs_email' => $email,
            'rs_telp_humas' => $telp_humas,
            'rs_website' => $website,
            
            'RS_NAMA_DIREKTUR' => $namaDirektur,
            'RS_PENYELENGGARA' => $penyelenggara,
            'RS_STATUS_PENYELENGGARA' => $status_pemyelenggara,
            'RS_KELAS' => $kelas,
            'RS_JENIS' => $jenis,
            'RS_LUAS_LAHAN' => $luasLahan,
            'RS_LUAS_BANGUNAN' => $luasBangunan,
            
            'RS_TGL_REG' => $tglReg,
            'RS_SIO_NOMOR' => $sioNomor,
            'RS_SIO_TGL' => $sioTgl,
            'RS_SIO_OLEH' => $sioOleh,
            'RS_SIO_SIFAT' => $sioSifat,
            'RS_SIO_MASABERLAKU' => $sioMasaBerlaku,
            'RS_SPK_NOMOR' => $spkNomor,
            'RS_SPK_TGL' => $spkTgl,
            'RS_SPK_OLEH' => $spkOleh,
            'RS_SPK_SIFAT' => $spkSifat,
            'RS_SPK_MASABERLAKU' => $spkMasaBerlaku,
            
            'RS_AKREDITASI' => $akreditasi,
            'RS_AKR_PENTAHAPAN' => $pentahapan,
            'RS_AKR_STATUS' => $status,
            'RS_TGL_AKREDITASI' => $tanggal,
            
            'RS_STRENGTH' => $strength,
            'RS_WEAKNESS' => $weakness,
		'RS_ACTIVE' => $active,
		'RS_PEMILIK' => $pemilik

        );

        $status = $this->db->insert('rumah_sakit', $data);

        return $status;
    }
    
//new
    public function editRSAll($rs_id,$rs_noreg, $rs_region, $rs_nama, $rs_alamat, $rs_kab, $rs_kodepos, $rs_telp, $rs_fax, $rs_email, $rs_telp_humas, $rs_website,
            $nama_direktur, $in_penyelenggara,  $in_status_pemyelenggara, $in_kelas, $in_jenis, 
            $in_luasLahan, $in_luasBangunan, 
            $tgl_registrasi, $in_sionomor, $in_siotgl, $in_sio_oleh, $in_siosifat, $in_siomasaberlaku, $in_spkNomor, $in_spkTgl, $in_spkOleh, $in_spkSifat, $in_spkMasaBerlaku,
            $in_akreditasi, $in_pentahapan, $in_status, $in_tggl_akreditasi,
            $in_strength, $in_weakness,$in_active,$in_pemilik) 
            {
        $status = false;

		$rsid = $rs_id;
        $noreg = $rs_noreg;
		$region = $rs_region;//new
        $nama = $rs_nama;
        $alamat = $rs_alamat;
        $kab = $rs_kab;
        $kodepos = $rs_kodepos;
        $telp = $rs_telp;
        $fax = $rs_fax;
        $email = $rs_email;
        $telp_humas = $rs_telp_humas;
        $website = $rs_website;
 
        $namaDirektur = $nama_direktur;
        $penyelenggara = $in_penyelenggara;
        $status_pemyelenggara = $in_status_pemyelenggara;
        $kelas = $in_kelas;
        $jenis = $in_jenis;
        $luasLahan = $in_luasLahan;
        $luasBangunan = $in_luasBangunan;
         
        $tglReg = $tgl_registrasi;
        $sioNomor = $in_sionomor;
        $sioTgl = $in_siotgl;
        $sioOleh = $in_sio_oleh;
        $sioSifat = $in_siosifat;
        $sioMasaBerlaku = $in_siomasaberlaku;
        $spkNomor = $in_spkNomor;
        $spkTgl = $in_spkTgl;
        $spkOleh = $in_spkOleh;
        $spkSifat = $in_spkSifat;
        $spkMasaBerlaku = $in_spkMasaBerlaku;
        
        $akreditasi = $in_akreditasi;
        $pentahapan = $in_pentahapan;
        $status = $in_status;
        $tanggal = $in_tggl_akreditasi;
        
        $strength = $in_strength;
        $weakness = $in_weakness; 
		$active = $in_active;
		$pemilik = $in_pemilik;
        
        $data = array(
		    'RS_NOREG' => $rsid, //new
            'KODE_REGISTRASI' => $noreg, //new
			'rs_region_id' => $region, //new
            'rs_nama' => $nama,
            'rs_alamat' => $alamat,
            'rs_kab' => $kab,
            'rs_kodepos' => $kodepos,
            'rs_telp' => $telp,
            'rs_fax' => $fax,
            'rs_email' => $email,
            'rs_telp_humas' => $telp_humas,
            'rs_website' => $website,
            
            'RS_NAMA_DIREKTUR' => $namaDirektur,
            'RS_PENYELENGGARA' => $penyelenggara,
            'RS_STATUS_PENYELENGGARA' => $status_pemyelenggara,
            'RS_KELAS' => $kelas,
            'RS_JENIS' => $jenis,
            'RS_LUAS_LAHAN' => $luasLahan,
            'RS_LUAS_BANGUNAN' => $luasBangunan,
            
            'RS_TGL_REG' => $tglReg,
            'RS_SIO_NOMOR' => $sioNomor,
            'RS_SIO_TGL' => $sioTgl,
            'RS_SIO_OLEH' => $sioOleh,
            'RS_SIO_SIFAT' => $sioSifat,
            'RS_SIO_MASABERLAKU' => $sioMasaBerlaku,
            'RS_SPK_NOMOR' => $spkNomor,
            'RS_SPK_TGL' => $spkTgl,
            'RS_SPK_OLEH' => $spkOleh,
            'RS_SPK_SIFAT' => $spkSifat,
            'RS_SPK_MASABERLAKU' => $spkMasaBerlaku,
            
            'RS_AKREDITASI' => $akreditasi,
            'RS_AKR_PENTAHAPAN' => $pentahapan,
            'RS_AKR_STATUS' => $status,
            'RS_TGL_AKREDITASI' => $tanggal,
            
            'RS_STRENGTH' => $strength,
            'RS_WEAKNESS' => $weakness, 
			'RS_ACTIVE' => $active,
			'RS_PEMILIK' => $pemilik

        );

        $where = array(
            'RS_NOREG' => $rsid, //new
        );

        $this->db->where($where);
        $status = $this->db->update('rumah_sakit', $data);
        
        return $status;
    }
	
	//new
    public function editRSLite($rs_noreg, $rs_region, $rs_nama, $rs_alamat, $rs_kab, $rs_kodepos, $rs_telp, $rs_fax, $rs_email, $rs_telp_humas, $rs_website,
            $nama_direktur, $in_penyelenggara,  $in_status_pemyelenggara, $in_kelas, $in_jenis, 
            $in_luasLahan, $in_luasBangunan, 
            $tgl_registrasi, $in_sionomor, $in_siotgl, $in_sio_oleh, $in_siosifat, $in_siomasaberlaku, $in_spkNomor, $in_spkTgl, $in_spkOleh, $in_spkSifat, $in_spkMasaBerlaku,
            $in_akreditasi, $in_pentahapan, $in_status, $in_tggl_akreditasi,
            $in_strength, $in_weakness) 
            {
        $status = false;

        $noreg = $rs_noreg;
		$region = $rs_region;//new
        $nama = $rs_nama;
        $alamat = $rs_alamat;
        $kab = $rs_kab;
        $kodepos = $rs_kodepos;
        $telp = $rs_telp;
        $fax = $rs_fax;
        $email = $rs_email;
        $telp_humas = $rs_telp_humas;
        $website = $rs_website;
 
        $namaDirektur = $nama_direktur;
        $penyelenggara = $in_penyelenggara;
        $status_pemyelenggara = $in_status_pemyelenggara;
        $kelas = $in_kelas;
        $jenis = $in_jenis;
        $luasLahan = $in_luasLahan;
        $luasBangunan = $in_luasBangunan;
         
        $tglReg = $tgl_registrasi;
        $sioNomor = $in_sionomor;
        $sioTgl = $in_siotgl;
        $sioOleh = $in_sio_oleh;
        $sioSifat = $in_siosifat;
        $sioMasaBerlaku = $in_siomasaberlaku;
        $spkNomor = $in_spkNomor;
        $spkTgl = $in_spkTgl;
        $spkOleh = $in_spkOleh;
        $spkSifat = $in_spkSifat;
        $spkMasaBerlaku = $in_spkMasaBerlaku;
        
        $akreditasi = $in_akreditasi;
        $pentahapan = $in_pentahapan;
        $status = $in_status;
        $tanggal = $in_tggl_akreditasi;
        
        $strength = $in_strength;
        $weakness = $in_weakness; 
        
        $data = array(
            'KODE_REGISTRASI' => $noreg, //new
			'rs_region_id' => $region, //new
            'rs_nama' => $nama,
            'rs_alamat' => $alamat,
            'rs_kab' => $kab,
            'rs_kodepos' => $kodepos,
            'rs_telp' => $telp,
            'rs_fax' => $fax,
            'rs_email' => $email,
            'rs_telp_humas' => $telp_humas,
            'rs_website' => $website,
            
            'RS_NAMA_DIREKTUR' => $namaDirektur,
            'RS_PENYELENGGARA' => $penyelenggara,
            'RS_STATUS_PENYELENGGARA' => $status_pemyelenggara,
            'RS_KELAS' => $kelas,
            'RS_JENIS' => $jenis,
            'RS_LUAS_LAHAN' => $luasLahan,
            'RS_LUAS_BANGUNAN' => $luasBangunan,
            
            'RS_TGL_REG' => $tglReg,
            'RS_SIO_NOMOR' => $sioNomor,
            'RS_SIO_TGL' => $sioTgl,
            'RS_SIO_OLEH' => $sioOleh,
            'RS_SIO_SIFAT' => $sioSifat,
            'RS_SIO_MASABERLAKU' => $sioMasaBerlaku,
            'RS_SPK_NOMOR' => $spkNomor,
            'RS_SPK_TGL' => $spkTgl,
            'RS_SPK_OLEH' => $spkOleh,
            'RS_SPK_SIFAT' => $spkSifat,
            'RS_SPK_MASABERLAKU' => $spkMasaBerlaku,
            
            'RS_AKREDITASI' => $akreditasi,
            'RS_AKR_PENTAHAPAN' => $pentahapan,
            'RS_AKR_STATUS' => $status,
            'RS_TGL_AKREDITASI' => $tanggal,
            
            'RS_STRENGTH' => $strength,
            'RS_WEAKNESS' => $weakness
        );

        $where = array(
            'KODE_REGISTRASI' => $rs_noreg, //new
        );

        $this->db->where($where);
        $status = $this->db->update('rumah_sakit', $data);
        
        return $status;
    }
    
    public function viewEditRS($id) {
        
        $where = array('rs_noreg' => $id);
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('rumah_sakit');
        $this->db->where($where);
        $this->db->order_by('rs_noreg');

        $query = $this->db->get();

        return $query;
    }

    public function inputRS($rs_noreg, $rs_nama, $rs_alamat, $rs_kab, $rs_kodepos, $rs_telp, $rs_fax, $rs_email, $rs_telp_humas, $rs_website) {
        $status = false;

        $noreg = $rs_noreg;
        $nama = $rs_nama;
        $alamat = $rs_alamat;
        $kab = $rs_kab;
        $kodepos = $rs_kodepos;
        $telp = $rs_telp;
        $fax = $rs_fax;
        $email = $rs_email;
        $telp_humas = $rs_telp_humas;
        $website = $rs_website;

        $data = array(
            'rs_noreg' => $noreg,
            'rs_nama' => $nama,
            'rs_alamat' => $alamat,
            'rs_kab' => $kab,
            'rs_kodepos' => $kodepos,
            'rs_telp' => $telp,
            'rs_fax' => $fax,
            'rs_email' => $email,
            'rs_telp_humas' => $telp_humas,
            'rs_website' => $website,
        );

        $status = $this->db->insert('rumah_sakit', $data);

        return $status;
    }

    public function inputInfoRS($nama_direktur, $in_penyelenggara, 
            $in_status_pemyelenggara, $in_kelas, $in_jenis, 
            $in_luasLahan, $in_luasBangunan, $in_rsId) {
        
        $status = false;

        $noregRS = $in_rsId;
        $namaDirektur = $nama_direktur;
        $penyelenggara = $in_penyelenggara;
        $status_pemyelenggara = $in_status_pemyelenggara;
        $kelas = $in_kelas;
        $jenis = $in_jenis;
        $luasLahan = $in_luasLahan;
        $luasBangunan = $in_luasBangunan;

        $data = array(
            'RS_NAMA_DIREKTUR' => $namaDirektur,
            'RS_PENYELENGGARA' => $penyelenggara,
            'RS_STATUS_PENYELENGGARA' => $status_pemyelenggara,
            'RS_KELAS' => $kelas,
            'RS_JENIS' => $jenis,
            'RS_LUAS_LAHAN' => $luasLahan,
            'RS_LUAS_BANGUNAN' => $luasBangunan
        );

        $where = array(
            'rs_noreg' => $noregRS,
        );

        $this->db->where($where);
        $status = $this->db->update('rumah_sakit', $data);

        return $status;
    }

    public function inputLegalRS($rs_id, $tgl_registrasi, $in_sionomor, $in_siotgl, $in_sio_oleh, $in_siosifat, $in_siomasaberlaku, $in_spkNomor, $in_spkTgl, $in_spkOleh, $in_spkSifat, $in_spkMasaBerlaku) {

        $status = false;

        $noregRS = $in_rsId;
        $tglReg = $tgl_registrasi;
        $sioNomor = $in_sionomor;
        $sioTgl = $in_siotgl;
        $sioOleh = $in_sio_oleh;
        $sioSifat = $in_siosifat;
        $sioMasaBerlaku = $in_siomasaberlaku;
        $spkNomor = $in_spkNomor;
        $spkTgl = $in_spkTgl;
        $spkOleh = $in_spkOleh;
        $spkSifat = $in_spkSifat;
        $spkMasaBerlaku = $in_spkMasaBerlaku;

        $data = array(
            'RS_TGL_REG' => $tglReg,
            'RS_SIO_NOMOR' => $sioNomor,
            'RS_SIO_TGL' => $sioTgl,
            'RS_SIO_OLEH' => $sioOleh,
            'RS_SIO_SIFAT' => $sioSifat,
            'RS_SIO_MASABERLAKU' => $sioMasaBerlaku,
            'RS_SPK_NOMOR' => $spkNomor,
            'RS_SPK_TGL' => $spkTgl,
            'RS_SPK_OLEH' => $spkOleh,
            'RS_SPK_SIFAT' => $spkSifat,
            'RS_SPK_MASABERLAKU' => $spkMasaBerlaku
        );

        $where = array(
            'rs_noreg' => $noregRS,
        );

        $this->db->where($where);
        $status = $this->db->update('rumah_sakit', $data);

        return $status;
    }

    public function inputAkreditasiRS($in_rsId, $in_akreditasi, $in_pentahapan, $in_status
    , $in_tggl_akreditasi) {

        $status = false;

        $noregRS = $in_rsId;
        $akreditasi = $in_akreditasi;
        $pentahapan = $in_pentahapan;
        $status = $in_status;
        $tanggal = $in_tggl_akreditasi;

        $data = array(
            'RS_AKREDITASI' => $akreditasi,
            'RS_AKR_PENTAHAPAN' => $pentahapan,
            'RS_AKR_STATUS' => $status,
            'RS_TGL_AKREDITASI' => $tanggal
        );

        $where = array(
            'rs_noreg' => $noregRS,
        );

        $this->db->where($where);
        $status = $this->db->update('rumah_sakit', $data);

        return $status;
    }

    public function inputStrengthRS($in_rsId, $in_strength, $in_weakness) {

        $status = false;

        $noregRS = $in_rsId;
        $strength = $in_strength;
        $weakness = $in_weakness;

        $data = array(
            'RS_STRENGTH' => $strength,
            'RS_WEAKNESS' => $weakness
        );

        $where = array(
            'rs_noreg' => $noregRS,
        );

        $this->db->where($where);
        $status = $this->db->update('rumah_sakit', $data);

        return $status;
    }

    public function inputTahunLaporan($in_tahunId, $in_tahun) {
        $status = false;
 
        $tahunId = $in_tahunId;
        $tahun = $in_tahun;

        $data = array( 
            'TAHUN_ID' => $tahunId,
            'TAHUN_TAHUN' => $tahun
        );

        $status = $this->db->insert('tahun', $data);

        return $status;
    }
 
    public function retrieveRS()
    {
        $status = false;
        
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('rumah_sakit');
        $this->db->order_by('rs_noreg');

        $query = $this->db->get();
        return $query;
    }

    public function retrieveRSActive()
    {
        $status = false;

	$rs_stat = 1;
        
        $this->db->select('*');  
        $this->db->from('rumah_sakit');
        $this->db->order_by('rs_noreg');
	
	$where = array(
            'RS_ACTIVE' => $rs_stat,
        );

	$this->db->where($where);

        $query = $this->db->get();
        return $query;
    }
	
	public function retrieveRSbyId($rs_id)
    {
        $status = false;
        
        $this->db->select('*');  
        $this->db->from('rumah_sakit'); 

	$where = array(
            'RS_NOREG' => $rs_id,
        );

        $this->db->where($where);
		
        $query = $this->db->get();
        return $query;
    }
	
	public function deleteRSbyId($rs_id)
    {
        $where = array(
            'rs_noreg' => $rs_id,
        );
        $status = $this->db->delete('rumah_sakit', $where);
        return $status;
    }
	
	public function retrieveKelas() {
        $this->db->select('*');  
        $this->db->from('kelas_rs');
        $this->db->order_by('kelas_rs_id');

        $query = $this->db->get();
        return $query;
    }
	
    public function retrieveJenis() {
        $this->db->select('*');  
        $this->db->from('rs_jenis');
        $this->db->order_by('rs_jenis_id');

        $query = $this->db->get();
        return $query;
    }

	//new
	//Retrieve RS untuk Rekap
	public function retrieveRSRekap(){ 
		  
		$this->db->select('*'); 
		$this->db->from('rumah_sakit');     
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
		$this->db->join('rs_jenis', 'rs_jenis.rs_jenis_id = rumah_sakit.RS_JENIS');
	  	 
		$this->db->order_by('rumah_sakit.RS_REGION_ID');
		$this->db->order_by('rumah_sakit.RS_PEMILIK','ASC');
		$this->db->order_by('rumah_sakit.RS_KELAS','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}
                
}
