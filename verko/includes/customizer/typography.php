<?php

function df_customizer_typography( $wp_customize ){
  $list_font_weights = googlefont_family_weights();
  $wp_customize->add_setting( 'list_font_weights', array(
          'default'   => $list_font_weights,
          'type'      => 'option'
      ));

  $wp_customize->add_setting( 'df_options[nav_font_family]', array( 'type' => 'option', 'default' => 'Karla' ) );
  $wp_customize->add_setting( 'df_options[nav_font_weight]', array( 'type' => 'option', 'default' => '400' ) );

  $wp_customize->add_setting( 'df_options[heading_font_family]', array( 'type' => 'option', 'default' => 'Dosis' ) );
  $wp_customize->add_setting( 'df_options[heading_font_weight]', array( 'type' => 'option', 'default' => '400' ) );

  $wp_customize->add_setting( 'df_options[body_font_family]', array( 'type' => 'option', 'default' => 'Karla' ) );
  $wp_customize->add_setting( 'df_options[body_font_weight]', array( 'type' => 'option', 'default' => '400' ) );

  $wp_customize->add_control( new DAHZ_Typography_Control( $wp_customize,
    'nav_typography',
    array(
      'section'     => 'df_customizer_navbar_section',
      'priority'    => 120,
      // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
      'settings'    => array(
        'family'      => 'df_options[nav_font_family]',
        'weight'      => 'df_options[nav_font_weight]'
      ),
      // Pass custom labels. Use the setting key (above) for the specific label.
      'l10n'        => array(),
    )
  )
);

$wp_customize->add_control( new DAHZ_Typography_Control( $wp_customize,
  'heading_typography',
  array(
    'section'     => 'df_customizer_typo_section',
    'priority'    => 20,
    // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
    'settings'    => array(
      'family'      => 'df_options[heading_font_family]',
      'weight'      => 'df_options[heading_font_weight]'
    ),
    // Pass custom labels. Use the setting key (above) for the specific label.
    'l10n'        => array(),
  )
)
);

$wp_customize->add_control( new DAHZ_Typography_Control( $wp_customize,
  'content_typography',
  array(
    'section'     => 'df_customizer_typo_section',
    'priority'    => 80,
    // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
    'settings'    => array(
      'family'      => 'df_options[body_font_family]',
      'weight'      => 'df_options[body_font_weight]'
    ),
    // Pass custom labels. Use the setting key (above) for the specific label.
    'l10n'        => array(),
  )
)
);

}
