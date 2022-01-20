<?php

/**
 * Venues Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'venues-module' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'venues-module';
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
        <div class="venues-module__info">
            <div class="venues-module__info--inner">
                <?php if( $heading = get_field( 'heading' ) ): ?>
                    <h1 class="venues-module__heading a-up"><?php echo $heading; ?></h1>
                <?php endif; ?>
                <?php if( $subheading = get_field( 'sub_heading' ) ): ?>
                    <h6 class="venues-module__subheading a-up a-delay-1"><?php echo $subheading; ?></h6>
                <?php endif; ?>
                <?php if( $text = get_field( 'content' ) ): ?>
                    <div class="venues-module__text a-up a-delay-2">
                        <?php echo $text; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php 
            $terms = get_terms([
                'taxonomy'      => 'venue_category',
                'hide_empty'    => false,
            ]);
            if ($terms) : ?>
            <div class="venues-module__filter a-up a-delay-3">
                <div class="venues-module__filter--selects">
                    <select class="venues-module__filter--select" jcf>
                        <option value="">All</option>
                        <?php foreach ($terms as $term) : ?>
                            <option value="<?php echo $term->slug; ?>">
                                <?php echo $term->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php 
        $args = array(
            'post_type'             => 'venue',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => true,
            'posts_per_page'        => -1
        ); 
        $query = new WP_Query($args);
        if ($query->have_posts()) : ?>
        <div class="venues-module__grid">
            <?php while ($query->have_posts()) : $query->the_post(); 
                global $post;
                get_template_part('templates/loop', 'venues', array( 'post' => $post ) );
            endwhile; ?>
        </div>
        <?php endif;
        wp_reset_query(  ); ?>
    </div>
</section>