<?php
if (!defined('ABSPATH')) { exit; }

/* ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/CUSTOMIZER/CUSTOMIZER-HEADER-OUTPUT.PHP
 *
 * - Customizer Header Options CSS Output
 *    1. Topbar
 *    2. Logo
 *    3. Navbar
 *    4. Navbar Transparency
 *    5. Sticky Navbar
 *
  ================================================================================= */
?>
/*============================================================
  Topbar
=============================================================*/
  <?php if ($df_header_topbar_bg_color) : ?>
    .df-topbar{
      background-color: <?php echo $df_header_topbar_bg_color; ?>;
    }
  <?php endif; ?>

  <?php if ($df_header_topbar_txt_color) : ?>
    .df-topbar,
    .info-description,
    .df-topbar .df-social-connect li a
    <?php if ( has_nav_menu( 'top-menu' ) ) : ?>
      , .df-topbar .main-navigation a
    <?php endif; ?>
    {
      color: <?php echo $df_header_topbar_txt_color; ?>;
    }
  <?php endif; ?>
/*============================================================
  Logo
=============================================================*/
    <?php if( $df_logo != '' ) : if($df_logo_height != '') : ?>
    .df-sitename img{
    height: <?php echo $df_logo_height . 'px'; ?>;
    width:auto;
    }

    .main-navigation,
    .site-misc-tools
    {
    height: <?php echo $df_logo_height . 'px'; ?>;
    line-height: <?php echo $df_logo_height . 'px'; ?>;
    }
    <?php endif; endif; ?>

    @media only screen and (max-width: 992px){
    .main-navigation, .site-misc-tools, .df-sitename img{
    height: 30px;
    line-height: 30px;
    width: auto;
    }
    }

    <?php if($df_logo_spacing_above != ''): ?>
      @media only screen and (min-width:992px){
     .header-wrapper .site-header{padding-top: <?php echo $df_logo_spacing_above . 'px'; ?>; }
      }
    <?php endif; ?>

    <?php if($df_logo_spacing_below != ''): ?>
      @media only screen and (min-width:992px){
     .header-wrapper .site-header{padding-bottom: <?php echo $df_logo_spacing_below . 'px'; ?>; }
      }
    <?php endif; ?>
/*============================================================
  Navbar
=============================================================*/

  <?php if( $df_navbar_position == 'center' ): ?>
   .main-navigation {
    height:30px;
    line-height:30px;
    margin-top:15px !important;
   }
  <?php endif; ?>

  <?php if ($df_sticky_navbar_txt_color != '') : ?>
  .site-header,
  .main-navigation a,
  .df-sitename {
    color:<?php echo $df_sticky_navbar_txt_color; ?>;
  }
  <?php endif; ?>

  .main-navigation a { text-transform: <?php echo $df_navbar_txt_trans ?>; }

  <?php if ($df_header_navbar_txt_color != '') : ?>


  @media only screen and (min-width:992px){
    .site-header,
    .main-navigation a,
    .df-sitename {
      color:<?php echo $df_header_navbar_txt_color; ?>;
    }
  }
  <?php endif; ?>

  .site-header {
      background:<?php echo $df_header_navbar_bg_color; ?> <?php echo $df_image_navbar_bg; ?>;
      <?php echo $df_navbar_bg_image_size . ';' ?>
      <?php echo $df_navbar_bg_image_attc . ';' ?>
  }

  /* font style */
  .mobile-primary-navbar > li > a,
  .main-navigation .df-mega-menu > .sub-nav > li.has-children:not(.new-column) > a,
  .site-header .main-navigation a {
      font-family: <?php echo $df_navbar_font_family ?>;
      font-size: <?php echo $df_navbar_font_size . 'px' ?>;
      font-weight: <?php echo $df_navbar_font_weight; ?>;
      <?php if (strpos($df_navbar_font_weight_style, 'italic')) : ?>
          font-style: italic;
      <?php endif; ?>
  }

/*============================================================
  Navbar Transparency
=============================================================*/
<?php
/*
customizer dan get post meta this logic only work in some php file
1. branding.php
2. customizer-header-output.php
3. localize.php -> main.js
because this file is related one to another but the output not always same e.g
branding just need to distinguish original logo  and transparency logo
*/
if($df_enable_navbar_transparency == 1){
  $navbar_transparency_class = 'nav-transparent';
}
if ( (get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true )) && (get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true ) != 'default') ) {
  $navbar_transparency_class = 'nav-transparent';
  $df_dark_light_transparency = get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true );
}
if ( (get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true )) && (get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true ) == 'no-transparency') ) {
  $navbar_transparency_class = '';
  $df_dark_light_transparency = '';
}
?>

<?php if( $navbar_transparency_class == 'nav-transparent' ) : ?>

  .site-header {
  background:none;
  }
  @media only screen and (max-width:992px){
    .header-wrapper .menu-section {
      position: relative;
    }
  }

<?php switch ($df_dark_light_transparency) {
  case 'dark': ?>
  @media only screen and (min-width:992px){
  .site-header,
  .main-navigation a,
  .df-sitename {
    color:<?php echo $df_dark_transparent_color; ?>;
  }
  }
<?php break;

  default: ?>
   @media only screen and (min-width:992px){
  .site-header,
  .main-navigation a,
  .df-sitename {
    color:<?php echo $df_light_transparent_color; ?>;
  }
  }
<?php break;
 } ?>

 <?php endif; ?>
/*============================================================
  Sticky Navbar
=============================================================*/

    <?php if ($df_sticky_navbar_bg_color) : ?>
    .sticky-scroll-nav,
    body .ui.overlay.sidebar.navbar-off-canvas{
      background-color: <?php echo $df_sticky_navbar_bg_color; ?>;
      background-image: none;
    }
    @media only screen and (max-width:992px){
      .site-header{
        background-color: <?php echo $df_sticky_navbar_bg_color; ?>;
      }
    }
  <?php endif; ?>

    <?php if ($df_sticky_navbar_txt_color != '') : ?>
     .site-header.sticky-scroll-nav,
     .site-header.sticky-scroll-nav .main-navigation a,
     .site-header.sticky-scroll-nav .df-sitename,
     .off-canvas-navigation span.btnshow:after,
     .main-navigation .off-canvas-navigation li a,
     .navbar-off-canvas .df-social-connect a {
      color:<?php echo $df_sticky_navbar_txt_color; ?>;
     }
  <?php endif; ?>


/*============================================================
  Page Header Title
=============================================================*/
<?php if ($df_page_title_txt_color != '') : ?>
  .df-page-header .df-header h1,
  .df-page-header .df-header .trail-end,
  .df-page-header .df-header .trail-begin,
  .df-page-header .breadcrumb-trail a {
      color:<?php echo $df_page_title_txt_color; ?>;
  }
<?php endif; ?>