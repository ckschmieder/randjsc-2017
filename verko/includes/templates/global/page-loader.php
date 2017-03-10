<?php
$page_transition 		 = df_options( 'df_enable_page_loader', dahz_get_default( 'df_enable_page_loader' ) );
$loading_animation_image = df_options( 'df_loading_animation_img', dahz_get_default( 'df_loading_animation_img' ) );

if( $page_transition ) : ?>
    <div class="ajax_loader">
        <div class="ajax_loader_1">
            <?php if( $loading_animation_image != "" ) : ?>
            <div class="ajax_loader_2">
                <img src="<?php echo $loading_animation_image; ?>" alt="" />
            </div>
            <?php else: df_loading_spinners(); endif; ?>
        </div>
    </div>
<?php endif; ?>
