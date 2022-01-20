<?php

/**
 * Custom Wysiwig Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'custom-wysiwig-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'custom-wysiwig';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$content = get_field('content'); 
?>
<?php if ($content) : ?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> a-up">
    <div class="container">
        <div class="custom-wysiwig__inner">
            <?php echo $content; ?>
        </div>
    </div>
</section>
<?php endif; ?>