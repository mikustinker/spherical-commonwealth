<?php

/**
 * Media Content Map Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'media-content-map-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'media-content media-content-map';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$image = get_field('image');
$heading = get_field('heading');
$sub_heading = get_field('sub_heading');
$text = get_field('text');
$cta = get_field('cta');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if ($image) : ?>
            <div class="media-content__media">
                <div class="media-content__media--inner">
                <?php 
                    get_template_part( 'templates/content-module', 'media', array(
                        'image' => $image,
                    ) );
                ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="media-content__content">
            <?php if ($heading) : ?>
                <h2 class="media-content__title a-up"><?php echo $heading; ?></h2>
            <?php endif; ?>
            <?php if ($sub_heading) : ?>
                <h6 class="media-content__subtitle a-up a-delay-1"><?php echo $sub_heading; ?></h6>
            <?php endif; ?>
            <?php if ($text) : ?>
                <div class="media-content__text a-up a-delay-2">
                    <?php echo $text; ?>
                </div>
            <?php endif; ?>
            <?php if (have_rows('links')) : ?>
                <div class="media-content__links a-up a-delay-3">
                    <?php while (have_rows('links')) : the_row(); 
                    $link = get_sub_field('link'); ?>
                        <?php if( $link['url'] == '#' ): ?>
                            <span class="btn media-content__link dead-link">
                                <?php echo $link['title']; ?>
                            </span>
                        <?php else: ?>
                            <a href="<?php echo $link['url']; ?>" class="btn media-content__link" target="<?php echo $link['target']; ?>">
                                <?php echo $link['title']; ?>
                            </a>    
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>