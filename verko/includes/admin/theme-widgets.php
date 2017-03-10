<?php

if (!defined('ABSPATH')) { exit; }


/* ----------------------------------------------------------------------------------- */
/* Load the widgets, with support for overriding the widget via a child theme.         */
/* ----------------------------------------------------------------------------------- */
$widgets = array(
    'includes/admin/widgets/widget-dahz-adspace.php',
    'includes/admin/widgets/widget-dahz-contact.php',
    'includes/admin/widgets/widget-dahz-popular-posts.php',
    'includes/admin/widgets/widget-dahz-post-formats.php',
    'includes/admin/widgets/widget-dahz-recent-comments.php',
    'includes/admin/widgets/widget-dahz-recent-posts.php',
    'includes/admin/widgets/widget-dahz-icon.php',
    'includes/admin/widgets/widget-dahz-subscribe.php'
);

// Allow child themes/plugins to add widgets to be loaded.
$widgets = apply_filters( 'dahz_widgets', $widgets );

foreach ( $widgets as $w ) {
    locate_template( $w, true );
}