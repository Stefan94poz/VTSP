<?php require('./app/views/templates/ssluzba_nav.php'); ?>
	<?php if(  isset($_SESSION["is_logged_in"])  ) : ?>
		<?php  if(isset($_POST['update']) ) : ?>
			<?php require('./app/views/templates/changestud.php'); ?>
		<?php endif; ?>
		<!-- Form for student update  END -->
		<?php  if(!isset($_POST['update']) ) : ?>
			<?php require('./app/views/templates/addStud.php'); ?>
		<?php endif; ?>
	<?php endif; ?>
	</div>
</div>
