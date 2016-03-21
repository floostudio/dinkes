<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title>Sistem Informasi Rekapitulasi Dinas Kesehatan Jawa Timur</title>

                <!-- ==================================================================================== 
                        STYLES BEGIN 
                ===================================================================================== -->

                <!-- Global styles -->
                <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/reset.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/grid.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/config.css" />

                <!-- Plugin configuration (styles) -->
                <link rel="stylesheet" href="<?php echo base_url() ?>static/css/plugin_config.css" />

                <!--[if IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->


                <!-- ======================================================================================
                        SCRIPTS BEGIN
                ======================================================================================= -->

                <!-- = Global Scripts [required for template] 
                        ***************************************************************************************-->
                <script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/js/global_plugins_scripts.js"></script>



                <!-- = From Plugins Dir 
                        ***************************************************************************************-->

                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/lightbox/js/lightbox/jquery.lightbox.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/jqueryui/all/jquery-ui-1.8.16.custom.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/validator/js/languages/jquery.validationEngine-en.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/validator/js/jquery.validationEngine.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/dialogs/jquery-fallr-1.2.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/spin/jquery-spin.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/qtip/jquery.qtip.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/plupload/js/browserplus-min.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/plupload/js/plupload.full.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/multiselect/js/ui.multiselect.js"></script>			
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/datatables/media/js/jquery.dataTables.js"></script>	
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/alerts/javascript/jquery.toastmessage.js"></script>	
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/prettify/prettify.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/fullcalendar/fullcalendar.min.js"></script>

                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/fileexplorer/js/elfinder.min.js"></script>	
                <!--<script src="plugins/fileexplorer/js/i18n/elfinder.ru.js" type="text/javascript" charset="utf-8"></script>-->	

                <!-- Flotr2 Charts -->
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/flotr2/flotr2.min.js"></script>
                <!--[if IE 8]><script type="text/javascript" src="plugins/flotr2/flotr2.ie.min.js"></script><![endif]-->

                <!-- color picker -->
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/colorpicker/js/colorpicker.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/colorpicker/js/eye.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/colorpicker/js/utils.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/plugins/colorpicker/js/layout.js"></script>



                <!-- = From JS Dir
                        ****************************************************************************************-->

                <script type="text/javascript" src="<?php echo base_url() ?>static/js/modernizr.custom.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery.autogrowtextarea.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery.autotab-1.1b.js"></script>

                <!-- From JS Dir [plugin initialization] -->
                <!--<script type="text/javascript" src="<?php echo base_url() ?>static/js/dialog_fallr_init.js"></script>-->
                <script type="text/javascript" src="<?php echo base_url() ?>static/js/tiny_mce_init.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/js/datatables_init.js"></script>
                <script type="text/javascript" src="<?php echo base_url() ?>static/js/head_scripts.js"></script>

                </head>
                <body>

                    <section id="layout">

                        <div class="logo_profile container_12">
                            <div class="grid_6 logo_img" style="font-size: 20px;">
							<img src="<?php echo base_url() ?>static/images/logo-jatim.png" style="width: 70px; height: 100px;" alt="Logo" />
							&nbsp;&nbsp;&nbsp; 
							<strong>Dinas Kesehatan Provinsi Jawa Timur</strong> </div>
                            <br/><br/><br/><div class="grid_6 profile_meta">
                                <div class="user_meta">
                                    
                                    <div class="name">
                                        Selamat datang <?php echo $this->admin_name; ?> <br />
                                        <!--<a href="#" class="submeta">Profile</a>-->
                                        <a href="<?php echo site_url(); ?>/upanel/signout" class="submeta">Logout</a>
                                    </div>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>

                        <section id="top">

                            <section id="top_bar">						
                                <section id="main_menu">
                                    <ul class="sf-menu">
                                        <li><a href="">Master Data</a>
                                            <ul>
                                                <li><a href="<?php echo site_url('/users') ?> ">Data User</a></li>
                                                
                                            </ul>
                                        </li>
                                        
										 
                                    </ul>							
                                    <div class="clear"></div>
                                </section><!-- End of #main_menu -->
                            </section><!-- End of #top_bar -->
                            <div class="clear"></div>
                            </section--><!-- End of .top_in -->

                        </section><!-- End of #top -->


