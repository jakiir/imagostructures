<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
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

?>

<div class="fake_labels">
	<?php if(ICL_LANGUAGE_CODE=='en'): ?>
		<label class="quantity_1"><?php _e( 'quantity:', 'woocommerce' ); ?></label>
	<?php elseif(ICL_LANGUAGE_CODE=='fr'): ?>
		<label class="quantity_1"><?php _e( 'quantité:', 'woocommerce' ); ?></label>
	<?php endif; ?>
	<?php if(ICL_LANGUAGE_CODE=='en'): ?>
		<label class="currency_1"><?php _e( 'currency:', 'woocommerce' ); ?></label>
	<?php elseif(ICL_LANGUAGE_CODE=='fr'): ?>
		<label class="currency_1"><?php _e( 'devise:', 'woocommerce' ); ?></label>
	<?php endif; ?>
</div>
<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here ?>
