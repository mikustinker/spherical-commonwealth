<?php

/**
 * Custom Offers Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'offers-grid-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'offers-grid';
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
        <div class="offers-grid__content">
            <?php if( $heading = get_field( 'heading' ) ): ?>
                <h1 class="offers-grid__heading"><?php echo $heading; ?></h1>
            <?php endif; ?>
            <?php if( $subheading = get_field( 'sub_heading' ) ): ?>
                <h6 class="offers-grid__subheading"><?php echo $subheading; ?></h6>
            <?php endif; ?>
            <?php if( $description = get_field( 'description' ) ): ?>
                <div class="offers-grid__desc"><?php echo $description; ?></div>
            <?php endif; ?>
        </div>

        <div class="offer-selectors">
            <?php $categories = get_terms( array( 
                'taxonomy' => 'offer_category',
                'hide_empty' => false
                ) );
            if( $categories ): ?>
            <div class="offer-filters">
                <a href="#" data-category="" class="cta cta-reverse offer-filter active">All</a>
                <?php foreach( $categories as $category ): ?>
                    <a href="#" data-category="<?php echo $category->slug; ?>" class="cta cta-reverse offer-filter">
                        <?php echo $category->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="offer-selector">
                <select name="" id="" class="offer-select">
                    <option value="" selected>All</option>
                    <?php foreach( $categories as $category ): ?>
                        <option value="<?php echo $category->slug; ?>">
                            <?php echo $category->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php endif; ?>
        </div>
        
        <?php 
        $args = array(
            'post_type' => 'offer',
            'post_status' => 'publish',
            'posts_per_page' => 2
        ); 
        $offers = new WP_Query( $args ); 
        if( $offers->have_posts() ): ?>
        <div class="loop-offers" id="offers-grid">
            <?php 
            while( $offers->have_posts(  ) ): $offers->the_post( );
                get_template_part( 'templates/loop', 'offer', array( 'post' => get_the_ID(), 'show_more' => true ) );
            endwhile; ?> 
        </div>
        <?php endif; 
        if( $offers->max_num_pages > 1 ): ?>
        <div class="offers-grid__cta">
            <button class="btn btn--accent" id="load-more-offers" data-page="1">View More</button>
        </div>
        <?php 
        endif;
        wp_reset_query(  ); ?>
    </div>
</section>