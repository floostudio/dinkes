<?php

/*

  Model untuk input Bab V Sheet 15-25

  Keterangan:
  Sheet 15 RM (Tidak Ada, Input SPM dan Permasalahan ada di model m_analisa)
  Sheet 16: Tabel Kegiatan sanitasi -> fungsi inputSanitasi
  17 : (Tidak Ada, Input SPM dan Permasalahan ada di model m_analisa)
  18: (Tidak Ada, Input SPM dan Permasalahan ada di model m_analisa)
  19 : Tabel kegiatan pemulasaran Jenazah -> fungsi inputPemulasaranJenazah
  20: Tidak ada
  21: Tidak ada
  22: Tidak ada
  23: V.23.a. Pelayanan Kesehatan Gigi -> fungsi inputPelayananGigi
  24: Imunisasi -> fungsi inputImunisasi
  25: V.25.a. Jumlah Kunjungan Kegiatan Kesehatan Jiwa -> fungsi inputKegiatanKesehatanJiwa
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_bab5_4 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function inputSanitasi($in_tahunId, $in_rsNoreg, $in_sanitasiId, $in_kesimpulan) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $sanitasiId = $in_sanitasiId;
        $kesimpulan = $in_kesimpulan;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_SANITASI_ID' => $sanitasiId, //list_pemeriksaan_sanitasi
            'SANITASI_KESIMPULAN' => $kesimpulan
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_SANITASI_ID' => $sanitasiId,
        );

        if ($this->m_bab->cekData('kegiatan_sanitasi', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kegiatan_sanitasi', $data);
        } else {
            $status = $this->db->insert('kegiatan_sanitasi', $data);
        }

        return $status;
    }

    function inputPemulasaranJenazah($in_tahunId, $in_rsNoreg, $in_jenazahId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $jenazahId = $in_jenazahId;
        $jumlah = $in_jumlah;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_JENAZAH_ID' => $jenazahId, /* tabel list_tindakan_jenazah */
            'P_JENAZAH_JUMLAH' => $jumlah
        );


        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_JENAZAH_ID' => $jenazahId, /* tabel list_tindakan_jenazah */
        );

        if ($this->m_bab->cekData('pemulasaraan_jenazah', $where)) {
            $this->db->where($where);
            $status = $this->db->update('pemulasaraan_jenazah', $data);
        } else {
            $status = $this->db->insert('pemulasaraan_jenazah', $data);
        }

        return $status;
    }

    function inputPelayananGigi($in_tahunId, $in_rsNoreg, $in_tindakanId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $tindakanId = $in_tindakanId;
        $jumlah = $in_jumlah;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'TDK_GILUT_ID' => $tindakanId, /* tabel list_tindakan_gilut */
            'PEL_GILUT_JUMLAH' => $jumlah
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'TDK_GILUT_ID' => $tindakanId, /* tabel list_tindakan_gilut */
        );

        if ($this->m_bab->cekData('pelayanan_gigi', $where)) {
            $this->db->where($where);
            $status = $this->db->update('pelayanan_gigi', $data);
        } else {
            $status = $this->db->insert('pelayanan_gigi', $data);
        }
        return $status;
    }

    function inputImunisasi($in_tahunId, $in_rsNoreg, $in_imunisasiId, $in_jumlah, $in_dasar1, $in_dasar2, $in_dasar3, $in_booster1, $in_booster6, $in_booster12, $in_boosterJumlah, $in_keterangan
    ) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $imunisasiId = $in_imunisasiId;

        $jumlah = $in_jumlah;

        $dasar1 = $in_dasar1;
        $dasar2 = $in_dasar2;
        $dasar3 = $in_dasar3;

        $booster1 = $in_booster1;
        $booster6 = $in_booster6;
        $booster12 = $in_booster12;

        $boosterJumlah = $in_boosterJumlah;
        $keterangan = $in_keterangan;


        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_IMUNISASI_ID' => $imunisasiId, //list_jenis_imunisasi
            'IMUNISASI_JML_KEGIATAN' => $jumlah,
            'IMUNISASI_DASAR1' => $dasar1,
            'IMUNISASI_DASAR2' => $dasar2,
            'IMUNISASI_DASAR3' => $dasar3,
            'IMUNISASI_BOOSTER1' => $booster1,
            'IMUNISASI_BOOSTER6' => $booster6,
            'IMUNISASI_BOOSTER12' => $booster12,
            'IMUNISASI_BOOSTER_JML' => $boosterJumlah,
            'IMUNISASI_KETERANGAN' => $keterangan
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_IMUNISASI_ID' => $imunisasiId, //list_jenis_imunisasi
        );

        if ($this->m_bab->cekData('imunisasi', $where)) {
            $this->db->where($where);
            $status = $this->db->update('imunisasi', $data);
        } else {
            $status = $this->db->insert('imunisasi', $data);
        }
        return $status;
    }

    function inputKegiatanKesehatanJiwa($in_tahunId, $in_rsNoreg, $in_kegiatanId, $in_jumlah
    ) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kegiatanId = $in_kegiatanId;
        $jumlah = $in_jumlah;


        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_JIWA_ID' => $kegiatanId, //list_kegiatan_jiwa
            'JIWA_TOTAL' => $jumlah
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_JIWA_ID' => $kegiatanId, //list_kegiatan_jiwa
        );

        if ($this->m_bab->cekData('kegiatan_kesehatan_jiwa', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kegiatan_kesehatan_jiwa', $data);
        } else {
            $status = $this->db->insert('kegiatan_kesehatan_jiwa', $data);
        }
        return $status;
    }

    public function retrieveSanitasi($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('kegiatan_sanitasi');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kegiatan_sanitasi.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = kegiatan_sanitasi.TAHUN_ID');
        $this->db->join('list_pemeriksaan_sanitasi', 'list_pemeriksaan_sanitasi.LIST_SANITASI_ID = kegiatan_sanitasi.LIST_SANITASI_ID');

        $this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
        $this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');

        if ($tahun != null)
            $this->db->where('tahun.TAHUN_ID', $tahun);
        if ($rsNoreg != null)
            $this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);
        if ($region != null)
            $this->db->where('rumah_sakit.RS_REGION_ID', $region);
        if ($kelas != null)
            $this->db->where('rumah_sakit.RS_KELAS', $kelas);
        if ($statusPenyelenggara != null)
            $this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);

        if ($tahun == null)
            $this->db->order_by('tahun.TAHUN_ID');
        else
	$this->db->order_by('rumah_sakit.RS_REGION_ID');
	$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
	$this->db->order_by('kegiatan_sanitasi.LIST_SANITASI_ID','ASC');//revisi
		
        $query = $this->db->get();

        return $query;
    }

    public function retrievePemulasaranJenazah($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('pemulasaraan_jenazah');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pemulasaraan_jenazah.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = pemulasaraan_jenazah.TAHUN_ID');
        $this->db->join('list_tindakan_jenazah', 'list_tindakan_jenazah.LIST_JENAZAH_ID = pemulasaraan_jenazah.LIST_JENAZAH_ID');

        $this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
        $this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');

        if ($tahun != null)
            $this->db->where('tahun.TAHUN_ID', $tahun);
        if ($rsNoreg != null)
            $this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);
        if ($region != null)
            $this->db->where('rumah_sakit.RS_REGION_ID', $region);
        if ($kelas != null)
            $this->db->where('rumah_sakit.RS_KELAS', $kelas);
        if ($statusPenyelenggara != null)
            $this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);

        if ($tahun == null)
            $this->db->order_by('tahun.TAHUN_ID');
        else
	$this->db->order_by('rumah_sakit.RS_REGION_ID');
	$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
	$this->db->order_by('pemulasaraan_jenazah.LIST_JENAZAH_ID','ASC');//revisi
		
        $query = $this->db->get();

        return $query;
    }

    public function retrievePelayananGigi($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('pelayanan_gigi');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelayanan_gigi.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = pelayanan_gigi.TAHUN_ID');
        $this->db->join('list_tindakan_gilut', 'list_tindakan_gilut.TDK_GILUT_ID = pelayanan_gigi.TDK_GILUT_ID');

        $this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
        $this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');

        if ($tahun != null)
            $this->db->where('tahun.TAHUN_ID', $tahun);
        if ($rsNoreg != null)
            $this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);
        if ($region != null)
            $this->db->where('rumah_sakit.RS_REGION_ID', $region);
        if ($kelas != null)
            $this->db->where('rumah_sakit.RS_KELAS', $kelas);
        if ($statusPenyelenggara != null)
            $this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);

        if ($tahun == null)
            $this->db->order_by('tahun.TAHUN_ID');
        else
	$this->db->order_by('rumah_sakit.RS_REGION_ID');
	$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
	$this->db->order_by('pelayanan_gigi.TDK_GILUT_ID','ASC');//revisi
		
        $query = $this->db->get();

        return $query;
    }

    public function retrieveImunisasi($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('imunisasi');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = imunisasi.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = imunisasi.TAHUN_ID');
        $this->db->join('list_jenis_imunisasi', 'list_jenis_imunisasi.JENIS_IMUNISASI_ID = imunisasi.JENIS_IMUNISASI_ID');

        $this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
        $this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');

        if ($tahun != null)
            $this->db->where('tahun.TAHUN_ID', $tahun);
        if ($rsNoreg != null)
            $this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);
        if ($region != null)
            $this->db->where('rumah_sakit.RS_REGION_ID', $region);
        if ($kelas != null)
            $this->db->where('rumah_sakit.RS_KELAS', $kelas);
        if ($statusPenyelenggara != null)
            $this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);

        if ($tahun == null)
            $this->db->order_by('tahun.TAHUN_ID');
        else
	$this->db->order_by('rumah_sakit.RS_REGION_ID');
	$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
	$this->db->order_by('imunisasi.JENIS_IMUNISASI_ID','ASC');//revisi
		
        $query = $this->db->get();

        return $query;
    }

    public function retrieveKegiatanKesehatanJiwa($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('kegiatan_kesehatan_jiwa');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kegiatan_kesehatan_jiwa.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = kegiatan_kesehatan_jiwa.TAHUN_ID');
        $this->db->join('list_kegiatan_jiwa', 'list_kegiatan_jiwa.LIST_JIWA_ID = kegiatan_kesehatan_jiwa.LIST_JIWA_ID');

        $this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
        $this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');

        if ($tahun != null)
            $this->db->where('tahun.TAHUN_ID', $tahun);
        if ($rsNoreg != null)
            $this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);
        if ($region != null)
            $this->db->where('rumah_sakit.RS_REGION_ID', $region);
        if ($kelas != null)
            $this->db->where('rumah_sakit.RS_KELAS', $kelas);
        if ($statusPenyelenggara != null)
            $this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);

        if ($tahun == null)
            $this->db->order_by('tahun.TAHUN_ID');
        else
	$this->db->order_by('rumah_sakit.RS_REGION_ID');
	$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
	$this->db->order_by('kegiatan_kesehatan_jiwa.LIST_JIWA_ID','ASC');//revisi
		
        $query = $this->db->get();

        return $query;
    }

    public function terbanyakIGD($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {
        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $sql = 'Select `a`.`ICD10_CODE` as icd10_igd, `a`.`PENY_IGD_NAMA` as peny_igd_nama, `a`.`PENY_IGD_JMLH` as igd_jml, `r`.`RS_NOREG` as rsNoreg from `sepuluh_besar_penyakit_igd` a JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l, `tahun` t) ON (`a`.`TAHUN_ID` = `t`.`TAHUN_ID` AND `r` .`RS_NOREG` = `a`.`RS_NOREG` AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`) ';

        $whereTahun = " WHERE `t`.`TAHUN_ID` = " . $tahun . " ";

        $where = $whereTahun;
        if ($region != null) {
            $whereRegion = " AND `r`.`RS_REGION_ID` = " . $region . "";
            $where = $whereTahun . $whereRegion;
        }
        if ($kelas != null) {
            $whereKelas = " AND `r`.`RS_KELAS` = " . $kelas . "";
            $where = $whereTahun . $whereRegion . $whereKelas;
        }
        if ($rsNoreg != null) {
            $whereRSNoreg = " AND `r`.`RS_NOREG` = " . $rsNoreg . "";
            $where = $whereTahun . $whereRegion . $whereKelas . $whereRSNoreg;
        }
        if ($statusPenyelenggara != null) {
            $whereRSPeny = " AND `r`.`RS_PENYELENGGARA` = " . $statusPenyelenggara . "";
            $where = $whereTahun . $whereRegion . $whereKelas . $whereRSNoreg . $whereRSPeny;
        }

        $query = $this->db->query($sql . $where);

        return $query;
    }
    
    public function  terbanyakRI($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara){
        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;
        $sql = "Select `a`.`ICD10_CODE` as icd10_ri, `a`.`PENY_RI_NAMA` as peny_ri_nama, `a`.`PENY_RI_JMLH` as ri_jml, `r`.`RS_NOREG` as rsNoreg from `sepuluh_besar_penyakit_rawat_inap` a JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l, `tahun` t) ON (`a`.`TAHUN_ID` = `t`.`TAHUN_ID` AND `r` .`RS_NOREG` = `a`.`RS_NOREG` AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`) ";
        
        $whereTahun = " WHERE `t`.`TAHUN_ID` = " . $tahun . " ";

        $where = $whereTahun;
        if ($region != null) {
            $whereRegion = " AND `r`.`RS_REGION_ID` = " . $region . "";
            $where = $whereTahun . $whereRegion;
        }
        if ($kelas != null) {
            $whereKelas = " AND `r`.`RS_KELAS` = " . $kelas . "";
            $where = $whereTahun . $whereRegion . $whereKelas;
        }
        if ($rsNoreg != null) {
            $whereRSNoreg = " AND `r`.`RS_NOREG` = " . $rsNoreg . "";
            $where = $whereTahun . $whereRegion . $whereKelas . $whereRSNoreg;
        }
        if ($statusPenyelenggara != null) {
            $whereRSPeny = " AND `r`.`RS_PENYELENGGARA` = " . $statusPenyelenggara . "";
            $where = $whereTahun . $whereRegion . $whereKelas . $whereRSNoreg . $whereRSPeny;
        }

        $query = $this->db->query($sql . $where);

        return $query;
    }
    
    public function  terbanyakRJ($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara){
        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;
        $sql = "Select `a`.`ICD10_CODE` as icd10_rj, `a`.`PENY_RJ_NAMA` as peny_rj_nama, `a`.`PENY_RJ_JUMLAH` as rj_jml, `r`.`RS_NOREG` as rsNoreg from `sepuluh_besar_penyakit_rawat_jalan` a JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l, `tahun` t) ON (`a`.`TAHUN_ID` = `t`.`TAHUN_ID` AND `r` .`RS_NOREG` = `a`.`RS_NOREG` AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`) ";
        
        $whereTahun = " WHERE `t`.`TAHUN_ID` = " . $tahun . " ";

        $where = $whereTahun;
        if ($region != null) {
            $whereRegion = " AND `r`.`RS_REGION_ID` = " . $region . "";
            $where = $whereTahun . $whereRegion;
        }
        if ($kelas != null) {
            $whereKelas = " AND `r`.`RS_KELAS` = " . $kelas . "";
            $where = $whereTahun . $whereRegion . $whereKelas;
        }
        if ($rsNoreg != null) {
            $whereRSNoreg = " AND `r`.`RS_NOREG` = " . $rsNoreg . "";
            $where = $whereTahun . $whereRegion . $whereKelas . $whereRSNoreg;
        }
        if ($statusPenyelenggara != null) {
            $whereRSPeny = " AND `r`.`RS_PENYELENGGARA` = " . $statusPenyelenggara . "";
            $where = $whereTahun . $whereRegion . $whereKelas . $whereRSNoreg . $whereRSPeny;
        }

        $query = $this->db->query($sql . $where);

        return $query;
    }

    public function CountJumlahRSPenyTerbanyak() {
        $sql = 'SELECT COUNT(*) as jumlah FROM (SELECT  p.RS_NOREG  FROM  `sepuluh_besar_penyakit_igd` p
                 JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l, `sepuluh_besar_penyakit_rawat_jalan` m, 
                 `sepuluh_besar_penyakit_rawat_inap` n)  ON (`r` .`RS_NOREG` = `p`.`RS_NOREG` 
                 AND `r` .`RS_NOREG` = `m`.`RS_NOREG` AND `r` .`RS_NOREG` = `n`.`RS_NOREG` 
                 AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`)
                 GROUP BY  `p`.`RS_NOREG` ) As count';
        $query = $this->db->query($sql);
        return $query->row('jumlah');
    }

}
