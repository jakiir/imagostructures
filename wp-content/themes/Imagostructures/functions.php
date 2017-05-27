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
	$tabs['produits-et-conseils']['priority'] = 15;
  $tabs['products-and-advice']['priority'] = 15;
	$tabs['video']['priority'] = 20;
	$tabs['reviews']['priority'] = 25;
	unset( $tabs['additional_information'] ); 	
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
    if(ICL_LANGUAGE_CODE==en) {
		return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read More...</a>';
	}else {
		return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Lire Plus...</a>';
	}
}
add_filter('excerpt_more', 'new_excerpt_more');

// Change Currency
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'USD': $currency_symbol = 'USD'; break;
          case 'CAD': $currency_symbol = 'CAD'; break;
     }
     return $currency_symbol;
}

function wpt_post_thumbnail_width( $width ) {
	if( is_single() ) {
	 	return 500; //post thumbnail width in pixels
	} else {
		return $width;
	}
}
add_filter( 'et_pb_index_blog_image_width', 'wpt_post_thumbnail_width');

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_custom_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) 
{
    global $woocommerce;
    ob_start(); ?>

    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart1' ); ?>"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->cart_contents_count(), 'woothemes' ), WC()->cart->cart_contents_count() ); ?></a>

    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}
// Remove trailing zero's
add_filter( 'woocommerce_price_trim_zeros', 'wc_hide_trailing_zeros', 10, 1 );
function wc_hide_trailing_zeros( $trim ) {
	// set to false to show trailing zeros
	return true;
}

add_action( 'admin_init', 'wpsal_remove_menu_pages' );

function wpsal_remove_menu_pages() {

    remove_menu_page( 'admin.php?page=wsal-auditlog' );
    remove_menu_page( 'wsal-auditlog' );
}

function remove_wsal_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['wsal']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['wsal']);
    
}

add_action('wp_dashboard_setup', 'remove_wsal_dashboard_widgets' );

function languages_list_header(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        echo '<div class="language_list"><ul>';
        foreach($languages as $l){
            echo '<li>';
            if($l['country_flag_url']){
                if(!$l['active']) echo '<a href="'.$l['url'].'">';
                echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                if(!$l['active']) echo '</a>';
            }
            echo '</li>';
        }
        echo '</ul></div>';
    }
} 

// Remove the Link header for the WP REST API
function remove_json_api () {

    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

    // Remove all embeds rewrite rules.
    //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action( 'after_setup_theme', 'remove_json_api' );

function wp_remove_version() {
    return '';
}
add_filter('the_generator', 'wp_remove_version');

remove_action('wp_head', 'wp_generator');

function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function et_last_modified_date_blog( $the_date ) {
    if ( 'post' === get_post_type() ) {
        $the_time = get_post_time( 'His' );
        $the_modified = get_post_modified_time( 'His' );
 
        $last_modified =  sprintf( __( 'Last updated %s', 'Divi' ), esc_html( get_post_modified_time( 'M j, Y' ) ) );
        $date = $the_modified !== $the_time ? $last_modified : get_post_time( 'M j, Y' );
 
        return $date;
    }
}
add_action( 'get_the_date', 'et_last_modified_date_blog' );
add_action( 'get_the_time', 'et_last_modified_date_blog' );


