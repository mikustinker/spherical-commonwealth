<?php 
/**
 * Custom Press Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'press-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'press';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$heading = get_field( 'heading' );
$text = get_field( 'text' ); 
$terms = get_terms( array(
    'taxonomy' => 'press_category',
    'hide_empty' => false,
) );
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container">
        <?php if( $heading ): ?>
		<h1 class="press-heading"><?php echo $heading; ?></h1>
        <?php endif; ?>
        <?php if( $text ): ?>
            <div class="press-content">
                <?php echo $text; ?>
            </div>
        <?php endif; ?>
		<?php if( $terms ): ?>
		<div class="press-filter">
			<ul class="press-links">
				<li><a class="cta cta-reverse press-link active" href="#" data-category="">All</a></li>
				<?php foreach( $terms as $term ): ?>
					<li>
                        <a class="cta cta-reverse press-link" href="#" data-category="<?php echo $term->slug; ?>">
                            <?php echo $term->name; ?>
                        </a>
                    </li>
				<?php endforeach; ?>
			</ul>
            <div class="press-selector">
                <select class="press-select" jcf>
                    <option value="" selected>All</option>
                    <?php foreach( $terms as $term ): ?>
                        <option value="<?php echo $term->slug; ?>">
                            <?php echo $term->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
		</div>
		<?php endif; ?>
        <?php
        $args = array(
            'post_type' => 'press',
            'post_status' => 'publish',
            'posts_per_page' => 6
        ); 
        $press = new WP_Query( $args ); 
        if( $press->have_posts() ): ?>
        <div class="press-grid">
            <?php 
                while( $press->have_posts() ): $press->the_post(); 
                    get_template_part( 'templates/loop', 'press', array( 'post' => get_the_ID() ) );
                endwhile;
            ?>
        </div>
        <?php endif; 
        wp_reset_query(  ); ?>
        <div class="pagination">
            <?php 
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $press->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
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
