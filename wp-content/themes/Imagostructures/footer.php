<?php
    function print_footer_scrips() {

        $thumbnail_size = get_option('shop_thumbnail_image_size');
        $single_size = get_option('shop_single_image_size');

        //Set image sizes. Must match exactly!
        $product_thumbnail_size = $thumbnail_size['width'].'x'.$thumbnail_size['height'];
        $product_single_image_size = $single_size['width'].'x'.$single_size['height'];
        }
?>

<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>

				<?php
					if ( has_nav_menu( 'footer-menu' ) ) : ?>

						<div id="et-footer-nav">
							<div class="container">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-menu',
										'depth'          => '1',
										'menu_class'     => 'bottom-nav',
										'container'      => '',
										'fallback_cb'    => '',
									) );
								?>
							</div>
						</div> <!-- #et-footer-nav -->

				<?php endif; ?>

				<div id="footer-bottom">
					
					<div class="container clearfix" style="text-align: center;">
					<?php	if(ICL_LANGUAGE_CODE==en) { ?>
						<div id="copyright">
							All rights reserved @2016 Imagostructures | <a href="/en/faq/">Privacy policy</a> | <a href="/en/faq/">Terms and conditions</a>
						</div>	
						<?php } else { ?>
						<div id="copyright">
							Tous droits réservés @2016 Imagostructures | <a href="/faq/">Politique de vie privée</a> | <a href="/faq/">Termes et conditions</a>
						</div>	
						<?php } ?>
						<div class="social-icons-footer">
							<ul class="et-social-icons-2">
							<?php if ( 'on' === et_get_option( 'divi_show_facebook_icon', 'on' ) ) : ?>
								<li class="et-social-icon et-social-facebook">
									<a href="<?php echo esc_url( et_get_option( 'divi_facebook_url', '#' ) ); ?>" class="icon">
										<span><?php esc_html_e( 'Facebook', 'Divi' ); ?></span>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( 'on' === et_get_option( 'divi_show_twitter_icon', 'on' ) ) : ?>
								<li class="et-social-icon et-social-twitter">
									<a href="<?php echo esc_url( et_get_option( 'divi_twitter_url', '#' ) ); ?>" class="icon">
										<span><?php esc_html_e( 'Twitter', 'Divi' ); ?></span>
									</a>
								</li>
							<?php endif; ?>

								<li class="et-social-icon et-social-instagram">
									<a href="http://www.instagram.com/imagostructures" class="icon">
										<span><?php esc_html_e( 'Instagram', 'Divi' ); ?></span>
									</a>
								</li>
								<li class="et-social-icon et-social-flikr">
									<a href="https://www.flickr.com/photos/imagostructures/" class="icon">
										<span><?php esc_html_e( 'Flickr', 'Divi' ); ?></span>
									</a>
								</li>
								<li class="et-social-icon et-social-youtube">
									<a href="https://www.youtube.com/channel/UCyEwvGlxAZJn0TiuGK_fP7A" class="icon">
										<span><?php esc_html_e( 'Youtube', 'Divi' ); ?></span>
									</a>
								</li>
							<?php if ( 'on' === et_get_option( 'divi_show_google_icon', 'on' ) ) : ?>
								<li class="et-social-icon et-social-google-plus">
									<a href="<?php echo esc_url( et_get_option( 'divi_google_url', '#' ) ); ?>" class="icon">
										<span><?php esc_html_e( 'Google', 'Divi' ); ?></span>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( 'on' === et_get_option( 'divi_show_rss_icon', 'on' ) ) : ?>
							<?php
								$et_rss_url = '' !== et_get_option( 'divi_rss_url' )
									? et_get_option( 'divi_rss_url' )
									: get_bloginfo( 'rss2_url' );
							?>
								<li class="et-social-icon et-social-rss">
									<a href="<?php echo esc_url( $et_rss_url ); ?>" class="icon">
										<span><?php esc_html_e( 'RSS', 'Divi' ); ?></span>
									</a>
								</li>
							<?php endif; ?>
							</ul>
						</div>	

					</div>	<!-- .container -->

				</div>

			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
	<script type="text/javascript">
	jQuery(function($){
	    $('.et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');

	    $('.et_pb_accordion .et_pb_toggle').click(function() {
	      $this = $(this);
	      setTimeout(function(){
	         $this.closest('.et_pb_accordion').removeClass('et_pb_accordion_toggling');
	      },700);
	    });
	});
	</script>
    <script type='text/javascript'>
	var url = window.location.href;
if(url == "https://imagostructures.com/contact-us/"){ window.location.href = "https://imagostructures.com/en/contact-us/"; }
    jQuery(function($){
	$("a[href='https://imagostructures.com/contact-us/']").attr('href', 'https://imagostructures.com/en/contact-us/');
        if($.prettyPhoto) {
            var photoGalleryImages = [], photoGalleryTitles = [];

            $('.woocommerce-main-image>img').click(function(e) {
                e.stopPropagation();
                e.preventDefault();
                $.prettyPhoto.open(photoGalleryImages,photoGalleryTitles);
            });

            $('.thumbnails>a').each( function() {
                var $this = $(this);
                photoGalleryImages.push($this.attr('href'));
                photoGalleryTitles.push($this.attr('title'));
            });
        }

        $('.thumbnails>a').click(function(e){
            e.stopPropagation();
            e.preventDefault();
			
			var photo_fullsize =  jQuery(this).attr('href');
            
            var $this = $(this).find('img');
            $('.thumbnails>a>img').removeClass('active');
            $this.addClass('active');

            var $src = $this.attr('src');
            $('.woocommerce-main-image').attr('href', photo_fullsize);
            $('.woocommerce-main-image img').attr('src', $src.replace('-<?php echo $product_thumbnail_size; ?>','-<?php echo $product_single_image_size; ?>'));

      	    var $srcset = $this.attr('srcset');
            $('.woocommerce-main-image img').attr('srcset', $srcset.replace('-<?php echo $product_thumbnail_size; ?>','-<?php echo $product_single_image_size; ?>'));  });
    });
    </script>
</body>
</html>
