<?php

/**
 * Media Content Intro Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'media-content-intro-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'media-content media-content-intro  media-content--left';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}                                                            
// Load values and assign defaults.
$background = get_field( 'background' );
$image = get_field('image');
$video = get_field('video');
$heading = get_field('heading');
$sub_heading = get_field('sub_heading');
$text = get_field('text');
$cta = get_field('cta');
?>
<section id="<?php echo esc_attr($id); ?>" 
        class="<?php echo esc_attr($className); ?>">
    <?php get_template_part_args( 'templates/content-module-image', array( 'v' => 'background', 'o' => 'f', 'c' => 'media-content-intro__bg', 'is_2x' => false ) ); ?>
    <div class="container">
        <?php get_template_part_args( 'templates/content-module-cta', array( 'v' => 'booking_cta', 'o' => 'f', 'c' => 'btn btn-booking btn-booking--mobile  a-up' ) ); ?>
        <?php if ($image || $video) : ?>
            <div class="media-content__media a-left">
                <?php 
                    get_template_part( 'templates/content-module', 'media', array(
                        'image' => $image,
                        'video' => $video,
                        'is' => 'media-content-intro'
                    ) );
                ?>
            </div>
        <?php endif; ?>
        <div class="media-content__content">
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'heading', 't' => 'h2', 'o' => 'f', 'tc' => 'media-content__title a-up' ) ); ?>
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'text', 't' => 'div', 'o' => 'f', 'tc' => 'media-content__text a-up a-delay-1' ) ); ?>
            <?php get_template_part_args( 'templates/content-module-cta', array( 'v' => 'booking_cta', 'o' => 'f', 'c' => 'btn btn-booking btn-booking--pc a-up a-delay-2' ) ); ?>
            <?php get_template_part_args( 'templates/content-module-cta', array( 'v' => 'cta', 'o' => 'f', 'c' => 'link-arrow a-up a-delay-3', 'w' => 'div' ) ); ?>
        </div>
    </div>
</section>