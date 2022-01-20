<?php

/**
 * Single Room Booking Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'single-room-booking-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'single-room-booking';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
global $post;
$heading = get_field( 'heading' );
$desc = get_field( 'description' );
$direct_contact = get_field( 'direct_contact' );
$contact = get_field( 'contact' );
$cta = get_field( 'cta' );
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="single-room-booking__inner">
            <div class="single-room-booking__content">
                <?php if( $heading ): ?>
                    <h6 class="title a-up"><?php echo $heading; ?></h6>
                <?php endif; ?>
                <?php if( $desc ): ?>
                    <div class="desc a-up a-delay-1"><?php echo $desc; ?></div>
                <?php endif; ?>
                <div class="contact a-up a-delay-2">
                    <?php if( $direct_contact ): ?>
                        <a href="<?php echo $direct_contact['url']; ?>" class="contact-direct" target="<?php echo $direct_contact['target']; ?>">
                            <?php echo $direct_contact['title']; ?>
                        </a>
                    <?php endif; ?>
                    <?php if( $direct_contact && $contact ): ?>
                        <span class="contact-separator"></span>
                    <?php endif; ?>
                    <?php if( $contact ): ?>
                        <a href="<?php echo $contact['url']; ?>" class="contact-phone" target="<?php echo $contact['target']; ?>">
                            <?php echo $contact['title']; ?>
                            <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.891417 16.0811L0.458984 13.1621C0.458984 13.1621 2.08061 11.6486 3.70223 11C5.32385 10.3513 5.64818 10.7838 5.64818 10.7838L8.24277 13.2702C10.4049 12.9459 14.8374 9.59457 15.7022 7.54051L14.0806 4.40538C14.0806 4.40538 13.7563 3.97295 14.8374 2.56754C15.9185 1.16214 17.7563 0.0810547 17.7563 0.0810547L20.3509 1.27024C20.3509 1.27024 22.6212 2.24322 20.9995 6.13511C18.6212 11.6486 11.3779 17.1621 5.43196 17.9189C1.21574 18.4594 0.891417 16.0811 0.891417 16.0811Z" fill="#A98442"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
                <?php if( get_field( 'enable_amentities' ) ): ?>
                    <div class="button-groups a-up a-delay-3">
                        <button class="btn btn-amentities" data-id="<?php echo $id; ?>">
                            <?php echo $cta; ?>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="single-room-booking__calendar a-up">
                <input type="text" class="booking-range" id="booking-range">
                <div class="booking-calendar" id="booking-calendar">
                </div>
                <a href="#" class="btn btn-check-availability" target="_blank">Check Availability</a>
            </div>
        </div>
    </div>
</section>
