<?php
function theme_customizer ( $wp_customize ) {
    
    $wp_customize->remove_section('static_front_page');
    
    //Logo SVG
    $wp_customize->add_section('logo_section', array(
        'title' => 'Logos',
        'description' => '',
        'priority' => 30,
    ) );
    $wp_customize->add_setting( 'long_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'long_logo', array(
        'label'    => __( 'Long Logo', 'Molloy Kaye' ),
        'section'  => 'logo_section',
        'settings' => 'long_logo',
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
    //LISTINGS HERO IMAGE
    $wp_customize->add_section('listings_section', array(
        'title' => 'Listings Hero Image',
        'description' => '',
        'priority' => 40,
    ) );
    $wp_customize->add_setting( 'listings_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'listings_image', array(
        'label'    => __( 'Listings Image', 'Molloy Kaye' ),
        'section'  => 'listings_section',
        'settings' => 'listings_image',
    ) ) );
     $wp_customize->add_section('contact_info', array(
        'title' => 'Contact Info',
        'description' => '',
        'priority' => 20,
    ) );
    $wp_customize->add_setting( 'phone' );
    $wp_customize->add_control('phone', array(
        'label' => 'Phone Number',
        'section' => 'contact_info',
        'settings' => 'phone',
        'type' => 'text',
    ) );
    $wp_customize->add_setting( 'address' );
    $wp_customize->add_control('address', array(
        'label' => 'Address',
        'section' => 'contact_info',
        'settings' => 'address',
        'type' => 'text',
    ) );
}
add_action( 'customize_register', 'theme_customizer', 20);
?>
