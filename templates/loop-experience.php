<?php
$id = $args['post'];
$title = get_the_title( $id );
$excerpt = get_the_excerpt( $id );
$cta = get_field('cta', $id);
if ($args['post_type'] == 'offer') :
    $image = get_field('image', $id);
    $img_src = $image['sizes']['offer-image'];
    $img_src_2x = $image['sizes']['offer-image-2x'];
    $day = get_the_date('d', $id);
    $month = get_the_date('M', $id);
else : 
    $img_src = get_the_post_thumbnail_url( $id, 'offer-image' );
    $img_src_2x = get_the_post_thumbnail_url( $id, 'offer-image-2x' );
    $day = tribe_get_start_date($id, false, 'd');
    $month = tribe_get_start_date($id, false, 'F');
endif; ?>
<article class="loop-culinary" data-id="<?php echo $id; ?>">
    <div class="loop-culinary__image">
        <a href="<?php echo get_the_permalink( $id ); ?>">
            <div class="img-a">
                <div class="img-a-img gradient-overlay">
                    <img data-src="<?php echo $img_src; ?>" 
                        data-srcset="<?php echo $img_src_2x; ?>" 
                        alt="<?php echo $title; ?>" class="loop-culinary__bg lazyload">
                </div>
            </div>
            <h6 class="loop-culinary__title a-up"><?php echo $title; ?></h6>
        </a>
    </div>
    <?php if( $args['post_type'] == 'experience' ): 
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
        } ?>
        <span class="loop-culinary__category a-up"><?php echo $term_name; ?></span>
    <?php else: ?>
    <div class="loop-culinary__date a-up a-delay-1">
        <span class="loop-culinary__date--day"><?php echo $day; ?></span>
        <span class="loop-culinary__date--month"><?php echo $month; ?></span>
    </div>
    <?php endif; ?>
    <div class="loop-culinary__content">
        <p class="loop-culinary__excerpt a-up a-delay-2"><?php echo $excerpt; ?></p>
    </div>
</article>