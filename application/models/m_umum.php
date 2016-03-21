<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of m_umum
 *
 * @author asus
 */
class m_umum extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
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

    public function getTahunById($id) {
        $tahun = $this->db->query("SELECT `TAHUN_TAHUN` as tahun FROM `tahun` WHERE `TAHUN_ID` = " . $id . "");
        return $tahun->row('tahun');
    }

    public function getMDGSList($kategori) {
        $list = $this->db->query("SELECT * FROM `list_mdgs` WHERE `MDGS_KATEGORI` LIKE '%" . $kategori . "%'");
        return $list;
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

	public function getList($tablename) {
        $list = $this->db->query("SELECT * FROM `".$tablename);
        return $list;
    }
    public function getRSAll3() { 
        
        $sql = "SELECT * FROM `rumah_sakit`a ";

        $join = "
        LEFT JOIN `list_region` b ON `a`.`RS_REGION_ID` = `b`.`id_list_region` 
        LEFT JOIN `kelas_rs` c ON `a`.`RS_KELAS` = `c`.`kelas_rs_id`
        LEFT JOIN `rs_jenis` d ON `a`.`RS_JENIS` = `d`.`rs_jenis_id`
        LEFT JOIN `rs_penyelenggara` e ON `a`.`RS_PEMILIK` = `e`.`rs_penyelenggara_id`
        LEFT JOIN `rs_stat_penyelenggara` f ON `a`.`RS_STATUS_PENYELENGGARA` = `f`.`rs_stat_id` 
        ";
 
        $end = " ORDER by `a`.`RS_NOREG`"; 
        $list = $this->db->query($sql . $join  . $end);

        return $list;

       //SELECT * FROM `rumah_sakit`a LEFT JOIN `list_region` b ON `a`.`RS_REGION_ID` = `b`.`id_list_region` LEFT JOIN `kelas_rs` c ON `a`.`RS_KELAS` = `c`.`kelas_rs_id` LEFT JOIN `rs_jenis` d ON `a`.`RS_JENIS` = `d`.`rs_jenis_id` LEFT JOIN `rs_penyelenggara` e ON `a`.`RS_PEMILIK` = `e`.`rs_penyelenggara_id` LEFT JOIN `rs_stat_penyelenggara` f ON `a`.`RS_STATUS_PENYELENGGARA` = `f`.`rs_stat_id`
     }
     public function getRSAll2() {
        $list = $this->db->query("SELECT * FROM `rumah_sakit`");
        return $list;
    }
    
    public function countRSAll() {
         
        $query = $this->db->query("SELECT COUNT( * ) as `jumlah` FROM `rumah_sakit`");

        return $query->row('jumlah');
    }
}
