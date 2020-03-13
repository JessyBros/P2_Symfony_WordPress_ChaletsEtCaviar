<?php
/**
 * Master generated style function
 *
 * @package Roseta
 */

function roseta_body_classes( $classes ) {
	$options = cryout_get_option( array(
		'theme_landingpage', 'theme_layoutalign',  'theme_image_style', 'theme_magazinelayout', 'theme_comclosed', 'theme_contenttitles', 'theme_caption_style',
		'theme_elementborder', 'theme_elementshadow', 'theme_elementborderradius', 'theme_totop', 'theme_menustyle', 'theme_menuposition', 'theme_menulayout', 'theme_topsection',
		'theme_headerresponsive', 'theme_fresponsive', 'theme_comlabels', 'theme_comicons', 'theme_comdate', 'theme_tables', 'theme_normalizetags', 'theme_articleanimation',
		'theme_headertitles_archives',
	) );

	if ( is_front_page() && $options['theme_landingpage'] && ('page' == get_option('show_on_front')) ) {
		$classes[] = 'roseta-landing-page';
	}

	if ( $options['theme_layoutalign'] ) $classes[] = 'roseta-boxed-layout';

	$classes[] = esc_html( $options['theme_image_style'] );
	$classes[] = esc_html( $options['theme_caption_style'] );
	$classes[] = esc_html( $options['theme_totop'] );
	$classes[] = esc_html( $options['theme_tables'] );

	if ( $options['theme_menustyle'] ) $classes[] = 'roseta-fixed-menu';
	if ( $options['theme_menuposition'] ) $classes[] = 'roseta-over-menu';
	if ( $options['theme_menulayout'] == 0 ) $classes[] = 'roseta-menu-left';
	if ( $options['theme_menulayout'] == 1 ) $classes[] = 'roseta-menu-right';
	if ( $options['theme_menulayout'] == 2 ) $classes[] = 'roseta-menu-center';

	if ( $options['theme_topsection'] ) $classes[] = 'roseta-topsection-reversed';
		else $classes[] = 'roseta-topsection-normal';

	if ( $options['theme_headerresponsive'] ) $classes[] = 'roseta-responsive-headerimage';
			else $classes[] = 'roseta-cropped-headerimage';

	if ( $options['theme_fresponsive'] ) $classes[] = 'roseta-responsive-featured';
		else $classes[] = 'roseta-cropped-featured';

	if ( $options['theme_magazinelayout'] ) {
		switch ( $options['theme_magazinelayout'] ):
			case 1: $classes[] = 'roseta-magazine-one roseta-magazine-layout'; break;
			case 2: $classes[] = 'roseta-magazine-two roseta-magazine-layout'; break;
			case 3: $classes[] = 'roseta-magazine-three roseta-magazine-layout'; break;
		endswitch;
	}
	switch ( $options['theme_comclosed'] ) {
		case 2: $classes[] = 'roseta-comhide-in-posts'; break;
		case 3: $classes[] = 'roseta-comhide-in-pages'; break;
		case 0: $classes[] = 'roseta-comhide-in-posts'; $classes[] = 'roseta-comhide-in-pages'; break;
	}
	if ( $options['theme_comlabels'] == 1 ) $classes[] = 'roseta-comment-placeholder';
	if ( $options['theme_comlabels'] == 2 ) $classes[] = 'roseta-comment-labels';
	if ( $options['theme_comicons'] == 1 ) $classes[] = 'roseta-comment-icons';
	if ( $options['theme_comdate'] == 1 ) $classes[] = 'roseta-comment-date-published';

	if ( roseta_header_title_check() ) $classes[] = 'roseta-header-titles';
								 else $classes[] = 'roseta-normal-titles';

	$theme_archive_desc = trim( get_the_archive_description() ); // get_the_archive_description doesn't work with author description
	if ( ( is_archive() || is_search() || is_404() ) && ! is_author() && $options['theme_headertitles_archives'] && empty( $theme_archive_desc ) ) $classes[] = 'roseta-header-titles-nodesc';

	switch ( $options['theme_contenttitles'] ) {
		case 2: $classes[] = 'roseta-hide-page-title'; break;
		case 3: $classes[] = 'roseta-hide-cat-title'; break;
		case 0: $classes[] = 'roseta-hide-page-title'; $classes[] = 'roseta-hide-cat-title'; break;
	}

	if ( $options['theme_elementborder'] ) $classes[] = 'roseta-elementborder';
	if ( $options['theme_elementshadow'] ) $classes[] = 'roseta-elementshadow';
	if ( $options['theme_elementborderradius'] ) $classes[] = 'roseta-elementradius';
	if ( $options['theme_normalizetags'] ) $classes[] = 'roseta-normalizedtags';

	if ( !empty( $options['theme_articleanimation'] ) ) $classes[] = 'roseta-article-animation-' . esc_attr( $options['theme_articleanimation'] );

	return $classes;
}
add_filter( 'body_class', 'roseta_body_classes' );


/*
 * Dynamic styles for the frontend
 */
function roseta_custom_styles() {
$options = cryout_get_option();
extract($options);

ob_start();
/////////// LAYOUT DIMENSIONS. ///////////
switch ( $theme_layoutalign ) {

	case 0: // wide ?>
			body:not(.roseta-landing-page) #container, #colophon-inside, .footer-inside, #breadcrumbs-container-inside, #header-page-title-inside {
				margin: 0 auto;
				max-width: <?php echo esc_html( $theme_sitewidth ); ?>px;
			}

			body:not(.roseta-landing-page) #container {
				max-width: calc( <?php echo esc_html( $theme_sitewidth ); ?>px - 4em );
			}
	<?php break;

	case 1: // boxed ?>
			#site-wrapper {
				max-width: <?php echo esc_html( $theme_sitewidth ); ?>px;
			}
	<?php break;
}
if ( ! esc_html( $theme_menualignment ) ) { ?> .site-header-inside { max-width: <?php echo esc_html( $theme_sitewidth ) ?>px; margin: 0 auto; } <?php }

/////////// COLUMNS ///////////
$colPadding = 0; // percent
$sidebarP = absint( $theme_primarysidebar );
$sidebarS = absint( $theme_secondarysidebar );
?>

#primary 									{ width: <?php echo $sidebarP; ?>px; }
#secondary 									{ width: <?php echo $sidebarS; ?>px; }

#container.one-column .main					{ width: 100%; }
#container.two-columns-right #secondary 	{ float: right; }
#container.two-columns-right .main,
.two-columns-right #breadcrumbs				{ width: calc( <?php echo 100 - (int) $colPadding ?>% - <?php echo $sidebarS; ?>px ); float: left; }
#container.two-columns-left #primary 		{ float: left; }
#container.two-columns-left .main,
.two-columns-left #breadcrumbs				{ width: calc( <?php echo 100 - (int) $colPadding ?>% - <?php echo $sidebarP; ?>px ); float: right; }

#container.three-columns-right #primary,
#container.three-columns-left #primary,
#container.three-columns-sided #primary		{ float: left; }

#container.three-columns-right #secondary,
#container.three-columns-left #secondary,
#container.three-columns-sided #secondary	{ float: left; }

#container.three-columns-right #primary,
#container.three-columns-left #secondary 	{ margin-left: <?php echo esc_html( $colPadding ) ?>%; margin-right: <?php echo esc_html( $colPadding ) ?>%; }
#container.three-columns-right .main,
.three-columns-right #breadcrumbs			{ width: calc( <?php echo 100 - absint( $colPadding ) * 2 ?>% - <?php echo absint( $sidebarS + $sidebarP ); ?>px ); float: left; }
#container.three-columns-left .main,
.three-columns-left #breadcrumbs			{ width: calc( <?php echo 100 - absint( $colPadding ) * 2 ?>% - <?php echo absint( $sidebarS + $sidebarP ); ?>px ); float: right; }

#container.three-columns-sided #secondary 	{ float: right; }

#container.three-columns-sided .main,
.three-columns-sided #breadcrumbs			{ width: calc( <?php echo 100 - absint( $colPadding ) * 2 ?>% - <?php echo absint( $sidebarS + $sidebarP ); ?>px ); float: right; }
.three-columns-sided #breadcrumbs			{ margin: 0 calc( <?php echo absint( $colPadding ) ?>% + <?php echo absint($sidebarS) ?>px ) 0 -1920px; }

<?php if ( in_array( $theme_siteheader, array( 'logo', 'empty' ) ) ) { ?>
	#site-text {
		clip: rect(1px, 1px, 1px, 1px);
		height: 1px;
		overflow: hidden;
		position: absolute !important;
		width: 1px;
		word-wrap: normal !important;
	}
<?php }

if ($theme_siteheader == 'empty' && ! has_nav_menu( 'top' ) &&  ! is_active_sidebar('widget-area-top-section') ) { ?>
	.site-header-top .site-header-inside { min-height: 0; }
<?php }

/////////// FONTS ///////////
?>
html
					{ font-family: <?php echo cryout_font_select( $theme_fgeneral, $theme_fgeneralgoogle ) ?>;
					  font-size: <?php echo esc_html( $theme_fgeneralsize ) ?>px; font-weight: <?php echo esc_html( $theme_fgeneralweight ) ?>;
					  line-height: <?php echo esc_html( (float) $theme_lineheight ) ?>;
				   	  <?php echo ( ! empty( $theme_fgeneralvariant ) ) ? 'text-transform: ' . $theme_fgeneralvariant : ''; ?>; }

#site-title 		{ font-family: <?php echo cryout_font_select( $theme_fsitetitle, $theme_fsitetitlegoogle ) ?>;
					  font-size: <?php echo esc_html( $theme_fsitetitlesize ) ?>em; font-weight: <?php echo esc_html( $theme_fsitetitleweight ) ?>;}
#site-text  		{ <?php echo ( ! empty( $theme_fsitetitlevariant ) ) ? 'text-transform: ' . $theme_fsitetitlevariant : ''; ?>; }

#access ul li a 	{ font-family: <?php echo cryout_font_select( $theme_fmenu, $theme_fmenugoogle ) ?>;
					  font-size: <?php echo esc_html( $theme_fmenusize ) ?>em; font-weight: <?php echo esc_html( $theme_fmenuweight ) ?>;
					  <?php echo ( ! empty( $theme_fmenuvariant ) ) ? 'text-transform: ' . $theme_fmenuvariant : ''; ?>; }

.widget-title 		{ font-family: <?php echo cryout_font_select( $theme_fwtitle, $theme_fwtitlegoogle ) ?>;
					  font-size: <?php echo esc_html( $theme_fwtitlesize ) ?>em; font-weight: <?php echo esc_html( $theme_fwtitleweight ) ?>;
					  line-height: <?php echo esc_html( (float) $theme_fwtitlelineheight ) ?>; margin-bottom: <?php echo esc_html( (float) $theme_fwtitlespace ) ?>em;
					  <?php echo ( ! empty( $theme_fwtitlevariant ) ) ? 'text-transform: ' . $theme_fwtitlevariant : ''; ?>; }

.widget-container 	{ font-family: <?php echo cryout_font_select( $theme_fwcontent, $theme_fwcontentgoogle ) ?>;
				      font-size: <?php echo esc_html( $theme_fwcontentsize ) ?>em; font-weight: <?php echo esc_html( $theme_fwcontentweight ) ?>; }

.widget-container ul li { line-height: <?php echo esc_html( (float) $theme_fwcontentlineheight ) ?>;
					<?php echo ( ! empty( $theme_fwcontentvariant ) ) ? 'text-transform: ' . $theme_fwcontentvariant : ''; ?>; }

.entry-title, .page-title
					{ font-family: <?php echo cryout_font_select( $theme_ftitles, $theme_ftitlesgoogle ) ?>;
					  font-size: <?php echo esc_html( $theme_ftitlessize ) ?>em; font-weight: <?php echo esc_html( $theme_ftitlesweight ) ?>;
					  <?php echo ( ! empty( $theme_ftitlesvariant ) ) ? 'text-transform: ' . $theme_ftitlesvariant : ''; ?>; }
.entry-meta > span
					{ font-family: <?php echo cryout_font_select( $theme_metatitles, $theme_metatitlesgoogle ) ?>;
					  font-weight: <?php echo esc_html( $theme_metatitlesweight ) ?>;
					  <?php echo ( ! empty( $theme_metatitlesvariant ) ) ? 'text-transform: ' . $theme_metatitlesvariant : ''; ?>; }

/*.post-thumbnail-container*/ .entry-meta > span { font-size: <?php echo esc_html( $theme_metatitlessize ) ?>em; }

/* header titles */
.single .entry-title,
#header-page-title .entry-title
					{ font-family: <?php echo cryout_font_select( $theme_fht_title, $theme_fht_titlegoogle ) ?>;
					  font-size: <?php echo esc_html( $theme_fht_titlesize ) ?>em; font-weight: <?php echo esc_html( $theme_fht_titleweight ) ?>;
					  line-height: <?php echo esc_html( (float) $theme_fht_titlelineheight ) ?>;
					  <?php echo ( ! empty( $theme_fht_titlevariant ) ) ? 'text-transform: ' . $theme_fht_titlevariant : ''; ?>; }

#header-page-title .entry-meta > span
					{ font-family: <?php echo cryout_font_select( $theme_fht_meta, $theme_fht_metagoogle ) ?>;
					  font-size: <?php echo esc_html( $theme_fht_metasize ) ?>em; font-weight: <?php echo esc_html( $theme_fht_metaweight ) ?>;
					  <?php echo ( ! empty( $theme_fht_metavariant ) ) ? 'text-transform: ' . $theme_fht_metavariant : ''; ?>; }

					  <?php
$font_root = 2.6; // headings font size root
for ( $i = 1; $i <= 6; $i++ ) {
		$size = round( ( $font_root - ( 0.27 * $i ) ) * ( preg_replace( "/[^\d]/", "", esc_html( $theme_fheadingssize ) ) / 100), 5 ); ?>
		h<?php echo $i ?> { font-size: <?php echo $size ?>em; } <?php
} //for ?>
h1, h2, h3, h4, h5, h6, .seriousslider-theme .seriousslider-caption-title
					{ font-family: <?php echo cryout_font_select( $theme_fheadings, $theme_fheadingsgoogle ) ?>;
					  font-weight: <?php echo esc_html( $theme_fheadingsweight ) ?>;
					  <?php echo ( ! empty( $theme_fheadingsvariant ) ) ? 'text-transform: ' . $theme_fheadingsvariant : ''; ?>; }

.entry-content h1, .entry-summary h1,
.entry-content h2, .entry-summary h2,
.entry-content h3, .entry-summary h3,
.entry-content h4, .entry-summary h4,
.entry-content h5, .entry-summary h5,
.entry-content h6, .entry-summary h6 {
	 line-height: <?php echo esc_html( (float) $theme_fheadingslineheight ) ?>;
	 margin-bottom: <?php echo esc_html( (float) $theme_fheadingsspace ) ?>em;
}

a.continue-reading-link,
.lp-block-readmore,
.lp-box-readmore,
#cryout_ajax_more_trigger,
.lp-port-readmore,
.comment .reply,
a.staticslider-button, .seriousslider-theme .seriousslider-caption-buttons a.seriousslider-button,
nav#mobile-menu a,
button, input[type="button"], input[type="submit"], input[type="reset"],
#nav-fixed a + a,
.wp-block-button
					{ font-family: <?php echo cryout_font_select( $theme_fheadings, $theme_fheadingsgoogle ) ?>; }

.lp-text-title
					{ font-family: <?php echo cryout_font_select( $theme_fgeneral, $theme_fgeneralgoogle ) ?>; font-weight: 700;}
blockquote cite 	{ font-family: <?php echo cryout_font_select( $theme_fgeneral, $theme_fgeneralgoogle ) ?>; }


<?php
/////////// COLORS ///////////
?>
body 										{ color: <?php echo esc_html( $theme_sitetext ) ?>;
											  background-color: <?php echo esc_html( $theme_sitebackground ) ?>; }

.lp-staticslider .staticslider-caption-text a
											{ color: <?php echo esc_html( $theme_menubackground ); ?>; }

#site-header-main, #access ul ul,
.menu-search-animated .searchform input[type="search"], #access .menu-search-animated .searchform,
.site-header-bottom-fixed, .roseta-over-menu .site-header-bottom.header-fixed .site-header-bottom-fixed
											{ background-color: <?php echo esc_html( $theme_menubackground ) ?>; }
.roseta-over-menu .site-header-bottom-fixed	{ background: transparent; }

@media (max-width: 800px) {
	#top-section-menu::before {
		background: -webkit-linear-gradient(left, rgba(<?php echo esc_html( cryout_hex2rgb( $theme_menubackground ) ) ?>,1), rgba(<?php echo esc_html( cryout_hex2rgb( $theme_menubackground ) ) ?>,0.5) );
		background: linear-gradient(to right, rgba(<?php echo esc_html( cryout_hex2rgb( $theme_menubackground ) ) ?>,1), rgba(<?php echo esc_html( cryout_hex2rgb( $theme_menubackground ) ) ?>,0.5) );
	}

	#top-section-menu::after {
		background: -webkit-linear-gradient(right, rgba(<?php echo esc_html( cryout_hex2rgb( $theme_menubackground ) ) ?>,1), rgba(<?php echo esc_html( cryout_hex2rgb( $theme_menubackground ) ) ?>,0.5) );
		background: linear-gradient(to left, rgba(<?php echo esc_html( cryout_hex2rgb( $theme_menubackground ) ) ?>,1), rgba(<?php echo esc_html( cryout_hex2rgb( $theme_menubackground ) ) ?>,0.5) );
	}
}

.roseta-over-menu .header-fixed.site-header-bottom #site-title a
											{ color: <?php echo esc_html( $theme_accent1 ) ?>; }

.roseta-over-menu #site-title a,
.roseta-over-menu #access > div > ul > li,
.roseta-over-menu #access > div > ul > li > a,
.roseta-over-menu #sheader.socials a::before {
	color: <?php echo esc_html( $theme_accent1 ) ?>; }

@media (min-width: 1153px) {
	.roseta-over-menu #header-page-title,
	.roseta-over-menu .lp-staticslider .staticslider-caption-inside,
	.roseta-over-menu .seriousslider-theme .seriousslider-caption-inside {
		padding-top: <?php echo esc_html( 100 + $theme_menuheight ) ?>px;
	}
}

#access > div > ul > li,
#access > div > ul > li > a,
.roseta-over-menu .header-fixed.site-header-bottom #access > div > ul > li:not([class*='current']),
.roseta-over-menu .header-fixed.site-header-bottom #access > div > ul > li:not([class*='current']) > a,
.roseta-over-menu .header-fixed.site-header-bottom .top-section-element.widget_cryout_socials a::before,
.top-section-element.widget_cryout_socials a::before, #access .menu-search-animated .searchform input[type="search"]
											{ color: <?php echo esc_html( $theme_menutext ) ?>; }
#mobile-menu								{ color: <?php echo esc_html( $theme_menutext ) ?>; }
.roseta-over-menu .header-fixed.site-header-bottom .top-section-element.widget_cryout_socials a:hover::before,
.top-section-element.widget_cryout_socials a:hover::before			{ color: <?php echo esc_html( $theme_menubackground ) ?>; }

#access ul.sub-menu li a,
#access ul.children li a 					{ color: <?php echo esc_html( $theme_submenutext ) ?>; }

#access ul.sub-menu li a,
#access ul.children li a 					{ background-color: <?php echo esc_html( $theme_submenubackground ) ?>; }

#access > div > ul > li:hover > a,
#access > div > ul > li a:hover,
#access > div > ul > li:hover,
.roseta-over-menu .header-fixed.site-header-bottom #access > div > ul > li > a:hover,
.roseta-over-menu .header-fixed.site-header-bottom #access > div > ul > li:hover
											{ color: <?php echo esc_html( $theme_accent1 ) ?>; }

#access > div > ul > li > a > span::before,
#site-title::before, #site-title::after		{ background-color: <?php echo esc_html( $theme_accent1 ) ?>; }
#site-title a:hover 						{ color: <?php echo esc_html( $theme_accent1 ) ?>; }

#access > div > ul > li.current_page_item > a,
#access > div > ul > li.current-menu-item > a,
#access > div > ul > li.current_page_ancestor > a,
#access > div > ul > li.current-menu-ancestor > a,
#access .sub-menu, #access .children,
.roseta-over-menu .header-fixed.site-header-bottom #access > div > ul > li > a
											{ color: <?php echo esc_html( $theme_accent2 ) ?>; }

#access ul.children > li.current_page_item > a,
#access ul.sub-menu > li.current-menu-item > a,
#access ul.children > li.current_page_ancestor > a,
#access ul.sub-menu > li.current-menu-ancestor > a
											{ color: <?php echo esc_html( $theme_accent2 ) ?>; }

#access .sub-menu li:not(:last-child) span,
#access .children li:not(:last-child) span	{ border-bottom: 1px solid <?php echo esc_html( cryout_hexdiff( $theme_submenubackground, 17 ) ); ?>; }
.searchform .searchsubmit					{ color: <?php echo esc_html( $theme_sitetext ) ?>; }

#access ul li.special1 > a {
	background-color: <?php echo esc_html( cryout_hexdiff( $theme_menubackground, 15 ) ); ?>;
}

#access ul li.special2 > a {
	background-color: <?php echo esc_html( $theme_menutext ); ?>;
	color: <?php echo esc_html( $theme_menubackground ) ?>;
}

#access ul li.accent1 > a {
	background-color: <?php echo esc_html( $theme_accent1 ); ?>;
	color: <?php echo esc_html( $theme_menubackground ) ?>;
}

#access ul li.accent2 > a {
	background-color: <?php echo esc_html( $theme_accent2 ); ?>;
	color: <?php echo esc_html( $theme_menubackground ) ?>;
}

#access ul li.accent1 > a:hover,
#access ul li.accent2 > a:hover {
	color: <?php echo esc_html( $theme_menubackground ) ?>;
}

#access > div > ul > li.accent1 > a > span::before,
#access > div > ul > li.accent2 > a > span::before {
	background-color: <?php echo esc_html( $theme_menubackground ) ?>;
}



body:not(.roseta-landing-page) article.hentry,
body:not(.roseta-landing-page) .main,
body.roseta-boxed-layout:not(.roseta-landing-page) #container
											{ background-color: <?php echo esc_html( $theme_contentbackground ) ?>; }
.pagination a, .pagination span 			{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 12 ) ); ?>; }
.pagination a:not(.prev):not(.next):hover	{ background-color: <?php echo esc_html( $theme_accent1 ); ?>; color: <?php echo esc_html( $theme_contentbackground) ?>; }

#header-page-title-overlay,
.lp-staticslider .staticslider-caption::after,
.seriousslider-theme .seriousslider-caption::after
											{ background-color: <?php echo esc_html( $theme_overlaybackground ) ;?>; opacity: <?php echo esc_html( $theme_overlayopacity/100 ); ?>; }

#header-page-title #header-page-title-inside,
#header-page-title .entry-meta span, #header-page-title .entry-meta a, #header-page-title .entry-meta time, #header-page-title .entry-meta .icon-metas::before,
#header-page-title .byline,
#header-page-title #breadcrumbs-nav,
.lp-staticslider .staticslider-caption-inside,
.seriousslider-theme .seriousslider-caption-inside
										{ color: <?php echo esc_html(  $theme_overlaytext ) ;?>; }


<?php if ( ! is_rtl() ):
	if ( $theme_sitelayout == '2cSr' || $theme_sitelayout == '2cSl' || $theme_sitelayout == '3cSs' ) { ?>
	<?php } if ( $theme_sitelayout == '3cSr' ) { ?>
	#secondary  { margin-left: 0; }
	#primary  { padding-left: 3%; padding-right: 0; }
	<?php } if ( $theme_sitelayout == '3cSl' ) { ?>
	#secondary  { padding-right: 3%; padding-left: 0; }
	#primary  { margin-right: 0; }
		<?php }
endif; ?>
<?php if ( is_rtl() ):
	if ( $theme_sitelayout == '2cSr' || $theme_sitelayout == '2cSl' || $theme_sitelayout == '3cSs' ) { ?>
	<?php } if ( $theme_sitelayout == '3cSr' ) { ?>
	body #secondary  { margin-right: 0; }
	body #primary  { padding-right: 3%; padding-left: 0; }
	<?php } if ( $theme_sitelayout == '3cSl' ) { ?>
	body #secondary  { padding-left: 3%; padding-right: 3%; }
	body #primary  { margin-left: 0; }
		<?php }
endif; ?>
<?php if ( ! empty( $theme_primarybackground ) ) { ?>
	#primary .widget-container				{ background-color: <?php echo esc_html( $theme_primarybackground ) ?>;  border-color: <?php echo  esc_html (cryout_hexdiff ($theme_primarybackground, 17 )) ?>; }
	@media (max-width: 640px) { .cryout #container #primary .widget-container { padding: 1em; } }
<?php } ?>
<?php if ( ! empty( $theme_secondarybackground ) ) { ?>
	#secondary .widget-container			{ background-color: <?php echo esc_html( $theme_secondarybackground ) ?>; border-color: <?php echo  esc_html (cryout_hexdiff ($theme_secondarybackground, 17 )) ?>;}
	@media (max-width: 640px) { .cryout #container #secondary .widget-container { padding: 1em; } }
<?php } ?>

#colophon, #footer 							{ background-color: <?php echo esc_html( $theme_footerbackground ) ?>;
 											  color: <?php echo esc_html( $theme_footertext ) ?>; }
#colophon .widget-title > span			  	{ background-color: <?php echo esc_html( $theme_contentbackground ) ?>; }
.main #content-masonry .entry-title 		{ color: <?php echo esc_html( $theme_accent2 ) ?>; background-color: <?php echo esc_html( $theme_contentbackground ) ?>;}
@media (min-width: 720px) {
	.roseta-magazine-one .main #content-masonry  .post-thumbnail-container + .entry-after-image
											{  background-color: <?php echo esc_html( $theme_contentbackground ) ?>; }
							}
.entry-title a:active, .entry-title a:hover { color: <?php echo esc_html( $theme_accent1 ) ?>; }
.entry-title::before						{ background-color:  <?php echo esc_html( $theme_accent1 ) ?>; }
span.entry-format 							{ color: <?php echo esc_html( $theme_accent1 ) ?>; }

.main #content-masonry .format-link .entry-content a { background-color:  <?php echo esc_html( $theme_accent1 ) ?>; color: <?php echo esc_html( $theme_contentbackground ) ?>; }
.main #content-masonry .format-link::after { color: <?php echo esc_html( $theme_contentbackground ) ?>; }
.cryout article.hentry.format-image,
.cryout article.hentry.format-audio,
.cryout article.hentry.format-video 		{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 10 ) ) ?>; }
.format-aside, .format-quote 				{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 33 ) ) ?>; }

.entry-content h5, .entry-content h6,
.lp-text-content h5, .lp-text-content h6 	{ color: <?php echo esc_html( $theme_accent2 ) ?>; }
.entry-content blockquote::before,
.entry-content blockquote::after 			{ color: rgba(<?php echo cryout_hex2rgb( esc_html( $theme_sitetext ) ) ?>,0.2); }

.entry-content h1, .entry-content h2,
.entry-content h3, .entry-content h4,
.lp-text-content h1, .lp-text-content h2,
.lp-text-content h3, .lp-text-content h4	{ color: <?php echo esc_html( $theme_headingstext ) ?>; }

a 											{ color: <?php echo esc_html( $theme_accent1 ); ?>; }
a:hover, .entry-meta span a:hover,
.comments-link a 							{ color: <?php echo esc_html( $theme_accent2 ); ?>; }
.comments-link a:hover 						{ color: <?php echo esc_html( $theme_accent1 ); ?>; }
.comments-link 								{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }
.comments-link::before						{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }

.socials a::before							{ color: <?php echo esc_html( $theme_accent1 ) ?>; }
#site-header-main .socials a::after			{ color: <?php echo esc_html( $theme_accent1 ) ?>; }

.roseta-normalizedtags #content .tagcloud a
											{ color: <?php echo esc_html($theme_contentbackground) ?>;
											  background-color: <?php echo esc_html( $theme_accent1 ) ?>; }
.roseta-normalizedtags #content .tagcloud a:hover
											{ background-color: <?php echo esc_html( $theme_accent2 ) ?>; }

#nav-fixed i								{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }
#nav-fixed .nav-next:hover i,
#nav-fixed .nav-previous:hover i			{ background-color: <?php echo esc_html( $theme_accent2); ?>; }
#nav-fixed a:hover + a,
#nav-fixed a + a:hover						{ background-color: rgba(<?php echo esc_html( cryout_hex2rgb( $theme_accent2 ) ) ?>,1); }
#nav-fixed i, #nav-fixed span				{ color: <?php echo esc_html( $theme_contentbackground ) ?>; }
a#toTop::before 							{ color: <?php echo esc_html( $theme_accent1 ) ?>; }
a#toTop::after								{ color: <?php echo esc_html( $theme_accent2 ) ?>; }
<?php if( $theme_totop != 'roseta-totop-disabled' ) { ?>
	@media (max-width: 800px) {
		.cryout #footer-bottom .footer-inside { padding-top: 2.5em; }
		.cryout .footer-inside a#toTop {background-color: <?php echo esc_html( $theme_accent1 ) ?>;  color: <?php echo esc_html( $theme_sitebackground ) ?>;}
		.cryout .footer-inside a#toTop:hover { opacity: 0.8;}
	}
<?php }
/* Accent borders */ ?>
#author-description .page-title span { color:  <?php echo esc_html( $theme_accent2 ) ?>; border-bottom-color: <?php echo esc_html( $theme_accent1 ) ?>; }
a.continue-reading-link,
.lp-box-readmore
 									{color: <?php echo esc_html( $theme_accent2 ) ?>; }
.continue-reading-link::before,
.lp-box-readmore::before
	{ background-color:<?php echo esc_html( $theme_accent1 ) ?>; }

.entry-meta .icon-metas:before				{ color: <?php echo esc_html( cryout_hexdiff( $theme_sitetext, -69) ) ?>; }

.roseta-caption-one .main .wp-caption .wp-caption-text 	{ border-bottom-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }
.roseta-caption-two .main .wp-caption .wp-caption-text 	{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground,10 ) ) ?>; }

.roseta-image-one .entry-content img[class*="align"],
.roseta-image-one .entry-summary img[class*="align"],
.roseta-image-two .entry-content img[class*='align'],
.roseta-image-two .entry-summary img[class*='align'] 	{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }
.roseta-image-five .entry-content img[class*='align'],
.roseta-image-five .entry-summary img[class*='align'] 	{ border-color: <?php echo esc_html( $theme_accent1 ); ?>; }

/* diffs */
span.edit-link a.post-edit-link,
span.edit-link a.post-edit-link:hover,
span.edit-link .icon-edit:before			{ color: <?php echo esc_html( $theme_sitetext ) ?>; }

.searchform 								{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 20 ) ) ?>; }
#breadcrumbs-container 						{ background-color: <?php echo esc_html( cryout_hexdiff(  $theme_contentbackground, 7 ) ) ?>; }
.entry-meta span, .entry-meta a, .entry-utility span, .entry-utility a, .entry-meta time,
#breadcrumbs-nav, .footermenu ul li span.sep
											{ color: <?php echo esc_html( cryout_hexdiff( $theme_sitetext, -69) ) ?>; }
.footermenu ul li a:hover 					{ color: <?php echo esc_html( $theme_accent1 ); ?>; }
.footermenu ul li a::after 					{ background: <?php echo esc_html( $theme_accent1 ); ?>; }
span.entry-sticky							{ background-color: <?php echo esc_html( $theme_accent1 ) ?>;  color: <?php echo esc_html( $theme_contentbackground ); ?>; }
#commentform								{ <?php if ( $theme_comformwidth ) { echo 'max-width:' . esc_html( $theme_comformwidth ) . 'px;';}?>}

code, #nav-below .nav-previous a:before, #nav-below .nav-next a:before
											{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }
pre, .comment-author						{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }

.commentlist .comment-body, .commentlist .pingback
											{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }
.commentlist .comment-body::after			{ border-right-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 0 ) ) ?>; }
.commentlist .comment-body::before			{ border-right-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 23 ) ) ?>; }
article #author-info, .single #author-info 	{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }
.page-header.pad-container					{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }
.comment-meta a 							{ color: <?php echo esc_html( cryout_hexdiff( $theme_sitetext, -99) ) ?>; }
.commentlist .reply a 						{ color: <?php echo esc_html( cryout_hexdiff( $theme_sitetext, -79) ) ?>;  }
.commentlist .reply a:hover					{ border-bottom-color: <?php echo esc_html( $theme_accent1 ) ?>; }
select, input[type], textarea 				{ color: <?php echo esc_html( $theme_sitetext ); ?>;
											  border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 22 ) ) ?>; }
.searchform input[type="search"],
.searchform input[type="search"]:hover,
.searchform input[type="search"]:focus		{ background-color: <?php echo esc_html( $theme_contentbackground ) ?>; }
#content .searchform input[type="search"] 	{ border-bottom-color: <?php echo esc_html( $theme_accent1 ) ?>; }
#content .searchform:hover input[type="search"],
#content .searchform input[type="search"]:focus
											{ border-bottom-color: <?php echo esc_html( $theme_accent2 ) ?>; }
#content .searchform::after					{ background-color: <?php echo esc_html( $theme_accent2 ) ?>; }
input[type]:hover, textarea:hover, select:hover,
input[type]:focus, textarea:focus, select:focus
											{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 35 ) ) ?>; }

button, input[type="button"], input[type="submit"], input[type="reset"]
											{ background-color: <?php echo esc_html( $theme_accent1 ) ?>;
											  color: <?php echo esc_html( $theme_contentbackground ) ?>; }

button:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover
											{ background-color: <?php echo esc_html( $theme_accent2 ) ?>; }

hr											{ background-color: <?php echo esc_html(cryout_hexdiff($theme_contentbackground, 15 ) ) ?>; }

.cryout-preloader > div { background-color: <?php echo esc_html( $theme_accent1 ) ?>; }

/* gutenberg */
.wp-block-image.alignwide {
	margin-left: calc( ( <?php echo intval($theme_elementpadding * 1.50) ?>% + 2.5em ) * -1 );
	margin-right: calc( ( <?php echo intval($theme_elementpadding * 1.50) ?>% + 2.5em ) * -1 );
}

.wp-block-image.alignwide img {
	width: calc( <?php echo intval( 100 + $theme_elementpadding * 3 ) ?>% + 5em );
	max-width: calc( <?php echo intval( 100 + $theme_elementpadding * 3 ) ?>% + 5em );
}

.has-accent-1-color, .has-accent-1-color:hover	{ color: <?php echo esc_html( $theme_accent1 ) ?>; }
.has-accent-2-color, .has-accent-2-color:hover	{ color: <?php echo esc_html( $theme_accent2 ) ?>; }
.has-headings-color, .has-headings-color:hover 	{ color: <?php echo esc_html( $theme_headingstext ) ?>; }
.has-sitetext-color, .has-sitetext-color:hover	{ color: <?php echo esc_html( $theme_sitetext ) ?>; }
.has-sitebg-color, .has-sitebg-color:hover 		{ color: <?php echo esc_html( $theme_contentbackground ) ?>; }
.has-accent-1-background-color 				{ background-color: <?php echo esc_html( $theme_accent1 ) ?>; }
.has-accent-2-background-color 				{ background-color: <?php echo esc_html( $theme_accent2 ) ?>; }
.has-headings-background-color 				{ background-color: <?php echo esc_html( $theme_headingstext ) ?>; }
.has-sitetext-background-color 				{ background-color: <?php echo esc_html( $theme_sitetext ) ?>; }
.has-sitebg-background-color 				{ background-color: <?php echo esc_html( $theme_contentbackground ) ?>; }
.has-small-font-size 						{ font-size: <?php echo intval( intval($theme_fgeneralsize) / 1.2 ) ?>px; }
.has-regular-font-size 						{ font-size: <?php echo intval( intval($theme_fgeneralsize) * 1.0 ) ?>px; }
.has-large-font-size 						{ font-size: <?php echo intval( intval($theme_fgeneralsize) * 1.2 ) ?>px; }
.has-larger-font-size 						{ font-size: <?php echo intval( intval($theme_fgeneralsize) * 1.44 ) ?>px; }
.has-huge-font-size 						{ font-size: <?php echo intval( intval($theme_fgeneralsize) * 1.44 ) ?>px; }

/* woocommerce */
.woocommerce-thumbnail-container .woocommerce-buttons-container a,
.woocommerce-page #respond input#submit.alt, .woocommerce a.button.alt,
.woocommerce-page button.button.alt, .woocommerce input.button.alt,
.woocommerce #respond input#submit, .woocommerce a.button,
.woocommerce button.button, .woocommerce input.button {
	font-family: <?php echo cryout_font_select( $theme_fheadings, $theme_fheadingsgoogle ) ?>;
}

.woocommerce ul.products li.product .woocommerce-loop-category__title,
.woocommerce ul.products li.product .woocommerce-loop-product__title,
.woocommerce ul.products li.product h3,
.woocommerce div.product .product_title,
.woocommerce .woocommerce-tabs h2 {
	font-family: <?php echo cryout_font_select( $theme_fgeneral, $theme_fgeneralgoogle ) ?>;
}

.woocommerce ul.products li.product .woocommerce-loop-category__title,
.woocommerce ul.products li.product .woocommerce-loop-product__title,
.woocommerce ul.products li.product h3,
.woocommerce .star-rating {
	color: <?php echo esc_html( $theme_accent2 ) ?>;
}
.woocommerce-page #respond input#submit.alt, .woocommerce a.button.alt,
.woocommerce-page button.button.alt, .woocommerce input.button.alt,
.woocommerce #respond input#submit, .woocommerce a.button,
.woocommerce button.button, .woocommerce input.button
											{ background-color: <?php echo esc_html( $theme_accent1 ) ?>;
											  color: <?php echo esc_html( $theme_contentbackground ) ?>;
											  line-height: <?php echo esc_html( floatval($theme_lineheight) ) ?>; }
.woocommerce #respond input#submit:hover, .woocommerce a.button:hover,
.woocommerce button.button:hover, .woocommerce input.button:hover
											{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_accent2, 0 ) ) ?>;
										 	 color: <?php echo esc_html( $theme_contentbackground ) ?>;}
.woocommerce-page #respond input#submit.alt, .woocommerce a.button.alt,
.woocommerce-page button.button.alt, .woocommerce input.button.alt
											{ background-color: <?php echo esc_html( $theme_accent2 ) ?>;
											  color: <?php echo esc_html( $theme_contentbackground ) ?>;
										  	  line-height: <?php echo esc_html( floatval($theme_lineheight) ) ?>; }
.woocommerce-page #respond input#submit.alt:hover, .woocommerce a.button.alt:hover,
.woocommerce-page button.button.alt:hover, .woocommerce input.button.alt:hover
											{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_accent2, -34 ) ) ?>;
											  color: <?php echo esc_html( $theme_contentbackground ) ?>;}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active
											{ border-bottom-color: <?php echo esc_html( $theme_contentbackground ) ?>; }
.woocommerce #respond input#submit.alt.disabled,
.woocommerce #respond input#submit.alt.disabled:hover,
.woocommerce #respond input#submit.alt:disabled,
.woocommerce #respond input#submit.alt:disabled:hover,
.woocommerce #respond input#submit.alt[disabled]:disabled,
.woocommerce #respond input#submit.alt[disabled]:disabled:hover,
.woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover,
.woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover,
.woocommerce a.button.alt[disabled]:disabled,
.woocommerce a.button.alt[disabled]:disabled:hover,
.woocommerce button.button.alt.disabled,
.woocommerce button.button.alt.disabled:hover,
.woocommerce button.button.alt:disabled,
.woocommerce button.button.alt:disabled:hover,
.woocommerce button.button.alt[disabled]:disabled,
.woocommerce button.button.alt[disabled]:disabled:hover,
.woocommerce input.button.alt.disabled,
.woocommerce input.button.alt.disabled:hover,
.woocommerce input.button.alt:disabled,
.woocommerce input.button.alt:disabled:hover,
.woocommerce input.button.alt[disabled]:disabled,
.woocommerce input.button.alt[disabled]:disabled:hover
											{ background-color: <?php echo esc_html( $theme_accent2 ) ?>; }
.woocommerce div.product .product_title,
.woocommerce ul.products li.product .price,
.woocommerce div.product p.price,
.woocommerce div.product span.price
											{ color: <?php echo esc_html( cryout_hexdiff( $theme_accent2, 0 ) ); ?> }
.woocommerce-checkout #payment 				{ background: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 10 ) ) ?>; }

.woocommerce .widget_price_filter .ui-slider .ui-slider-handle
											{ background: <?php echo esc_html( cryout_hexdiff( $theme_accent2, 0 ) ) ?>; }

.woocommerce .main .page-title {
	/*font-size: <?php echo round( ( $font_root - ( 3 ) ) / 100 * ( preg_replace( "/[^\d]/", "", esc_html( $theme_fheadingssize ) ) / 100), 5 ); ?>em; */
}

/* mobile menu */
nav#mobile-menu, #mobile-menu .menu-main-search
 											{ background-color: <?php echo esc_html( $theme_menubackground ) ?>; }
#mobile-menu .mobile-arrow 					{ color: <?php echo esc_html( $theme_sitetext ) ?>; }

<?php
/////////// LAYOUT ///////////
?>
.main .entry-content, .main .entry-summary 	{ text-align: <?php echo esc_html( $theme_textalign ) ?>; }
.main p, .main ul, .main ol, .main dd, .main pre, .main hr
											{ margin-bottom: <?php echo esc_html( $theme_paragraphspace ) ?>em; }
.entry-content p 									{ text-indent: <?php echo esc_html( $theme_parindent ) ?>em;}
.main a.post-featured-image 				{ background-position: <?php echo esc_html( $theme_falign ) ?>; }

#header-widget-area 						{ width: <?php echo esc_html( $theme_headerwidgetwidth ) ?>;
											<?php switch ( esc_html( $theme_headerwidgetalign ) ) {
												case 'left': ?> left: 10px; <?php break;
												case 'right': ?> right: 10px; <?php break;
												case 'center': ?>  left: calc(50% - <?php echo esc_html( $theme_headerwidgetwidth ) ?> / 2); <?php break;
											} ?> }
.roseta-stripped-table .main thead th,
.roseta-bordered-table .main thead th,
.roseta-stripped-table .main td, .roseta-stripped-table .main th,
.roseta-bordered-table .main th, .roseta-bordered-table .main td
											{ border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 22 ) ) ?>; }

.roseta-clean-table .main th,
.roseta-stripped-table .main tr:nth-child(even) td,
.roseta-stripped-table .main tr:nth-child(even) th
											{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 7 ) ) ?>; }

<?php if ( $theme_fpost && ( $theme_fheight > 0 ) ) { ?>
.roseta-cropped-featured .main .post-thumbnail-container
											{ height: <?php echo esc_html( $theme_fheight ) ?>px; }
.roseta-responsive-featured .main .post-thumbnail-container
											{ max-height: <?php echo esc_html( $theme_fheight ) ?>px; height: auto; }
<?php } ?>

<?php
/////////// SOME CONDITIONAL CLEANUP ///////////
if ( empty( $theme_contentbackground ) ) {  ?> #primary, #colophon { border: 0; box-shadow: none; } <?php }

/////////// ELEMENTS PADDING ///////////
?>

article.hentry .article-inner,
#content-masonry article.hentry .article-inner {
		padding: <?php echo esc_html( $theme_elementpadding ) ?>%;
}

<?php if ( $theme_elementpadding ) { ?>

#breadcrumbs-nav,
body.woocommerce.woocommerce-page #breadcrumbs-nav,
.pad-container  							{ padding: <?php echo esc_html( $theme_elementpadding ) ?>%; }

.roseta-magazine-two.archive #breadcrumbs-nav,
.roseta-magazine-two.archive .pad-container,
.roseta-magazine-two.search #breadcrumbs-nav,
.roseta-magazine-two.search .pad-container
											{ padding: <?php echo esc_html( $theme_elementpadding/2 ) ?>%; }

.roseta-magazine-three.archive #breadcrumbs-nav,
.roseta-magazine-three.archive .pad-container,
.roseta-magazine-three.search #breadcrumbs-nav,
.roseta-magazine-three.search .pad-container
											{ padding: <?php echo esc_html( $theme_elementpadding/3 ) ?>%; }
<?php } // roseta_elementpadding

/////////// HEADER LAYOUT ///////////
?>
@media (min-width: 801px) {
	.site-header-bottom { height:<?php echo intval( $theme_menuheight ) ?>px; }
}
.site-header-bottom .site-header-inside		{ height:<?php echo intval( $theme_menuheight - 1 ) ?>px; }
#access .menu-search-animated .searchform  	{ height: <?php echo intval( $theme_menuheight - 1 ) ?>px;
											  line-height: <?php echo intval( $theme_menuheight - 1 ) ?>px; }
.menu-search-animated
											{ height:<?php echo intval( $theme_menuheight ) ?>px;
											  line-height:<?php echo intval( $theme_menuheight ) ?>px; }
#access div > ul > li > a,
#access ul li[class*="icon"]::before  		{ line-height:<?php echo intval( $theme_menuheight ) ?>px; }
.roseta-responsive-headerimage #masthead #header-image-main-inside
											{ max-height: <?php echo esc_html( $theme_headerheight ) ?>px; }
.roseta-cropped-headerimage #masthead #header-image-main-inside
											{ height: <?php echo esc_html( $theme_headerheight ) ?>px; }
<?php if ( is_front_page() && function_exists( 'the_custom_header_markup' ) && has_header_video() ) { ?>
	.roseta-responsive-headerimage #masthead #header-image-main-inside
											{ max-height: none; }
	.roseta-cropped-headerimage #masthead #header-image-main-inside
											{ height: auto; }
<?php } ?>
<?php if ( $theme_sitetagline ) {?> #site-description { display: block; } <?php } ?>
<?php if (! display_header_text() ) { ?>
	#site-text 								{ display: none; }
<?php }; ?>

<?php if ( esc_html( $theme_menuposition ) ) { ?>
	#header-widget-area						{ top: <?php echo intval( $theme_menuheight )+10 ?>px; }
<?php }; ?>
<?php
$header_image = roseta_header_image_url();
if ( empty( $header_image ) ) { ?>
@media (min-width: 1152px) {
	<?php if ( esc_html( $theme_menuposition ) ) { ?>
	body:not(.roseta-landing-page) #site-wrapper
											{ margin-top: <?php echo intval( $theme_menuheight ) ?>px; }
	<?php } ?>
	body:not(.roseta-landing-page) #masthead
											{ border-bottom: 1px solid <?php echo esc_html( cryout_hexdiff( $theme_menubackground, 17 ) ); ?>; }
}
<?php };

/////////// lANDING PAGE ///////////
?>
.roseta-landing-page .lp-blocks-inside,
.roseta-landing-page .lp-boxes-inside,
.roseta-landing-page .lp-text-inside,
.roseta-landing-page .lp-posts-inside,
.roseta-landing-page .lp-page-inside,
.roseta-landing-page .lp-section-header,
.roseta-landing-page .content-widget		{ max-width: <?php echo esc_html( $theme_sitewidth ) ?>px;	}

.lp-staticslider .staticslider-caption-inside,
.seriousslider.seriousslider-theme .seriousslider-caption-inside,
#header-page-title #header-page-title-inside
											{ max-width: <?php echo ($theme_sitewidth < 900) ? esc_html( $theme_sitewidth ) : 900 ?>px;	}

.roseta-landing-page .content-widget 		{ margin: 0 auto; }

.lp-staticslider 							{ max-height: calc(100vh - <?php echo intval( $theme_menuheight + 100 ) ?>px); }

a.staticslider-button:nth-child(2n+1),
.seriousslider-theme .seriousslider-caption-buttons a:nth-child(2n+1),
a.staticslider-button:nth-child(2n),
.seriousslider-theme .seriousslider-caption-buttons a:nth-child(2n)
											{ color: <?php echo esc_html( $theme_contentbackground ); ?>; }
a.staticslider-button:nth-child(2n+1)::before,
.seriousslider-theme .seriousslider-caption-buttons a:nth-child(2n+1)::before
 											{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_accent1, 25) ) ?>; }

a.staticslider-button:nth-child(2n)::before,
.seriousslider-theme .seriousslider-caption-buttons a:nth-child(2n)::before
											{ background-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 25) ) ?>; }

<?php if ( $theme_lpslider == 3 ) { ?> .roseta-landing-page #header-image-main-inside { display: block; } <?php } ?>

.lp-section-desc 							{ color: <?php echo esc_html( cryout_hexdiff( $theme_sitetext, -40 ) ) ?>; }
.lp-blocks 									{ background-color: <?php echo esc_html( $theme_lpblocksbg ) ?>; }
.lp-boxes 									{ background-color: <?php echo esc_html( $theme_lpboxesbg ) ?>; }
.lp-text 									{ background-color: <?php echo esc_html( $theme_lptextsbg ) ?>; }
#lp-posts, #lp-page 						{ background-color: <?php echo esc_html( $theme_lppostsbg ) ?>; }
.lp-block 									{ background: <?php echo esc_html( $theme_contentbackground ); ?>; border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 28 ) ) ;?>; }

.lp-block i[class^=blicon]::before 			{ color: <?php echo esc_html( $theme_accent1 ); ?>; }

.lp-block .lp-block-title 					{ color: <?php echo esc_html( $theme_accent2 ); ?>; }
.lp-block i[class^=blicon]::after 			{ background-color: <?php echo esc_html( $theme_accent1 ); ?>; }
.lp-blocks1 .lp-block:hover i[class^=blicon]::before
											{ color: <?php echo esc_html( $theme_contentbackground ); ?>; }
.lp-block-readmore							{ color: <?php echo esc_html( cryout_hexdiff( $theme_sitetext, -80 ) ) ;?>; }
.lp-block-readmore:hover					{ color: <?php echo esc_html( $theme_accent1 ); ?>; }

.lp-text-title 								 { color: <?php echo esc_html( $theme_accent2 ); ?>; }
.lp-text-image + .lp-text-card				 { background-color: <?php echo esc_html( $theme_contentbackground ); ?>; }
.lp-text-image + .lp-text-card::before		 { background-color: <?php echo esc_html( $theme_accent1 ); ?>; }


.lp-box, .lp-box-title, .lp-boxes-animated .lp-box-text
					 						{ background-color: <?php echo esc_html( $theme_contentbackground ); ?>; }
.lp-box-title						 		 { color: <?php echo esc_html( $theme_accent2 ); ?>; }

.lp-boxes-static .lp-box-image .box-overlay	{ background-color: <?php echo  esc_html( cryout_hexdiff( $theme_accent1, -20 ) ); ?>; }
.lp-box-title 			 					{ color:  <?php echo esc_html( $theme_accent2 ) ?>; }
.lp-box-title:hover 						{ color:  <?php echo esc_html( $theme_accent1 ) ?>; }
.lp-boxes-1 .lp-box .lp-box-image 			{ height: <?php echo intval ( (int) $theme_lpboxheight1 ); ?>px; }
.lp-boxes-animated .box-overlay				{ background-color:  <?php echo esc_html( $theme_accent1 ) ?>; }
.lp-boxes-animated.lp-boxes-1 .lp-box:hover .lp-box-text
											{ max-height: <?php echo intval ( (int) $theme_lpboxheight1 - 100 ); ?>px; }
.lp-boxes-animated.lp-boxes-1 .lp-box:focus-within .lp-box-text /* because of older IE */
											{ max-height: <?php echo intval ( (int) $theme_lpboxheight1 - 100 ); ?>px; }
.lp-boxes-2 .lp-box .lp-box-image 			{ height: <?php echo intval ( (int) $theme_lpboxheight2 ); ?>px; }
.lp-boxes-animated.lp-boxes-2 .lp-box:hover .lp-box-text
											{ max-height: <?php echo intval ( (int) $theme_lpboxheight2 - 100 ); ?>px; }
.lp-boxes-animated.lp-boxes-2 .lp-box:focus-within .lp-box-text /* because of older IE */
											{ max-height: <?php echo intval ( (int) $theme_lpboxheight2 - 100 ); ?>px; }

#cryout_ajax_more_trigger,
.lp-port-readmore		 					{ color: <?php echo esc_html( $theme_accent2 ); ?>; }
<?php
for ($i=1; $i<=8; $i++) { ?>
	.lpbox-rnd<?php echo $i ?> { background-color:  <?php echo esc_html( cryout_hexdiff( $theme_lpboxesbg, 50+5*$i ) ) ?>; }
<?php }

	return apply_filters( 'roseta_custom_styles', preg_replace( '/(([\w-]+):\s*?;?\s*?([;}]))/i', '', ob_get_clean() ) );
} // roseta_custom_styles()


/*
 * Dynamic styles for the admin MCE Editor
 */
function roseta_editor_styles() {
	$options = cryout_get_option();
	extract($options);

	switch ( $theme_sitelayout ) {
		case '1c':
			$theme_primarysidebar = $theme_secondarysidebar = 0;
			break;
		case '2cSl':
			$theme_secondarysidebar = 0;
			break;
		case '2cSr':
			$theme_primarysidebar = 0;
			break;
		default:
			break;
	}
	$content_body = floor( (int) $theme_sitewidth - ( (int) $theme_primarysidebar + (int) $theme_secondarysidebar ) );

	ob_start();

	if ( function_exists( 'register_block_type' ) && is_admin() ) {
		$scope = '.wp-block';
	} else if ( ! is_admin() ) {
		$scope = '';
	} ?>

/* Standard blocks */
body.mce-content-body, .wp-block { max-width: <?php echo esc_html( $content_body ); ?>px; }

/* Width of "wide" blocks */
.wp-block[data-align="wide"] { max-width: 1080px; }

/* Width of "full-wide" blocks */
.wp-block[data-align="full"] { max-width: none; }

body.mce-content-body, .block-editor .edit-post-visual-editor {
	background-color: <?php echo esc_html( $theme_contentbackground ) ?>	}
body.mce-content-body, .wp-block {
	max-width: <?php echo esc_html( $content_body ); ?>px;
	font-family: <?php echo cryout_font_select( $theme_fgeneral, $theme_fgeneralgoogle ) ?>;
	font-size: <?php echo esc_html( $theme_fgeneralsize ) ?>;
	line-height: <?php echo esc_html( floatval($theme_lineheight) ) ?>;
	color: <?php echo esc_html( $theme_sitetext ); ?>; }
.block-editor .editor-post-title__block .editor-post-title__input {
	color: <?php echo esc_html( $theme_accent2 ) ?>; }
<?php
$font_root = 2.6; // headings font size root
for ( $i = 1; $i <= 6; $i++ ) {
$size = round( ( $font_root - ( 0.27 * $i ) ) * ( preg_replace( "/[^\d]/", "", esc_html( $theme_fheadingssize ) ) / 100), 5 ); ?>
h<?php echo $i ?> { font-size: <?php echo $size ?>em; } <?php
} //for ?>
%%scope%% h1, %%scope%% h2, %%scope%% h3, %%scope%% h4, %%scope%% h5, %%scope%% h6 {
	font-family: <?php echo cryout_font_select( $theme_fheadings, $theme_fheadingsgoogle ) ?>;
	font-weight: <?php echo esc_html( $theme_fheadingsweight ) ?>;
	color: <?php echo esc_html( $theme_headingstext ) ?>; }

%%scope%% blockquote::before, %%scope%% blockquote::after {
	color: rgba(<?php echo cryout_hex2rgb( esc_html( $theme_sitetext ) ) ?>,0.1); }

%%scope%% a 		{ color: <?php echo esc_html( $theme_accent1 ); ?>; }
%%scope%% a:hover	{ color: <?php echo esc_html( $theme_accent2 ); ?>; }

%%scope%% code		{ background-color: <?php echo esc_html(cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }
%%scope%% pre		{ border-color: <?php echo esc_html(cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>; }

%%scope%% select,
%%scope%% input[type],
%%scope%% textarea {
	color: <?php echo esc_html( $theme_sitetext ); ?>;
	background-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 10 ) ) ?>;
	border-color: <?php echo esc_html( cryout_hexdiff( $theme_contentbackground, 17 ) ) ?>
}

%%scope%% p, %%scope%% ul, %%scope%% ol, %%scope%% dd, %%scope%% pre, %%scope%% hr {
	margin-bottom: <?php echo floatval( $theme_paragraphspace ) ?>em;
}
%%scope%% p { text-indent: <?php echo floatval( $theme_parindent ) ?>em; }

<?php // end </style>
	return apply_filters( 'roseta_editor_styles', str_replace( '%%scope%%', $scope, ob_get_clean() ) );
} // roseta_editor_styles()

/* backwards wrapper for roseta_editor_styles() to output the editor style ajax request */
function roseta_editor_styles_output() {
	header( 'Content-type: text/css' );
	echo roseta_editor_styles();
	exit();
} // roseta_editor_styles_output()


/* theme identification for the customizer */
function cryout_customize_theme_identification() {
	ob_start();
	?> #customize-theme-controls [id*="cryout-"] h3.accordion-section-title::before { content: "RO"; border: 1px solid #22aaa1; color: #22aaa1; } <?php
	return ob_get_clean();
} // cryout_customize_theme_identification()


/* FIN */
