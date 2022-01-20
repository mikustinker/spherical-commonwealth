<?php

/**
 * Media Content alt Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'media-content-alt-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'media-content media-content-alt';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$type = get_field( 'type' );
$slides = get_field( 'slides' );
$className .= ' media-content-alt--' . $type;
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( $type == 'dine' ): ?>
        <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h2', 'tc' => 'media-content__title a-up') ); ?>
        <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h6', 'tc' => 'media-content__subtitle media-content__subtitle--mobile a-up a-delay-1') ); ?>
        <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'text', 'o' => 'f', 't' => 'div', 'tc' => 'media-content__text media-content__text--mobile a-up a-delay-2') ); ?>
    <?php endif; ?>
    <div class="container">
        <?php if( $slides ): ?>
        <div class="media-content__media">
            <div class="media-content__carousel">
                <?php foreach( $slides as $slide): ?>
                    <div class="media-content__slide">
                        <?php 
                            $image = $slide['image'];
                            $video = $slide['video'];
                            $is = $type == 'dine' ? 'media-content-dine' : 'media-content-room';
                            get_template_part( 'templates/content-module', 'media', array(
                                'image' => $image,
                                'video' => $video,
                                'is' => $is
                            ) );
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if( $type == 'dine' ): ?>
                <div class="media-content__logos">
                <?php foreach( $slides as $slide): 
                    $logo = $slide['logo']; ?>
                    <div>
                        <?php if( $logo ): ?>
                            <img class="media-content__logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="media-content__content">
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h6', 'tc' => 'media-content__subtitle a-up') ); ?>
            <?php if ($type == 'room') : ?>
                <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h2', 'tc' => 'media-content__title a-up a-delay-1') ); ?>
            <?php endif; ?>
            <?php get_template_part_args( 'templates/content-module-text', array( 'v' => 'text', 'o' => 'f', 't' => 'div', 'tc' => 'media-content__text a-up a-delay-2') ); ?>
            <?php if (have_rows('links')) : ?>
                <ul class="media-content-alt__links a-up a-delay-3">
                    <?php while (have_rows('links')) : the_row(); 
                        $link = get_sub_field('link'); 
                        $text = get_sub_field( 'text' ); ?>
                        <li>
                            <a href="<?php echo $link['url']; ?>" class="media-content-alt__link" target="<?php echo $link['target']; ?>">
                                <?php if( $text ): ?>
                                    <span class="media-content-alt__text"><?php echo $text; ?></span>
                                <?php endif; ?>
                                <?php echo $link['title']; ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <?php get_template_part_args( 'templates/content-module-cta', array( 'v' => 'cta', 'o' => 'f', 'c' => 'btn media-content-alt__cta a-up a-delay-4', 'w' => 'div', 'wc' => 'media-content-alt__cta--wrapper' ) ); ?>
        </div>
    </div>
</section>
