<?php

/**
 * RFP Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'rfp-form-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'rfp-form';
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
            <h2 class="rfp-form__heading a-up"><?php echo $heading; ?></h2>
        <?php endif; ?>
        <?php if( $content = get_field( 'content' ) ): ?>
            <div class="rfp-form__content a-up a-delay-1"><?php echo $content; ?></div>
        <?php endif; ?> 
        <div class="form contact-form a-up a-delay-2">
            <?php 
                $form = get_field( 'form' ) ?: get_field( 'rfp_form', 'option' ); 
                echo do_shortcode( $form ); 
            ?>
        </div>
    </div>
</section>