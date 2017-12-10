<?php
    get_header();
    $heroImage = get_field('hero_image');
?>
<div class="page single">

<?php if( $heroImage ): ?>

    <div class="hero" style="background-image: url(<?php echo $heroImage['url']; ?>);">
        <div class="overlay">
            <div class="container">
                <h1><?php echo the_title(); ?></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <?php the_field('copy'); ?>
    </div>

<?php else: ?>
    
    <div class="container">
        <h1><?php echo the_title(); ?></h1>
        <?php the_field('copy'); ?>
    </div>
    
<?php endif; ?>

</div>

<?php

    get_footer();
    
?>
