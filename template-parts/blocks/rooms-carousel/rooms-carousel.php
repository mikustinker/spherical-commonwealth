<?php

/**
 * Rooms Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'rooms-carousel-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'rooms-carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$category = get_field( 'rooms_type' );
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="rooms-carousel__top">
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h2', 'tc' => 'rooms-carousel__heading' ) ); ?>
            <div class="rooms-carousel__controls">
                <button class="slider-row active">
                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 0H0V20H21V0Z" fill="#B7B7B7"/>
                    </svg>
                </button>
                <button class="slider-column">
                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 0H0V8H21V0Z" fill="#B7B7B7"/>
                        <path d="M21 12H0V20H21V12Z" fill="#B7B7B7"/>
                    </svg>
                </button>
            </div>
        </div>
       <div class="rooms-slider">
            <?php 
            $args = array(
                'post_type'         => 'room',
                'post_status'       => 'publish',
                'posts_per_page'    => -1,
                'tax_query'         => array(
                    array(
                        'taxonomy'  => 'room_category',
                        'field'     => 'term_id',
                        'terms'     => $category
                    )
                )
            );
            $query = new WP_Query( $args );
            if( $query->have_posts( ) ) : 
                while( $query->have_posts( ) ) : $query->the_post();
                    get_template_part('templates/loop', 'room');
                endwhile;
            endif; 
            wp_reset_query(  );
            ?>
       </div>
    </div>
</section>