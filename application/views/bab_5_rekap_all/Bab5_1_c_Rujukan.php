<?php
foreach ($tahun_tahun->result() as $row) {
    $yearName = $row->TAHUN_TAHUN;
}
?>
<h4>Tahun <?php echo $yearName . ': '; ?>Bab 5.1.C. Kegiatan Rujukan </h4>
<thead>
    <tr>
        <th rowspan="4">No</th>
        <th rowspan="4">Region</th>
        <th rowspan="4">Kode RS</th> 
        <th rowspan="4">Nama RS</th> 

        <th colspan="16">Peny. Dalam</th>
        <th colspan="16">Bedah</th> 
        <th colspan="16">Anak</th> 
        <th colspan="16">Obst-Gyn</th> 
        <th colspan="16">KB</th> 
        <th colspan="16">Syaraf</th> 
        <th colspan="16">Jiwa</th> 
        <th colspan="16">THT</th> 
        <th colspan="16">Mata</th> 
        <th colspan="16">Kulit/kelamin</th> 
        <th colspan="16">Gigi & mulut</th> 
        <th colspan="16">Radiologi</th> 
        <th colspan="16">Paru-paru</th> 
        <th colspan="16">Lain-lain</th>  

        <th rowspan="4">Total</th>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 14; $k++) { ?>
            <th colspan="4">Pengiriman Dokter Ahli ke Sarana Kesehatan Lain</th>
            <th colspan="3" rowspan="2">Kunjungan Dokter Ahli yang Diterima</th>
            <th colspan="9">Rujukan Pasien</th>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 14; $k++) { ?>
            <th colspan="2">Rumah Sakit</th>
            <th colspan="2">Puskesmas</th>
            <th colspan="6">Rujukan dari Bawah</th>
            <th colspan="3">Dirujuk Ke Atas</th>
        <?php } ?>
    </tr>
    <tr>
        <?php for ($k = 0; $k < 14; $k++) { ?>
            <th>Total Kali</th>
            <th>Total RS</th>
            <th>Total Kali</th>
            <th>Total Puskesmas</th>
            <th>Total Kali</th>
            <th>Kunjungan dr Ahli Asing</th>
            <th>Total Pasien yg Dilayani</th>
            <th>Diterima dr Puskesmas</th>
            <th>Diterima dr Fas Lain</th>
            <th>Diterima dr RS lain</th>
            <th>Dikembalikan ke Puskesmas</th>
            <th>Dikembalikan ke Fas Lain</th>
            <th>Dikembalikan ke RS Asal</th>
            <th>Pasien Rujukan</th>
            <th>Pasien Datang Sendiri</th>
            <th>Diterima Kembali</th>
        <?php } ?>
    </tr>
</thead>
<tbody>
    <?php
    $i = 1;

    $row = $data_51_6->result();

    $rs_count = $num_51_6;
    $total = array_fill(0, 224, 0);
    $track = 0;
    $totalAllx = 0;
    for ($j = 0; $j < $rs_count; $j++) {
        $ind = 0;
        $totalX = 0;
        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $row[$track]->daftar_list_region . '</td>';
        echo '<td>' . $row[$track]->KODE_REGISTRASI . '</td>';
        echo '<td>' . $row[$track]->RS_NAMA . '</td>';
        for ($k = 0; $k < 14; $k++) {
            echo '<td>' . $row[$track]->RJK_RS_TOTALKALI . '</td>';
            echo '<td>' . $row[$track]->RJK_RS_JUMLAH . '</td>';
            echo '<td>' . $row[$track]->RJK_PS_TOTALKALI . '</td>';
            echo '<td>' . $row[$track]->RJK_PS_JUMLAH . '</td>';
            echo '<td>' . $row[$track]->RJK_KUNJUNGAN_TOTALKALI . '</td>';
            echo '<td>' . $row[$track]->RJK_KUNJUNGAN_ASING . '</td>';
            echo '<td>' . $row[$track]->RJK_TOTAL_PASIEN . '</td>';
            echo '<td>' . $row[$track]->RJK_DARI_PUSKESMAS . '</td>';
            echo '<td>' . $row[$track]->RJK_DARI_FASILITAS_LAIN . '</td>';
            echo '<td>' . $row[$track]->RJK_DARI_RSLAIN . '</td>';
            echo '<td>' . $row[$track]->RJK_KEMBALI_PUSKESMAS . '</td>';
            echo '<td>' . $row[$track]->RJK_KEMBALI_FASILITAS_LAIN . '</td>';
            echo '<td>' . $row[$track]->RJK_KEMBALI_RS_ASAL . '</td>';
            echo '<td>' . $row[$track]->RJK_PASIEN_RUJUKAN . '</td>';
            echo '<td>' . $row[$track]->RJK_PASIEN_DTG_SENDIRI . '</td>';
            echo '<td>' . $row[$track]->RJK_DITERIMA_KEMBALI . '</td>';

            $total[$ind] += $row[$track]->RJK_RS_TOTALKALI;
            $total[++$ind] += $row[$track]->RJK_RS_JUMLAH;
            $total[++$ind] += $row[$track]->RJK_PS_TOTALKALI;
            $total[++$ind] += $row[$track]->RJK_PS_JUMLAH;
            $total[++$ind] += $row[$track]->RJK_KUNJUNGAN_TOTALKALI;
            $total[++$ind] += $row[$track]->RJK_KUNJUNGAN_ASING;
            $total[++$ind] += $row[$track]->RJK_TOTAL_PASIEN;
            $total[++$ind] += $row[$track]->RJK_DARI_PUSKESMAS;
            $total[++$ind] += $row[$track]->RJK_DARI_FASILITAS_LAIN;
            $total[++$ind] += $row[$track]->RJK_DARI_RSLAIN;
            $total[++$ind] += $row[$track]->RJK_KEMBALI_PUSKESMAS;
            $total[++$ind] += $row[$track]->RJK_KEMBALI_FASILITAS_LAIN;
            $total[++$ind] += $row[$track]->RJK_KEMBALI_RS_ASAL;
            $total[++$ind] += $row[$track]->RJK_PASIEN_RUJUKAN;
            $total[++$ind] += $row[$track]->RJK_PASIEN_DTG_SENDIRI;
            $total[++$ind] += $row[$track]->RJK_DITERIMA_KEMBALI;

            $totalX = $row[$track]->RJK_DITERIMA_KEMBALI + $row[$track]->RJK_PASIEN_DTG_SENDIRI + $row[$track]->RJK_PASIEN_RUJUKAN + $row[$track]->RJK_KEMBALI_RS_ASAL + $row[$track]->RJK_KEMBALI_FASILITAS_LAIN + $row[$track]->RJK_KEMBALI_PUSKESMAS + $row[$track]->RJK_DARI_RSLAIN + $row[$track]->RJK_DARI_FASILITAS_LAIN + $row[$track]->RJK_DARI_PUSKESMAS + $row[$track]->RJK_TOTAL_PASIEN + $row[$track]->RJK_KUNJUNGAN_ASING + $row[$track]->RJK_KUNJUNGAN_TOTALKALI + $row[$track]->RJK_PS_JUMLAH + $row[$track]->RJK_PS_TOTALKALI + $row[$track]->RJK_RS_JUMLAH + $row[$track]->RJK_RS_TOTALKALI;

            $ind++;
            $track++;
        }
        $totalAllx += $totalX;
        echo '<td>' . $totalX . '</td>';
        echo '</tr>';
    }
    if ($row != null) {
        echo '<tr>';
        echo '<td><b>Total</b></td>';
        echo '<td> </td> <td> </td> <td> </td>';

        for ($i = 0; $i < 224; $i++) {
            echo '<td>' . $total[$i] . '</td>';
        }
        echo '<td>' . $totalAllx . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>