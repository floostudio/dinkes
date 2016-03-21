<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of m_bab6_2
 *
 * @author asus
 */
class m_bab6_2 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //Kasus TB Rawat Jalan Berdasarkan Golongan Umur
    public function inputKasusTBrj($in_tahunId, $in_rsNoreg, $in_umur, $in_n2, $in_n1, $in_n) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $umur = $in_umur;

        $n2 = $in_n2;
        $n1 = $in_n1;
        $n = $in_n;



        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'GOLONGAN_UMUR_ID' => $umur,
            'KASUS_TB_RJ_N2' => $n2,
            'KASUS_TB_RJ_N1' => $n1,
            'KASUS_TB_RJ_N' => $n
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'GOLONGAN_UMUR_ID' => $umur,
        );
        if ($this->m_bab->cekData('kasus_tb_rj', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kasus_tb_rj', $data);
        } else {
            $status = $this->db->insert('kasus_tb_rj', $data);
        }
        return $status;
    }

    //Kasus TB Rawat Jalan Berdasarkan Jenis TB
    public function inputKasusTBrjJenis($in_tahunId, $in_rsNoreg, $in_jenis, $in_n2, $in_n1, $in_n) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $jenis = $in_jenis;
        $n2 = $in_n2;
        $n1 = $in_n1;
        $n = $in_n;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_TB_ID' => $jenis,
            'KASUS_TB_RJ_JENIS_N2' => $n2,
            'KASUS_TB_RJ_JENIS_N1' => $n1,
            'KASUS_TB_RJ_JENIS_N' => $n
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_TB_ID' => $jenis,
        );
        if ($this->m_bab->cekData('kasus_tb_rj_jenis', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kasus_tb_rj_jenis', $data);
        } else {
            $status = $this->db->insert('kasus_tb_rj_jenis', $data);
        }
        return $status;
    }

    //Kasus TB Rawat Inap Berdasarkan Golongan Umur
    public function inputKasusTBri($in_tahunId, $in_rsNoreg, $in_umur, $in_n2, $in_n1, $in_n) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $umur = $in_umur;
        $n2 = $in_n2;
        $n1 = $in_n1;
        $n = $in_n;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'GOLONGAN_UMUR_ID' => $umur,
            'KASUS_TB_RI_N2' => $n2,
            'KASUS_TB_RI_N1' => $n1,
            'KASUS_TB_RI_N' => $n
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'GOLONGAN_UMUR_ID' => $umur,
        );
        if ($this->m_bab->cekData('kasus_tb_ri', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kasus_tb_ri', $data);
        } else {
            $status = $this->db->insert('kasus_tb_ri', $data);
        }
        return $status;
    }

    //Kasus TB Rawat Inap Berdasarkan Jenis TB
    public function inputKasusTBriJenis($in_tahunId, $in_rsNoreg, $in_jenis, $in_n2, $in_n1, $in_n) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $jenis = $in_jenis;
        $n2 = $in_n2;
        $n1 = $in_n1;
        $n = $in_n;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_TB_ID' => $jenis,
            'KASUS_TB_RI_JENIS_N2' => $n2,
            'KASUS_TB_RI_JENIS_N1' => $n1,
            'KASUS_TB_RI_JENIS_N' => $n
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_TB_ID' => $jenis,
        );
        if ($this->m_bab->cekData('kasus_tb_ri_jenis', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kasus_tb_ri_jenis', $data);
        } else {
            $status = $this->db->insert('kasus_tb_ri_jenis', $data);
        }
        return $status;
    }

    public function inputLaptahTB($in_tahunId, $in_rsNoreg, $in_tipe, $in_anak04L, $in_anak04P, $in_anak514L, $in_anak514P, $in_dewasa1524L, $in_dewasa1524P, $in_dewasa2334L, $in_dewasa2334P, $in_dewasa3544L, $in_dewasa3544P, $in_dewasa4554L, $in_dewasa4554P, $in_dewasa5565L, $in_dewasa5565P, $in_dewasa65L, $in_dewasa65P, $in_totalL, $in_totalP, $in_total) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $tipe = $in_tipe;

        $anak04L = $in_anak04L;
        $anak04P = $in_anak04P;
        $anak514L = $in_anak514L;
        $anak514P = $in_anak514P;

        $dewasa1524L = $in_dewasa1524L;
        $dewasa1524P = $in_dewasa1524P;
        $dewasa2334L = $in_dewasa2334L;
        $dewasa2334P = $in_dewasa2334P;

        $dewasa3544L = $in_dewasa3544L;
        $dewasa3544P = $in_dewasa3544P;
        $dewasa4554L = $in_dewasa4554L;
        $dewasa4554P = $in_dewasa4554P;

        $dewasa5565L = $in_dewasa5565L;
        $dewasa5565P = $in_dewasa5565P;
        $dewasa65L = $in_dewasa65L;
        $dewasa65P = $in_dewasa65P;

        $totalL = $in_totalL;
        $totalP = $in_totalP;
        $total = $in_total;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'TIPE_TB' => $tipe,
            'LAPTAH_TB_ANAK_0_4_L' => $anak04L,
            'LAPTAH_TB_ANAK_0_4_P' => $anak04P,
            'LAPTAH_TB_ANAK_5_14_L' => $anak514L,
            'LAPTAH_TB_ANAK_5_14_P' => $anak514P,
            'LAPTAH_TB_DEWASA_15_24_L' => $dewasa1524L,
            'LAPTAH_TB_DEWASA_15_24_P' => $dewasa1524P,
            'LAPTAH_TB_DEWASA_23_34_L' => $dewasa2334L,
            'LAPTAH_TB_DEWASA_23_34_P' => $dewasa2334P,
            'LAPTAH_TB_DEWASA_35_44_L' => $dewasa3544L,
            'LAPTAH_TB_DEWASA_35_44_P' => $dewasa3544P,
            'LAPTAH_TB_DEWASA_45_54_L' => $dewasa4554L,
            'LAPTAH_TB_DEWASA_45_54_P' => $dewasa4554P,
            'LAPTAH_TB_DEWASA_55_65_L' => $dewasa5565L,
            'LAPTAH_TB_DEWASA_55_65_P' => $dewasa5565P,
            'LAPTAH_TB_DEWASA_65_L' => $dewasa65L,
            'LAPTAH_TB_DEWASA_65_P' => $dewasa65P,
            'LAPTAH_TB_TOTAL_L' => $totalL,
            'LAPTAH_TB_TOTAL_P' => $totalP,
            'LAPTAH_TB_TOTAL' => $total
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'TIPE_TB' => $tipe,
        );
        if ($this->m_bab->cekData('laptah_penemuan_tb', $where)) {
            $this->db->where($where);
            $status = $this->db->update('laptah_penemuan_tb', $data);
        } else {
            $status = $this->db->insert('laptah_penemuan_tb', $data);
        }
        return $status;
    }

    //Retrieve TB RJ
    public function retrieveKasusTBrj($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        //cari jumlah rumah sakit
        //cari jumlah list kategori

        $this->db->select('*');
        $this->db->from('kasus_tb_rj');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kasus_tb_rj.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = kasus_tb_rj.TAHUN_ID');
        $this->db->join('list_golongan_umur', 'list_golongan_umur.GOLONGAN_UMUR_ID = kasus_tb_rj.GOLONGAN_UMUR_ID');

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
	$this->db->order_by('kasus_tb_rj.GOLONGAN_UMUR_ID','ASC');

        $query = $this->db->get();

        return $query;
    }

    //Retrieve TB RJ berdasarkan Jenisnya
    public function retrieveKasusTBrjJenis($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;


        $this->db->select('*');
        $this->db->from('kasus_tb_rj_jenis');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kasus_tb_rj_jenis.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = kasus_tb_rj_jenis.TAHUN_ID');
        $this->db->join('list_jenis_tb', 'list_jenis_tb.JENIS_TB_ID = kasus_tb_rj_jenis.JENIS_TB_ID');

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
	$this->db->order_by('kasus_tb_rj_jenis.JENIS_TB_ID','ASC');

        $query = $this->db->get();

        return $query;
    }

    //Retrieve TB RI
    public function retrieveKasusTBri($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('kasus_tb_ri');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kasus_tb_ri.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = kasus_tb_ri.TAHUN_ID');
        $this->db->join('list_golongan_umur', 'list_golongan_umur.GOLONGAN_UMUR_ID = kasus_tb_ri.GOLONGAN_UMUR_ID');

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
	$this->db->order_by('kasus_tb_ri.GOLONGAN_UMUR_ID','ASC');

        $query = $this->db->get();

        return $query;
    }

    //Retrieve TB RI berdasarkan Jenisnya
    public function retrieveKasusTBriJenis($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('kasus_tb_ri_jenis');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kasus_tb_ri_jenis.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = kasus_tb_ri_jenis.TAHUN_ID');
        $this->db->join('list_jenis_tb', 'list_jenis_tb.JENIS_TB_ID = kasus_tb_ri_jenis.JENIS_TB_ID');

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
	$this->db->order_by('kasus_tb_ri_jenis.JENIS_TB_ID','ASC');

        $query = $this->db->get();

        return $query;
    }

    //Retrieve TB Laptah
    public function retrieveLaptahTB($in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('laptah_penemuan_tb');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = laptah_penemuan_tb.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = laptah_penemuan_tb.TAHUN_ID');
        $this->db->join('list_tipe_pasien_tb', 'list_tipe_pasien_tb.TIPE_TB = laptah_penemuan_tb.TIPE_TB');

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
	$this->db->order_by('laptah_penemuan_tb.TIPE_TB','ASC');

        $query = $this->db->get();

        return $query;
    }

    public function countRS($table_name, $tahun, $region, $kelas, $statusPenyelenggara) {
        $tableName = $table_name;

        $sql = "SELECT COUNT(*) as jumlah FROM (SELECT  p.RS_NOREG  FROM  `" . $table_name . "` p";

        $join = " JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l)  ON (`r` .`RS_NOREG` = `p`.`RS_NOREG` AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`)";

        $where = "";

        $whereTahun = " WHERE `p`.`TAHUN_ID` = " . $tahun . " ";
        $where = $whereTahun;
        if ($region != null) {
            $whereRegion = " AND `r`.`RS_REGION_ID` = " . $region . "";
            $where = $whereTahun . $whereRegion;
        }
        if ($kelas != null) {
            $whereKelas = " AND `r`.`RS_KELAS` = " . $kelas . "";
            $where = $whereTahun . $whereRegion . $whereKelas;
        }

        $end = " GROUP BY  `p`.`RS_NOREG` ) As count";


        $query = $this->db->query($sql . $join . $where . $end);

        return $query->row('jumlah');

        //SELECT COUNT(*) as jumlah FROM (SELECT  p.RS_NOREG  FROM  `pelayanan_lab_patologi` p  JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l)  ON (`r` .`RS_NOREG` = `p`.`RS_NOREG` AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`)   WHERE `p`.`TAHUN_ID` = 1 AND `r`.`RS_REGION_ID` = 1  GROUP BY  `p`.`RS_NOREG` ) As count
    }

    public function countKategori($table_name) {
        $tableName = $table_name;
        $query = $this->db->query("SELECT COUNT( * ) as `jumlah` FROM `" . $tableName . "`");

        return $query->row('jumlah');
    }

    public function countRSspm($table_name, $tahun, $region, $kelas, $statusPenyelenggara, $kategori) {
        $tableName = $table_name;

        $sql = "SELECT COUNT(*) as jumlah FROM (SELECT  p.RS_NOREG  FROM  `" . $table_name . "` p";

        $join = " JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l)  ON (`r` .`RS_NOREG` = `p`.`RS_NOREG` AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`)";

        $where = "";

        $whereTahun = " WHERE `p`.`TAHUN_ID` = " . $tahun . " ";
        $whereKategori = " and `p`.`SPM_KATEGORI_ID` = " . $kategori . " ";
        $where = $whereTahun . $whereKategori;
        if ($region != null) {
            $whereRegion = " AND `r`.`RS_REGION_ID` = " . $region . "";
            $where = $whereTahun . $whereRegion . $whereKategori;
        }
        if ($kelas != null) {
            $whereKelas = " AND `r`.`RS_KELAS` = " . $kelas . "";
            $where = $whereTahun . $whereRegion . $whereKelas . $whereKategori;
        }

        $end = " GROUP BY  `p`.`RS_NOREG` ) As count";


        $query = $this->db->query($sql . $join . $where . $end);

        return $query->row('jumlah');

        //SELECT COUNT(*) as jumlah FROM (SELECT  p.RS_NOREG  FROM  `pelayanan_lab_patologi` p  JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l)  ON (`r` .`RS_NOREG` = `p`.`RS_NOREG` AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`)   WHERE `p`.`TAHUN_ID` = 1 AND `r`.`RS_REGION_ID` = 1  GROUP BY  `p`.`RS_NOREG` ) As count
    }

    public function countRSPermasalahan($table_name, $tahun, $region, $kelas, $statusPenyelenggara, $kategori) {
        $tableName = $table_name;

        $sql = "SELECT COUNT(*) as jumlah FROM (SELECT  p.RS_NOREG  FROM  `" . $table_name . "` p";

        $join = " JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l)  ON (`r` .`RS_NOREG` = `p`.`RS_NOREG` AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`)";

        $where = "";

        $whereTahun = " WHERE `p`.`TAHUN_ID` = " . $tahun . " ";
        $whereKategori = " and `p`.`KAT_PERMASALAHAN_ID` = " . $kategori . " ";
        $where = $whereTahun . $whereKategori;
        if ($region != null) {
            $whereRegion = " AND `r`.`RS_REGION_ID` = " . $region . "";
            $where = $whereTahun . $whereRegion . $whereKategori;
        }
        if ($kelas != null) {
            $whereKelas = " AND `r`.`RS_KELAS` = " . $kelas . "";
            $where = $whereTahun . $whereRegion . $whereKelas . $whereKategori;
        }

        $end = " GROUP BY  `p`.`RS_NOREG` ) As count";


        $query = $this->db->query($sql . $join . $where . $end);

        return $query->row('jumlah');

        //SELECT COUNT(*) as jumlah FROM (SELECT  p.RS_NOREG  FROM  `pelayanan_lab_patologi` p  JOIN (`rumah_sakit` r,`kelas_rs` k,`list_region` l)  ON (`r` .`RS_NOREG` = `p`.`RS_NOREG` AND `r`.`RS_KELAS` = `k`.`kelas_rs_id` AND `r`.`RS_REGION_ID` = `l`.`id_list_region`)   WHERE `p`.`TAHUN_ID` = 1 AND `r`.`RS_REGION_ID` = 1  GROUP BY  `p`.`RS_NOREG` ) As count
    }

}
