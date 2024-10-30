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
	function lsmooth_pp_activate()
	{
		// add options with default values upon plugin activation
		$options=array('display_empty' => 'true');
		update_option('lsmooth_pp_options', $options);
	}

	function lsmooth_pp_deactivate()
	{
		// delete options upon plugin deactivation
		delete_option('lsmooth_pp_options');
	}

	register_activation_hook(plugin_dir_path(__FILE__).'lsmooth_next_page_posts.php', 'lsmooth_pp_activate');
	register_deactivation_hook(plugin_dir_path(__FILE__).'lsmooth_next_page_posts.php', 'lsmooth_pp_deactivate');
}
?>
