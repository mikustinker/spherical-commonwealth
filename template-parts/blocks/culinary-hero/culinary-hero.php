<?php

/**
 * Single Room Booking Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'culinary-hero-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'culinary-hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$left_image = get_field( 'left_image' );
$right_image = get_field( 'right_image' );
$logo = get_field( 'logo' );
if( $logo ) $className .= ' has-logo';
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="culinary-hero__images">
        <?php if( $left_image ): ?>
            <div class="culinary-hero__image">
                <img class="lazyload" 
                    data-src="<?php echo $left_image['sizes']['culinary-hero']; ?>"
                    data-srcset="<?php echo $left_image['sizes']['culinary-hero-2x']; ?>" alt="">
            </div>
        <?php endif; ?>
        <?php if( $right_image ): ?>
            <div class="culinary-hero__image right-image">
                <img class="lazyload"
                    data-src="<?php echo $right_image['sizes']['culinary-hero']; ?>"
                    data-srcset="<?php echo $right_image['sizes']['culinary-hero-2x']; ?>" alt="">
            </div>
        <?php endif; ?> 
    </div>
    <?php if( $logo ): ?>
        <div class="culinary-hero__logo">
            <img data-src="<?php echo $logo['url']; ?>" 
                alt="<?php echo $logo['alt']; ?>" class="lazyload">
        </div>
    <?php endif; ?>
</section>
