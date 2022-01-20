<?php

/**
 * Room Options Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'room-options-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'room-options';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container"> 
        <?php if( $heading = get_field( 'heading' ) ): ?>
            <h4 class="room-options__heading a-up"><?php echo $heading; ?></h4>
        <?php endif; ?>
        <?php if( have_rows( 'rooms' ) ): ?>
            <div class="room-options__row">
                <?php while( have_rows( 'rooms' )): the_row( ); 
                $image = get_sub_field( 'image' );
                $matterport = get_sub_field( 'matterport' );
                $bedroom = get_sub_field( 'bedroom' );
                $size = get_sub_field( 'size' );
                ?>
                    <div class="room-options__column">
                        <div class="room-options__col">
                            <div class="content">
                                <?php if( $matterport ): ?>
                                    <a href="<?php echo $matterport; ?>" class="matterport" target="_blank">
                                        <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 0L0 6V18.131L11 24L22 18.131V6.065L11 0V0ZM10 21.2L3.336 17.645L7.537 14.844C8.617 14.125 7.471 12.485 6.294 13.269L2 16.131V8.23L10 12.593V21.2ZM3.133 6.57L10 2.824V7.25C10 8.573 12 8.574 12 7.25V2.835L18.91 6.646L11.005 10.864L3.133 6.57ZM12 12.6L20 8.331V16.131L15.737 13.289C14.556 12.504 13.414 14.144 14.492 14.863L18.664 17.644L12 21.2V12.6Z" fill="white"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if( $size ): ?>
                                    <span class="size"><?php echo $size; ?> SQFT</span>
                                <?php endif; ?> 
                                <?php if( $bedroom ): ?>
                                    <h6 class="bedroom"><?php echo $bedroom; ?> Bedroom</h6>
                                <?php endif; ?>
                                <?php if( $image ): ?>
                                <img class="image lazyload"
                                    data-src="<?php echo $image['sizes']['room-options-card']; ?>" 
                                    data-srcset="<?php echo $image['sizes']['room-options-card-2x']; ?> 2x" 
                                    alt="">
                                <?php endif; ?>
                            </div>
                            <div class="buttons">
                                <button class="btn btn-view-detail" data-target="#room_options_slider_<?php echo get_row_index(); ?>">View Details</button>
                                <a href="<?php echo get_sub_field( 'booking_cta' ); ?>" class="btn btn--accent btn-reserve-now">
                                    Reserve Now
                                </a>
                            </div>
                        </div>
                        <div class="room-options__detail">
                            <?php if( have_rows( 'slides' ) ): ?>
                                <div class="slider">
                                    <div class="slides slides-images">
                                        <?php while(have_rows('slides')) : the_row(); ?>
                                            <div class="slide">
                                                <div class="slide-img">
                                                    <?php if ($image = get_sub_field('image')): ?>
                                                        <a href="<?php echo $image['url']; ?>" data-fancybox="gallery" rel="<?php echo $id; ?>" data-caption="<?php the_sub_field('caption'); ?>">
                                                            <img class="lazyload" data-src="<?php echo $image['sizes']['slide-image']; ?>" alt="<?php echo $image['alt']; ?>">
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($caption = get_sub_field('caption')) : ?>
                                                        <p class="slide-caption"><?php echo $caption; ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="tab-content__text">
                                <?php if ($title = get_sub_field('heading')) : ?>
                                    <h6 class="tab-content__title"><?php echo $title; ?></h6>
                                <?php endif; ?>
                                <?php if ($desc = get_sub_field('description')) : ?>
                                    <p class="tab-content__desc"><?php echo $desc; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if( have_rows( 'rooms' ) ): ?>
    <div class="tab tab-slider"> 
        <div class="container">
            <div class="tab-contents tab-slider__contents">
                <?php while( have_rows( 'rooms' ) ): the_row( ); ?>
                <div class="tab-content tab-slider__content" id="room_options_slider_<?php echo get_row_index(); ?>">
                    <?php if( have_rows( 'slides' ) ): ?>
                        <div class="slider">
                            <div class="slides slides-images">
                                <?php while(have_rows('slides')) : the_row(); ?>
                                    <div class="slide">
                                        <div class="slide-img">
                                            <?php if ($image = get_sub_field('image')): ?>
                                                <a href="<?php echo $image['url']; ?>" data-fancybox="gallery" rel="<?php echo $id; ?>" data-caption="<?php the_sub_field('caption'); ?>">
                                                    <img class="lazyload" data-src="<?php echo $image['sizes']['slide-image']; ?>" alt="<?php echo $image['alt']; ?>">
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($caption = get_sub_field('caption')) : ?>
                                                <p class="slide-caption"><?php echo $caption; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="tab-content__text">
                        <?php if ($title = get_sub_field('heading')) : ?>
                            <h6 class="tab-content__title"><?php echo $title; ?></h6>
                        <?php endif; ?>
                        <?php if ($desc = get_sub_field('description')) : ?>
                            <p class="tab-content__desc"><?php echo $desc; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
