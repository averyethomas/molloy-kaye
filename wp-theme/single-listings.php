<?php
    get_header();
    
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
    
    $status = get_field('status');
    $i = 0;
    $j = 1;
?>
<div class="page listing" data-ng-controller="galleryCtrl">
    <div class="container">
        <div class="top">
            <div class="gallery">
                <div class="row single">
                    <?php $primImage = get_field('primary_photo'); ?>
                    <div class="image" data-ng-style="{'background-image': 'url(' + primaryImage + ')'}" data-ng-click="openGallery(<?php echo $i++; ?>);">
                        <img src="<?php echo $primImage['url']; ?>" alt="<?php echo $primImage['alt']; ?>" />
                    </div>
                </div>
                <?php
                    
                    if( have_rows('gallery_row') ):
                    
                        while ( have_rows('gallery_row') ) : the_row();
                    
                            if( get_row_layout() == 'single' ): ?>
                    
                                <div class="row single">
                                    
                                    <?php while ( have_rows('item') ) : the_row();
                                    
                                        if( get_row_layout() == 'image'):
                                        
                                            $image = get_sub_field('single_photo'); ?>
                                            
                                            <div class="image" data-ng-click="openGallery(<?php echo $i++; ?>);" data-ng-mouseover="changePrimary(<?php echo $j++; ?>)" data-ng-mouseleave="changePrimary(0)" style="background-image: url(<?php echo $image['url']; ?>);">
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                            </div>
                                        
                                            
                                        <?php endif; ?>
                                    
                                    <?php endwhile; ?> 
                                    
                                </div>
                    
                    <?php    elseif( get_row_layout() == 'double' ): ?>
                    
                                <div class="row double">
                                    
                                    <?php while ( have_rows('item') ) : the_row();
                                    
                                        if( get_row_layout() == 'image'):
                                        
                                            $image = get_sub_field('photo'); ?>
                                            
                                            <div class="image" data-ng-click="openGallery(<?php echo $i++; ?>);" data-ng-mouseover="changePrimary(<?php echo $j++; ?>)" data-ng-mouseleave="changePrimary(0)" style="background-image: url(<?php echo $image['url']; ?>);">
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                            </div>
                                        
                                            
                                        <?php endif; ?>
                                    
                                    <?php endwhile; ?>   
                                    
                                </div>
                            
                    <?php    elseif( get_row_layout() == 'triple' ): ?>
                    
                                <div class="row triple">
                                    
                                    <?php while ( have_rows('item') ) : the_row();
                                    
                                        if( get_row_layout() == 'image'):
                                        
                                            $image = get_sub_field('photo'); ?>
                                            
                                            <div class="image" data-ng-click="openGallery(<?php echo $i++; ?>);" data-ng-mouseover="changePrimary(<?php echo $j++; ?>)" data-ng-mouseleave="changePrimary(0)" style="background-image: url(<?php echo $image['url']; ?>);">
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                            </div>
                                        
                                            
                                        <?php endif; ?>
                                    
                                    <?php endwhile; ?>
                                    
                                </div>       
                    
                    <?php   endif;
                    
                        endwhile;
                    
                    endif;
                    
                ?>
            </div>
            <div class="information">
                <h2><?php echo the_title(); ?></h2>
                <h6><?php the_field('street_address'); ?><br><?php the_field('city_state'); ?></h6>
                <h6><?php the_field('price'); ?></h6>
                <p>Cap Rate: <?php the_field('cap_rate'); ?></p>
                <?php if( get_field('gla') ): ?>
                    <p>GLA: <?php the_field('gla'); ?></p> 
                <?php endif; ?>
                <?php if( get_field('lot_size') ): ?>
                    <p>Lot Size: <?php the_field('lot_size'); ?></p>
                <?php endif; ?>
                <?php if( get_field('year_built') ): ?>
                    <p>Year Built: <?php the_field('year_built'); ?></p>
                <?php endif; ?>
                <?php if( get_field('type_of_ownership') ): ?>
                    <p>Type of Ownership: <?php the_field('type_of_ownership'); ?></p>
                <?php endif; ?>
                <?php if( get_field('lease_term') ): ?>
                    <p>Lease Term: <?php the_field('lease_term'); ?></p>
                <?php endif; ?>
                <?php if( get_field('lease_type') ): ?>
                    <p>Lease Type: <?php the_field('lease_type'); ?></p>
                <?php endif; ?>
                <p>Status: <?php echo $status; ?></p>
                <div class="download">
                    <button class="cta" data-ng-click="downloadModal = !downloadModal">Marketing Package</button>
                </div>
            </div>
        </div>
        <div class="highlights">
           <?php the_field('copy'); ?>
        </div>
        <div class="modal" id="form-modal" data-ng-show="downloadModal">
            <div class="close" data-ng-click="downloadModal = false"><span></span></div>
            <?php echo do_shortcode( '[contact-form-7 id="125" title="OM Download Form"]' ); ?>
        </div>
    </div>
    <div class="modal" id="gallery-modal" data-ng-show="galleryOpen">
        <div class="container">
            <div class="close" data-ng-click="galleryOpen = false"><span></span></div>
            <div class="arrows">
              <button id="next" data-ng-click="change(1)"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
              <button id="prev" data-ng-click="change(-1)"><i class="fa fa-angle-left" aria-hidden="true"></i>                </button>
            </div>
            <div class="image"><img data-ng-src="{{ selectedItem }}"/></div>
        </div>
    </div>
</div>
<script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        console.log("<?php the_field('offering_memorandum'); ?>");
    }, false );    
    //    location = '<?php the_field('offering_memorandum'); ?>
</script>
<?php

        endwhile;
    endif;

    get_footer();
    
?>