<?php 
global $post; 
$img_url = get_the_post_thumbnail_url( $post, 'loop-press' );
$img_url_2x = get_the_post_thumbnail_url( $post, 'loop-press' );
$date_string = get_field( 'date', $post );
if( $date_string ):
    $dateObj = DateTime::createFromFormat( 'Ymd', $date_string );
    $date = $dateObj->format('m.d.Y');
else: 
    $date = get_the_date( 'm.d.Y', $post );
endif; 
$link = get_field( 'url', $post );
?>
<article class="loop-press" data-id="<?php echo $post->ID; ?>">
    <a href="<?php echo $link; ?>" target="_blank">
        <div class="loop-press__image">
            <img src="<?php echo $img_url; ?>"
            srcset="<?php echo $img_url_2x; ?> 2x" alt="">
        </div>
        <div class="loop-press__content">
            <h6 class="loop-press__title"><?php echo get_the_title( $post ); ?></h6> 
            <p class="loop-press__desc"><?php echo get_the_excerpt( $post ); ?></p>
        </div>
    </a>
</article>