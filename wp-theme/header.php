<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--CSS-->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css">
    <?php wp_head(); ?>
    <!--FONT AWESOME-->
    <script src="https://use.fontawesome.com/879fcc8444.js"></script>
    <!-- GOOGLE MAPS -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBzJxNeHK6j_bXKDfWTZ1zj11wAHJEAQo&callback"></script>
</head>
<body data-ng-app="angularApp" data-ng-controller="mainCtrl" data-ng-class="{'navOpen' : navToggle}">
    <nav>
        <div class="container">
            <div class="logo">
                <a href="/molloy-kaye-wordpress/">
                    <?php if ( get_theme_mod( 'light_logo' ) ) : ?>
 
                        <img src="<?php echo get_theme_mod( 'light_logo' ); ?>" />
   
                    <?php endif; ?>
                </a>
            </div>
            <div class="mobileMenu" ng-click="navToggle = ! navToggle" ng-class="{'navOpen' : navToggle}">
                <span></span>
            </div>
            <ul ng-class="{'navOpen' : navToggle}">
                <?php main_nav(); ?>
            </ul>    
        </div>
    </nav>    