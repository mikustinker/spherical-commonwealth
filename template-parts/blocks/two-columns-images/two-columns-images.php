<?php

/**
 * Two columns images Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'two-columns-images-' . $block['id'];


// Create class attribute allowing for custom "className" and "align" values.
$className = 'two-columns-images';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$is_slider = get_field( 'is_slider' );
$no_padding = get_field( 'no_padding' );
if( $is_slider ) {
    $className .= ' two-columns-images--slider';
}
if( $no_padding ) {
    $className .= ' no-padding';
}
?>
<?php if( have_rows( 'column' ) ): ?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php while( have_rows( 'column' ) ): the_row(); ?>
            <div class="column">
                <div class="column-inner">
                    <?php if( $image = get_sub_field( 'image' ) ): ?>
                        <a href="<?php echo $image['url']; ?>" 
                            class="column-image__wrapper gradient-overlay"
                            data-fancybox="gallery-<?php echo $id; ?>" 
                            data-caption="<?php the_sub_field( 'caption' ); ?>">
                            <img class="column-image" 
                                src="<?php echo $image['sizes']['two-columns-image']; ?>"
                                <?php echo $image['sizes']['two-columns-image-2x'] ? 'srcset="' . $image['sizes']['two-columns-image-2x'] . '"' : ''; ?> 
                                alt="<?php echo $image['alt']; ?>">
                        </a>
                    <?php endif; ?>
                    <?php if( $caption = get_sub_field( 'caption' ) ): ?>
                        <h6 class="column-caption a-up"><?php echo $caption; ?></h6>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<?php endif; ?>
