<?php

/**
 * General Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'wedding-hero-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'wedding-hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$images = get_field( 'images' );
$heading = get_field( 'heading' );
$opacity = get_field( 'gradient_opacity' );
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( $images ): ?>
        <div class="wedding-hero__images gradient-overlay">
            <?php foreach( $images as $image ): ?>
                <div class="wedding-hero__image">
                    <img class="lazyload" 
                        data-src="<?php echo $image['sizes']['wedding-hero']; ?>" 
                        data-srcset="<?php echo $image['sizes']['wedding-hero-2x']; ?> 2x" 
                        alt="">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if( $heading ): ?>
        <h1 class="wedding-hero__heading"><?php echo $heading; ?></h1>
    <?php endif; ?>
</section>

<style>
    #<?php echo $id; ?> .wedding-hero__images::after {
        opacity: <?php echo floatval(intval($opacity) / 100); ?> !important;
    }
</style>