<?php

    /* Template Name: Home Page */
    get_header();
    
?>

<div class="page home has-hero">
    
<?php
    
    $heroImage = get_field('hero_image');
 
?>    

    <div class="hero" style="background-image: url(<?php echo $heroImage['url']; ?>);">
        <div class="overlay"></div>
        <div class="container text">
            <h1>LOGO</h1>
            <h2><?php bloginfo('description'); ?></h2>
        </div>
    </div>
    <div class="intro">
        <div class="container">
            <h1><?php bloginfo('name'); ?></h1>
            <h6><?php the_field('introduction'); ?></h6>
        </div>
    </div>
    <div class="container">
        <div class="listings">
          <h3>Featured Listings</h3>
          <!-- PUT FEATURED LISTINGS HERE -->
          <a class="cta" href="#">View All Listings</a>
          <h3>Recently Closed</h3>
          <!-- PUT RECENTLY CLOSED LISTINGS HERE -->
          <a class="cta" href="#">View All Closed Listings</a>
        </div>
    </div>
</div>

<?php

    get_footer();
    
?>
