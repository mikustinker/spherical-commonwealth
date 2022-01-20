<?php
/* Template Name: Dining */
get_header(); ?>
<section class="dining-info">
    <div class="container">
        <div class="dining-info__inner">
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h1' ) ); ?>
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h6' ) ); ?>
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'description', 'o' => 'f', 't' => 'p' ) ); ?>
            <?php get_template_part_args( 'templates/content-module-cta', array( 'v' => 'cta', 'o' => 'f', 'c' => 'btn btn--accent dining-info__cta' ) ); ?>
        </div>
    </div>
</section>
<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array( 
    'post_type' => 'culinary',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'paged' => $paged
);
$query = new WP_Query( $args );
if( $query->have_posts() ): ?>
<section class="dinings">
    <div class="container">
        <div class="dining-grid">
            <?php while( $query->have_posts( ) ): $query->the_post(); 
                $id = get_the_ID(); ?>
                <div class="dining">
                    <?php $image = get_the_post_thumbnail_url( $id, 'venues' ); ?>
                    <a href="<?php echo get_the_permalink(  ); ?>" class="dining-image">
                        <picture>
                            <img src="<?php echo $image; ?>" alt="<?php echo get_the_title( ); ?>">
                        </picture>
                    </a>
                    <div class="dining-content">
                        <a href="<?php echo get_the_permalink( ); ?>" class="dining-title h6"><?php echo get_the_title( ); ?></a>
                        <p class="dining-excerpt">
                            <?php echo get_the_excerpt(  ); ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        
        <div class="pagination">
            <?php 
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $query->max_num_pages,
                    'current'      => max( 1, $paged ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => false,
                    'add_args'     => false,
                    'add_fragment' => '',
                ) );
            ?>
        </div>
    </div>
</section>
<?php endif; 
wp_reset_query(  ); ?>
<?php get_footer(); ?>
