<?php
/*
 * Plugin Name: lsmooth's Next Page Posts
 * Plugin URI: http://wordpress.org/extend/plugins/lsmooths-next-page-posts/
 * Description: Create a navigation including a list of posts on the next/previous page
 * Version: 0.3.0
 * Author: lsmooth
 * Author URI: http://lsmooth.de
 * License: GPL2
 * Text Domain: lsmoothnpp
 * Domain Path: /languages/
 */
/* Copyright 2012, 2013 Lutz Schildt (email : ls@lsmooth.de)
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

if(!function_exists('add_action') || !function_exists('add_shortcode'))
{
	exit;
}

define('LSMOOTH_PP', 'true');

// add the shortcode and set textdomain for i18n support
add_shortcode('lsmooth_page_posts', 'lsmooth_page_posts_func');
load_plugin_textdomain( 'lsmoothnpp', false, dirname(plugin_basename( __FILE__ )).'/languages/' );

function lsmooth_page_posts($direction='next')
{
	global $wp_query;
	
	// get options
	$options=get_option('lsmooth_pp_options');
	$max_posts_per_page=get_option('posts_per_page');
	$output="";
	
	// only display on normal pages
	if(!is_search() && !is_tag() && !is_category() && !is_day() && !is_month() && !is_year())
	{
		$display_page = 0;

		// get page count and current page
		$page_count=$wp_query->max_num_pages;
		$page = (int)get_query_var('paged');
		if(!$page)
			$page = (int)get_query_var('page');
		
		// if $page is not set, assume we are on page 1
		if(!$page)
			$page = 1;
			
		// determine direction and page to display
		if($direction=='next' && $page<$page_count)
		{
			$display_page = $page + 1;
		}
		elseif($direction=='prev' && $page>1)
		{
			$display_page = $page - 1;
		}

		$output="<!-- Begin: lsmooth's next page posts -->\n<div class=\"lsmooth_pp_div\">\n";
		
		// display posts only if $display_page is between page 1 and $wp_query->max_num_pages
		if($display_page>0 && $display_page<=$page_count)
		{
			// set current page for query
			query_posts( array('paged'	=> $display_page) );
			$output.="<span class=\"lsmooth_pp_head\">";
			if($direction=='next')
			{
				$output.=__('So geht es auf der naechsten Seite weiter', 'lsmoothnpp');
			}
			elseif($direction=='prev')
			{
				$output.=__('Dies findet sich auf der vorherigen Seite', 'lsmoothnpp');
			}
			$output.="</span><ul>\n";
			$count=0;
			// display posts until none are left or $max_posts_per_page is reached
			while(have_posts() && $count<$max_posts_per_page)
			{
				$count++;
				the_post();
				$output.='<li class="lsmooth_pp"><a href="'.get_permalink().'" rel="bookmark" title="'.sprintf(__('%s aufrufen', 'lsmoothnpp'),the_title('','',false)).'">'.the_title('','',false).'</a></li>';
				$output.="\n";
			}
			
			// if display_empty is true fill up the rest of the list with empty links if necessary
			if($options['display_empty']=='true')
			{
				while($count<$max_posts_per_page)
				{
					$count++;
					$output.='<li class="lsmooth_pp_empty"><a href="javascript:void(0);">&nbsp;</a></li>';
					$output.="\n";
				}
				wp_reset_query();
				$output.="</ul>\n";
			}
		}
		else
		{
			// display empty div if list should not be displayed
			$output.="&nbsp;";
		}
		$output.="</div>\n<!-- End: lsmooth's next page posts -->\n";
	}
	return $output;
}

function lsmooth_page_posts_func($attributes)
{
	// extract attributes from the shortcode using direction='next' as default
	extract(shortcode_atts(array(
		'direction' => 'next'
	), $attributes));

	// and call the main function to display the link list
	return lsmooth_page_posts($direction);
}

require_once(dirname( __FILE__ ) . '/activation.php');
require_once(dirname( __FILE__ ) . '/settings.php');
require_once(dirname( __FILE__ ) . '/styles.php');
?>
