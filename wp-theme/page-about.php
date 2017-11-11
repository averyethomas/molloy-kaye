<?php

    /* Template Name: About Page */
    get_header();
    
?>
<div class="page single">
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
        <div class="copy">
            <?php the_field('copy'); ?>
        </div>
        <div class="team-container">
            <h2>Our Team</h2>
            <!-- INSERT TEAM MEMBERS HERE -->
        </div>
        <div class="listings-container">
            <h2>Recently Closed Listings</h2>
            <!-- INSERT RECENTLY CLOSED LISTINGS HERE -->
        </div>
    </div>
</div>
<?php

    get_footer();
    
?>
