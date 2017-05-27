<?php 

function elegant_enqueue_css() { wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }

add_action( 'wp_enqueue_scripts', 'elegant_enqueue_css' );

include('editor/footer-editor.php');

include('editor/login-editor.php');


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 ); 
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 5 ); 


# Order of tabs #$tabs['reviews']['priority'] = 20;
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

	$tabs['details']['priority'] = 5;
	$tabs['description']['priority'] = 10;
	$tabs['video']['priority'] = 15;
	$tabs['reviews']['priority'] = 20;
	return $tabs;
}

// remove default sorting dropdown in StoreFront Theme
 add_action('init','delay_remove');
 
function delay_remove() {
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
}

//Gallery columns
add_filter ( 'woocommerce_product_thumbnails_columns', 'imago_change_gallery_columns' );
 
function imago_change_gallery_columns() {
     return 1; 
}

//Move meta
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_after_single_product', 'woocommerce_template_single_meta', 40 );

//Add currency switcher under the quantity
add_filter ( 'woocommerce_single_product_summary', 'add_currency_switcher', 40 );
 
function add_currency_switcher() {
	echo do_shortcode('[currency_switcher]');
}

//Hide empty video tabs
wp_register_script('wc-hide-empty-tab', get_bloginfo( 'stylesheet_directory' ). '/js/wc-hide-empty-tab.js' , array( 'jquery' ), WC_VERSION, TRUE);
wp_enqueue_script('wc-hide-empty-tab');

//Make a shorter excerpt
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Lire...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function wpt_post_thumbnail_width( $width ) {
	if( is_single() ) {
	 	return 500; //post thumbnail width in pixels
	} else {
		return $width;
	}
}
add_filter( 'et_pb_index_blog_image_width', 'wpt_post_thumbnail_width');