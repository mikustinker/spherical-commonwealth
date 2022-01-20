<?php

/**
 * Page Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'page-block-' . $block['id'];


// Create class attribute allowing for custom "className" and "align" values.
$className = 'page-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field( 'heading' );
$image = get_field( 'image' );
$title = get_field( 'title' );
$desc = get_field( 'description' );
$link = get_field( 'link' );
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if( $heading ) : ?>
            <h2 class="page-block__heading"><?php echo $heading; ?></h2>
        <?php endif; ?>
    </div>
    <div class="page-block__banner gradient-overlay">
        <?php if( $link ): ?>
        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
        <?php endif; ?>
            <img class="lazyload" data-src="<?php echo $image; ?>" alt="">
            <div class="page-block__banner--content">
                <?php if( $title ): ?>
                    <h2 class="page-block__banner--title"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if( $desc ): ?>
                    <p class="page-block__banner--desc"><?php echo $desc; ?></p>
                <?php endif; ?>
            </div>
        <?php if( $link ): ?>
            <span><?php echo $link['title']; ?></span>
        </a>
        <?php endif; ?>
    </div>
</div>