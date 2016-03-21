<?php

if ($tahun != 0 && $bab != 0) {
    if ($bab == 1) {
        redirect('/export1/generateExportBab2/' . $tahun);
    } else if ($bab == 2) {
        redirect('/export1/generateExportBab3/' . $tahun);
    } else if ($bab == 3) {
        redirect('/export1/generateExportBab4/' . $tahun);
    } else if ($bab == 4) {
        redirect('/export1/generateExportBab511/' . $tahun);
    } else if ($bab == 5) {
        redirect('/export1/generateExportBab512/' . $tahun);
    } else if ($bab == 6) {
        redirect('/export1/generateExportBab521/' . $tahun);
    } else if ($bab == 7) {
        redirect('/export1/generateExportBab522/' . $tahun);
    } else if ($bab == 8) {
        redirect('/export1/generateExportBab5231/' . $tahun);
    } else if ($bab == 9) {
		redirect('/export1/generateExportBab5232/' . $tahun);
	} else if ($bab == 10) {
        redirect('/export1/generateExportBab531/' . $tahun);
    } else if ($bab == 11) {
        redirect('/export1/generateExportBab532/' . $tahun);
    } else if ($bab == 12) {
        redirect('/export1/generateExportBab61/' . $tahun);   
    } else if ($bab == 13) {
        redirect('/export1/generateExportBab62/' . $tahun);
    } else if ($bab == 14) {
        redirect('/export1/generateExportBab6mdgs1/' . $tahun);
    } else if ($bab == 15) {
        redirect('/export1/generateExportBab6mdgs2/' . $tahun);
    } else if ($bab == 16) {
        redirect('/export1/generateExportLampiran/' . $tahun);
    } else if ($bab == 17) {
        redirect('/export1/generateExportSPM/' . $tahun);
    } else if ($bab == 18) {
        redirect('/export1/generateExportSPM1/' . $tahun);
    } else if ($bab == 19) {
        redirect('/export1/generateExportSPM2/' . $tahun);
    }
    //new
    else if ($bab == 20) {
        redirect('/export1/generateExportRS/' . $tahun);
    }
}
?>
