<?php include 'head.php'; ?>
<section id="container" class="container_12">
 <!-- ========== Pop Up Style  - block begin ========== -->
		<style>
			input.text { margin-bottom:12px; width:95%; padding: .4em; }
			fieldset { padding:0; border:0; margin-top:25px; }
			h1 { font-size: 1.2em; margin: .6em 0; }
			div#users-contain { width: 350px; margin: 20px 0; }
			div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
			div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
			.ui-dialog .ui-state-error { padding: .3em; }
			.validateTips { border: 1px solid transparent; padding: 0.3em; }
		</style>
		<!-- ========== Pop Up Style  - block end ========== -->
		
    <section class="grid_12">
     <div class="box">
         <div class="title">
         title
         </div>
         <div class="inside">
             <table id="testable" class="display">
                 <thead>
                     <tr>
                         <th>tes</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>
                             tes
                         </td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </section>
</section>>
<div class="clear"></div>
 
 <script>
     jQuery(document).ready(function(){
        jQuery('#testable').dataTable(); 
     });
 </script>

 <?php include 'footer.php'; ?>