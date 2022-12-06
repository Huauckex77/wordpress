<?php 
/**
* Call to Action Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/
if(! bizes_set_to_premium() ) {
      $wp_customize->add_section( new Bizes_Upsell_Section( $wp_customize, 'bizes_premium_addon',
         array(
            'title' => __( 'See Premium Features', 'bizes' ),
            'url' => 'https://themereps.com/bizes/',
            'backgroundcolor' => '#1da1f2',
            'textcolor' => '#fff',
            'priority' => 0,
         )
      ) );
}

$wp_customize->add_section( new Bizes_Upsell_Section( $wp_customize, 'bizes_documentation',
   array(
      'title' => __( 'View Documentation', 'bizes' ),
      'url' => 'https://themereps.com/docs-category/bizes/',
      'backgroundcolor' => '#344860',
      'textcolor' => '#fff',
      'priority' => 210,
   )
) );