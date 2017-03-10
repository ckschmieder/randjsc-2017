<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$layout = df_layout_content();

if ( 'one-col' != $layout  ) :
?>

    <aside <?php dahz_attr('sidebar'); ?>>
        <div itemprop="accessibilityFeature">

        <?php if(class_exists('sidebar_generator') && is_page()) : ?>

            <?php do_action('before_sidebar'); ?>

            <?php generated_dynamic_sidebar(); ?>

        <?php else : ?>

            <?php do_action('before_sidebar'); ?>

            <?php if (!dynamic_sidebar('primary')) : ?>

                <aside id="search" class="widget widget_search">
                    <?php get_search_form(); ?>
                </aside>

                <aside id="archives" class="widget">
                    <h3 class="widget-title"><?php _e('Archives', 'dahztheme'); ?></h3>
                    <ul>
                        <?php wp_get_archives(array('type' => 'monthly')); ?>
                    </ul>
                </aside>

                <aside id="meta" class="widget">
                    <h3 class="widget-title"><?php _e('Meta', 'dahztheme'); ?></h3>
                    <ul>
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <?php wp_meta(); ?>
                    </ul>
                </aside>

            <?php endif; // end sidebar widget area ?>

        <?php endif; ?>
        </div>
    </aside>


<?php endif; ?>
