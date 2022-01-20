<?php extract( $template_args ) ?>
<?php //var_dump_pre( $template_args ) ?>
<?php $val = isset( $v ) && !empty( $v ) ? $v : 'cta_button'; ?>
<?php $class = isset( $c )  && !empty( $c ) ? $c : ''; ?>
<?php $link = get_sub_field( $val ); ?>
<?php $option = isset( $o ) && !empty( $o ) ? $o : false; ?>

<?php $ww = isset( $w ) && !empty( $w ) ? $w : false; ?>
<?php $wclass = isset( $wc ) && !empty( $wc ) ? $wc : ''; ?>

<?php $icon = isset( $icon ) && !empty( $icon ) ? $icon : ''; ?>

<?php 
	if( 'o' == $option ){
		$link = get_field( $val, 'option' );
	} 
	elseif( 'f' == $option ){
		$link = get_field( $val );
	}
	else{
		$link = get_sub_field( $val );
	}
?> 
<?php if( $link ): ?>
	<?php if( $ww ): ?>
		<<?php echo $ww; ?> <?php if( $wclass ){ echo 'class="'.$wclass.'"'; } ?>>
	<?php endif ?>
    <?php
	    $link_url = $link['url'];
	    $link_title = $link['title'];
	    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
		<a class="<?php echo $class; ?> <?php echo $color; ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
			<?php echo esc_html( $link_title ); ?>
			<?php if( $icon && 'dark' === $icon ):  ?>
				<img class="lazyload" data-src="<?php echo get_template_directory_uri( ); ?>/images/ico/ico-arrow-dark-right.svg" alt="image description">
			<?php elseif( $icon ): ?>
				<img class="lazyload" data-src="<?php echo get_template_directory_uri( ); ?>/images/ico/ico-arrow-right.svg" alt="image description">
			<?php endif ?>
		</a>
	<?php if( $ww ): ?>
		</<?php echo $ww; ?>>
	<?php endif; ?>
<?php endif; ?> 