<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Login </title>
	
	<!-- Global styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/grid.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/config.css" />

<!-- = Global Scripts [required for template] 
	***************************************************************************************-->
	<script type="text/javascript" src="<?php echo base_url()?>static/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>static/plugins/validator/js/languages/jquery.validationEngine-en.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>static/plugins/validator/js/jquery.validationEngine.js"></script>
	<script>
		jQuery(document).ready(function(){
			jQuery("#admin_login_form").validationEngine('attach', {promptPosition : "bottomRight", autoPositionUpdate : true});
		});
	</script>
	
	
</head>
<body style="text-align: center">    
    
<div id="name" style="margin:0 auto;">
	
	<div class="logo" style="font-size: 20px;padding-top:20px"> <img src="<?php echo base_url()?>static/images/logo-jatim.png" style="width: 80px; height: 115px;" alt="Logo">
	<br/>
	<strong>Dinas Kesehatan Provinsi Jawa Timur</strong> </div>
	
	<h1 style="font-size: 30px;">e-kesjuksus</h1>
	<h2 style="width:800px; margin:0 auto;">SOFTWARE DATA DAN ANALISA LAPORAN RUMAH SAKIT</h2>
	
	</div>
	<section id="login_form">
		<div class="login_form_head">Login</div>
		<form id="admin_login_form" class="formee" method="post" action="<?php echo site_url(); ?>/login/getAccess">
			<div class="login_form_display">
				<div class="login_row"><input type="text" class="validate[required,custom[username]]" name="login_username" id="login_username" placeholder="Username" /></div>
				<div class="clear"></div>
				<div class="login_row"><input type="password" class="validate[required,custom[passwordLogin]]" name="login_password" id="login_password" placeholder="Password" /></div>
			</div>			
			<!--Form footer begin-->
			<section class="login_footer">
				<div class="textcenter"><input type="submit" value="Login" /></div>
			</section>
			<!--Form footer end-->		
		</form>
	</section><!-- End of #container -->
	<section id="login_form">
            <a href="<?php echo site_url(); ?>/validasi/rumahsakit">
		<div class="login_form_head">Laporan Absensi</div>
            </a>
	</section><!-- End of #container -->

</body>
</html>
