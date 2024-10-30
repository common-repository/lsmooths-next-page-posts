<?php
/*  Copyright 2012, 2013  Lutz Schildt  (email : ls@lsmooth.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(defined('LSMOOTH_PP') && LSMOOTH_PP == 'true')
{
	// add actions for initializing the settings page
	add_action('admin_init', 'lsmooth_pp_options_init');
	add_action('admin_menu', 'lsmooth_pp_options_page');

	function lsmooth_pp_options_sanitize($input)
	{
		// input validation is not needed at this time, maybe later if get more options to set
		return $input;
	}

	function lsmooth_pp_options_page()
	{
		add_options_page('lsmooth&#039;s Next Page Posts - '.__('Einstellungen', 'lsmoothnpp'), 'lsmooth&#039;s Next Page Posts', 'administrator', __FILE__, 'lsmooth_pp_options_page_display');
	}

	function lsmooth_pp_options_page_display()
	{
?>
<div class="wrap">
<div class="icon32" id="icon-options-general"><br></div>
<h2><?php _e('Einstellungen', 'lsmoothnpp'); ?></h2>
<form action="options.php" method="post">
<?php settings_fields('lsmooth_pp_options'); ?>
<?php do_settings_sections(__FILE__); ?>
<p class="submit">
<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Einstellungen speichern', 'lsmoothnpp'); ?>" />
</p>
</form>
</div>

<?php
	}

	function lsmooth_pp_options_init()
	{
		// register settings and add section and the fields
		register_setting('lsmooth_pp_options', 'lsmooth_pp_options', 'lsmooth_pp_options_sanitize');
		add_settings_section('lsmooth_pp_options', __('Einstellungen', 'lsmoothnpp'), 'lsmooth_pp_options_text', __FILE__);

		add_settings_field('display_empty', __('Liste mit leeren Eintraegen auffuellen?', 'lsmoothnpp'), 'lsmooth_displayempty', __FILE__, 'lsmooth_pp_options');
	}

	function lsmooth_pp_options_text()
	{
	}

	function lsmooth_displayempty()
	{
		$options = get_option('lsmooth_pp_options');
		echo '<input type="checkbox" name="lsmooth_pp_options[display_empty]" value="true"'.($options['display_empty']=='true'?' checked="checked"':'').'>';
	}
}
?>
