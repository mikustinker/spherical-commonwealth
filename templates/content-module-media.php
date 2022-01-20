<?php 
$video = $args['video'];
$image = $args['image']; 
$is = $args['is'];
$is_2x = $args['is_2x'] ? $args['is_2x'] : $args['is'] . '-2x';
if( $image ):  
    if( $is ) : 
        $image_url = $image['sizes'][$is];
        $image_url_2x = $image['sizes'][$is_2x];
    else: 
        $image_url = $image['url'];
    endif;
endif;
?>
<?php if ($video) : ?>
    <div class="img-a-video">
        <?php if ($image): ?>
            <img class="lazyload" 
                data-src="<?php echo $image_url; ?>" 
                <?php echo !empty($image_url_2x) ? 'data-srcset="' . $image_url_2x . ' 2x"' : ''; ?>>
        <?php endif; ?>
        <div class="img-a-bg-video">
            <video loop autoplay playsinline muted preload="metadata" src="<?php echo $video; ?>" poster="<?php echo $image_url; ?>">
                <source src="<?php echo $video; ?>" type="video/mp4">
            </video>
        </div>
    </div>
<?php elseif ($image) : ?>
    <img class="lazyload" 
    data-src="<?php echo $image_url; ?>" 
    <?php echo !empty($image_url_2x) ? 'data-srcset="' . $image_url_2x . ' 2x"' : ''; ?>>
<?php endif; ?>