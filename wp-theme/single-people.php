<?php
    get_header();
    
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
?>
<div class="page people">
    <div class="container">
        <div class='visible-xs'>
            <h2><?php echo the_title(); ?></h2>
            <h4><?php the_field('title'); ?></h4>
        </div>
        <div class="right">
            <?php 

                $image = get_field('photo');
                
                if( !empty($image) ): ?>
                
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>
            <p>Email: <a href='mailto:<?php the_field('email'); ?>'><?php the_field('email'); ?></a></p>
            <?php if( get_field('direct_phone_number') ): ?>
                <p>Direct: <a href='tel:<?php the_field('direct_phone_number'); ?>'><?php the_field('direct_phone_number'); ?></a></p>
            <?php endif; ?>
            <?php if( get_field('cell_phone_number') ): ?>
                <p>Cell: <a href='tel:<?php the_field('cell_phone_number'); ?>'><?php the_field('cell_phone_number'); ?></a></p>
            <?php endif; ?>
            
        </div>
        <div class="left">
            <div class='hide-xs'>
                <h2><?php echo the_title(); ?></h2>
                <h4><?php the_field('title'); ?></h4>
            </div>
           <?php the_field('bio'); ?>
        </div>
    </div>
</div>
<?php

        endwhile;
    endif;

    get_footer();
    
?>