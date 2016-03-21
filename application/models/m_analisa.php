<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *

  Model khusus untuk input analisa

 */

class m_analisa extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputAnalisa($in_tahunId, $in_rsNoreg, $in_kategoriId, $in_uraian) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kategoriId = $in_kategoriId;
        $uraian = $in_uraian;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'ANALISA_KATEGORI_ID' => $kategoriId, //list_analisa
            'ANALISA_URAIAN' => $uraian
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'ANALISA_KATEGORI_ID' => $kategoriId, //list_analisa
        );
        
        if($this->m_bab->cekData('analisa', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('analisa', $data);
        }
        else {
            $status = $this->db->insert('analisa', $data);
        }
        return $status;
    }

    //tabel SPM (semua Bab, Kebanyakan ada di Bab V, misal tabel V.1.e. Pencapaian Standar Pelayanan Minimal Instalasi Gawat Darurat )
    public function inputSPM($in_tahunId, $in_rsNoreg, $in_kategoriId, $in_indikatorId, $in_standar, $in_numerator, $in_denumerator, $in_pencapaian) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kategoriId = $in_kategoriId;
        $indikatorId = $in_indikatorId;

        $standar = $in_standar;
        $numerator = $in_numerator;
        $denumerator = $in_denumerator;
        $pencapaian = $in_pencapaian;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SPM_KATEGORI_ID' => $kategoriId, //list_kategori_indikator_spm
            'SPM_INDIKATOR_ID' => $indikatorId, //list_indikator_spm
            'SPM_STANDAR' => $standar,
            'SPM_NUMERATOR' => $numerator,
            'SPM_DENUMERATOR' => $denumerator,
            'SPM_PENCAPAIAN' => $pencapaian
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SPM_KATEGORI_ID' => $kategoriId, //list_kategori_indikator_spm
            'SPM_INDIKATOR_ID' => $indikatorId, //list_indikator_spm
        );
        if($this->m_bab->cekData('spm', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('spm', $data);
        }
        else {
            $status = $this->db->insert('spm', $data);
        }
        return $status;
    }

    //tabel Permasalahan dan Pemecahan Masalah ada di setiap sheet di bab V
    public function inputPermasalahan($in_tahunId, $in_rsNoreg, $in_kategoriId, $in_permasalahan, $in_pemecahan) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kategoriId = $in_kategoriId;
        $permasalahan = $in_permasalahan;
        $pemecahan = $in_pemecahan;

        $data = array(
            'KAT_PERMASALAHAN_ID' => $kategoriId, //list_kategori_permasalahan
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PRBLM_NAMA' => $permasalahan,
            'PRBLM_PEMECAHAN' => $pemecahan
        );

        $where = array (
            'KAT_PERMASALAHAN_ID' => $kategoriId, //list_kategori_permasalahan
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        $status = $this->db->insert('permasalahan', $data);
        /*
        if($this->m_bab->cekData('permasalahan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('permasalahan', $data);
        }
        else {
            $status = $this->db->insert('permasalahan', $data);
        }*/
        return $status;
    }

    public function deletePermasalahan($in_tahunID, $in_rsNoreg, $in_kategoriID)
    {
        $where = array (
            'KAT_PERMASALAHAN_ID' => $in_kategoriID, //list_kategori_permasalahan
            'TAHUN_ID' => $in_tahunID,
            'RS_NOREG' => $in_rsNoreg,
        );
        $this->db->delete('permasalahan', $where);
    }
    
    public function deleteAnalisa($in_tahunID, $in_rsNoreg, $in_kategoriID)
    {
        $where = array (
            'ANALISA_KATEGORI_ID' => $in_kategoriID, //list_kategori_permasalahan
            'TAHUN_ID' => $in_tahunID,
            'RS_NOREG' => $in_rsNoreg,
        );
        $this->db->delete('analisa', $where);
    }
    
    public function retrieveSPM($kat_spm, $in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('spm');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = spm.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = spm.TAHUN_ID');
        $this->db->join('list_kategori_indikator_spm', 'list_kategori_indikator_spm.INDIKATOR_KATEGORI_ID = spm.SPM_KATEGORI_ID');
        $this->db->join('list_indikator_spm', 'list_indikator_spm.INDIKATOR_ID = spm.SPM_INDIKATOR_ID');

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

        $this->db->where('list_kategori_indikator_spm.INDIKATOR_KATEGORI_ID', $kat_spm);
        $this->db->order_by('rumah_sakit.RS_REGION_ID');

        $query = $this->db->get();

        return $query;
    }

    public function retrievePermasalahan($kat_permasalahan, $in_tahun, $in_rsNoreg, $in_region, $in_kelas, $in_statusPenyelenggara) {

        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;
        $region = $in_region;
        $kelas = $in_kelas;
        $statusPenyelenggara = $in_statusPenyelenggara;

        $this->db->select('*');
        $this->db->from('permasalahan');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = permasalahan.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = permasalahan.TAHUN_ID');
        $this->db->join('list_kategori_permasalahan', 'list_kategori_permasalahan.KAT_PERMASALAHAN_ID = permasalahan.KAT_PERMASALAHAN_ID');

        $this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
        $this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');

        $this->db->where('list_kategori_permasalahan.KAT_PERMASALAHAN_ID', $kat_permasalahan);

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

        $this->db->order_by('rumah_sakit.RS_REGION_ID');

        $query = $this->db->get();

        return $query;
    }

    public function retrieveAnalisa($in_tahun, $in_rsNoreg, $in_kategori) {
        $tahun = $in_tahun;
        $rsNoreg = $in_rsNoreg;

        $kategori = $in_kategori;

        $this->db->select('*');
        $this->db->from('analisa');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = analisa.RS_NOREG');
        $this->db->join('tahun', 'tahun.TAHUN_ID = analisa.TAHUN_ID');
        $this->db->join('list_analisa', 'list_analisa.list_analisa_id = analisa.ANALISA_KATEGORI_ID');

        $this->db->where('analisa.ANALISA_KATEGORI_ID', $kategori);

        if ($tahun != null)
            $this->db->where('tahun.TAHUN_ID', $tahun);
        if ($rsNoreg != null)
            $this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);

        $query = $this->db->get();

        return $query;
    }

}
