<?php include 'head.php'; ?>
	<section id="container" class="container_12">
		
		
		<!-- ========== Form Upload  - block begin ========== -->
		
		<section class="grid_12">
			<div class="box">
				<div class="title">
					<span class="icon16_sprite i_3d"></span>
					Add User
				</div>
			
				<div class="inside">
				<!-- Forms -->
					<table id="userTable" class="display">
						<thead>
							<th>Username</th>
							<th>Email</th>
							<th>Password</th>
							<th>Manage</th>
						</thead>
						<tbody>
						<?php
							foreach($users->result() as $row)
							{
								echo '<tr>';
								echo '<td>'.$row->user_name.'</td>';
								echo '<td>'.$row->user_email.'</td>';
								echo '<td>'.$row->user_password.'</td>';
								echo '<td><a href=#>Edit</a> | <a href=#>Delete</a></td>';
								echo '</tr>';
							}
						?>
						</tbody>
					</table>
					
					<!-- Form footer Begin-->
					<section class="box_footer">
						<div class="grid-12-12">
							<a href="#"><input type="button" class="right button green" value="Add User" /></a>
						</div>
						<div class="clear"></div>
					</section>
					<!-- Form footer End-->
				</div>
			</div>
			</section>
	</section>
	<div class="clear"></div>
	
	<script>
		jQuery(document).ready(function() {
			jQuery('#userTable').dataTable();
		});
	</script>	


<?php include 'footer.php'; ?>