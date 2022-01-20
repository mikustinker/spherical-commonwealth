<?php

/**
 * Venues Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'venues-slider-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'venues-slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if( $heading = get_field( 'heading' ) ): ?>
            <h2 class="venues-slider__heading a-up"><?php echo $heading; ?></h2>
        <?php endif; ?>
    </div>
    <?php if( $venues = get_field( 'venues' ) ): ?>
        <div class="venues-slider__carousel a-up a-delay-1">
            <?php foreach( $venues as $post ): ?>
                <?php get_template_part( 'templates/loop', 'venues', array( 'post' => $post ) ); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if( $cta = get_field( 'cta' ) ): ?>
        <div class="venues-slider__cta a-up a-delay-2">
            <a href="<?php echo $cta['url']; ?>" class="btn btn--accent" target="<?php echo $cta['target']; ?>">
                <?php echo $cta['title']; ?>
            </a>
        </div>
    <?php endif; ?>
</section>