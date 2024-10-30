=== lsmooth's Next Page Posts ===
Contributors: lsmooth, thorstensblogwelt 
Tags: pages, posts, preview
Requires at least: 2.7
Tested up to: 3.5
Stable tag: 0.3.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create a navigation which displays titles and links to the posts that can be found on the next page.

== Description ==

**lsmooth's Next Page Posts** is a very simple plugin that creates a navigation
which displays and links to posts on the next or previous page. The plugin was initially developed
for [Thorstens Blogwelt](http://www.thorstens-blogwelt.de/). If you would like to see
what it can do for you, you can take a look at it there.

This plugin creates a shortcode that can be integrated into your theme to create
the nagivation: `lsmooth_page_posts`. The shortcode can be embedded using this code

`<?php echo do_shortcode('[lsmooth_page_posts direction="next"]'); ?>`

for example in the index.php of your theme.


1. **direction** - "next" will display the posts on the next page if possible, "prev" will display the posts on the previous page.

== Installation ==

1. Upload the plugin directory `lsmooths-next-page-posts` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Either place `<?php echo do_shortcode('[lsmooth_page_posts direction="next"]'); ?>` in your template to display the posts on the next page
1. Or place `<?php echo do_shortcode('[lsmooth_page_posts direction="prev"]'); ?>` in your template to display the posts on the previous page
1. Check Settings->lsmooth's Next Page Posts for settings to modify
1. Modify the styles.css in the plugin directory to match your template.

== Frequently Asked Questions ==

None.

== Changelog ==

= 0.3.0 =
* Implemented: listing posts on previous page
* Added comments in code and restructured code

= 0.2.3 =
* Fixed: css

= 0.2.2 =
* version bump

= 0.2.1 =
* Fixed: plugin installation

= 0.2.0 =
* implement i18n support
* small enhancements
* moved styles.css to inc/

= 0.1.0 =
* Initial release
