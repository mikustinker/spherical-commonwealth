<?php

/**
 * Experiences Banner Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'experiences-banner-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'experiences-banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="experiences-banner__bg">
        <?php if( $image = get_field( 'image' ) ): ?>
            <img class="lazyload" data-src="<?php echo $image; ?>" alt="">
        <?php endif; ?>
        <div class="experiences-banner__inner">
            <h1 class="experiences-banner__heading">Experience</h1>
            <?php 
            $categories = get_terms( array( 
                'taxonomy' => 'experience_category',
                'hide_empty' => false
                ) );
            if( $categories ): ?>
            <select name="" id="" class="url-select experiences-banner__category" jcf-select>
                <option value="">Authentic Moments</option>
                <?php foreach( $categories as $category ): ?>
                    <option value="<?php echo get_term_link( $category ); ?>">
                        <?php echo $category->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php endif; ?>
        </div>
    </div>
    <div class="experiences-banner__content">
        <?php if( $content = get_field( 'content' ) ): ?>
            <div class="experiences-banner__text">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>
        <div class="category-selectors">
            <?php $categories = get_terms( array( 
                'taxonomy' => 'experience_category',
                'hide_empty' => false
                ) );
            if( $categories ): ?>
            <div class="category-selector">
                <select name="" id="" class="category-select main-category url-select">
                    <option value="">All Categories</option>
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
                    <option value="">All Seasons</option>
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
</section>