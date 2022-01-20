<?php

/**
 * Title Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'title-text-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'title-text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$col = get_field( 'text_columns' ) == 1 ? 1 : 2;
$className .= ' col-' . $col;
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container title-text__inner">
        <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'title', 'o' => 'f', 't' => 'h2', 'tc' => 'title-text__title a-up' ) ); ?>
        <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'text', 'o' => 'f', 't' => 'div', 'tc' => 'title-text__text a-up a-delay-1' ) ); ?>
    </div>
</section>