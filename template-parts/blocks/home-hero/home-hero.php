<?php

/**
 * Home Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'home-hero-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home-hero home-hero__carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="home-hero__slider">
        <?php if( have_rows( 'slides' ) ): ?>
            <?php while( have_rows( 'slides' ) ): the_row(); ?>
                <div class="home-hero__slide">
                    <?php if( $video = get_sub_field( 'video' ) ): ?>
                        <video loop autoplay playsinline muted preload="metadata" src="<?php echo $video; ?>">
                            <source src="<?php echo $video; ?>" type="video/mp4">
                        </video>
                        <a class="home-hero__play" href="<?php echo $video; ?>" data-fancybox>
                            <svg width="103" height="103" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="51.5" cy="51.5" r="50.5" fill="black" fill-opacity="0.25" stroke="white" stroke-width="2"/>
                                <path d="M66.6016 51.4999L43.9493 64.5782L43.9493 38.4217L66.6016 51.4999Z" fill="#F5F6F1"/>
                            </svg>
                        </a>
                    <?php else: ?>
                        <?php get_template_part_args( 'templates/content-module-image', array( 'v' => 'image', 'v2x' => false, 'c' => 'home-hero__bg lazyload' ) ); ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'content', 'o' => 'f', 't' => 'div', 'tc' => 'home-hero__content') ); ?>
</section>