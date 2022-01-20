<?php

/**
 * Post Two Cols Alt Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'post-two-cols-' . $block['id'];


// Create class attribute allowing for custom "className" and "align" values.
$className = 'post-two-cols';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field('heading');
$content = get_field( 'content' );
$posts = get_field( 'posts' );
$cta = get_field( 'cta' );
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="post-two-cols__inner <?php echo empty( $content ) ? 'no-content' : '';  ?>">
            <?php if ($heading) : ?>
                <h2 class="post-two-cols__heading a-up"><?php echo $heading; ?></h2>
            <?php endif; ?>
            <?php if( $content ) : ?>
                <div class="post-two-cols__content a-up a-delay-1"><?php echo $content; ?></div>
            <?php endif; ?>
        </div>
        <?php if( $posts ) : ?> 
            <div class="post-two-cols__posts">
                <?php foreach( $posts as $post ) : 
                    $type = get_post_type( $post ); ?>
                    <div class="post-two-cols__post">
                        <div class="post-two-cols__post--inner">
                            <?php 
                            if( $pdf = get_field( 'pdf', $post ) ): 
                                $url = $pdf;
                                $target = "_blank";
                            else: 
                                $url = get_the_permalink( $post );
                            endif; ?>
                            <a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
                                <?php 
                                $image = get_field( 'image', $post );
                                if( $type == 'venue' || $type == 'offer'): 
                                    $image = $image['url'];
                                elseif( $type == 'experience' ): 
                                    $image = get_the_post_thumbnail_url( $post );
                                endif; 
                                get_template_part( 'templates/content-module', 'media', array( 'image' => $image ) ); 
                                ?>
                                <h6 class="post-two-cols__post--title a-up"><?php echo get_the_title( $post ); ?></h6>
                                <?php if( $type == 'venue' ): ?>
                                    <div class="post-two-cols__post--info">
                                        <?php if( $cap = get_field( 'cap', $post ) ): ?>
                                            <span>CAP : <?php echo $cap; ?></span>
                                        <?php endif; ?>
                                        <span class="separater"></span>
                                        <?php if( $size = get_field( 'size', $post ) ): ?>
                                            <span><?php echo $size; ?> SQ.FT.</span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>  
                            </a>
                        </div>
                        <?php $excerpt = get_field( 'excerpt', $post ) ?: get_the_excerpt( $post ); ?>
                        <div class="post-two-cols__post--desc a-up a-delay-1">
                            <?php echo $excerpt; ?>

                            <?php if( $pdf ): ?>
                                <a href="<?php echo $pdf; ?>" target="_blank" class="btn btn--accent post-two-cols__post--cta">
                                    <?php echo get_field( 'pdf_cta', $post ) ? get_field( 'pdf_cta', $post ) : 'See More'; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if( $cta ): ?>
            <div class="post-two-cols__buttons a-up a-delay-2">
                <a href="<?php echo $cta['url']; ?>" class="btn" target="<?php echo $cta['target']; ?>">
                    <?php echo $cta['title']; ?>
                </a>
            </div>
        <?php endif; ?> 
    </div>
</section>