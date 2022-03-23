<form method="post" action="options.php">

	<table class="form-table">
		
		<?php do_settings_sections('tracking_dados_registro'); ?>
		<?php settings_fields('tracking_dados_registro'); ?>
		<?php submit_button(); ?>

	</table>
</form>