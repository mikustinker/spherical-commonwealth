<?php

/**
 * Experience Module Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'experiences-module-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'experience-taxonomy experiences-module';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php 
    if( $experiences = get_field( 'experiences' ) ): ?>
    <div class="experience-grid">
        <?php 
        foreach( $experiences as $key => $experience ): 
            get_template_part( 'templates/loop', 'experience-alt', array( 'post' => $experience, 'index' => $key ) );
        endforeach; ?>
    </div>
    <?php endif; ?>
    <?php if( count( $experiences) > 4 ): ?>
        <div class="experiences-module__cta--wrapper">
            <button class="btn experiences-module__cta a-up a-delay-1">
                View More
            </button>
        </div>
    <?php endif; ?>
</section>