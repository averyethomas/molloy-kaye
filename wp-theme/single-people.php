<?php
    get_header();
    
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
?>
<div class="page people">
    <div class="container">
        <div class='visible-xs'>
            <h2><?php echo the_title(); ?></h2>
            <?php if( have_rows('titles') ):
                
                    while ( have_rows('titles') ) : the_row(); ?>
                
                        <h4><?php the_sub_field('title'); ?></h4>
                        
                    <?php endwhile;
                
            endif; ?>
        </div>
        <div class="right">
            <?php 

                $image = get_field('photo');
                
                if( !empty($image) ): ?>
                
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>
            <h4>CONTACT INFO</h4>
            <p><i class="fa fa-envelope" aria-hidden="true"></i>Email: <a href='mailto:<?php the_field('email'); ?>'><?php the_field('email'); ?></a></p>
            <?php if( get_field('direct_phone_number') ): ?>
                <p><i class="fa fa-phone" aria-hidden="true"></i>Direct: <a href='tel:<?php the_field('direct_phone_number'); ?>'><?php the_field('direct_phone_number'); ?></a></p>
            <?php endif; ?>
            <?php if( get_field('cell_phone_number') ): ?>
                <p><i class="fa fa-phone" aria-hidden="true"></i>Cell: <a href='tel:<?php the_field('cell_phone_number'); ?>'><?php the_field('cell_phone_number'); ?></a></p>
            <?php endif; ?>
            <p><i class="fa fa-fax" aria-hidden="true"></i>Fax: <a href='tel:<?php the_field('fax_number'); ?>'><?php the_field('fax_number'); ?></a></p>
            <?php if( have_rows('licenses') ): ?>
            
            <h4>LICENSES</h4>
                
                <?php while ( have_rows('licenses') ) : the_row(); ?>
                
                        <p><?php the_sub_field('state'); ?>: <?php the_sub_field('license_number'); ?></p>
                        
                    <?php endwhile;
                
            endif; ?>
        </div>
        <div class="left">
            <div class='hide-xs'>
                <h2><?php echo the_title(); ?></h2>
                <?php if( have_rows('titles') ):
                
                    while ( have_rows('titles') ) : the_row(); ?>
                
                        <h4><?php the_sub_field('title'); ?></h4>
                        
                    <?php endwhile;
                
                endif; ?>
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