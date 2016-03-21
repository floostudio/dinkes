<?php

if ($tabel == 0) {
    include 'B_Empty_Table.php';
} else if ($bab == 1) {
    if ($tabel == 1) {
        $pelayanan = $this->m_bab2_2->retrievePelayanan($tahun, $rs_noreg);
        include '/bab_2_rekap_rs/Bab2_2Pelayanan.php';
    } else if ($tabel == 2) {
        $peralatan = $this->m_bab2_2->retrievePeralatanCanggih($tahun, $rs_noreg);
        include '/bab_2_rekap_rs/Bab2_2Peralatan_Canggih.php';
    } else if ($tabel == 3) {
        $igd = $this->m_bab2_2->retrieveIGD($tahun, $rs_noreg);
        include '/bab_2_rekap_rs/Bab2_2IGD.php';
    } else if ($tabel == 4) {
        $irj = $this->m_bab2_2->retrieveIRJ($tahun, $rs_noreg);
        include '/bab_2_rekap_rs/Bab2_2IRJ.php';
    } else if ($tabel == 5) {
        $iri = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg);
        include '/bab_2_rekap_rs/Bab2_2IRI.php';
    } else if ($tabel == 6) {
        $tingkat_efisiensi = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg);
        include '/bab_2_rekap_rs/Bab2_2TingkatEfisiensi.php';
    }
} else if ($bab == 2) {
    if ($tabel == 7) {
        $kondisi_sarpras = $this->m_sarpras->retrieveSarpras($tahun, $rs_noreg);
        include 'Bab3_Kondisi_sarana_prasarana.php';
    } else if ($tabel == 8) {
        $peralatan = $this->m_sarpras->retrievePeralatan($tahun, $rs_noreg);
        include 'Bab3_Kondisi_peralatan.php';
    } else if ($tabel == 9) {
        //Analisa
    } else if ($tabel == 10) {
        //analisa
    } else if ($tabel == 11) {
        //analisa
    } else if ($tabel == 12) {
        $g_ketenagaan = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg);
        include 'Bab3_Gambaran_ketenagaan_rs.php';
    } else if ($tabel == 13) {
        //ketenagaan
    } else if ($tabel == 14) {
        $keb_tenaga = $this->m_sdm->retrieveKebutuhanTenaga($tahun, $rs_noreg);
        include 'Bab3_Kebutuhan_tenaga_Rencana_pemenuhan.php';
    } else if ($tabel == 15) {
        $pelatihan_tenaga = $this->m_sdm->retrievePelatihanSDM($tahun, $rs_noreg);
        include 'Bab3_Pelatihan_tenaga_medis.php';
    }
} else if ($bab == 3) {
    if ($tabel == 16) {
        $sales_growth_rate = $this->m_bab4->retrieveSGR($tahun, $rs_noreg);
        include 'Bab4_SGR.php';
    } else if ($tabel == 17) {
        $cost_recovery = $this->m_bab4->retrieveCostRecovery($tahun, $rs_noreg);
        include 'Bab4_Cost_recovery.php';
    } else if ($tabel == 18) {
        $rasio_keuangan = $this->m_bab4->retrieveRasioKeuangan($tahun, $rs_noreg);
        include 'Bab4_Rasio_keuangan.php';
    } else if ($tabel == 19) {
        $analisa_rasio_keuangan = $this->m_bab4->retrieveAnalisaRK($tahun, $rs_noreg);
        include 'Bab4_Analisa_rasio_keuangan.php';
    }
} else if ($bab == 4) {
    if ($tabel == 71) {
        $keg_pel_maskin = $this->m_bab5_3->retrievePelayananMaskin($tahun, $rs_noreg);
        include 'Bab5_Kegiatan_pelayanan_maskin.php';
    } else if ($tabel == 72) {
        $survey_kel_maskin = $this->m_bab5_3->retrieveSurveyMaskin($tahun, $rs_noreg);
        include 'Bab5_Kelengkapan_survey_maskin.php';
    } else if ($tabel == 73) {
        $kelengkapan_kelola_maskin = $this->m_bab5_3->retrieveKelolaMaskin($tahun, $rs_noreg);
        include 'Bab5_Kelengkapan_survey_maskin.php';
    } else if ($tabel == 74) {
        $keluhan_maskin_petugas = $this->m_bab5_3->retrieveKeluhanMaskinPetugas($tahun, $rs_noreg);
        include 'Bab5_Keluhan_maskin_thdPetugas.php';
    } else if ($tabel == 75) {
        $persentase_keluhan_maskin = $this->m_bab5_3->retrievePersentaseKeluhan($tahun, $rs_noreg);
        include 'Bab5_Persentase_Maskin_Keluhan.php';
    } else if ($tabel == 85) {
        $sanitasi = $this->m_bab5_4->retrieveSanitasi($tahun, $rs_noreg);
        include 'Bab5_Keg_sanitasi.php';
    } else if ($tabel == 92) {
        $pemulasaran_jnz = $this->m_bab5_4->retrievePemulasaranJenazah($tahun, $rs_noreg);
        include 'Bab5_Pemulasaran_jenazah.php';
    } else if ($tabel == 101) {
        $gigi_mulut = $this->m_bab5_4->retrievePelayananGigi($tahun, $rs_noreg);
        include 'Bab5_Pelayanan_gilut.php';
    } else if ($tabel == 103) {
        $imunisasi = $this->m_bab5_4->retrieveImunisasi($tahun, $rs_noreg);
        include 'Bab5_Kegiatan_imunisasi.php';
    } else if ($tabel == 104) {
        $keg_jiwa = $this->m_bab5_4->retrieveKegiatanKesehatanJiwa($tahun, $rs_noreg);
        include 'Bab5_Kegiatan_kesehatan_jiwa.php';
    }
} else if ($bab == 5) {
    if ($tabel == 107) {
        include 'Bab6_KasusTB_Rawat_Inap.php';
    } else if ($tabel == 108) {
        $num_rs = $this->m_bab6_2->countRS("kasus_tb_rj");
        $num_kategori = $this->m_bab6_2->countKategori("list_golongan_umur");
        $waw = $this->m_bab6_2->retrieveKasusTBrj($tahun, $rs_noreg);
        include 'Bab6_KasusTB_Rawat_Inap.php';
    }
} else if ($bab == 6) {
    
}
?>