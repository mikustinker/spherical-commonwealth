<?php $post = $args['post']; ?>
<div class="loop-venues">
    <a href="<?php echo get_the_permalink( $post ); ?>">
        <div class="loop-venues--img gradient-overlay">
            <?php if( $image = get_field( 'image', $post ) ): ?>
                <img class="lazyload" 
                    data-src="<?php echo $image['sizes']['venues']; ?>" 
                    data-srcset="<?php echo $image['sizes']['venues-2x']; ?> 2x"
                    alt="">
            <?php endif; ?>
            <?php if( $matterport = get_field( 'matterport', $post ) ): ?>
                <a href="<?php echo $matterport; ?>" target="_blank" class="loop-venues--matterport">
                    <svg width="22" height="25" viewBox="0 0 22 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 0.804688L0 6.74887V18.767L11 24.5814L22 18.767V6.81327L11 0.804688V0.804688ZM10 21.8075L3.336 18.2855L7.537 15.5106C8.617 14.7983 7.471 13.1735 6.294 13.9503L2 16.7856V8.95813L10 13.2805V21.8075ZM3.133 7.31357L10 3.60242V7.98724C10 9.29794 12 9.29893 12 7.98724V3.61332L18.91 7.38886L11.005 11.5676L3.133 7.31357ZM12 13.2875L20 9.05819V16.7856L15.737 13.9701C14.556 13.1924 13.414 14.8171 14.492 15.5294L18.664 18.2846L12 21.8075V13.2875Z" fill="white"/>
                    </svg>
                </a>
            <?php endif; ?>
            <h6 class="loop-venues--title"><?php echo get_the_title( $post ); ?></h6>
            <div class="loop-venues--info">
                <?php if( $cap = get_field( 'cap', $post ) ): ?>
                    <span>CAP : <?php echo $cap; ?></span>
                <?php endif; ?>
                <?php if( $size = get_field( 'size', $post ) ): ?>
                    <span><?php echo $size; ?> SQ.FT.</span>
                <?php endif; ?>
            </div>
        </div>
        <?php if( $excerpt = get_the_excerpt( $post ) ): ?>
            <p class="loop-venues--excerpt"><?php echo $excerpt; ?></p>
        <?php endif; ?>
    </a>
</div>