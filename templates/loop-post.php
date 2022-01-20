<?php global $post; ?>
<article class="loop-post">
    <div class="loop-post__img">
        <?php 
        $img = get_the_post_thumbnail_url( $post, 'venues' );
        $img_2x = get_the_post_thumbnail_url( $post, 'venues-2x' ); ?>
        <a href="<?php echo get_the_permalink( $post ); ?>">
            <img src="<?php echo $img; ?>"
                srcset="<?php echo $img_2x; ?> 2x" 
                alt="<?php echo get_the_title( $post ); ?>">
        </a>
    </div>
    <div class="loop-post__content">
        <a href="<?php echo get_the_permalink( $post ); ?>" class="loop-post__title">
            <h2><?php echo get_the_title( $post ); ?></h2>
        </a>
        <p class="loop-post__excerpt"><?php echo get_the_excerpt( $post ); ?></p>
    </div>
</article>