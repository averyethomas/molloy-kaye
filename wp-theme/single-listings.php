<?php
    get_header();
    
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
    
    $status = get_field('status');
    $i = 0;
    $j = 1;
?>
<div class="page listing" data-ng-controller="galleryCtrl">
    <div class="arrows">
        <div class="container">
            <button class="arrow" id="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
            <button class="arrow" id="next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="container">
        <div class="top">
            <div class="gallery">
                <div class="row single">
                    <?php $primImage = get_field('primary_photo'); ?>
                    <div class="item image" data-ng-style="{'background-image': 'url(' + primaryImage + ')'}" data-ng-click="openGallery(<?php echo $i++; ?>);">
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
                                            
                                            <div class="item image" data-ng-click="openGallery(<?php echo $i++; ?>);" data-ng-mouseover="changePrimary(<?php echo $j++; ?>)" data-ng-mouseleave="changePrimary(0)" style="background-image: url(<?php echo $image['url']; ?>);">
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                            </div>
                                        
                                        <?php elseif( get_row_layout() == 'video' ): ?>
                
                                            <div class="item video">
                                                
                                                <div class="video-inner">
                                                
                                                    <?php $source = get_sub_field('video_source');
                                                    
                                                    if($source == 'Vimeo'): ?>
                                                    
                                                        <iframe src="https://player.vimeo.com/video/<?php the_sub_field('video_id'); ?>" width="640" height="360" frameborder="0"></iframe>
                                                    
                                                    <?php elseif( $source == 'YouTube'): ?>
                                                    
                                                        <iframe src="https://www.youtube.com/embed/<?php the_sub_field('video_id'); ?>" width="640" height="360" frameborder="0"></iframe>
                                                    
                                                    <?php endif; ?>
                                                
                                                </div>
                                                
                                            </div>        
                                        <?php endif; ?>
                            
                                    
                                    <?php endwhile; ?> 
                                    
                                </div>
                    
                    <?php    elseif( get_row_layout() == 'double' ): ?>
                    
                                <div class="row double">
                                    
                                    <?php while ( have_rows('item') ) : the_row();
                                    
                                        if( get_row_layout() == 'image'):
                                        
                                            $image = get_sub_field('photo'); ?>
                                            
                                            <div class="item image" data-ng-click="openGallery(<?php echo $i++; ?>);" data-ng-mouseover="changePrimary(<?php echo $j++; ?>)" data-ng-mouseleave="changePrimary(0)" style="background-image: url(<?php echo $image['url']; ?>);">
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                            </div>
                                
                                        <?php elseif( get_row_layout() == 'video' ): ?>
                
                                            <div class="item video">
                                                
                                                <div class="video-inner">
                                                
                                                    <?php $source = get_sub_field('video_source');
                                                    
                                                    if($source == 'Vimeo'): ?>
                                                    
                                                        <iframe src="https://player.vimeo.com/video/<?php the_sub_field('video_id'); ?>" width="640" height="360" frameborder="0"></iframe>
                                                    
                                                    <?php elseif( $source == 'YouTube'): ?>
                                                    
                                                        <iframe src="https://www.youtube.com/embed/<?php the_sub_field('video_id'); ?>" width="640" height="360" frameborder="0"></iframe>
                                                    
                                                    <?php endif; ?>
                                                
                                                </div>
                                                
                                            </div>
                                            
                                        <?php endif; ?>
                                    
                                    <?php endwhile; ?>   
                                    
                                </div>
                            
                            <?php elseif( get_row_layout() == 'triple' ): ?>
                    
                                <div class="row triple">
                                    
                                    <?php while ( have_rows('item') ) : the_row();
                                    
                                        if( get_row_layout() == 'image'):
                                        
                                            $image = get_sub_field('photo'); ?>
                                            
                                            <div class="item image" data-ng-click="openGallery(<?php echo $i++; ?>);" data-ng-mouseover="changePrimary(<?php echo $j++; ?>)" data-ng-mouseleave="changePrimary(0)" style="background-image: url(<?php echo $image['url']; ?>);">
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                            </div>
                                
                                        <?php elseif( get_row_layout() == 'video' ): ?>
                
                                            <div class="item video">
                                                
                                                <div class="video-inner">
                                                
                                                    <?php $source = get_sub_field('video_source');
                                                    
                                                    if($source == 'Vimeo'): ?>
                                                    
                                                        <iframe src="https://player.vimeo.com/video/<?php the_sub_field('video_id'); ?>" width="640" height="360" frameborder="0"></iframe>
                                                    
                                                    <?php elseif( $source == 'YouTube'): ?>
                                                    
                                                        <iframe src="https://www.youtube.com/embed/<?php the_sub_field('video_id'); ?>" width="640" height="360" frameborder="0"></iframe>
                                                    
                                                    <?php endif; ?>
                                                
                                                </div>
                                                
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
                <h5><?php the_field('street_address'); ?><br><?php the_field('city_state'); ?></h5>
                <h5><?php the_field('price'); ?></h5>
                <p><b>Cap Rate:</b> <?php the_field('cap_rate'); ?></p>
                <?php if( get_field('gla') ): ?>
                    <p><b>GLA:</b> <?php the_field('gla'); ?></p> 
                <?php endif; ?>
                <?php if( get_field('lot_size') ): ?>
                    <p><b>Lot Size:</b> <?php the_field('lot_size'); ?></p>
                <?php endif; ?>
                <?php if( get_field('year_built') ): ?>
                    <p><b>Year Built:</b> <?php the_field('year_built'); ?></p>
                <?php endif; ?>
                <?php if( get_field('type_of_ownership') ): ?>
                    <p><b>Type of Ownership:</b> <?php the_field('type_of_ownership'); ?></p>
                <?php endif; ?>
                <?php if( get_field('lease_term') ): ?>
                    <p><b>Lease Term:</b> <?php the_field('lease_term'); ?></p>
                <?php endif; ?>
                <?php if( get_field('lease_type') ): ?>
                    <p><b>Lease Type:</b> <?php the_field('lease_type'); ?></p>
                <?php endif; ?>
                <p><b>Status:</b> <?php echo $status; ?></p>
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
        <div class="close-layer" data-ng-click="galleryOpen = !galleryOpen"></div>
        <div class="container">
            <div class="close-layer" data-ng-click="galleryOpen = !galleryOpen"></div>
            <button class="arrow" id="next" data-ng-click="change(1)"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
            <button class="arrow" id="prev" data-ng-click="change(-1)"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
            <div class="close" data-ng-click="galleryOpen = !galleryOpen"><span></span></div>
            <div class="image">
                <div class="close-layer" data-ng-click="galleryOpen = !galleryOpen"></div>
                <img data-ng-src="{{ selectedItem }}" />
            </div>
        </div>
    </div>
</div>
<a href="<?php the_field('offering_memorandum'); ?>" download id="download" hidden></a>
<script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        console.log("<?php the_field('offering_memorandum'); ?>");
        //window.open("<?php the_field('offering_memorandum'); ?>","_blank");
        document.getElementById('download').click();
    }, false );    
</script>
<?php

        endwhile;
    endif;

    get_footer();
    
?>