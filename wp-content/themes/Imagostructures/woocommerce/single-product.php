<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
		the_title( '<h1 itemprop="name" class="product_title entry-title">', '</h1>' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	<?php  if (($id == 25512)  ) { ?>
		<img class="voile_distributor_lines" src="/mehedi/imagostructures/wp-content/uploads/2016/11/green_border_lines.png"></img>
		<h1 class="shade_plugin">Trouvez un détaillant</h1>
		<?php echo do_shortcode('[wpsl]'); ?>
		<img class="voile_distributor_lines2" src="/mehedi/imagostructures/wp-content/uploads/2016/11/green_border_lines.png"></img>
	<?php }?>
	<?php  if (($id == 27337)  ) { ?>
		<img class="voile_distributor_lines" src="/mehedi/imagostructures/wp-content/uploads/2016/11/green_border_lines.png"></img>
		<h1 class="shade_plugin">Find a retailer</h1>
		<?php echo do_shortcode('[wpsl]'); ?>
		<img class="voile_distributor_lines2" src="/mehedi/imagostructures/wp-content/uploads/2016/11/green_border_lines.png"></img>
	<?php }?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		
		do_action( 'woocommerce_sidebar' );
		 */
	?>

<?php get_footer( 'shop' ); ?>
