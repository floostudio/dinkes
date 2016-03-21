<?php

if ($tahun != 0 && $bab != 0) {
    if ($bab == 1) {
        redirect('/export/generateExportBab2/' . $tahun);
    } 
	else if($bab == 2){
        redirect('/export/generateExportBab3/' . $tahun);
    } 
	else if($bab == 3){
        redirect('/export/generateExportBab4/' . $tahun);
    } 
	else if($bab == 4){
        redirect('/export/generateExportBab51/' . $tahun);
    } 
	else if($bab == 5){
        redirect('/export/generateExportBab52/' . $tahun);
    } 
	else if($bab == 6){
        redirect('/export/generateExportBab53/' . $tahun);
    }
	else if($bab == 7){
        redirect('/export/generateExportBab54/' . $tahun);
    } 
	else if($bab == 8){
        redirect('/export/generateExportBab55/' . $tahun);
    } 
	else if($bab == 9){
        redirect('/export/generateExportBab6/' . $tahun);
    } 
	else if($bab == 10){
        redirect('/export/generateExportBab6mdgs/' . $tahun);
    }
	else if($bab == 11){
        redirect('/export/generateExportLampiran/' . $tahun);
    }
	
}
?>