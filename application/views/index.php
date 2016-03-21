<?php include 'head.php'; ?>

<section id="container" class="container_12" style="min-height:430px;">


    <!-- ======= .grid_12 - block begin ======= -->
    <section class="grid_12">
        <div class="box">
            <div class="title"><span class="icon16_sprite i_network_monitor"></span>Beranda</div>

            <div class="inside">

                <div class="in">
                    <h1> Selamat datang di Sistem Informasi Rekapitulasi dan Validasi Data Rumah Sakit  </h1>
                    <h2> Dinas Kesehatan Provinsi Jawa Timur </h2>
                    <p style="font-size: 13px;"> Sistem ini merupakan sistem untuk memvalidasi dan membuat rekapitulasi otomatis dari Laporan Tahunan Rumah Sakit.<br/>
                        Data yang telah diunggah ke dalam sistem tersimpan otomatis dalam database penyimpanan yang dikelompokkan berdasarkan tahun laporan dokumen tersebut diunggah.<br/>
                        Data masing-masing tahun tersebut dapat dicek kembali dalam sistem ini.
                        Selain itu sistem ini juga dapat mencetak data dalam dokumen bertipe excel.<br/>
                        Grafik dari masing-masing tabel dapat dibuat secara otomatis menggunakan sistem ini. Tabel yang akan dibuat grafiknya dapat dipilih. Pengguna juga dapat memilih jenis grafik yang diinginkan.
                        <br/>Untuk petunjuk penggunakan silahkan <a href="<?php echo site_url(); ?>/home/redirectPtnjuk">Lihat Petunjuk</a>.</p>
						
						

                </div>
				
				<!--form method="post" action="<?php echo base_url(); ?>home/redirectPtnjuk">
                    <div class="formee"> 
                            <div class="grid-2-12">
                                <input type="submit" class="right button green" value="Lihat Petunjuk" onclick="" />
                            </div>
                            <div class="clear"></div>
                            <hr /> 
                    </div>
                </form-->
                
                <br/><br/> 

            </div>

        </div>
    </section>
    <!-- ======= .grid_12 - block end ======= -->

    <div class="clear"></div>
</section>
<?php include 'footer.php'; ?>