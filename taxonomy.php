<?php
// This is page template for experience taxonomy
get_header(  );  
$slug = get_queried_object(  )->slug;
$name = get_queried_object(  )->name; 
$taxonomy = get_queried_object(  )->taxonomy; ?>
<?php if( $taxonomy == 'experience_category' || $taxonomy == 'experience_season') : ?>
    <section class="experience-taxonomy" >
        <div class="container">
            <h1 class="experience-taxonomy__heading">
                <?php echo $name; ?>
            </h1>
            <div class="category-selectors">
                <?php $categories = get_terms( array( 
                    'taxonomy' => 'experience_category',
                    'hide_empty' => false
                    ) );
                if( $categories ): ?>
                <div class="category-selector">
                    <select name="" id="" class="category-select main-category url-select">
                        <option value="<?php echo home_url( '/experiences' ); ?>">All Categories</option>
                        <?php foreach( $categories as $category ): ?>
                            <option value="<?php echo get_term_link( $category ); ?>" <?php echo ( $category->slug == $slug ) ? 'selected' : ''; ?> >
                                <?php echo $category->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>
                
                <?php $seasons = get_terms( array( 
                    'taxonomy' => 'experience_season',
                    'hide_empty' => false
                    ) );
                if( $seasons ): ?>
                <div class="category-selector">
                    <select name="" id="" class="category-select season-category url-select">
                        <option value="<?php echo home_url( '/experiences' ); ?>">All Seasons</option>
                        <?php foreach( $seasons as $season ): ?>
                            <option value="<?php echo get_term_link( $season ); ?>">
                                <?php echo $season->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php 
        if( have_posts( ) ): ?>
        <div class="experience-grid">
            <?php 
            while( have_posts( ) ): the_post( ); 
                global $post;
                get_template_part( 'templates/loop', 'experience-alt', array( 'post' => $post->ID ) );
            endwhile; ?>
        </div>
        <?php 
        else: ?>
            <div class="no-experience">
                <h3>No <?php echo $name; ?> experiences.</h3>
            </div>
        <?php endif;
        wp_reset_query(  ); ?>
    </section>
<?php else: ?>
    <div id="content" class="col_content">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'templates/content', 'post' ); ?>
		<?php endwhile; ?>
		
		<?php get_template_part( 'templates/pagination', 'post' ); ?>
		
	<?php else : ?>
		<?php get_template_part( 'templates/content', 'none' ); ?>
	<?php endif; ?>

	</div><!-- /content -->
<?php endif; ?>
<?php get_footer(); ?>