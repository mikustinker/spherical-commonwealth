<?php

/**
 * Media Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'media-content-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'media-content media-content--original';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$image = get_field('image');
$video = get_field('video');
$images = get_field( 'images' ); 
$heading = get_field('heading');
$text = get_field('text');
$cta = get_field('cta');
$caption = get_field( 'caption' );

$direction = get_field('content_direction');
$text_align = get_field( 'text_align' );
$no_padding = get_field( 'no_padding' );
$cta_type = get_field( 'cta_type' );
$wide_image = get_field( 'wide_image' );
if( $direction == true ) $className .= ' media-content--left';
if( $no_padding == true ) $className .= ' no-padding';
if( $images ) $className .= ' has-slides';
if( $wide_image ) $className .= ' wide-image';
$className .= ' text-' . $text_align;
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if( $images ): ?>
            <div class="media-content__media">
                <div class="media-content__carousel">
                    <?php foreach( $images as $slide_image ): ?>
                        <div class="media-content__slide">
                            <?php get_template_part( 'templates/content-module', 'media', array( 'image' => $slide_image ) ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php elseif ($image || $video) : ?>
            <div class="media-content__media">
                <?php 
                    get_template_part( 'templates/content-module', 'media', array(
                        'image' => $image,
                        'video' => $video
                    ) );
                ?>
                <?php if( $caption ): ?>
                    <span class="media-content__caption"><?php echo $caption; ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="media-content__content<?php echo $cta ? '' : ' no-cta'; ?>">
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h6', 'tc' => 'media-content__subheading a-up' ) ); ?>
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h2', 'tc' => 'media-content__title a-up' ) ); ?>
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'text', 'o' => 'f', 't' => 'div', 'tc' => 'media-content__text a-up a-delay-1' ) ); ?>
            <?php if( have_rows( 'accordion' ) ): ?>
                <div class="media-content__accordions a-up a-delay-2">
                    <?php if (have_rows('accordion')) : ?>
                        <?php while (have_rows('accordion')) : the_row(); ?>
                            <div class="accordion">
                                <?php if ($title = get_sub_field('heading')) : ?>
                                    <div class="accordion-title"><?php echo $title; ?></div>
                                <?php endif; ?>
                                <?php if ($content = get_sub_field('content')) : ?>
                                    <div class="accordion-content">
                                        <div class="accordion-content__inner">
                                            <?php echo $content; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($cta) : ?>
                <?php 
                if( $cta_type == 'button' ): 
                    $btn_class = 'btn btn--accent media-content__btn a-up a-delay-2';
                else: 
                    $btn_class = 'cta media-content__cta a-up a-delay-2';
                endif; ?>
                <a href="<?php echo $cta['url']; ?>" 
                    class="<?php echo $btn_class; ?>" 
                    target="<?php echo $cta['target']; ?>">
                    <?php echo $cta['title']; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>