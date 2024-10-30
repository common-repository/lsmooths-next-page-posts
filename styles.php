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
	add_action( 'wp_enqueue_scripts', 'lsmooth_pp_styles_add' );

	function lsmooth_pp_styles_add()
	{
		// register and enquee the style.css
		wp_register_style( 'lsmooth_pp', plugins_url('inc/styles.css', __FILE__) );
		wp_enqueue_style( 'lsmooth_pp' );
	}
}
?>
