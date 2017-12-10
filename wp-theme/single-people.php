<?php
    get_header();
    
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
?>
<div class="page people">
    <div class="container">
        <div class='visible-xs'>
            <h1><?php echo the_title(); ?></h1>
        </div>
        <div class="right">
            <?php 

                $image = get_field('photo');
                
                if( !empty($image) ): ?>
                
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>
            <?php if( have_rows('titles') ):
                
                    while ( have_rows('titles') ) : the_row(); ?>
                
                        <h4><?php the_sub_field('title'); ?></h4>
                        
                    <?php endwhile;
                
                endif; ?>
            <div class="contact">    
                <p><i class="fa fa-envelope" aria-hidden="true"></i><a href='mailto:<?php the_field('email'); ?>'><?php the_field('email'); ?></a></p>
                <?php if( get_field('cell_phone_number') ): ?>
                    <p><i class="fa fa-mobile" aria-hidden="true"></i><a href='tel:<?php the_field('cell_phone_number'); ?>'><?php the_field('cell_phone_number'); ?></a></p>
                <?php endif; ?>
                <?php if( get_field('direct_phone_number') ): ?>
                    <p><i class="fa fa-phone" aria-hidden="true"></i><a href='tel:<?php the_field('direct_phone_number'); ?>'><?php the_field('direct_phone_number'); ?></a></p>
                <?php endif; ?>
                <p><i class="fa fa-fax" aria-hidden="true"></i><a href='tel:<?php the_field('fax_number'); ?>'><?php the_field('fax_number'); ?></a></p>
                <?php if( get_field('linkedin') ): ?>
                    <p><i class="fa fa-linkedin-square" aria-hidden="true"></i><a target='_blank' href='<?php the_field('linkedin'); ?>'>LinkedIn Profile</a></p>
                <?php endif; ?>
                <?php if( get_field('vcard') ): ?>
                    <p><i class="fa fa-address-card-o" aria-hidden="true"></i><a target='_blank' href='<?php the_field('vcard'); ?>'>Download vCard</a></p>
                <?php endif; ?>
                <?php if( have_rows('licenses') ): ?>
            </div>
            <div class="licenses">
                <h5>LICENSES</h5>
                    
                    <?php while ( have_rows('licenses') ) : the_row(); ?>
                    
                            <p><?php the_sub_field('state'); ?>: <?php the_sub_field('license_number'); ?></p>
                            
                        <?php endwhile;
                    
                endif; ?>
            </div>
        </div>
        <div class="left">
            <div class='hide-xs'>
                <h2><?php echo the_title(); ?></h2>
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