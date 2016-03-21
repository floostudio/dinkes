<?php

if ($bab == 1) {
    if ($kolom == 1) {
        $data2_20 = $this->m_bab2_2->retrievePeralatanCanggih($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_20 = $this->m_bab6_2->countRS("peralatan_canggih", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_1_PeralatanCanggihRS.php';
    } else if ($kolom == 2) {
        $data2_21_1 = $this->m_bab2_2->retrieveIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_1 = $this->m_bab6_2->countRS("igd", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_2_InstalasiGawatDarurat_n.php';
    } else if ($kolom == 3) {
        $data2_21_1 = $this->m_bab2_2->retrieveIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_1 = $this->m_bab6_2->countRS("igd", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_2_InstalasiGawatDarurat_n1';
    } else if ($kolom == 4) {
        $data2_21_1 = $this->m_bab2_2->retrieveIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_1 = $this->m_bab6_2->countRS("igd", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_2_InstalasiGawatDarurat_n2.php';
    } else if ($kolom == 5) {
        $data_2_21_2 = $this->m_bab2_2->retrieveIRJ($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_2 = $this->m_bab6_2->countRS("irj", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_3_InstalasiRawatJalan_n.php';
    } else if ($kolom == 6) {
        $data_2_21_2 = $this->m_bab2_2->retrieveIRJ($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_2 = $this->m_bab6_2->countRS("irj", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_3_InstalasiRawatJalan_n1.php';
    } else if ($kolom == 7) {
        $data_2_21_2 = $this->m_bab2_2->retrieveIRJ($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_2 = $this->m_bab6_2->countRS("irj", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_3_InstalasiRawatJalan_n2.php';
    } else if ($kolom == 8) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_TT.php';
    } else if ($kolom == 9) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_masuktotal.php';
    } else if ($kolom == 10) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_MasukLk.php';
    } else if ($kolom == 11) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_MasukPr.php';
    } else if ($kolom == 12) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KeluarHidupTot.php';
    } else if ($kolom == 13) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelHLk.php';
    } else if ($kolom == 14) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelHP.php';
    } else if ($kolom == 15) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelMTot.php';
    } else if ($kolom == 16) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelMLk.php';
    } else if ($kolom == 17) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelMP.php';
    } else if ($kolom == 18) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelM24Tot.php';
    } else if ($kolom == 19) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelM24Lk.php';
    } else if ($kolom == 20) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelM24P.php';
    } else if ($kolom == 21) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelM24LTot.php';
    } else if ($kolom == 22) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelM24LLk.php';
    } else if ($kolom == 23) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_KelM24LP.php';
    } else if ($kolom == 24) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_LamaDirawat.php';
    } else if ($kolom == 25) {
        $data_2_21_3 = $this->m_bab2_2->retrieveIRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_21_3 = $this->m_bab6_2->countRS("iri", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_4_InstalasiRawatInap_HariPerawatan.php';
    } else if ($kolom == 26) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_Bor.php';
    } else if ($kolom == 27) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_BorRS.php';
    } else if ($kolom == 28) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_BTOI.php';
    } else if ($kolom == 29) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_Alos.php';
    } else if ($kolom == 30) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_GDR.php';
    } else if ($kolom == 31) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_GDRLk.php';
    } else if ($kolom == 32) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_GDRPr.php';
    } else if ($kolom == 33) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_NDR.php';
    } else if ($kolom == 34) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_NDRLk.php';
    } else if ($kolom == 35) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_NDRPr.php';
    } else if ($kolom == 36) {
        $data_22 = $this->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg, $rs_region, null, null);
        $num_2_22 = $this->m_bab6_2->countRS("tingkat_efisiensi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab2/charts_5_TingkatEfisiensiMutuPengelolaanRS_TOI.php';
    }
} else if ($bab == 2) {
    if ($kolom == 37) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_6_GambaranKetenagaan_TenagaMedikDasar_JumlahTotal.php';
    } else if ($kolom == 38) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_6_GambaranKetenagaan_TenagaMedikDasar_Tetap.php';
    } else if ($kolom == 39) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_6_GambaranKetenagaan_TenagaMedikDasar_Kontrak.php';
    } else if ($kolom == 40) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_7_GambaranKetenagaan_TenagaMedikSpesialisDasar_Jumlah.php';
    } else if ($kolom == 41) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_7_GambaranKetenagaan_TenagaMedikSpesialisDasar_Tetap.php';
    } else if ($kolom == 42) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_7_GambaranKetenagaan_TenagaMedikSpesialisDasar_Kontrak.php';
    } else if ($kolom == 43) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_9_GambaranKetenagaan_TenagaSpesialisPenunjangMedik_Jumlah.php';
    } else if ($kolom == 44) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_9_GambaranKetenagaan_TenagaSpesialisPenunjangMedik_Tetap.php';
    } else if ($kolom == 45) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_9_GambaranKetenagaan_TenagaSpesialisPenunjangMedik_Kontrak.php';
    } else if ($kolom == 46) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_10_GambaranKetenagaan_TenagaSpesialisLain_Jumlah.php';
    } else if ($kolom == 47) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_10_GambaranKetenagaan_TenagaSpesialisLain_Tetap.php';
    } else if ($kolom == 48) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_10_GambaranKetenagaan_TenagaSpesialisLain_Kontrak.php';
    } else if ($kolom == 49) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_8_GambaranKetenagaan_TenagaMedikSpesialisGigiMulut_Jumlah.php';
    } else if ($kolom == 50) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_8_GambaranKetenagaan_TenagaMedikSpesialisGigiMulut_Tetap.php';
    } else if ($kolom == 51) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_8_GambaranKetenagaan_TenagaMedikSpesialisGigiMulut_Kontrak.php';
    } else if ($kolom == 52) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_11_GambaranKetenagaan_TenagaParamedisdanKesehatanLain_Jumlah.php';
    } else if ($kolom == 53) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_11_GambaranKetenagaan_TenagaParamedisdanKesehatanLain_Tetap.php';
    } else if ($kolom == 54) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_11_GambaranKetenagaan_TenagaParamedisdanKesehatanLain_Kontrak.php';
    } else if ($kolom == 55) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_12_GambaranKetenagaan_TenagaNonMedisLainnya_Jumlah.php';
    } else if ($kolom == 56) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_12_GambaranKetenagaan_TenagaNonMedisLainnya_Tetap.php';
    } else if ($kolom == 57) {
        $data3_4 = $this->m_sdm->retrieveKetenagaan($tahun, $rs_noreg, $rs_region, null, null);
        $num_3_4 = $this->m_bab6_2->countRS("ketenagaan", $tahun, $rs_region, null, null);
        include 'charts/Bab3/charts_12_GambaranKetenagaan_TenagaNonMedisLainnya_Kontrak.php';
    }
} else if ($bab == 4) {
    if ($kolom == 58) {
        $data_51_1 = $this->m_bab5_1_retrieve->retrieveTrendKunjunganIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_1 = $this->m_bab6_2->countRS("kunjungan_igd", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_13_KunjunganIGD_ASKES.php';
    } else if ($kolom == 59) {
        $data_51_1 = $this->m_bab5_1_retrieve->retrieveTrendKunjunganIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_1 = $this->m_bab6_2->countRS("kunjungan_igd", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_13_KunjunganIGD_AsLain.php';
    } else if ($kolom == 60) {
        $data_51_1 = $this->m_bab5_1_retrieve->retrieveTrendKunjunganIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_1 = $this->m_bab6_2->countRS("kunjungan_igd", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_13_KunjunganIGD_Jamkesda.php';
    } else if ($kolom == 61) {
        $data_51_1 = $this->m_bab5_1_retrieve->retrieveTrendKunjunganIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_1 = $this->m_bab6_2->countRS("kunjungan_igd", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_13_KunjunganIGD_Jamkesmas.php';
    } else if ($kolom == 62) {
        $data_51_1 = $this->m_bab5_1_retrieve->retrieveTrendKunjunganIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_1 = $this->m_bab6_2->countRS("kunjungan_igd", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_13_KunjunganIGD_Jamsostek.php';
    } else if ($kolom == 63) {
        $data_51_1 = $this->m_bab5_1_retrieve->retrieveTrendKunjunganIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_1 = $this->m_bab6_2->countRS("kunjungan_igd", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_13_KunjunganIGD_Lain.php';
    } else if ($kolom == 64) {
        $data_51_1 = $this->m_bab5_1_retrieve->retrieveTrendKunjunganIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_1 = $this->m_bab6_2->countRS("kunjungan_igd", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_13_KunjunganIGD_SPM.php';
    } else if ($kolom == 65) {
        $data_51_1 = $this->m_bab5_1_retrieve->retrieveTrendKunjunganIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_1 = $this->m_bab6_2->countRS("kunjungan_igd", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_13_KunjunganIGD_Umum.php';
    } else if ($kolom == 66) {
        $data_51_4 = $this->m_bab5_1_retrieve->retrieveSepuluhBesarPenyIGD($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_4 = $this->m_bab6_2->countRS("sepuluh_besar_penyakit_igd", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_14_10PenyakitIGD.php';
    } else if ($kolom == 67) {
        $data_51_10 = $this->m_bab5_1_retrieve->retrieveSepuluhBesarPenyakitRawatJln($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_10 = $this->m_bab6_2->countRS("sepuluh_besar_penyakit_rawat_jalan", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_15_10PenyakitRawatJalan.php';
    } else if ($kolom == 68) {
        $data_51_14 = $this->m_bab5_1_retrieve->retrievePenyakitTerbanyakRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_14 = $this->m_bab6_2->countRS("sepuluh_besar_penyakit_rawat_inap", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_16_10PenyakitRawatInap.php';
    } else if ($kolom == 69) {
        $data_51_13 = $this->m_bab5_1_retrieve->retrieveIndikatorKegiatanRI($tahun, $rs_noreg, $rs_region, null, null);
        $num_51_13 = $this->m_bab6_2->countRS("indikator_klinik_kegiatan_rawat_inap", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_18_IndikatorRawatInap.php';
    } else if ($kolom == 70) {
        $data_radiologi = $this->m_bab5_2->retrievePelayananRadiologi($tahun, $rs_noreg, $rs_region, null, null);
        $num_radiologi = $this->m_bab6_2->countRS("jumlah_kunjungan_radiologi", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_19_JumlahKunjunganPelayananRadiologi.php';
    } else if ($kolom == 71) {
        $data_rm = $this->m_bab5_2->retrieveRehabMedik($tahun, $rs_noreg, $rs_region, null, null);
        $num_rm = $this->m_bab6_2->countRS("rehabilitasi_medik", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_20_KunjunganRehabMedik.php';
    } else if ($kolom == 72) {
        $data_trans = $this->m_bab5_2->retrieveKegiatanTransfusi($tahun, $rs_noreg, $rs_region, null, null);
        $num_trans = $this->m_bab6_2->countRS("kegiatan_transfusi_darah", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_21_KegiatanTranfusi.php';
    } else if ($kolom == 73) {
        $data_darah1 = $this->m_bab5_2->retrievePenggunaanDarah($tahun, $rs_noreg, $rs_region, null, null);
        $num_darah1 = $this->m_bab6_2->countRS("penggunaan_darah", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_22_PenggunaanDarah.php';
    } else if ($kolom == 74) {
        $data_darah2 = $this->m_bab5_2->retrievePenerimaanDarah($tahun, $rs_noreg, $rs_region, null, null);
        $num_darah2 = $this->m_bab6_2->countRS("penerimaan_darah", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_23_PenerimaanDarah.php';
    } else if ($kolom == 75) {
        $data_jenazah = $this->m_bab5_4->retrievePemulasaranJenazah($tahun, $rs_noreg, $rs_region, null, null);
        $num_jenazah = $this->m_bab6_2->countRS("pemulasaraan_jenazah", $tahun, $rs_region, null, null);
        include 'charts/Bab5/charts_24_PemulasaranJenazah.php';
    }
} else if ($bab == 5) {
    if ($kolom == 76) {
        $data_kasus_tb_rj = $this->m_bab6_2->retrieveKasusTBrj($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_rj = $this->m_bab6_2->countRS("kasus_tb_rj", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_25_KasusTBRJ_N.php';
    } else if ($kolom == 77) {
        $data_kasus_tb_rj = $this->m_bab6_2->retrieveKasusTBrj($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_rj = $this->m_bab6_2->countRS("kasus_tb_rj", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_25_KasusTBRJ_N-1.php';
    } else if ($kolom == 78) {
        $data_kasus_tb_rj = $this->m_bab6_2->retrieveKasusTBrj($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_rj = $this->m_bab6_2->countRS("kasus_tb_rj", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_25_KasusTBRJ_N-2.php';
    } else if ($kolom == 79) {
        $data_kasus_tb_rj_jenis = $this->m_bab6_2->retrieveKasusTBrjJenis($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_rj_jenis = $this->m_bab6_2->countRS("kasus_tb_rj_jenis", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_26_KasusTBRJJenis_N.php';
    } else if ($kolom == 80) {
        $data_kasus_tb_rj_jenis = $this->m_bab6_2->retrieveKasusTBrjJenis($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_rj_jenis = $this->m_bab6_2->countRS("kasus_tb_rj_jenis", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_26_KasusTBRJJenis_N-1.php';
    } else if ($kolom == 81) {
        $data_kasus_tb_rj_jenis = $this->m_bab6_2->retrieveKasusTBrjJenis($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_rj_jenis = $this->m_bab6_2->countRS("kasus_tb_rj_jenis", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_26_KasusTBRJJenis_N-2.php';
    } else if ($kolom == 82) {
        $data_kasus_tb_ri = $this->m_bab6_2->retrieveKasusTBri($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_ri = $this->m_bab6_2->countRS("kasus_tb_ri", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_27_KasusTBRI_N.php';
    } else if ($kolom == 83) {
        $data_kasus_tb_ri = $this->m_bab6_2->retrieveKasusTBri($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_ri = $this->m_bab6_2->countRS("kasus_tb_ri", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_27_KasusTBRI_N-1.php';
    } else if ($kolom == 84) {
        $data_kasus_tb_ri = $this->m_bab6_2->retrieveKasusTBri($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_ri = $this->m_bab6_2->countRS("kasus_tb_ri", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_27_KasusTBRI_N-2.php';
    } else if ($kolom == 85) {
        $data_kasus_tb_ri_jenis = $this->m_bab6_2->retrieveKasusTBriJenis($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_ri_jenis = $this->m_bab6_2->countRS("kasus_tb_ri_jenis", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_28_KasusTBRIJenis_N.php';
    } else if ($kolom == 86) {
        $data_kasus_tb_ri_jenis = $this->m_bab6_2->retrieveKasusTBriJenis($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_ri_jenis = $this->m_bab6_2->countRS("kasus_tb_ri_jenis", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_28_KasusTBRIJenis_N-1.php';
    } else if ($kolom == 87) {
        $data_kasus_tb_ri_jenis = $this->m_bab6_2->retrieveKasusTBriJenis($tahun, $rs_noreg, $rs_region, null, null);
        $num_kasus_tb_ri_jenis = $this->m_bab6_2->countRS("kasus_tb_ri_jenis", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_28_KasusTBRIJenis_N-2.php';
    } else if ($kolom == 88) {
        $data_hiv = $this->m_bab6_3->retrieveHIV($tahun, $rs_noreg, $rs_region, null, null);
        $num_hiv = $this->m_bab6_2->countRS("hiv", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_29_KasusHIV_N.php';
    } else if ($kolom == 89) {
        $data_hiv = $this->m_bab6_3->retrieveHIV($tahun, $rs_noreg, $rs_region, null, null);
        $num_hiv = $this->m_bab6_2->countRS("hiv", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_29_KasusHIV_N-1.php';
    } else if ($kolom == 90) {
        $data_hiv = $this->m_bab6_3->retrieveHIV($tahun, $rs_noreg, $rs_region, null, null);
        $num_hiv = $this->m_bab6_2->countRS("hiv", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_29_KasusHIV_N-2.php';
    } else if ($kolom == 91) {
        $data_dbd = $this->m_bab6_3->retrieveDBD($tahun, $rs_noreg, $rs_region, null, null);
        $num_dbd = $this->m_bab6_2->countRS("dbd", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_30_KasusDBD_Suspek.php';
    } else if ($kolom == 92) {
        $data_dbd = $this->m_bab6_3->retrieveDBD($tahun, $rs_noreg, $rs_region, null, null);
        $num_dbd = $this->m_bab6_2->countRS("dbd", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_30_KasusDBD_Syok.php';
    } else if ($kolom == 93) {
        $data_dbd = $this->m_bab6_3->retrieveDBD($tahun, $rs_noreg, $rs_region, null, null);
        $num_dbd = $this->m_bab6_2->countRS("dbd", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_30_KasusDBD_Suspek_Syok.php';
    } else if ($kolom == 94) {
        $data_ski = $this->m_bab6_3->retrieveSebabKematianIbu($tahun, $rs_noreg, $rs_region, null, null);
        $num_ski = $this->m_bab6_2->countRS("jumlah_kematian_ibu_per_faktor", $tahun, $rs_region, null, null);
        include 'charts/Bab6/charts_31_SebabKematianIbu.php';
    }
} else if ($bab == 6) {
    if ($kolom == 95) {
        $data_lamp_f = $this->m_lampiran->retrievePeralatanRadiologi($tahun, $rs_noreg, $rs_region, null, null);
        $num_lamp_f = $this->m_bab6_2->countRS("peralatan_radiologi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab Lampiran/charts_32_PeralatanradiologiKelasA.php';
    } else if ($kolom == 96) {
        $data_lamp_f = $this->m_lampiran->retrievePeralatanRadiologi($tahun, $rs_noreg, $rs_region, null, null);
        $num_lamp_f = $this->m_bab6_2->countRS("peralatan_radiologi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab Lampiran/charts_33_PeralatanradiologiKelasB.php';
    } else if ($kolom == 97) {
        $data_lamp_f = $this->m_lampiran->retrievePeralatanRadiologi($tahun, $rs_noreg, $rs_region, null, null);
        $num_lamp_f = $this->m_bab6_2->countRS("peralatan_radiologi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab Lampiran/charts_34_PeralatanradiologiKelasC.php';
    } else if ($kolom == 98) {
        $data_lamp_f = $this->m_lampiran->retrievePeralatanRadiologi($tahun, $rs_noreg, $rs_region, null, null);
        $num_lamp_f = $this->m_bab6_2->countRS("peralatan_radiologi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab Lampiran/charts_35_PeralatanradiologiKelasD.php';
    } else if ($kolom == 99) {
        $data_lamp_f = $this->m_lampiran->retrievePeralatanRadiologi($tahun, $rs_noreg, $rs_region, null, null);
        $num_lamp_f = $this->m_bab6_2->countRS("peralatan_radiologi_rs", $tahun, $rs_region, null, null);
        include 'charts/Bab Lampiran/charts_36_PeralatanradiologiLainnya.php';
    }
}
?>