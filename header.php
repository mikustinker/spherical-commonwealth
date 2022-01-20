<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Begin Header  -->
	<?php 
	$headerStyle = get_field( 'header_style' );
	
	if (is_404(  )) {
		$headerStyle = 'dark';
	} elseif( is_archive(  ) ) {
		$headerStyle = 'simple';
	}
	?>
	<header class="header <?php echo 'header--' . $headerStyle; ?>">
		<nav class="header-nav">
			<button class="hamburger" type="button" tab-index="0" aria-label="Menu" role="button" aria-controls="navigation">
				<span></span>
				<span></span>
			</button>
			<?php 
			wp_nav_menu( array(
				'menu' => 'Nav Menu',
				'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'div',
				'container_class' => 'main-menu__wrapper',
				'menu_class'      => 'header-nav__menus',
				'fallback_cb'     => false,
				'walker'          => new WP_Bootstrap_Navwalker(),
			) );
			?>
			<?php
			$logo = ( $headerStyle == 'light' || $headerStyle == 'second-light' ) ? get_field( 'logo', 'options' ) : get_field( 'logo_dark', 'options' );
			$alt = "Hotel Commonwealth" ?>
			<a href="<?php echo esc_url(home_url()); ?>" class="logo-link">
				<?php if ($logo) : ?>
					<img class="header-logo lazyload" 
						data-src="<?php echo $logo; ?>" 
						alt="<?php echo $alt; ?>">
				<?php endif; ?>
				<?php if( $headerStyle == 'second-light' ): ?>
					<img class="header-logo__dark lazyload" data-src="<?php the_field( 'logo_dark', 'options' ); ?>" alt="<?php echo $alt; ?>">
				<?php endif; ?>
			</a>
			<button class="btn header-cta btn-modal" data-target="#modal-booking">
				Reserve
				<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="0.5" y="0.5" width="13" height="13" stroke="#0E0E0E"/>
					<rect y="0.176758" width="14" height="4.11765" fill="black"/>
				</svg>
			</button>
			<button class="booking-popup__close">
				<svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
					<line x1="24.954" y1="24.0137" x2="1.47088" y2="0.530568" stroke="black" stroke-width="1.5"/>
					<line x1="1.46967" y1="24.4706" x2="24.9528" y2="0.987486" stroke="black" stroke-width="1.5"/>
				</svg>
			</button>
			<button class="btn header-cta--mobile btn-modal btn-booking" data-target="#modal-booking">
				Reserve Now
			</button>
		</nav>
		<div class="header-menu" id="main-nav">
			<div class="header-menu__top">
				<button class="hamburger-close">
					<svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<line x1="29.5771" y1="30.9913" x2="1.2928" y2="2.70702" stroke="black" stroke-width="2"/>
						<line x1="1.29289" y1="29.5771" x2="29.5772" y2="1.2928" stroke="black" stroke-width="2"/>
					</svg>
				</button>
				<?php if( $logo_mini = get_field( 'logo_minimum', 'options' ) ) : ?>
				<div class="divider"></div>
				<a href="<?php echo esc_url(home_url()); ?>" class="logo-link">
					<img class="header-logo--scroll" src="<?php echo $logo_mini; ?>" alt="Hotel Commonwealth">
				</a>
				<?php endif; ?>
			</div>
			<?php 
			wp_nav_menu( array(
				'menu' => 'Main Menu',
				'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'div',
				'menu_class'      => 'menu-items',
				'fallback_cb'     => false,
				'walker'          => new WP_Bootstrap_Navwalker(),
			) );
			?>
		</div>
	</header>
	<!-- End Header -->
	<!-- Begin Main -->
	<main id="main" class="<?php echo (get_field('is_fullpage') == true) ? 'no-padding' : ''; ?>">