<?php

/**
 * Post Banner Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'post-banner-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'post-banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$heading = get_field('heading');
$content = get_field('content');
$scrollTo = get_field('scroll_to');
$featured_posts = get_field('post');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="post-banner__left">
        <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h6', 'tc' => 'post-banner__subheading a-up' ) ); ?> 
        <?php if ($heading) : ?>
            <h1 class="post-banner__heading a-up"><?php echo $heading; ?></h1>
        <?php endif; ?>
        <?php if ($content) : ?>
            <div class="post-banner__content a-up a-delay-1">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>
        <?php if ($scrollTo) : ?>
            <div class="scroll-link__wrapper a-up a-delay-2">
                <a href="<?php echo $scrollTo['url']; ?>"
                class="scroll-link">
                    <?php echo $scrollTo['title']; ?>
                    <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="26.5" cy="26.5" r="26.5" transform="rotate(-90 26.5 26.5)" fill="#A0814C"/>
                        <path d="M26.997 33.3335L21.5108 23.831L32.4833 23.831L26.997 33.3335Z" fill="white"/>
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    </div>
    <?php if ($featured_posts) : ?>
    <div class="post-banner__right">
        <?php foreach($featured_posts as $featured) : 
            $title = get_the_title($featured); 
            $excerpt = get_the_excerpt( $featured );
            if( get_post_type( $featured ) == 'room' ): ?>
                <div class="post-featured">
                    <?php $img_src = get_the_post_thumbnail_url( $featured, 'offer-image' );
                    $img_src_2x = get_the_post_thumbnail_url( $featured, 'offer-image-2x' ); ?>
                    <img data-src="<?php echo $img_src; ?>" 
                            data-srcset="<?php echo $img_src_2x; ?>" 
                            alt="<?php echo $title; ?>" class="post-featured__image lazyload">
                    <?php $booking = get_field( 'booking_cta', $featured ); ?>
                    <div class="post-featured__content<?php echo $booking ? ' has-cta' : ''; ?>">
                        <div class="post-featured__text">
                            <h6 class="post-featured__tag">Featured Room</h6>
                            <h2 class="post-featured__title"><?php echo get_the_title( $featured ); ?></h2>
                        </div>
                        <?php if( $booking ): ?>
                            <a href="<?php echo $booking['url']; ?>" class="btn btn--accent post-featured__booking">
                                <?php echo $booking['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else :
                $date_string = get_field( 'featured_date', $featured );
                if( $date_string ) : 
                    $date = DateTime::createFromFormat('Ymd', $date_string);
                    $day = $date->format('d');
                    $month = $date->format('M');
                endif; 
                $image = get_field('image', $featured);
                if( $image ):
                    $img_src = $image['sizes']['offer-image'];
                    $img_src_2x = $image['sizes']['offer-image-2x']; 
                endif; ?>
                <div class="post-featured">
                    <?php if( $image ): ?>
                    <img data-src="<?php echo $img_src; ?>" 
                        data-srcset="<?php echo $img_src_2x; ?>" 
                        alt="<?php echo $title; ?>" class="post-featured__image lazyload">
                    <?php endif; ?>
                    <div class="post-featured__content">
                        <?php if( $date_string ): ?> 
                        <div class="post-featured__date a-up">
                            <span class="post-featured__date--day"><?php echo $day; ?></span>
                            <span class="post-featured__date--month">
                                <?php echo $month; ?>
                            </span>
                        </div>
                        <?php endif; ?>
                        <div class="post-featured__title a-up a-delay-1"><?php echo $title; ?></div>
                        <div class="post-featured__excerpt a-up a-delay-2"><?php echo $excerpt; ?></div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>
<style>
    #<?php echo esc_attr($id); ?> .post-featured::after {
        opacity: <?php echo floatval(intval(get_field('gradient_opacity')) / 100); ?>
    }
</style>