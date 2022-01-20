<?php
// Custom ACF Blocks
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register Hero Block
        acf_register_block_type(array(
            'name'              => 'home_hero',
            'title'             => __('Home Hero'),
            'description'       => __('Home Hero'),
            'render_template'   => 'template-parts/blocks/home-hero/home-hero.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'cover-image',
            'keywords'          => array( 'hero', 'image', 'video' ),
        ));

        // Register Responsive Spacer Block
        acf_register_block_type(array(
            'name'              => 'responsive_spacer',
            'title'             => __('Responsive Spacer'),
            'description'       => __('Responsive Spacer'),
            'render_template'   => 'template-parts/blocks/responsive-spacer/responsive-spacer.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'image-flip-vertical',
            'keywords'          => array( 'responsive', 'spacer' ),
        ));

        // Register Title Text Block
        acf_register_block_type(array(
            'name'              => 'title_text',
            'title'             => __('Title Text'),
            'description'       => __('Title Text'),
            'render_template'   => 'template-parts/blocks/title-text/title-text.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'heading',
            'keywords'          => array( 'title', 'text' ),
        ));
        
        // Register Media Content Block
        acf_register_block_type(array(
            'name'              => 'media_content',
            'title'             => __('Media Content'),
            'description'       => __('Media Content'),
            'render_template'   => 'template-parts/blocks/media-content/media-content.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'media', 'content' ),
        ));

        // Register Custom Blockquote Block
        acf_register_block_type(array(
            'name'              => 'custom_blockquote',
            'title'             => __('Blockquote'),
            'description'       => __('Blockquote'),
            'render_template'   => 'template-parts/blocks/custom-blockquote/custom-blockquote.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'format-quote',
            'keywords'          => array( 'quote' ),
        ));

        // Register Custom Image Block
        acf_register_block_type(array(
            'name'              => 'custom_media',
            'title'             => __('Media'),
            'description'       => __('Media'),
            'render_template'   => 'template-parts/blocks/custom-media/custom-media.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'format-image',
            'keywords'          => array( 'media' ),
        ));

        // Register Custom Wysiwig Block
        acf_register_block_type(array(
            'name'              => 'custom_wysiwig',
            'title'             => __('Wysiwig'),
            'description'       => __('Wysiwig'),
            'render_template'   => 'template-parts/blocks/custom-wysiwig/custom-wysiwig.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'media-text',
            'keywords'          => array( 'wysiwig' ),
        ));

        // Register Two Columns Block
        acf_register_block_type(array(
            'name'              => 'two_columns',
            'title'             => __('Two Columns'),
            'description'       => __('Two Columns'),
            'render_template'   => 'template-parts/blocks/two-columns/two-columns.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'columns',
            'keywords'          => array( 'two columns' ),
        ));

        // Register Accordion Block
        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('Accordion'),
            'description'       => __('Accordion'),
            'render_template'   => 'template-parts/blocks/accordion/accordion.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'list-view',
            'keywords'          => array( 'accordion' ),
        ));

        // Register Slider Block
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('Slider'),
            'render_template'   => 'template-parts/blocks/slider/slider.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'slides',
            'keywords'          => array( 'slides' ),
        ));

        // Contact Form Block
        acf_register_block_type(array(
            'name'              => 'contact_form',
            'title'             => __('Contact form'),
            'description'       => __('Contact form'),
            'render_template'   => 'template-parts/blocks/contact-form/contact-form.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'forms',
            'keywords'          => array( 'contact form' ),
        ));
        
        // Tab Slider Block
        acf_register_block_type(array(
            'name'              => 'tab_slider',
            'title'             => __('Tab Slider'),
            'description'       => __('Tab Slider'),
            'render_template'   => 'template-parts/blocks/tab-slider/tab-slider.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'slides',
            'keywords'          => array( 'tab', 'slider', 'tab slider' ),
        ));

        // Post Slider Block
        acf_register_block_type(array(
            'name'              => 'post_slider',
            'title'             => __('Post Slider'),
            'description'       => __('Post Slider'),
            'render_template'   => 'template-parts/blocks/post-slider/post-slider.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'slides',
            'keywords'          => array( 'post', 'slider', 'post slider' ),
        ));


        // General Tab Block
        acf_register_block_type(array(
            'name'              => 'general_tab',
            'title'             => __('General Tab'),
            'description'       => __('General Tab'),
            'render_template'   => 'template-parts/blocks/general-tab/general-tab.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'admin-page',
            'keywords'          => array( 'tab', 'general', 'general tab' ),
        ));

        // Media Content Intro
        acf_register_block_type(array(
            'name'              => 'media_content_intro',
            'title'             => __('Media Content Intro'),
            'description'       => __('Media Content Intro'),
            'render_template'   => 'template-parts/blocks/media-content-intro/media-content-intro.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'media', 'content', 'intro'),
        ));
        
        // Media Content Map
        acf_register_block_type(array(
            'name'              => 'media_content_map',
            'title'             => __('Media Content Map'),
            'description'       => __('Media Content Map'),
            'render_template'   => 'template-parts/blocks/media-content-map/media-content-map.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'media', 'content', 'map'),
        ));

        // Hover Carousel
        acf_register_block_type(array(
            'name'              => 'hover_carousel',
            'title'             => __('Hover Carousel'),
            'description'       => __('Hover Carousel'),
            'render_template'   => 'template-parts/blocks/hover-carousel/hover-carousel.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'slides',
            'keywords'          => array( 'hover', 'carousel'),
        ));

        // Media Content Alt
        acf_register_block_type(array(
            'name'              => 'media_content_alt',
            'title'             => __('Media Content Alt'),
            'description'       => __('Media Content Alt'),
            'render_template'   => 'template-parts/blocks/media-content-alt/media-content-alt.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'media', 'content', 'alt'),
        ));

        // Experience Gallery
        acf_register_block_type(array(
            'name'              => 'experience_gallery',
            'title'             => __('Experience Gallery'),
            'description'       => __('Experience Gallery'),
            'render_template'   => 'template-parts/blocks/experience-gallery/experience-gallery.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'experience', 'gallery'),
        ));

        // Offers
        acf_register_block_type(array(
            'name'              => 'offers',
            'title'             => __('Offers'),
            'description'       => __('Offers'),
            'render_template'   => 'template-parts/blocks/offers/offers.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'media-text',
            'keywords'          => array( 'offers' ),
        ));

        // Culinary
        acf_register_block_type(array(
            'name'              => 'culinary',
            'title'             => __('Culinary'),
            'description'       => __('Culinary'),
            'render_template'   => 'template-parts/blocks/culinary/culinary.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'food',
            'keywords'          => array( 'culinary' ),
        ));

        // General Hero
        acf_register_block_type(array(
            'name'              => 'general_hero',
            'title'             => __('General Hero'),
            'description'       => __('General Hero'),
            'render_template'   => 'template-parts/blocks/general-hero/general-hero.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'cover-image',
            'keywords'          => array( 'hero' ),
        ));

        // Media Content Tab
        acf_register_block_type(array(
            'name'              => 'media_content_tab',
            'title'             => __('Media Content Tab'),
            'description'       => __('Media Content Tab'),
            'render_template'   => 'template-parts/blocks/media-content-tab/media-content-tab.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'media', 'content', 'tab'),
        ));

        // Culinary Banner
        acf_register_block_type(array( 
            'name'              => 'post_banner',
            'title'             => __('Post Banner'),
            'description'       => __('Post Banner'),
            'render_template'   => 'template-parts/blocks/culinary-banner/culinary-banner.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'post', 'banner' ),
        ));

        // Culinary Grid
        acf_register_block_type(array( 
            'name'              => 'culinary_grid',
            'title'             => __('Culinary Grid'),
            'description'       => __('Culinary Grid'),
            'render_template'   => 'template-parts/blocks/culinary-grid/culinary-grid.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'food',
            'keywords'          => array( 'culinary', 'grid'),
        ));

        // Events & Experiences
        acf_register_block_type(array( 
            'name'              => 'events_experiences',
            'title'             => __('Events Experiences'),
            'description'       => __('Events Experiences'),
            'render_template'   => 'template-parts/blocks/events-experiences/events-experiences.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'columns',
            'keywords'          => array( 'events', 'experiences'),
        ));

        // Three Columns Block
        acf_register_block_type(array( 
            'name'              => 'three_columns',
            'title'             => __('Three Columns'),
            'description'       => __('Three Columns'),
            'render_template'   => 'template-parts/blocks/three-columns/three-columns.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'menu-alt3',
            'keywords'          => array( 'three', 'column'),
        ));

        // Rooms Carousel
        acf_register_block_type(array( 
            'name'              => 'rooms_carousel',
            'title'             => __('Rooms Carousel'),
            'description'       => __('Rooms Carousel'),
            'render_template'   => 'template-parts/blocks/rooms-carousel/rooms-carousel.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'building',
            'keywords'          => array( 'rooms', 'carousel'),
        ));

        // Spa Hero
        acf_register_block_type(array( 
            'name'              => 'spa_hero',
            'title'             => __('Spa Hero'),
            'description'       => __('Spa Hero'),
            'render_template'   => 'template-parts/blocks/spa-hero/spa-hero.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'cover-image',
            'keywords'          => array( 'spa', 'hero'),
        ));

        // Hover Carousel Alt
        acf_register_block_type(array( 
            'name'              => 'hover_carousel_alt',
            'title'             => __('Hover Carousel Alt'),
            'description'       => __('Hover Carousel Alt'),
            'render_template'   => 'template-parts/blocks/hover-carousel-alt/hover-carousel-alt.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'slides',
            'keywords'          => array( 'hover', 'carousel'),
        ));

        // Post
        acf_register_block_type(array( 
            'name'              => 'media-content-post',
            'title'             => __('Media Content Post'),
            'description'       => __('Media Content Post'),
            'render_template'   => 'template-parts/blocks/media-content-post/media-content-post.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-right',
            'keywords'          => array( 'media', 'content', 'post'),
        ));

        // People Slider
        acf_register_block_type(array( 
            'name'              => 'people_slider',
            'title'             => __('People Slider'),
            'description'       => __('People Slider'),
            'render_template'   => 'template-parts/blocks/people-slider/people-slider.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'slides',
            'keywords'          => array( 'people', 'slider'),
        ));

        // Post Two Columns
        acf_register_block_type(array( 
            'name'              => 'post_two_cols',
            'title'             => __('Post Two Columns'),
            'description'       => __('Post Two Columns'),
            'render_template'   => 'template-parts/blocks/post-two-cols/post-two-cols.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'embed-post',
            'keywords'          => array( 'post', 'two'),
        ));

        // Page 
        acf_register_block_type(array( 
            'name'              => 'page_block',
            'title'             => __('Page Block'),
            'description'       => __('Page Block'),
            'render_template'   => 'template-parts/blocks/page-block/page-block.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'admin-page',
            'keywords'          => array( 'page' ),
        ));

        // Single room booking
        acf_register_block_type(array( 
            'name'              => 'single_room_booking',
            'title'             => __('Single Room Booking'),
            'description'       => __('Single Room Booking'),
            'render_template'   => 'template-parts/blocks/single-room-booking/single-room-booking.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'tickets',
            'keywords'          => array( 'single', 'room', 'booking' ),
        ));

        // Room options
        acf_register_block_type(array( 
            'name'              => 'room_options',
            'title'             => __('Room Options'),
            'description'       => __('Room Options'),
            'render_template'   => 'template-parts/blocks/room-options/room-options.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'admin-generic',
            'keywords'          => array( 'room', 'options' ),
        ));

        // Culinary Hero
        acf_register_block_type(array( 
            'name'              => 'culinary_hero',
            'title'             => __('Culinary Hero'),
            'description'       => __('Culinary Hero'),
            'render_template'   => 'template-parts/blocks/culinary-hero/culinary-hero.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'culinary', 'hero' ),
        ));

        // Navigation
        acf_register_block_type(array( 
            'name'              => 'navigation',
            'title'             => __('Navigation'),
            'description'       => __('Navigation'),
            'render_template'   => 'template-parts/blocks/navigation/navigation.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'menu',
            'keywords'          => array( 'navigation' ),
        ));

        // Culinary Detail
        acf_register_block_type(array( 
            'name'              => 'culinary_detail',
            'title'             => __('Culinary Detail'),
            'description'       => __('Culinary Detail'),
            'render_template'   => 'template-parts/blocks/culinary-detail/culinary-detail.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'culinary', 'detail' ),
        ));

        // Culinary Form
        acf_register_block_type(array( 
            'name'              => 'culinary_form',
            'title'             => __('Culinary Form'),
            'description'       => __('Culinary Form'),
            'render_template'   => 'template-parts/blocks/culinary-form/culinary-form.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'culinary', 'form' ),
        ));

        // Weddings Hero
        acf_register_block_type(array( 
            'name'              => 'wedding_hero',
            'title'             => __('Wedding Hero'),
            'description'       => __('Wedding Hero'),
            'render_template'   => 'template-parts/blocks/wedding-hero/wedding-hero.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'cover-image',
            'keywords'          => array( 'wedding', 'hero' ),
        ));

        // Venues Slider
        acf_register_block_type(array( 
            'name'              => 'venues_slider',
            'title'             => __('Venues Slider'),
            'description'       => __('Venues Slider'),
            'render_template'   => 'template-parts/blocks/venues-slider/venues-slider.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'slides',
            'keywords'          => array( 'venues', 'slider' ),
        ));

        // RFP
        acf_register_block_type(array( 
            'name'              => 'rfp_form',
            'title'             => __('RFP Form'),
            'description'       => __('RFP Form'),
            'render_template'   => 'template-parts/blocks/rfp/rfp.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'forms',
            'keywords'          => array( 'rfp', 'form' ),
        ));

        // Venues Grid
        acf_register_block_type(array( 
            'name'              => 'venues_grid',
            'title'             => __('Venues Grid'),
            'description'       => __('Venues Grid'),
            'render_template'   => 'template-parts/blocks/venues-grid/venues-grid.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'location-alt',
            'keywords'          => array( 'venues', 'grid' ),
        ));

        // Capacity Chart
        acf_register_block_type(array( 
            'name'              => 'capacity_chart',
            'title'             => __('Capacity Chart'),
            'description'       => __('Capacity Chart'),
            'render_template'   => 'template-parts/blocks/capacity-chart/capacity-chart.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'editor-table',
            'keywords'          => array( 'capacity', 'chart' ),
        ));

        // Two columns images
        acf_register_block_type(array( 
            'name'              => 'two_columns_images',
            'title'             => __('Two columns images'),
            'description'       => __('Two columns images'),
            'render_template'   => 'template-parts/blocks/two-columns-images/two-columns-images.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'columns',
            'keywords'          => array( 'two', 'columns', 'images' ),
        ));

        // Resort Map
        acf_register_block_type(array( 
            'name'              => 'resort_map',
            'title'             => __('Resort Map'),
            'description'       => __('Resort Map'),
            'render_template'   => 'template-parts/blocks/resort-map/resort-map.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'location',
            'keywords'          => array( 'resort', 'map' ),
        ));

        
        // Gallery
        acf_register_block_type(array(
            'name'              => 'gallery',
            'title'             => __('Gallery'),
            'description'       => __('Gallery'),
            'render_template'   => 'template-parts/blocks/gallery/gallery.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'media', 'content', 'slider' ),
        ));
        
        // Press
        acf_register_block_type(array(
            'name'              => 'press_grid',
            'title'             => __('Press Grid'),
            'description'       => __('Press Grid'),
            'render_template'   => 'template-parts/blocks/press-grid/press-grid.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'pressthis',
            'keywords'          => array( 'press', 'grid' ),
        ));
        
        // Offers Grid
        acf_register_block_type(array(
            'name'              => 'offers_grid',
            'title'             => __('Offers Grid'),
            'description'       => __('Offers Grid'),
            'render_template'   => 'template-parts/blocks/offers-grid/offers-grid.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'format-aside',
            'keywords'          => array( 'offers', 'grid' ),
        ));

        
        // Experiences Module
        acf_register_block_type(array(
            'name'              => 'experiences_module',
            'title'             => __('Experiences Module'),
            'description'       => __('Experiences Module'),
            'render_template'   => 'template-parts/blocks/experiences-module/experiences-module.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'format-aside',
            'keywords'          => array( 'experiences', 'module' ),
        ));

        // Experiences Banner
        acf_register_block_type(array(
            'name'              => 'experiences_banner',
            'title'             => __('Experiences Banner'),
            'description'       => __('Experiences Banner'),
            'render_template'   => 'template-parts/blocks/experiences-banner/experiences-banner.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'cover-image',
            'keywords'          => array( 'experiences', 'banner' ),
        ));
        
        // Journal slider
        acf_register_block_type(array(
            'name'              => 'journal_slider',
            'title'             => __('Journal Slider'),
            'description'       => __('Journal Slider'),
            'render_template'   => 'template-parts/blocks/journal-slider/journal-slider.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'slides',
            'keywords'          => array( 'journal', 'slider' ),
        ));

        // Journal slider
        acf_register_block_type(array(
            'name'              => 'destination_map',
            'title'             => __('Destination Map'),
            'description'       => __('Destination Map'),
            'render_template'   => 'template-parts/blocks/destination-map/destination-map.php',
            'category'          => 'commonwealth-blocks',
            'icon'              => 'location',
            'keywords'          => array( 'destination', 'map' ),
        ));
    }
}


function custom_block_categories( $categories ) {
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'commonwealth-blocks',
				'title' => 'CommonWealth Blocks',
			],
		]
	);
}
add_action( 'block_categories', 'custom_block_categories', 10, 2 );