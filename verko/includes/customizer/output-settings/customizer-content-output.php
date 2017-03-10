<?php
if (!defined('ABSPATH')) { exit; }

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/CUSTOMIZER-CONTENT-OUTPUT.PHP
 *
 * - Customizer Content Options CSS Output
 * 	   1. Outer Area
 * 	   2. Content Area
 * 	   3. Typography
 *
  ================================================================================= */
?>

/*==========================================================================================
  Outer Area
==========================================================================================*/
<?php if( $df_layout_site == 'boxed' ) : ?>
	body {
		background: <?php echo $df_outer_bg_rgba; ?> <?php echo $df_image_outer_bg; ?>;
		<?php echo $df_outer_bg_image_size . ';' ?>
		<?php echo $df_outer_bg_image_attc . ';' ?>
	}
<?php endif; ?>

/*==========================================================================================
  Content Area
==========================================================================================*/
.site {
	background: <?php echo $df_content_bg_rgba; ?> <?php echo $df_image_content_bg; ?>;
	<?php echo $df_content_bg_image_size . ';' ?>
	<?php echo $df_content_bg_image_attc . ';' ?>
}
<?php if( $df_content_bg_color != '' ) : ?>
	.main-navigation ul ul,
	.ui.overlay.sidebar.sidebar-off-canvas, .df_content-bg:before,
	.languages-list {
		background: <?php echo $df_content_bg_rgba; ?>;
	}
<?php endif; ?>


/* Accent Color */
<?php if( $df_accent_color != '' ): ?>
	a, .post-pagination i {
		color: <?php echo $df_accent_color; ?>;
	}
	a:hover, .post-pagination .navi-left:hover i, .post-pagination .navi-right:hover i,
	.df-standard-image-big-skny a:hover,
	.df-standard-image-big-skny .df-like:hover .df-like-count {
		color: <?php echo $df_accent_color_hover; ?>;
	}
	.main-navigation ul ul a:after, .filter-cat-blog:after {
		border-color:<?php echo $df_accent_color_hover; ?>;
	}
	.single .single-tag-blog ul li:hover {
		background: <?php echo $df_accent_color; ?>;
		border-color: <?php echo $df_accent_color; ?>;
	}
	.single .single-tag-blog ul li:hover a {
		color: #FFFFFF; /* Body Font Color */
	}

	input[type="email"]:focus,
	input[type="number"]:focus,
	input[type="search"]:focus,
	input[type="text"]:focus,
	input[type="tel"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	textarea:focus,
	select:focus,
	.widget_search input[type="search"]:focus,
	.widget .selectricOpen .selectric,
	.selectricHover .selectric {
		border-color: <?php echo $df_accent_color; ?>!important;
	}

	.widget_search button, .search .search-form button {
		color: <?php echo $df_accent_color; ?> !important;
	}
	.widget_tag_cloud a:hover, .df-next-prev-pagination a:hover {
		background: <?php echo $df_accent_color; ?>;
		color: #FFFFFF;
	}
	.widget_nav_menu li a, .widget_dahz_subscribe ul.df-social-connect li a {
		color: <?php echo $df_body_font_color; ?>;
	}
	.widget_nav_menu li > a:hover {
		color: <?php echo $df_accent_color; ?>;
	}
	.df-sidebar-off-canvas {
		background: <?php echo $df_accent_color; ?>;
	}
	.df-sidebar-off-canvas:hover {
		background: <?php echo $df_accent_color_hover; ?>;
	}
	.df_grid_fit .type-post:hover .featured-media:after {
		background: <?php echo df_convert_rgba( $df_accent_color , 60); ?>;
	}
	.df-single-portfolio-related-post .related-post .df-port-image .third-effect .mask {
		background-color: <?php echo df_convert_rgba( $df_accent_color , 60); ?>;
	}
	.single-portfolio .df-single-portfolio-postnav .df-back-to-page-portfolio a:hover,
	.single-portfolio .df-single-portfolio-postnav .nav-next a:hover,
	.single-portfolio .df-single-portfolio-postnav .nav-prev a:hover {
		color: <?php echo $df_accent_color; ?>;
	}
	.anchor-bullet-container a:hover i, .anchor-bullet-container a.active i {
		background-color: <?php echo df_convert_rgba( $df_accent_color , 80); ?>;
	}
<?php endif; ?>


/*==========================================================================================
  Typography
==========================================================================================*/
/* Body Font Style */
body, .site-header .main-navigation ul ul a, .df-social-connect a, .languages-list a {
	font-family: "<?php echo $df_body_font_family; ?>";
	font-size: <?php echo $df_general_font_size; ?>px; /* Body Font Size */
	letter-spacing: <?php echo $df_body_ltr_space; ?>px; /* Body Letter Space */
	<?php if ( $df_body_font_color != '' ) : ?>
		color: <?php echo $df_body_font_color; ?>; /* Body Font Color */
	<?php endif; ?>
	font-weight: <?php echo $df_body_font_weight; ?>;
    <?php if (strpos($df_body_font_weight_style, 'italic')) : ?>
        font-style: italic;
    <?php endif; ?>
}

/* Heading Font Style */
<?php if( $df_heading_font_color != '' ): ?>
	h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
		color: <?php echo $df_heading_font_color; ?>; /* Heading Font Color */
	}
<?php endif; ?>

h1, h2, h3, h4, h5, h6, .universe-search .universe-search-form .universe-search-input {
	font-family: "<?php echo $df_heading_font_family; ?>";
	font-weight: <?php echo $df_heading_font_weight; ?>;
    <?php if (strpos($df_heading_font_weight_style, 'italic')) : ?>
        font-style: italic;
    <?php endif; ?>
	text-transform: <?php echo $df_heading_txt_trans; ?>; /* Heading Text Transform */
	letter-spacing: <?php echo $df_heading_ltr_space; ?>px; /* Heading Leeter Space */
}
blockquote {
	font-family: "<?php echo $df_heading_font_family; ?>";
}
<?php if ( $df_body_font_color != '' ) : ?>
.df-topbar .main-navigation ul ul a,
.site-header .main-navigation ul ul a,
.anchor-bullet-container a span {
	color: <?php echo $df_body_font_color; ?>!important; /* Body Font Color */
}
<?php endif; ?>

/*==========================================================================================
	Button Footer
==========================================================================================*/
.df_button_flat.df-hide-footer .button {
		<?php if( $df_accent_color != '' ) : ?>
			background:<?php echo $df_accent_color; ?>!important;
		<?php endif; ?>
}
.df_button_flat.df-hide-footer .button:hover,
.df_button_flat.df-hide-footer.onacc .button {
		<?php if( $df_accent_color_hover != '' ) : ?>
			background:<?php echo $df_accent_color_hover; ?>!important;
		<?php endif; ?>
}
/*==========================================================================================
	ajax top search
==========================================================================================*/
<?php if( $show_header_search && $df_content_bg_color != ''): ?>
	.universe-search {
		background: <?php echo df_convert_rgba( $df_content_bg_color, '98' ); ?>;
	}
	.universe-search .universe-search-form .universe-search-input{
		background: <?php echo df_convert_rgba( $df_content_bg_color, '0' ); ?>;
	}
<?php endif; ?>

/*==========================================================================================
	Shortcode
==========================================================================================*/
<?php if ( class_exists( 'df_Shortcodes' ) ) : ?>
	<?php if( $df_accent_color != '' ): ?>
			.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a:hover,
			.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-accordion-header-active a,
			.wpb_content_element .wpb_tabs_nav li.ui-tabs-active, .wpb_content_element .wpb_tabs_nav li:hover,
			.member.style1:hover .member-desc-inner, .df-price-table .popular-pt {
				background: <?php echo $df_accent_color; ?>;
			}
			.title-pt {
				color: <?php echo $df_accent_color_hover; ?>;
			}

			.blog-sc-slider  .blog-slider-animation span{
				background: <?php echo df_convert_rgba($df_accent_color, '60'); ?>;
			}
	<?php endif; ?>

	<?php if( $df_heading_font_color != '' ): ?>
		.price-pt, .currency-pt {
			color: <?php echo $df_heading_font_color; ?>; /* Heading Font Color */
		}
	<?php endif; ?>

	<?php if ( $df_body_font_color != '' ) : ?>
		.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav a, .wpb_content_element .wpb_accordion_header a{
			color: <?php echo $df_body_font_color; ?>; /* Body Font Color */
		}
	<?php endif; ?>

<?php endif; ?>