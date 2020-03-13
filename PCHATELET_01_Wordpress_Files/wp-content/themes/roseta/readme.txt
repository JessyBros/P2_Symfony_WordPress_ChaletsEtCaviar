===Roseta===

Contributors: Cryout Creations
Requires at least: 4.5
Tested up to: 5.3.2
Stable tag: 1.1.1
Requires PHP: 5.5
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

A fast, clean and highly customizable theme. It's beautiful and multi-purpose - use it for your blog, online portfolio, business website or WooCommerce store. It's lightweight, mobile friendly and responsive, created with SEO in mind (taking full advantage of microformats and Schema.org microdata that search engines love). Some of the amazing features include:  Responsive / WooCommerce / RTL / Translation Ready / Google Fonts / Gutenberg support / Regular updates. Some of the many customizable aspects include: Layouts (Wide and Boxed) / Site widths / Header elements / Featured images / Colors / Post metas / Widgets areas / Landing page elements / Slider / Typography / Masonry bricks / Socials and much more.

Copyright 2019 Cryout Creations
https://www.cryoutcreations.eu/

== License ==

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see http://www.gnu.org/copyleft/gpl.html


== Third Party Resources ==

Roseta WordPress Theme bundles the following third-party resources:

HTML5Shiv, Copyright Alexander Farkas (aFarkas)
Dual licensed under the terms of the GPL v2 and MIT licenses
Source: https://github.com/aFarkas/html5shiv/

FitVids, Copyright Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
Licensed under the terms of the WTFPLlicense
Source: http://fitvidsjs.com/

Select2, Copyright Kevin Brown, Igor Vaynberg, and Select2 contributors
Licensed under the terms of the MIT license.
Source: https://github.com/select2/select2

== Bundled Fonts ==

Icomoon icons, Copyright Keyamoon.com
Licensed under the terms of the GPL license
Source: https://icomoon.io/#icons-icomoon

Zocial CSS social buttons, Copyright Sam Collins
Licensed under the terms of the MIT license
Source: https://github.com/smcllns/css-social-buttons

Entypo+ icons, Copyright Daniel Bruce
Licensed under the terms of the CC BY-SA 4.0 license
Source: http://www.entypo.com/faq.php

== Bundled Images ==

The following bundled images are released into the public domain under Creative Commons CC0:

Header images:
https://pxhere.com/en/photo/723046
https://pxhere.com/en/photo/1081678

Preview demo images:
1.jpg - https://pxhere.com/en/photo/1456587
2.jpg - https://pxhere.com/en/photo/1451599
3.jpg - https://pxhere.com/en/photo/1451433
4.jpg - https://pxhere.com/en/photo/99193
5.jpg - https://pxhere.com/en/photo/117936
6.jpg - https://pxhere.com/en/photo/1585
7.jpg - https://pxhere.com/en/photo/949588
8.jpg - https://pxhere.com/en/photo/655321
9.jpg - https://pxhere.com/en/photo/1325885
10.jpg - https://pxhere.com/en/photo/757423

The rest of the bundled images are created by Cryout Creations and released with the theme under GPLv3


== Changelog ==

= 1.1.1 =

* Fixed disabling the main navigation doesn't work as intended due to some elements still taking up space

= 1.1.0 =
* Added 'wp_body_open' action hook support for WordPress 5
* Added 'roseta_header_image' and 'roseta_header_image_url' filters to allow custom control over featured images in header functionality
* Added integrated socials menu support in the header (no longer requiring the manual use of the socials widget)
* Added option to disable default pages navigation and improved mobile menu functionality to hide toggler when main navigation is empty
* Added visibility on scroll functionality on the fixed menu on mobile devices
* Adjusted featured boxes animated 2 styling
* Moved header overlay color options to the correct Colors > Header panel
* Updated fixed menu styling to account for WordPress admin bar responsiveness breakpoints changes
* Improved list bullets styling in landing page text areas
* Improved dark color schemes support for HTML select elements 
* Improved main navigation usability on tables by adding the option to force the mobile menu activation
* Improved mobile menu dark color schemes support by using non-link texts to use the configured menu text color
* Improved landing page icon blocks responsiveness
* Fixed testimonials section responsiveness when displayed on one column layout
* Fixed breadcrumbs missing link on home icon on WooCommerce pages
* Fixed animated featured boxes displaying an extra bottom margin when the 'read more' button is not used
* Fixed Gutenberg lists displaying bullets outside of content on landing page sections
* Fixed header video not being horizontally centered
* Fixed 'hide title' option not working with content titles
* Fixed static slider images larger than the screen being distorted instead of crop to fit the screen
* Fixed top menu not being scrollable and floating left on mobile devices
* Fixed paragraph indentation option not working and limited to inner-content only
* Fixed back-to-top button sometimes failing to display on short pages
* Removed leftover styling that was making the captions sometimes jump on display in the featured boxes sections when text was longer than the available space
* Improved keyboard navigation accessibility:
	* Added 'skip to content' link
	* Added focus support for post featured images, landing page featured boxes, landing page portfolio, main navigation search form
	* Converted menu close element to button
* Updated to Cryout Framework 0.8.4.1:
	* Optimized options migration check to reduce calls
	* Fixed 'Too few arguments' warning in breadcrumbs on Polylang multi-lingual sites
	* Removed news feed from theme's about page per TRT requirements - https://themes.trac.wordpress.org/ticket/73150#comment:3

= 1.0.7 =
* Multiple fixes for older IEs
* Improved Google Fonts functionality to load all weights for the general font
* Improved footer widgets responsiveness when set to center align
* Improved content spacing on single pages/posts when comment form is not displayed
* Updated to Cryout Framework 0.8.2:
	* Activated Select2 funcitonality on font selector controls
	* Fixed RTL issues with color controls, toggle controls, half/third width selectors, number slider

= 1.0.6 =
* Improved icon blocks icon selector by adding search functionality and making the icons visible on all browsers
* Optimized WooCommerce checkout page and products pages responsiveness
* Cleaned up some duplicate styling in custom-style.php
* Fixed sidebars splitting in two columns on smaller screens
* Fixed normalized tags not using uniform sizes
* Updated to Cryout Framework 0.8.1
	* Added Select2 functionality to icon-select controls

= 1.0.5 =
* Fixed content background color option not applying to the block editor
* Fixed headings color not applying to the block editor
* Improved block editor styling support for dark backgrounds
* Improved translations support for the framework second textdomain with Loco Translate

= 1.0.4 =
* Improved footer content alinment on mobile
* Fixed site title missing line height
* Fixed color fade on mobile top menu
* Fixed landing page text areas layouts not alternating properly
* Fixed slider and static slider captions, landing page section titles and description not being properly horizontally aligned on older browsers (IE 11)
* Fixed main navigation placement when set to over header image
* Rewrote frontend scripts

= 1.0.3.1 =
* Fixed missing background color for the fixed main menu

= 1.0.3 =
* Adjusted top section so that it disappears when no branding, top widgets or top menu are active
* Adjusted static slider caption text to use the overlay text-color option
* Fixed header titles disappearing on small screens (under 640px)
* Fixed missing background color for the fixed single post navigation
* Fixed menu when set to "over header image" not behaving properly
* Updated screenshot

= 1.0.2 =
* Added line-height option for header titles
* Added maximum width constraint to header titles and static slider caption
* Improved support for larger site logos
* Adjusted comment reply form styling
* Fixed deferring functionality applying to some dashboard scripts
* Fixed $content_width not being defined in the dashboard
* Fixed main navigation submenus not being visible under certain conditions
* Removed 'Not found' section on landing page when no posts are available

= 1.0.1 =
* Fixed header image not visible when set to 'contained' mode
* Added option to disable header image size requirements

= 1.0.0.1 =
* Reupload of 1.0.0 due to missing cryout/controls.php file

= 1.0.0 =
* Finalized suggested fonts list
* Update theme options to use the newly added controls
* Added additional font variant and line height options for some typography elements
* Fixed editor styles option doesn't apply to the block editor
* Updated to Cryout Framework 0.8.0:
	* Added 'numberslider', 'toggle', 'selecthalf', 'selectthird', 'description', 'spacer' controls

= 0.9 =
* First release
