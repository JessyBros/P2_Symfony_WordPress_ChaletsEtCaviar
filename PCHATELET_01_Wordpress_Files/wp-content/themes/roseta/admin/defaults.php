<?php
/**
 * Theme Defaults
 *
 * @package Roseta
 */

function roseta_get_option_defaults() {

	$sample_pages = cryout_get_default_pages();

	// DEFAULT OPTIONS ARRAY
	$roseta_defaults = array(

	"theme_db" 				=> "0.9",

	// Layout
	"theme_sitelayout"			=> "2cSr", // two columns, sidebar right
	"theme_layoutalign"			=> 0, 		// 0=wide, 1=boxed
	"theme_sitewidth"  			=> 1300, 	// pixels
	"theme_primarysidebar"		=> 320, 	// pixels
	"theme_secondarysidebar"	=> 380, 	// pixels
	"theme_magazinelayout"		=> 2, 		// two columns
	"theme_elementpadding" 		=> 0, 		// percent
	"theme_footercols"			=> 3, 		// 0, 1, 2, 3, 4
	"theme_footeralign"			=> 0,		// default

	// Menu
	"theme_menuheight"			=> 65, 	// pixels
	"theme_menustyle"			=> 1, 	// normal, fixed
	"theme_menuposition"		=> 0, 	// normal, on header image
	"theme_menualignment"		=> 0, 	// boxed, wide
	"theme_menulayout"			=> 2, 	// 0=left, 1=right, 2=center
	"theme_topsection"			=> 0, 	// 0=default, 1=reversed
	"theme_headerheight" 		=> 550, // pixels
	"theme_headerresponsive" 	=> 0, 	// cropped, responsive

	"theme_logoupload"			=> '', // empty
	"theme_siteheader"			=> 'title', // title, logo, both, empty
	"theme_sitetagline"			=> '', // 1= show tagline
	"theme_headerwidgetwidth"	=> "33%", // 25%, 33%, 50%, 60%, 100%
	"theme_headerwidgetalign"	=> "right", // left, center, right

	// Landing page
	"theme_landingpage"			=> 1, // 1=enabled, 0=disabled

	"theme_lpposts"				=> 1, // 2=static page, 1=posts, 0=disabled
	"theme_lpposts_more"		=> 'More Posts',
	"theme_lpslider"			=> 1, // 2=shortcode, 1=static, 0=disabled
	"theme_lpsliderimage"		=> get_template_directory_uri() . '/resources/images/slider/static.jpg', // static image
	"theme_lpslidershortcode"	=> '',
	"theme_lpslidertitle"		=> get_bloginfo('name'),
	"theme_lpslidertext"		=> get_bloginfo('description'),
	"theme_lpslidercta1text"	=> 'Demo',
	"theme_lpslidercta1link"	=> '#lp-blocks',
	"theme_lpslidercta2text"	=> 'More',
	"theme_lpslidercta2link"	=> '#lp-boxes-1',

	"theme_lpblockmaintitle1"	=> '',
	"theme_lpblockmaindesc1"	=> '',
	"theme_lpblockscontent1"	=> 1, // 0=disabled, 1=excerpt, 2=full
	"theme_lpblocksclick1"		=> 0,
	"theme_lpblocksreadmore1"	=> '',
	"theme_lpblockone1"			=> $sample_pages[1],
	"theme_lpblockoneicon1"		=> 'drop',
	"theme_lpblocktwo1"			=> $sample_pages[2],
	"theme_lpblocktwoicon1"		=> 'disc',
	"theme_lpblockthree1"		=> $sample_pages[3],
	"theme_lpblockthreeicon1"	=> 'cloud',
	"theme_lpblockfour1"		=> 0,
	"theme_lpblockfouricon1"	=> 'megaphone',

	"theme_lpboxmaintitle1"	=> '',
	"theme_lpboxmaindesc1"		=> '',
	"theme_lpboxcat1"			=> '',
	"theme_lpboxcount1"			=> 6,
	"theme_lpboxrow1"			=> 3, // 1-4
	"theme_lpboxheight1"		=> 350, // pixels
	"theme_lpboxlayout1"		=> 2, // 1=full width, 2=boxed
	"theme_lpboxmargins1"		=> 2, // 1=no margins, 2=margins
	"theme_lpboxanimation1"		=> 2, // 1=animated, 2=static
	"theme_lpboxreadmore1"		=> 'Read More',
	"theme_lpboxlength1"		=> 25,

	"theme_lpboxmaintitle2"	=> '',
	"theme_lpboxmaindesc2"		=> '',
	"theme_lpboxcat2"			=> '',
	"theme_lpboxcount2"			=> 8,
	"theme_lpboxrow2"			=> 4, 	// 1-4
	"theme_lpboxheight2"		=> 400, // pixels
	"theme_lpboxlayout2"		=> 1, 	// 1=full width, 2=boxed
	"theme_lpboxmargins2"		=> 1, 	// 1=no margins, 2=margins
	"theme_lpboxanimation2"		=> 1, 	// 1=animated, 2=static
	"theme_lpboxreadmore2"		=> 'Read More',
	"theme_lpboxlength2"		=> 12,

	"theme_lptextone"			=> $sample_pages[1],
	"theme_lptexttwo"			=> $sample_pages[2],
	"theme_lptextthree"			=> $sample_pages[3],
	"theme_lptextfour"			=> $sample_pages[4],

	// General
	"theme_breadcrumbs"			=> 1,
	"theme_pagination"			=> 1,
	"theme_singlenav"			=> 2,
	"theme_contenttitles" 		=> 1, // 1, 2, 3, 0
	"theme_totop"				=> 'roseta-totop-normal',
	"theme_tables"				=> 'roseta-stripped-table',
	"theme_normalizetags"		=> 1, // 0,1
	"theme_copyright"			=> '&copy;'. date_i18n('Y') . ' '. get_bloginfo('name'),

	"theme_articleanimation"	=> "flipLeft", // 0=none, >0=effect

	"theme_headertitles_posts" 		=> 1,
	"theme_headertitles_pages" 		=> 1,
	"theme_headertitles_archives"	=> 1,
	"theme_headertitles_home"		=> 1,

	"theme_image_style"			=> 'roseta-image-none',
	"theme_caption_style"		=> 'roseta-caption-one',

	"theme_searchboxmain" 		=> 1,
	"theme_searchboxfooter"		=> 0,

	"theme_socials_footer"			=> 0,
	"theme_socials_left_sidebar"	=> 0,
	"theme_socials_right_sidebar"	=> 0,

	// Colors
	"theme_sitebackground" 		=> "#FFFFFF",
	"theme_sitetext" 			=> "#666666",
	"theme_headingstext" 		=> "#162521",
	"theme_contentbackground"	=> "#FFFFFF",
	"theme_primarybackground"	=> "#FFFFFF",
	"theme_secondarybackground"	=> "#FFFFFF",
	"theme_overlaybackground"	=> "#162521",
	"theme_overlaytext"			=> "#FFFFFF",
	"theme_overlayopacity"		=> "50",

	"theme_accent1" 			=> "#22aaa1",
	"theme_accent2" 			=> "#162521",

	"theme_menubackground"		=> "#FFFFFF",
	"theme_menutext" 			=> "#888888",
	"theme_submenutext" 		=> "#888888",
	"theme_submenubackground"	=> "#FFFFFF",

	"theme_footerbackground"	=> "#eaeaea",
	"theme_footertext"			=> "#999999",

	"theme_lpblocksbg"			=> "#FFFFFF",
	"theme_lpboxesbg"			=> "#eceff2",
	"theme_lptextsbg"			=> "#f4f4f4",
	"theme_lppostsbg"			=> "#FFFFFF",

	// Typography
	"theme_fgeneral" 			=> 'System Fonts, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif',
	"theme_fgeneralgoogle" 		=> '',
	"theme_fgeneralsize" 		=> 17, // px
	"theme_fgeneralweight" 		=> '400',
	"theme_fgeneralvariant" 	=> '',
	"theme_lineheight"			=> 2.0,
	"theme_paragraphspace"		=> 1.0,

	"theme_fsitetitle" 			=> 'Oswald/gfont',
	"theme_fsitetitlegoogle"	=> '',
	"theme_fsitetitlesize" 		=> 1.1, // em
	"theme_fsitetitleweight"	=> '700',
	"theme_fsitetitlevariant"	=> 'uppercase',

	"theme_fmenu" 				=> 'System Fonts, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif',
	"theme_fmenugoogle"			=> '',
	"theme_fmenusize" 			=> 0.85, // em
	"theme_fmenuweight"			=> '400',
	"theme_fmenuvariant"		=> 'uppercase',

	"theme_fht_title"			=> 'Oswald/gfont',
	"theme_fht_titlegoogle"		=> '',
	"theme_fht_titlesize" 		=> 3.0, // em
	"theme_fht_titleweight"		=> '700',
	"theme_fht_titlevariant"	=> 'uppercase',

	"theme_fht_meta"			=> 'Great Vibes/gfont',
	"theme_fht_metagoogle"		=> '',
	"theme_fht_metasize" 		=> 1.45, // em
	"theme_fht_metaweight"		=> '400',
	"theme_fht_menuvariant"		=> '',
	"theme_fht_titlelineheight" => 1.4,

	"theme_fwtitle" 			=> 'Oswald/gfont',
	"theme_fwtitlegoogle"		=> '',
	"theme_fwtitlesize" 		=> 1.0, // em
	"theme_fwtitleweight"		=> '700',
	"theme_fwtitlevariant"		=> 'uppercase',
	"theme_fwtitlelineheight" 	=> 2.0,
	"theme_fwtitlespace"		=> 1.0,

	"theme_fwcontent" 			=> 'System Fonts, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif',
	"theme_fwcontentgoogle"		=> '',
	"theme_fwcontentsize" 		=> 1.0, // em
	"theme_fwcontentweight"		=> '400',
	"theme_fwcontentvariant"	=> '',
	"theme_fwcontentlineheight" => 2.0,
	"theme_fwcontentspace"		=> 1.0,

	"theme_ftitles" 			=> 'System Fonts, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif',
	"theme_ftitlesgoogle"		=> '',
	"theme_ftitlessize" 		=> 1.45, // em
	"theme_ftitlesweight"		=> '700',
	"theme_ftitlesvariant"		=> '',

	"theme_metatitles" 			=> 'System Fonts, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif',
	"theme_metatitlesgoogle"	=> '',
	"theme_metatitlessize" 		=> 0.9, // em
	"theme_metatitlesweight"	=> '400',
	"theme_metatitlesvariant"	=> '',

	"theme_fheadings" 			=> 'Oswald/gfont',
	"theme_fheadingsgoogle"		=> '',
	"theme_fheadingssize" 		=> 100, // %
	"theme_fheadingsweight"		=> '700',
	"theme_fheadingsvariant"	=> '',
	"theme_fheadingslineheight" => 1.2,
	"theme_fheadingsspace"		=> 0.5,

	"theme_textalign"			=> "inherit",
	"theme_parindent"			=> 0.0, // em

	// Post information
	"theme_fpost" 				=> 1,
	"theme_fauto" 				=> 0,
	"theme_fheight"				=> 300,
	"theme_fresponsive" 		=> 1, // cropped, responsive
	"theme_falign" 				=> "center center",
	"theme_fheader" 			=> 1,

	"theme_meta_blog_author" 	=> 1,
	"theme_meta_blog_date"	 	=> 1,
	"theme_meta_blog_time" 		=> 0,
	"theme_meta_blog_category" 	=> 1,
	"theme_meta_blog_tag" 		=> 0,
	"theme_meta_blog_comment" 	=> 1,

	"theme_meta_single_author" 		=> 1,
	"theme_meta_single_date"		=> 1,
	"theme_meta_single_time" 		=> 0,
	"theme_meta_single_category" 	=> 1,
	"theme_meta_single_tag" 		=> 1,
	"theme_meta_single_comment" 	=> 1,

	"theme_excerpthome"		=> 'excerpt',
	"theme_excerptsticky"	=> 'full',
	"theme_excerptarchive"	=> 'excerpt',
	"theme_excerptlength"	=> "50",
	"theme_excerptdots"		=> " &hellip;",
	"theme_excerptcont"		=> "Read more",

	"theme_comclosed"		=> 1, // 1, 2, 3, 0
	"theme_comdate"			=> 2, // 1, 2
	"theme_comlabels"		=> 1, // 0, 1, 2
	"theme_comicons"		=> 1, // 0, 1
	"theme_comformwidth"	=> 0, // pixels

	// Miscellaneous
	"theme_pagesmenu"		=> 1,
	"theme_masonry"			=> 1,
	"theme_defer"			=> 1,
	"theme_autoscroll"		=> 1,
	"theme_headerlimits"	=> 0,
	"theme_fitvids"			=> 1,
	"theme_mobileonios"		=> 0,
	"theme_preloader"		=> 2, // 2 lp only, 1 enable, 0 disable
	"theme_editorstyles"	=> 1,

	); // roseta_defaults array

	return apply_filters( 'roseta_option_defaults_array', $roseta_defaults );
} // roseta_get_option_defaults()

/* Get sample pages for options defaults */
function cryout_get_default_pages( $number = 4 ) {
	$block_ids = array( 0, 0, 0, 0, 0 );
	$default_pages = get_pages(
		array(
			'sort_order' => 'desc',
			'sort_column' => 'post_date',
			'number' => $number,
			'hierarchical' => 0,
		)
	);
	foreach ( $default_pages as $key => $page ) {
		if ( ! empty ( $page->ID ) ) {
			$block_ids[$key+1] = $page->ID;
		}
		else {
			$block_ids[$key+1] = 0;
		}
	}
	return $block_ids;
} //cryout_get_default_pages()

// FIN
