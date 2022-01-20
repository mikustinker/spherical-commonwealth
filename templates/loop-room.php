<?php
$id = get_the_ID();
$title = get_the_title( );
$excerpt = get_the_excerpt(  );
$images = get_field( 'gallery', $id );
$amentites = get_field( 'amentitles', $id );
$matterport_link = get_field( 'matterport_link', $id );
$bedroom = get_field( 'bedroom', $id );
$size = get_field( 'size', $id );
$hilton = get_field( 'hilton_variables', $id );
$booking_cta = get_field( 'booking_cta', $id );
$booking = 'https://www.hilton.com/en/book/reservation/rooms/?ctyhocn=SJDWAWA';
?>
<div class="loop-room">
    <?php if( $images ) : ?>
    <div class="loop-room__slider">
        <div class="loop-room__slides">
            <?php foreach( $images as $image ) : ?>
                <div class="loop-room__slide gradient-overlay">
                    <img src="<?php echo $image['sizes']['room-slider-big']; ?>"
                        srcset="<?php echo $image['sizes']['room-slider-big-2x']; ?> 2x"
                        alt="<?php echo $image['alt']; ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <?php if( $size ): ?>
            <span class="loop-room__size">Appx <?php echo $size; ?> sq.ft.</span>
        <?php endif; ?>
        <a href="<?php echo $image['url']; ?>" class="loop-room__fullscreen" data-fancybox="gallery">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M23.9998 0H15.5674V1.94595H22.0539V8.43243H23.9998V0Z" fill="white"/>
                <path d="M1.94595 1.94595H8.43243V0H0V8.43243H1.94595V1.94595Z" fill="white"/>
                <path d="M0 23.9998H8.43243V22.0539H1.94595V15.5674H0V23.9998Z" fill="white"/>
                <path d="M22.0539 22.0539H15.5674V23.9998H23.9998V15.5674H22.0539V22.0539Z" fill="white"/>
            </svg>
        </a>
    </div>
    <?php endif; ?>
    <div class="loop-room__content">
        <h2 class="loop-room__title"><?php echo $title; ?></h2>
        <div class="button-groups">
            <button class="btn btn-amentities" data-id="<?php echo $id; ?>">View Amentities</button>
            <?php if( $booking_cta ): ?>
                <a href="<?php echo $booking_cta['url']; ?>" class="btn btn--accent btn-reserve" target="<?php echo $booking_cta['target']; ?>">
                    <?php echo $booking_cta['title']; ?>
                </a>
            <?php else: ?>
                <?php if( $hilton['room_code'] ): ?>
                <a href="<?php echo $booking . '&roomTypeCode=' . $hilton['room_code']; ?>" class="btn btn--accent btn-reserve" target="_blank">
                    Reserve Now
                </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>