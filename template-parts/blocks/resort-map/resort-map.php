<?php

/**
 * Resort Map Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'resort-map-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'resort-map';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$map = get_field( 'map' );
$heading = get_field( 'heading' );
$content = get_field( 'content' );
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( $map ): ?> 
    <div class="resort-map__bg">
        <div class="resort-map__canvas">
            <img class="lazyload" data-src="<?php echo $map; ?>" alt="Resort Map">
            <?php if( have_rows( 'points' ) ): ?>
                <div class="resort-points">
                    <?php while( have_rows( 'points' ) ): the_row(); ?>
                        <button class="resort-point">
                            <div class="resort-point__mark">
                                <span class="resort-point__mark--inner"></span>
                            </div>
                            <div class="resort-popup">
                                <div class="resort-popup__inner">
                                    <?php if( $image = get_sub_field( 'image' ) ): ?>
                                    <div class="resort-popup__img">
                                        <img class="lazyload" data-src="<?php echo $image['sizes']['resort-map-popup']; ?>"
                                            data-srcset="<?php echo $image['sizes']['resort-map-popup-2x']; ?> 2x" alt="">
                                    </div>
                                    <?php endif; ?>
                                    <?php if( $name = get_sub_field( 'name' ) ): ?>
                                    <div class="resort-popup__text">
                                        <?php echo $name; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </button>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
    <?php endif; ?>
    <div class="resort-map__content">
        <div class="resort-map__content--inner">
            <?php if( $heading ): ?>
                <h1 class="resort-map__heading a-up"><?php echo $heading; ?></h1>
            <?php endif; ?>
            <?php if( $content ): ?>
                <div class="resort-map__text a-up a-delay-1"><?php echo $content; ?></div>
            <?php endif; ?>
        </div>
    </div>
</section>