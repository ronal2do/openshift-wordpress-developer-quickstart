<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<input type="text" class="search-field" placeholder="<?php echo __('Buscar...', NECTAR_THEME_NAME); ?>" value="" name="s" title="<?php echo __('Buscar por:', NECTAR_THEME_NAME); ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo __('Buscar', NECTAR_THEME_NAME); ?>" />
</form>