<?php
$id = $args['post'];
$index = $args['index'];
$img_src = get_the_post_thumbnail_url( $id, 'experience-masonry' );
$img_src_2x = get_the_post_thumbnail_url( $id, 'experience-masonry-2x' );
$title = get_the_title( $id );
$permalink = get_the_permalink( $id ); 
$terms = get_the_terms( $id, 'experience_category');
if ( $terms ) {
    foreach ($terms as $key=>$term) {
        $term_name .= $term->name;
        $class_name .= $term->slug;
        if ($key < count($terms) - 1) {
            $term_name .= ' | ';
            $class_name .= ' ';
        }
    }
} 
?>
<article class="loop-experience <?php echo $index > 3 ? 'hide' : ''; ?>" data-id="<?php echo $id; ?>">
    <div class="loop-experience__image">
        <a href="<?php echo $permalink; ?>">
            <img data-src="<?php echo $img_src; ?>" 
                data-srcset="<?php echo $img_src_2x; ?>" 
                alt="<?php echo $title; ?>" class="loop-experience__bg lazyload">
        </a>
        <span class="loop-experience__category a-up">
            <?php echo $term_name; ?>
        </span>
    </div>

    <a href="<?php echo $permalink; ?>" class="loop-experience__title a-up">
        <h6><?php echo $title; ?></h6>
    </a>
</article>