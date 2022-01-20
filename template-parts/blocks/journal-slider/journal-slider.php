<?php

/**
 * Journal Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'journal-slider-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'journal-slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="journal-slider__top">
            <div class="journal-slider__top--left">
                <?php if( $heading = get_field( 'heading' ) ): ?>
                    <h2 class="journal-slider__heading"><?php echo $heading; ?></h2>
                <?php endif; ?>
            </div>
            <div class="journal-slider__top--right">
                <?php if( $content = get_field( 'content' ) ): ?>
                    <div class="journal-slider__content"><?php echo $content; ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="journal-slider__body">
            <?php if( $journals = get_field( 'posts' ) ): ?>
                <div class="journal-slider__slides">
                    <?php foreach( $journals as $journal ): ?>
                        <a href="<?php echo get_the_permalink( $journal ); ?>" class="loop-journal">
                            <div class="loop-journal__img gradient-overlay">
                                <?php 
                                if( get_field( 'image', $journal ) ):
                                    $image = get_field( 'image', $journal );
                                else:
                                    $image = get_the_post_thumbnail_url( $journal, 'journal' );
                                endif; ?>
                                <img src="<?php echo $image; ?>" 
                                    alt="<?php echo get_the_title( $journal ); ?>">
                                <?php $terms = get_the_terms( $journal, 'category' ); 
                                if( $terms ): ?>
                                <span class="loop-journal__category"><?php echo $terms[0]->name; ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="loop-journal__content">
                                <h6 class="loop-journal__title"><?php echo get_the_title( $journal ); ?></h6>
                                <p class="loop-journal__desc"><?php echo get_the_excerpt( $journal ); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="journal-slider__all">
                <?php if( $cta = get_field('cta') ): ?>
                    <a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>" class="btn btn--outline__dark">
                        <?php echo $cta['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>