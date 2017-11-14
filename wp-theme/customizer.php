<?php
function theme_customizer ( $wp_customize ) {
    
    $wp_customize->remove_section('static_front_page');
    
    //Logo SVG
    $wp_customize->add_section('logo_section', array(
        'title' => 'Logos',
        'description' => '',
        'priority' => 30,
    ) );
    $wp_customize->add_setting('dark', array(
        'default' => 'test',                                    
    ) );
    $wp_customize->add_control('dark_logo', array(
        'label' => 'Dark Logo',
        'section' => 'logo_section',
        'settings' => 'dark'
    ) );
    $wp_customize->add_setting('light', array(
        'default' => 'test2',                                    
    ) );
    $wp_customize->add_control('light_logo', array(
        'label' => 'Light Logo',
        'section' => 'logo_section',
        'settings' => 'light'
    ) );
    
    
}
add_action( 'customize_register', 'theme_customizer', 20);
?>
