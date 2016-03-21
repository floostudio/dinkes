 <?php

 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_bab5_1_retrieve extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

     
	public function retrieveTrendKunjunganIGD($in_tahun, $in_rsNoreg , 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg;
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('kunjungan_igd'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kunjungan_igd.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kunjungan_igd.TAHUN_ID');
		$this->db->join('list_tahun', 'list_tahun.LIST_TAHUN_ID = kunjungan_igd.LIST_TAHUN_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); //revisi 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI');
		$this->db->order_by('kunjungan_igd.LIST_TAHUN_ID'); //revisi 
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveLiveSaving($in_tahun, $in_rsNoreg , 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('live_saving'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = live_saving.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = live_saving.TAHUN_ID');
		$this->db->join('list_tribulan', 'list_tribulan.TRIBULAN_ID = live_saving.TRIBULAN_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID');
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('live_saving.TRIBULAN_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveJumlTenagaIGD($in_tahun, $in_rsNoreg , 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('jumlah_tenaga_igd'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = jumlah_tenaga_igd.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = jumlah_tenaga_igd.TAHUN_ID');
		$this->db->join('list_tenaga_igd', 'list_tenaga_igd.IGDLIST_ID = jumlah_tenaga_igd.IGDLIST_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID');
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('jumlah_tenaga_igd.IGDLIST_ID','ASC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveSepuluhBesarPenyIGD($in_tahun, $in_rsNoreg , 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('sepuluh_besar_penyakit_igd'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = sepuluh_besar_penyakit_igd.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = sepuluh_besar_penyakit_igd.TAHUN_ID');
		$this->db->join('icd10', 'icd10.ICD10_CODE = sepuluh_besar_penyakit_igd.ICD10_CODE');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
		
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('sepuluh_besar_penyakit_igd.PENY_IGD_JMLH','DESC'); //revisi
		
		$query = $this->db->get();

		return $query; 
	} 

	public function retrieveKegiatanRujukanIGD($in_tahun, $in_rsNoreg , 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('kegiatan_rujukan_igd'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kegiatan_rujukan_igd.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kegiatan_rujukan_igd.TAHUN_ID');
		$this->db->join('list_kegiatan_rujukan_igd', 'list_kegiatan_rujukan_igd.LISTRUJUKAN_ID = kegiatan_rujukan_igd.LISTRUJUKAN_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('kegiatan_rujukan_igd.LISTRUJUKAN_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveKegiatanRujukan($in_tahun, $in_rsNoreg , 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara;  
	 
		$this->db->select('*'); 
		$this->db->from('kegiatan_rujukan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kegiatan_rujukan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kegiatan_rujukan.TAHUN_ID');
		$this->db->join('list_spesialisasi_rujukan', 'list_spesialisasi_rujukan.SR_ID = kegiatan_rujukan.SR_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID');
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('kegiatan_rujukan.SR_ID','ASC'); //revisi 
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveSepuluhBesarKasusRujukan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg;  
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('sepuluh_besar_kasus_rujukan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = sepuluh_besar_kasus_rujukan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = sepuluh_besar_kasus_rujukan.TAHUN_ID'); 
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID');  
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('sepuluh_besar_kasus_rujukan.SRJKN_PUSKESMAS','DESC'); //revisi
		 
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveKunjunganRawatJalan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg;  
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('kunjungan_rawat_jalan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kunjungan_rawat_jalan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kunjungan_rawat_jalan.TAHUN_ID');
		$this->db->join('list_poli_rawat_jalan', 'list_poli_rawat_jalan.POLI_ID = kunjungan_rawat_jalan.POLI_ID');
		 	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('kunjungan_rawat_jalan.POLI_ID','ASC'); //revisi
				
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrievePembayaranRawatJalan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg;  
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara;  
	 
		$this->db->select('*'); 
		$this->db->from('pembayaran_rawat_jalan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pembayaran_rawat_jalan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pembayaran_rawat_jalan.TAHUN_ID');
		$this->db->join('list_poli_rawat_jalan', 'list_poli_rawat_jalan.POLI_ID = pembayaran_rawat_jalan.POLI_ID');
		
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
		 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		 
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('pembayaran_rawat_jalan.POLI_ID','ASC'); //revisi
		
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveSepuluhBesarPenyakitRawatJln($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('sepuluh_besar_penyakit_rawat_jalan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = sepuluh_besar_penyakit_rawat_jalan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = sepuluh_besar_penyakit_rawat_jalan.TAHUN_ID');
		$this->db->join('icd10', 'icd10.ICD10_CODE = sepuluh_besar_penyakit_rawat_jalan.ICD10_CODE');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
	 
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('sepuluh_besar_penyakit_rawat_jalan.PENY_RJ_JUMLAH','DESC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveKegiatanRawatInap($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('kegiatan_rawat_inap'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kegiatan_rawat_inap.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kegiatan_rawat_inap.TAHUN_ID');
		$this->db->join('list_pelayanan_rawat_inap', 'list_pelayanan_rawat_inap.PEL_RI_ID = kegiatan_rawat_inap.PEL_RI_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
	 
		$this->db->order_by('rumah_sakit.RS_REGION_ID');  
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('kegiatan_rawat_inap.PEL_RI_ID','ASC'); //revisi 
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrievePembayaranRawatInap($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('pembayaran_rawat_inap'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pembayaran_rawat_inap.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pembayaran_rawat_inap.TAHUN_ID');
		$this->db->join('list_pelayanan_rawat_inap', 'list_pelayanan_rawat_inap.PEL_RI_ID = pembayaran_rawat_inap.PEL_RI_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
	 
		$this->db->order_by('rumah_sakit.RS_REGION_ID');  
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('pembayaran_rawat_inap.PEL_RI_ID','ASC'); //revisi		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveIndikatorKegiatanRI($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('indikator_klinik_kegiatan_rawat_inap'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = indikator_klinik_kegiatan_rawat_inap.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = indikator_klinik_kegiatan_rawat_inap.TAHUN_ID');
		$this->db->join('list_indikator_klinik_ri', 'list_indikator_klinik_ri.IKRI_ID = indikator_klinik_kegiatan_rawat_inap.IKRI_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		
		$this->db->order_by('rumah_sakit.RS_REGION_ID');  
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('indikator_klinik_kegiatan_rawat_inap.IKRI_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
	
	public function retrievePenyakitTerbanyakRI($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('sepuluh_besar_penyakit_rawat_inap'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = sepuluh_besar_penyakit_rawat_inap.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = sepuluh_besar_penyakit_rawat_inap.TAHUN_ID');
		$this->db->join('icd10', 'icd10.ICD10_CODE = sepuluh_besar_penyakit_rawat_inap.ICD10_CODE');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
	 
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('sepuluh_besar_penyakit_rawat_inap.PENY_RI_JMLH','DESC'); //mm  
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveKematianRI($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg;  
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('diagnosis_kematian_rawat_inap'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = diagnosis_kematian_rawat_inap.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = diagnosis_kematian_rawat_inap.TAHUN_ID');
		$this->db->join('icd10', 'icd10.ICD10_CODE = diagnosis_kematian_rawat_inap.ICD10_CODE');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		 
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('diagnosis_kematian_rawat_inap.DK_PERSEN','DESC'); //mm  
				
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveJumlahOperasi($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('jumlah_operasi_bedah'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = jumlah_operasi_bedah.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = jumlah_operasi_bedah.TAHUN_ID');
		$this->db->join('list_jenis_operasi', 'list_jenis_operasi.JENIS_OPERASI_ID = jumlah_operasi_bedah.JENIS_OPERASI_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		 
		$this->db->order_by('rumah_sakit.RS_REGION_ID');  
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('jumlah_operasi_bedah.JENIS_OPERASI_ID','ASC'); //revisi
		 
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrievePelayananPersalinan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('hasil_pelayanan_persalinan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = hasil_pelayanan_persalinan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = hasil_pelayanan_persalinan.TAHUN_ID');
		$this->db->join('list_pelayanan_persalinan', 'list_pelayanan_persalinan.PP_ID = hasil_pelayanan_persalinan.PP_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		 
		$this->db->order_by('rumah_sakit.RS_REGION_ID'); 
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('hasil_pelayanan_persalinan.PP_ID','ASC'); //revisi
  
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrievePelayananPerinatologi($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara;  
	 
		$this->db->select('*'); 
		$this->db->from('hasil_pelayanan_perinatologi'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = hasil_pelayanan_perinatologi.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = hasil_pelayanan_perinatologi.TAHUN_ID');
		$this->db->join('list_pelayanan_perinatologi', 'list_pelayanan_perinatologi.PPR_ID = hasil_pelayanan_perinatologi.PPR_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		 
		$this->db->order_by('rumah_sakit.RS_REGION_ID');  
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('hasil_pelayanan_perinatologi.PPR_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
        
        public function retrieveSistemKomGD($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara;  
	 
		$this->db->select('*'); 
		$this->db->from('siskom_kegawatdaruratan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = siskom_kegawatdaruratan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = siskom_kegawatdaruratan.TAHUN_ID');
		$this->db->join('list_siskom_igd', 'list_siskom_igd.SKIGDLIST_ID = siskom_kegawatdaruratan.SKIGDLIST_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		 
		$this->db->order_by('rumah_sakit.RS_REGION_ID');  
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('siskom_kegawatdaruratan.SKIGD_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
 
        public function retrieveSepuluhBesarRujukanAtas($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara;  
	 
		$this->db->select('*'); 
		$this->db->from('sepuluh_besar_rujukan_keatas'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = sepuluh_besar_rujukan_keatas.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = sepuluh_besar_rujukan_keatas.TAHUN_ID'); 
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		  
		$this->db->order_by('sepuluh_besar_rujukan_keatas.SRJKN_ID','ASC');
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
        
        public function retrieveSepuluhBesarRujukanBawah($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara;  
	 
		$this->db->select('*'); 
		$this->db->from('sepuluh_besar_rujukan_drbawah'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = sepuluh_besar_rujukan_drbawah.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = sepuluh_besar_rujukan_drbawah.TAHUN_ID'); 
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
			 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		  
		$this->db->order_by('sepuluh_besar_rujukan_drbawah.SRJKN_ID','ASC');
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
}
