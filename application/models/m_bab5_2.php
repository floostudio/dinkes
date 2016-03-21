<?php

/*

  Model untuk input Bab V Sheet 6-13

  Keterangan:

  Sheet 6: V.6.a.Hasil Pelayanan Kegiatan KB -> fungsi inputKB
  7 : Tidak Ada 
  8: V.8.a. Jumlah Kunjungan Pelayanan Radiologi -> fungsi inputKunjunganRadiologi
  9 : Tabel V.9.a. Jumlah Pemeriksaan Pelayanan Laboratorium 
		tabel 1 -> fungsi inputLabPatologi
		tabel 2 -> fungsi inputLabToksikologi
		tabel 3 -> fungsi inputLabTotal
  10: V.10.a. Kegiatan Rehabilitasi Medik -> fungsi inputRehabMedik
  11: V.11.a. Pelayanan Obat ->  inputPelayananFarmasi
  12: V.12.a. Jumlah Pelayanan Diit -> inputPelayananDiit
      V.12.b. Konsultasi/Penyuluhan Gizi -> inputKonsultasiGizi
  13: V.13.a. Kegiatan Transfusi Darah -> fungsi inputKegiatanTransfusi
	 V. 13.b Penggunaan darah di rumah sakit -> inputPenggunaanDarah
	 V.13.c Penerimaan Darah -> inputPenerimaanDarah


 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_bab5_2 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function inputKB($in_tahunId, $in_rsNoreg, $in_metodeId, $in_jumlah, $in_rujukanRI, $in_rujukanRJ, $in_kunjunganUlang, $in_keluhan, $in_dirujuk) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $metodeId = $in_metodeId;
        $jumlah = $in_jumlah;

        $rujukanRI = $in_rujukanRI;
        $rujukanRJ = $in_rujukanRJ;
        $kunjunganUlang = $in_kunjunganUlang;
        $keluhan = $in_keluhan;
        $dirujuk = $in_dirujuk;


        $data = array(
            'METODE_ID' => $metodeId, //list_metode_kb
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KB_JUMLAH_PESERTA' => $jumlah,
            'KB_RUJUKAN_RI' => $rujukanRI,
            'KB_RUJUKAN_JLN' => $rujukanRJ,
            'KB_KUNJUNGAN_ULANG' => $kunjunganUlang,
            'KB_KELUHAN' => $keluhan,
            'KB_DIRUJUK' => $dirujuk
        );

        $where = array (
                'METODE_ID' => $metodeId, //list_metode_kb
                'TAHUN_ID' => $tahunId,
                'RS_NOREG' => $rsNoreg,
        );
        
        if($this->m_bab->cekData('pelayanan_kegiatan_kb', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('pelayanan_kegiatan_kb', $data);
        }
        else {
            $status = $this->db->insert('pelayanan_kegiatan_kb', $data);
        }
        return $status;
    }

    function inputKunjunganRadiologi($in_tahunId, $in_rsNoreg, $in_radiologiId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $radiologiId = $in_radiologiId;
        $jumlah = $in_jumlah;

        $data = array(
            'P_RADIO_ID' => $radiologiId, /* tabel list_pelayanan_radiologi */
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'RADIO_KUNJUNGAN' => $jumlah
        );

        $where = array (
                'P_RADIO_ID' => $radiologiId, /* tabel list_pelayanan_radiologi */
                'TAHUN_ID' => $tahunId,
                'RS_NOREG' => $rsNoreg,
        );
        
        if($this->m_bab->cekData('jumlah_kunjungan_radiologi', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('jumlah_kunjungan_radiologi', $data);
        }
        else {
            $status = $this->db->insert('jumlah_kunjungan_radiologi', $data);
        }
        return $status;
    }

    function inputLabPatologi($in_tahunId, $in_rsNoreg, $in_labId, $in_sederhanaN2, $in_sedangN2, $in_canggihN2, $in_sederhanaN1, $in_sedangN1, $in_canggihN1, $in_sederhanaN, $in_sedangN, $in_canggihN) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $labId = $in_labId;

        $sederhanaN2 = $in_sederhanaN2;
        $sedangN2 = $in_sedangN2;
        $canggihN2 = $in_canggihN2;

        $sederhanaN1 = $in_sederhanaN1;
        $sedangN1 = $in_sedangN1;
        $canggihN1 = $in_canggihN1;

        $sederhanaN = $in_sederhanaN;
        $sedangN = $in_sedangN;
        $canggihN = $in_canggihN;



        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_LAB_ID' => $labId, /* tabel list_jenis_pemeriksaan_lab */
            'LAB_P_SEDERHANA_N2' => $sederhanaN2,
            'LAB_P_SEDANG_N2' => $sedangN2,
            'LAB_P_CANGGIH_N2' => $canggihN2,
            'LAB_P_SEDERHANA_N1' => $sederhanaN1,
            'LAB_P_SEDANG_N1' => $sedangN1,
            'LAB_P_CANGGIH_N1' => $canggihN1,
            'LAB_P_SEDERHANA_N' => $sederhanaN,
            'LAB_P_SEDANG_N' => $sedangN,
            'LAB_P_CANGGIH_N' => $canggihN
        );
        
        $where = array (
                'TAHUN_ID' => $tahunId,
                'RS_NOREG' => $rsNoreg,
                'JENIS_LAB_ID' => $labId, /* tabel list_jenis_pemeriksaan_lab */
        );
        
        if($this->m_bab->cekData('pelayanan_lab_patologi', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('pelayanan_lab_patologi', $data);
        }
        else {
            $status = $this->db->insert('pelayanan_lab_patologi', $data);
        }
        return $status;
    }

    function inputLabToksikologi($in_tahunId, $in_rsNoreg, $in_pemeriksaanId, $in_skriningN2, $in_konfirmasiN2, $in_skriningN1, $in_konfirmasiN1, $in_skriningN, $in_konfirmasiN
    ) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $pemeriksaanId = $in_pemeriksaanId;

        $skriningN2 = $in_skriningN2;
        $konfirmasiN2 = $in_konfirmasiN2;

        $skriningN1 = $in_skriningN1;
        $konfirmasiN1 = $in_konfirmasiN1;

        $skriningN = $in_skriningN;
        $konfirmasiN = $in_konfirmasiN;


        $data = array(
            'LPT_ID' => $pemeriksaanId, //list_pemeriksaan_toksikologi
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LAB_T_SKRINING_N2' => $skriningN2,
            'LAB_T_KONFIRMASI_N2' => $konfirmasiN2,
            'LAB_T_SKRINING_N1' => $skriningN1,
            'LAB_T_KONFIRMASI_N1' => $konfirmasiN1,
            'LAB_T_SKRINING_N' => $skriningN,
            'LAB_T_KONFIRMASI_N' => $konfirmasiN
        );
        
        $where = array (
                'LPT_ID' => $pemeriksaanId, //list_pemeriksaan_toksikologi
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        
        if($this->m_bab->cekData('pelayanan_lab_toksikologi', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('pelayanan_lab_toksikologi', $data);
        }
        else {
            $status = $this->db->insert('pelayanan_lab_toksikologi', $data);
        }
        return $status;
    }

    function inputLabTotal($in_tahunId, $in_rsNoreg, $in_labId, $in_jumlahN2, $in_jumlahN1, $in_jumlahN, $in_jumlahTotal, $in_jumlahRerata
    ) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $labId = $in_labId;

        $jumlahN2 = $in_jumlahN2;
        $jumlahN1 = $in_jumlahN1;
        $jumlahN = $in_jumlahN;

        $jumlahTotal = $in_jumlahTotal;
        $jumlahRerata = $in_jumlahRerata;


        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_LAB_ID' => $labId, /* tabel list_jenis_pemeriksaan_lab */
            'LAB_TOTAL_JUMLAH_N2' => $jumlahN2,
            'LAB_TOTAL_JUMLAH_N1' => $jumlahN1,
            'LAB_TOTAL_JUMLAH_N' => $jumlahN,
            'LAB_TOTAL_JUMLAH_TOTAL' => $jumlahTotal,
            'LAB_TOTAL_JUMLAH_RERATA' => $jumlahRerata
        );

        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_LAB_ID' => $labId, /* tabel list_jenis_pemeriksaan_lab */
        );
        
        if($this->m_bab->cekData('pelayanan_lab_total', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('pelayanan_lab_total', $data);
        }
        else {
            $status = $this->db->insert('pelayanan_lab_total', $data);
        }
        return $status;
    }

    function inputRehabMedik($in_tahunId, $in_rsNoreg, $in_tindakanId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $tindakanId = $in_tindakanId;
        $jumlah = $in_jumlah;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_RM_ID' => $tindakanId, //list_tindakan_rehabilitasi_medik
            'RM_JUMLAH' => $jumlah
        );
        
        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_RM_ID' => $tindakanId, //list_tindakan_rehabilitasi_medik
        );
        
        if($this->m_bab->cekData('rehabilitasi_medik', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('rehabilitasi_medik', $data);
        }
        else {
            $status = $this->db->insert('rehabilitasi_medik', $data);
        }
        return $status;
    }

    function inputPelayananFarmasi($in_tahunId, $in_rsNoreg, $in_obatId, $in_jumlahItem, $in_jumlahIGD, $in_jumlahIRJA, $in_jumlahIRNA, $in_jumlahTotal, $in_jumlahDilayani, $in_jumlahPersen
    ) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $obatId = $in_obatId;

        $jumlahItem = $in_jumlahItem;
        $jumlahIGD = $in_jumlahIGD;
        $jumlahIRJA = $in_jumlahIRJA;
        $jumlahIRNA = $in_jumlahIRNA;

        $jumlahTotal = $in_jumlahTotal;
        $jumlahDilayani = $in_jumlahDilayani;
        $jumlahPersen = $in_jumlahPersen;

        $data = array(
            'GO_ID' => $obatId, //list_golongan_obat
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PF_JUMLAH_ITEM' => $jumlahItem,
            'PF_JML_IGD' => $jumlahIGD,
            'PF_JML_IRJA' => $jumlahIRJA,
            'PF_JML_IRNA' => $jumlahIRNA,
            'PF_JML_RESEP_TOTAL' => $jumlahTotal,
            'PF_JML_RESEP_DILAYANI' => $jumlahDilayani,
            'PF_JML_RESEP_PERSEN' => $jumlahPersen,
        );
        $where = array (
               'GO_ID' => $obatId, //list_golongan_obat
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        
        if($this->m_bab->cekData('pelayanan_farmasi', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('pelayanan_farmasi', $data);
        }
        else {
            $status = $this->db->insert('pelayanan_farmasi', $data);
        }
        return $status;
    }

    function inputPelayananDiet($in_tahunId, $in_rsNoreg, $in_jenisDietId, $in_vvip, $in_vip, $in_kls1, $in_kls3, $in_kls2, $in_kls1_1, $in_jumlah
    ) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $jenisDietId = $in_jenisDietId;

        $vvip = $in_vvip;
        $vip = $in_vip;
        $kls1 = $in_kls1;
        $kls3 = $in_kls3;

        $kls2 = $in_kls2;
        $kls1_1 = $in_kls1_1;
        $jumlah = $in_jumlah;

        $data = array(
            'JENIS_DIET_ID' => $jenisDietId, //list_jenis_diet
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'DIIT_VVIP' => $vvip,
            'DIIT_VIP' => $vip,
            'DIIT_KLS1' => $kls1,
            'DIIT_KLS3' => $kls3,
            'DIIT_KLS2' => $kls2,
            'DIIT_KLS1_1' => $kls1_1,
            'DIIT_JUMLAH' => $jumlah
        );
        $where = array (
               'JENIS_DIET_ID' => $jenisDietId, //list_jenis_diet
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        
        if($this->m_bab->cekData('pelayanan_diit', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('pelayanan_diit', $data);
        }
        else {
            $status = $this->db->insert('pelayanan_diit', $data);
        }
        return $status;
    }

    function inputKonsultasiGizi($in_tahunId, $in_rsNoreg, $in_tipePasienId, $in_jumlah, $in_keterangan) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $tipePasienId = $in_tipePasienId;
        $jumlah = $in_jumlah;
        $keterangan = $in_keterangan;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'TIPE_PASIEN_ID' => $tipePasienId, /* tabel list_tipe_pasien */
            'KG_JUMLAH' => $jumlah,
            'KG_KETERANGAN' => $keterangan
        );

        $where = array (
               'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'TIPE_PASIEN_ID' => $tipePasienId, /* tabel list_tipe_pasien */
        );
        
        if($this->m_bab->cekData('konsultasi_gizi', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('konsultasi_gizi', $data);
        }
        else {
            $status = $this->db->insert('konsultasi_gizi', $data);
        }
        return $status;
    }
	
    function inputKegiatanTransfusi($in_tahunId, $in_rsNoreg, $in_kegiatanId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kegiatanId = $in_kegiatanId;
        $jumlah = $in_jumlah; 

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KEGIATAN_TRANS_ID' => $kegiatanId, /* tabel list_kegiatan_transfusi */
            'TRANS_JUMLAH' => $jumlah 
        );

        $where = array (
              'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KEGIATAN_TRANS_ID' => $kegiatanId, /* tabel list_kegiatan_transfusi */
        );
        
        if($this->m_bab->cekData('kegiatan_transfusi_darah', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kegiatan_transfusi_darah', $data);
        }
        else {
            $status = $this->db->insert('kegiatan_transfusi_darah', $data);
        }
        return $status;
    }
	
    function inputPenggunaanDarah($in_tahunId, $in_rsNoreg, $in_penggunaanId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $penggunaanId = $in_penggunaanId;
        $jumlah = $in_jumlah; 

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PENGGUNAAN_TRANS_ID' => $penggunaanId, /* tabel list_penggunaan_transfusi */
            'PENGGUNAAN_DARAH_JUMLAH' => $jumlah 
        );
        
        $where = array (
              'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PENGGUNAAN_TRANS_ID' => $penggunaanId, /* tabel list_penggunaan_transfusi */
        );
        
        if($this->m_bab->cekData('penggunaan_darah', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('penggunaan_darah', $data);
        }
        else {
            $status = $this->db->insert('penggunaan_darah', $data);
        }
        return $status;
    }
	
    function inputPenerimaanDarah($in_tahunId, $in_rsNoreg, $in_penerimaanId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $penerimaanId = $in_penerimaanId;
        $jumlah = $in_jumlah; 

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PENERIMAAN_DARAH_ID' => $penerimaanId, /* tabel list_penerimaaan_darah */
            'PENERIMAAN_JUMLAH' => $jumlah 
        );
        $where = array (
              'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PENERIMAAN_DARAH_ID' => $penerimaanId, /* tabel list_penerimaaan_darah */
        );
        
        if($this->m_bab->cekData('penerimaan_darah', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('penerimaan_darah', $data);
        }
        else {
            $status = $this->db->insert('penerimaan_darah', $data);
        }
        return $status;
    }

	public function retrieveKB($in_tahun, $in_rsNoreg, 
		$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara;  
	 
		$this->db->select('*'); 
		$this->db->from('pelayanan_kegiatan_kb'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelayanan_kegiatan_kb.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pelayanan_kegiatan_kb.TAHUN_ID');
		$this->db->join('list_metode_kb', 'list_metode_kb.METODE_ID = pelayanan_kegiatan_kb.METODE_ID');
	 
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
		$this->db->order_by('pelayanan_kegiatan_kb.METODE_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
	
	public function retrievePelayananRadiologi($in_tahun, $in_rsNoreg, 
		$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('jumlah_kunjungan_radiologi'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = jumlah_kunjungan_radiologi.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = jumlah_kunjungan_radiologi.TAHUN_ID');
		$this->db->join('list_pelayanan_radiologi', 'list_pelayanan_radiologi.P_RADIO_ID = jumlah_kunjungan_radiologi.P_RADIO_ID');
	 
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
		$this->db->order_by('jumlah_kunjungan_radiologi.P_RADIO_ID','ASC'); //revisi
		
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
	
	public function retrieveLabPatologi($in_tahun, $in_rsNoreg, 
		$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('pelayanan_lab_patologi'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelayanan_lab_patologi.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pelayanan_lab_patologi.TAHUN_ID');
		$this->db->join('list_jenis_pemeriksaan_lab', 'list_jenis_pemeriksaan_lab.JENIS_LAB_ID = pelayanan_lab_patologi.JENIS_LAB_ID');
	 
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
		$this->db->order_by('pelayanan_lab_patologi.JENIS_LAB_ID','ASC'); //revisi
		  
		
		$query = $this->db->get(); 
		
		return $query; 
	}

	public function retrieveLabToksikologi($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('pelayanan_lab_toksikologi'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelayanan_lab_toksikologi.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pelayanan_lab_toksikologi.TAHUN_ID');
		$this->db->join('list_pemeriksaan_toksikologi', 'list_pemeriksaan_toksikologi.LPT_ID = pelayanan_lab_toksikologi.LPT_ID');
		
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
		$this->db->order_by('pelayanan_lab_toksikologi.LPT_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	}
 
	public function retrieveLabTotal($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('pelayanan_lab_total'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelayanan_lab_total.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pelayanan_lab_total.TAHUN_ID');
		$this->db->join('list_jenis_pemeriksaan_lab', 'list_jenis_pemeriksaan_lab.JENIS_LAB_ID = pelayanan_lab_total.JENIS_LAB_ID');
		
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
		$this->db->order_by('pelayanan_lab_total.JENIS_LAB_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	}
	
	public function retrieveRehabMedik($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('rehabilitasi_medik'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = rehabilitasi_medik.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = rehabilitasi_medik.TAHUN_ID');
		$this->db->join('list_tindakan_rehabilitasi_medik', 'list_tindakan_rehabilitasi_medik.LIST_TM_ID = rehabilitasi_medik.LIST_RM_ID');
		
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
		$this->db->order_by('rehabilitasi_medik.LIST_RM_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	}

	public function retrievePelayananFarmasi($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('pelayanan_farmasi'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelayanan_farmasi.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pelayanan_farmasi.TAHUN_ID');
		$this->db->join('list_golongan_obat', 'list_golongan_obat.GO_ID = pelayanan_farmasi.GO_ID');
		
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
		$this->db->order_by('pelayanan_farmasi.GO_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	}
	
	public function retrievePelayananDiet($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('pelayanan_diit'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelayanan_diit.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pelayanan_diit.TAHUN_ID');
		$this->db->join('list_jenis_diet', 'list_jenis_diet.JENIS_DIET_ID = pelayanan_diit.JENIS_DIET_ID');
		
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
		$this->db->order_by('pelayanan_diit.JENIS_DIET_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	}
	
	public function retrieveKonsultasiGizi($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('konsultasi_gizi'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = konsultasi_gizi.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = konsultasi_gizi.TAHUN_ID');
		$this->db->join('list_tipe_pasien', 'list_tipe_pasien.TIPE_PASIEN_ID = konsultasi_gizi.TIPE_PASIEN_ID');
		
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
		$this->db->order_by('konsultasi_gizi.TIPE_PASIEN_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	}
	
	public function retrieveKegiatanTransfusi($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('kegiatan_transfusi_darah'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kegiatan_transfusi_darah.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kegiatan_transfusi_darah.TAHUN_ID');
		$this->db->join('list_kegiatan_transfusi', 'list_kegiatan_transfusi.KEGIATAN_TRANS_ID = kegiatan_transfusi_darah.KEGIATAN_TRANS_ID');
		
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
		$this->db->order_by('kegiatan_transfusi_darah.KEGIATAN_TRANS_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	}
	
	public function retrievePenggunaanDarah($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('penggunaan_darah'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = penggunaan_darah.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = penggunaan_darah.TAHUN_ID');
		$this->db->join('list_penggunaan_transfusi', 'list_penggunaan_transfusi.PENGGUNAAN_TRANS_ID = penggunaan_darah.PENGGUNAAN_TRANS_ID');
		
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
		$this->db->order_by('penggunaan_darah.PENGGUNAAN_TRANS_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	}
	
	public function retrievePenerimaanDarah($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('penerimaan_darah'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = penerimaan_darah.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = penerimaan_darah.TAHUN_ID');
		$this->db->join('list_penerimaan_darah', 'list_penerimaan_darah.PENERIMAAN_DARAH_ID = penerimaan_darah.PENERIMAAN_DARAH_ID');
		
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
		$this->db->order_by('penerimaan_darah.PENERIMAAN_DARAH_ID','ASC'); //revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	}
}
