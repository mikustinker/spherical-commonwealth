<?php

/**
 * Destination Map Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'destination-map-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'destination-map';
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
        <div class="destination-map__inner">
            <div class="destination-map__content">
                <?php if( $heading = get_field( 'heading' ) ): ?>
                    <h6 class="destination-map__heading"><?php echo $heading; ?></h6>
                <?php endif; ?>
                <?php if( $content = get_field( 'content' ) ): ?>
                    <div class="destination-map__text"><?php echo $content; ?></div>
                <?php endif; ?>
            </div>
            <?php if( $experiences = get_field( 'featured_experience' ) ): ?>
                <?php foreach( $experiences as $experience ): ?>
                    <a href="<?php echo get_the_permalink( $experience ); ?>" class="destination-map__experience">
                        <h3 class="destination-map__experience--heading">Featured Experience</h3>
                        <div class="destination-map__experience--image">
                            <img src="<?php echo get_the_post_thumbnail_url( $experience ); ?>" alt="">
                            <h6 class="destination-map__experience--title"><?php echo get_the_title( $experience ); ?></h6>
                        </div>
                        <p class="destination-map__experience--desc"><?php echo get_the_excerpt( $experience ); ?></p>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php 
    $args = array(
        'post_type' => 'location',
        'post_status' => 'publish',
    );
    $locations = new WP_Query( $args );
    $i = 0;
    if( $locations->have_posts() ): ?>
    <div class="destination-map__bg">
        <div class="map acf-map" data-zoom="16">
            <?php while( $locations->have_posts() ): $locations->the_post(); 
            $id = get_the_ID();
            if( $location = get_field( 'location', $id ) ): ?>
            <div class="marker" 
                id="mapmarker-<?php echo $i; ?>" 
                data-lat="<?php echo esc_attr($location['lat']); ?>" 
                data-lng="<?php echo esc_attr($location['lng']); ?>" 
                data-id="<?php echo $id; ?>" 
                data-icon="<?php echo get_field( 'location_image', $id ); ?>">
                <?php if( $experiences = get_field( 'posts', $id ) ): 
                    foreach( $experiences as $experience ): ?>
                    <div class="marker-popup">
                        <div class="marker-img">
                            <img src="<?php echo get_the_post_thumbnail_url( $experience ); ?>" alt="<?php echo get_the_title( $experience ); ?>">
                            <?php $terms = get_the_terms( $experience, 'experience_category' ); 
                            if( $terms ): ?>
                            <h6 class="marker-cat"><?php echo $terms[0]->name; ?></h6>
                            <?php endif; ?>
                        </div>
                        <div class="marker-content">
                            <h6 class="marker-title"><?php echo get_the_title( $experience ); ?></h6>
                            <p class="marker-excerpt"><?php echo get_the_excerpt( $experience ); ?></p>
                            <span></span>
                        </div>
                    </div>
                <?php endforeach;
                endif; ?>
            </div>
            <?php endif;
            $i ++;
            endwhile; ?>
        </div>
    </div>
    <div class="destination-map__select">
        <div class="destination-map__select--inner">
            <select name="" id="destination-map__select">
                <option value="">We'll point you in the right direction</option>
                <?php 
                $i = 0;
                while( $locations->have_posts() ): $locations->the_post(); ?>
                    <option value="<?php echo $i; ?>">
                        <?php echo get_the_title(); ?>
                    </option>
                <?php 
                $i++;
                endwhile; ?>
            </select>
        </div>
    </div>
    <?php endif; 
    wp_reset_query(  ); ?>
</section>