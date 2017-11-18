<?php
function theme_customizer ( $wp_customize ) {
    
    $wp_customize->remove_section('static_front_page');
    
    //Logo SVG
    $wp_customize->add_section('logo_section', array(
        'title' => 'Logos',
        'description' => '',
        'priority' => 30,
    ) );
    $wp_customize->add_setting( 'dark_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dark_logo', array(
        'label'    => __( 'Dark Logo', 'Molloy Kaye' ),
        'section'  => 'logo_section',
        'settings' => 'dark_logo',
    ) ) );
    $wp_customize->add_setting( 'light_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'light_logo', array(
        'label'    => __( 'Light Logo', 'Molloy Kaye' ),
        'section'  => 'logo_section',
        'settings' => 'light_logo',
    ) ) );
    $wp_customize->add_setting( 'mc_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mc_logo', array(
        'label'    => __( 'Marcus & Millichap Logo', 'Molloy Kaye' ),
        'section'  => 'logo_section',
        'settings' => 'mc_logo',
    ) ) );
}
add_action( 'customize_register', 'theme_customizer', 20);
?>
