<?php

/**
 * Spa Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'spa-hero-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'spa-hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$image = get_field('image');
$video = get_field('video');
$treatment = get_field('treatment');
$opacity = get_field('gradient_opacity');
$height = get_field('height');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="home-hero">
        <?php if ($video) : ?>
            <video loop autoplay playsinline class="home-hero__bg" muted preload="metadata" src="<?php echo $video; ?>" poster="<?php echo $bg; ?>">
                <source src="<?php echo $video; ?>" type="video/mp4">
            </video>
            <button class="btn-audio">
                <span class="btn-audio--play">
                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="4" width="4" height="11" fill="white"/>
                        <rect x="6" width="4" height="15" fill="white"/>
                        <rect x="12" y="2" width="4" height="13" fill="white"/>
                    </svg>
                </span>
                <span class="btn-audio--mute">
                    <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="4" height="15" fill="white"/>
                        <rect x="6" width="4" height="15" fill="white"/>
                    </svg>
                </span>
            </button>
        <?php else: ?>
            <img data-src="<?php echo $image; ?>" alt="" class="home-hero__bg lazyload">
        <?php endif; ?>
    </div>
    <?php if( $treatment ) : ?>
    <div class="spa-hero__inner">
        <div class="container">
            <div class="treatment">
                <?php echo get_template_part( 'templates/content-module', 'media', array( 'image' => $treatment['image'] ) ); ?>
                <?php if( $treatment['caption'] ) : ?>
                    <span class="treatment-caption a-up a-delay-3"><?php echo $treatment['caption']; ?></span>
                <?php endif; ?>
                <?php if( $treatment['title'] ) : ?>
                    <a href="<?php echo $treatment['link']; ?>" class="treatment-title a-up a-delay-4">
                        <?php echo $treatment['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>

<style>
    #<?php echo $id; ?> .home-hero::after {
        opacity: <?php echo floatval(intval($opacity) / 100); ?> !important;
    }
</style>