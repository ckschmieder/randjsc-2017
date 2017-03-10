<?php if ( has_nav_menu( 'primary-menu' ) ) : // Check if there's a menu assigned to the 'primary-menu' location. ?>
	<nav <?php dahz_attr( 'menu', 'primary-menu' );  ?>>
		<?php
        df_navbar_menu( array(
            'menu_wraper'       => '<ul id="main-nav" class="df-navi">%MENU_ITEMS%' . "\n" . '</ul>',
            'menu_items'        =>  "\n" . '<li id="menu-item-%ITEM_ID%" class="%ITEM_CLASS%"><a href="%ITEM_HREF%"%ESC_ITEM_TITLE%>%ICON%<span>%ITEM_TITLE%%SPAN_DESCRIPTION%</span></a>%SUBMENU%</li> ',
            'submenu'           => '<ul class="sub-nav df_row-fluid">%ITEM%</ul>',
            'params'            => array( 'act_class' => 'act', 'please_be_mega_menu' => true )
        ) );
        ?>
	</nav><!-- main-navigation -->
<?php endif; ?>
