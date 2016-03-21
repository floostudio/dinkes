<?php include 'head.php'; ?>

	
			<section id="container" class="container_12">
			
			
			
				<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="title"><span class="icon16_sprite i_list"></span>Syntax Highlighter </div>
						
						<div class="inside">
							<div class="in">
									
								<!-- ====================== -->
								
								<div class="grid_12">
									<h6>Example Javascript code</h6>
									
									<pre>
$('#colorSelector').ColorPicker({
	color: '#0000ff',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#colorSelector div').css('backgroundColor', '#' + hex);
	}
});</pre>
								</div>
								<div class="clear"></div>
								
								<!-- ====================== -->
								
								
								
								<!-- ====================== -->
							
								<div class="grid_12">
									<h6>Example HTML/XML code</h6>
									
									<pre>
&lt;div class="box_row first">
	&lt;div class="grid_6 text_elem">Some text&lt;/div>
	&lt;div class="grid_6">&lt;a href="#" class="button">Button&lt;/a>&lt;/div>
	&lt;div class="clear">&lt;/div>
&lt;/div></pre>
								</div>
								<div class="clear"></div>
								
								<!-- ====================== -->
															
								
								
								<!-- ====================== -->
								
								<div class="grid_12">
									<h6>Example CSS code</h6>
									
									<pre>
#hello_id {
	padding: 0px 2%;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #bbb;
	background: #e5e5e5;
	background: -moz-linear-gradient(top,  #e5e5e5 1%, #dbdbdb 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#e5e5e5), color-stop(100%,#dbdbdb));
	background: -webkit-linear-gradient(top,  #e5e5e5 1%,#dbdbdb 100%);
	background: -o-linear-gradient(top,  #e5e5e5 1%,#dbdbdb 100%);
	background: -ms-linear-gradient(top,  #e5e5e5 1%,#dbdbdb 100%);
	background: linear-gradient(top,  #e5e5e5 1%,#dbdbdb 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e5e5e5', endColorstr='#dbdbdb',GradientType=0 );
	-webkit-border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0;
}</pre>
								</div>
								<div class="clear"></div>
								
								<!-- ====================== -->
									
							</div>
						</div>
						
					</div>
				</section>
				<div class="clear"></div>
				<!-- ======= .grid_12 - block end ======= -->
				
				
			</section><!-- End of #container -->
			

			
<?php include 'footer.php'; ?>