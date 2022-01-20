<?php

/**
 * Capacity Chart Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'capacity-chart' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'capacity-chart';
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
        <?php if( $heading = get_field( 'heading' ) ): ?>
            <h2 class="capacity-chart__heading a-up"><?php echo $heading; ?></h2>
        <?php endif; ?>
        <?php if( have_rows( 'chart_row' ) ): ?>
            <div class="table-responsive a-up">
                <table class="table">
                    <?php while( have_rows( 'chart_row' ) ): the_row( ); ?>
                        <?php if( get_row_index() == 1 ): ?>
                            <thead>
                                <tr>
                                    <?php while( have_rows( 'column' ) ): the_row( ); ?>
                                        <th><?php echo get_sub_field( 'text' ) ?: '-'; ?></th>
                                    <?php endwhile; ?>
                                </tr>
                            </thead>
                        <?php else: ?>  
                            <?php if( get_row_index() == 2 ): ?> 
                                <tbody>
                            <?php endif; ?>
                                <tr>
                                    <?php while( have_rows( 'column' ) ): the_row( ); ?>
                                        <td><?php echo get_sub_field( 'text' ) ?: '-'; ?></td>
                                    <?php endwhile; ?>
                                </tr>
                            <?php if( get_row_index() == 2 ): ?> 
                                </tbody>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>