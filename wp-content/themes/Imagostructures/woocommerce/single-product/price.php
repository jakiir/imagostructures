<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<?php if(ICL_LANGUAGE_CODE=='en'): ?>
		<label class="price"><?php _e( 'Price:', 'woocommerce' ); ?></label><p class="price"><?php echo $product->get_price_html(); ?></p>
	<?php elseif(ICL_LANGUAGE_CODE=='fr'): ?>
		<label class="price"><?php _e( 'Prix:', 'woocommerce' ); ?></label><p class="price"><?php echo $product->get_price_html(); ?></p>
	<?php endif; ?>
	<meta itemprop="price" content="<?php echo esc_attr( $product->get_display_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<?php if(ICL_LANGUAGE_CODE=='en'): ?>
			<label class="sku"><?php _e( 'Product Number:', 'woocommerce' ); ?></label>
		<?php elseif(ICL_LANGUAGE_CODE=='fr'): ?>
			<label class="sku"><?php _e( 'Numéro de produit:', 'woocommerce' ); ?></label>
		<?php endif; ?>
		<br><span class="sku_wrapper"><span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>
