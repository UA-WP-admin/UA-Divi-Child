<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">

			<!-- begin modification -->

			<?php // get_sidebar( 'footer' ); ?>

			<?php if( get_theme_mod('footer_nav_position', 'above') == 'below' ) { get_sidebar( 'footer' ); } ?>

			<!-- end modification -->

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

			<!-- begin modification -->

			<?php if( get_theme_mod('footer_nav_position', 'above') == 'above' ) { get_sidebar( 'footer' ); } ?>
				
			<?php do_action('tr_footer_notification_area'); ?>

			<!-- end modification -->

				<div id="footer-bottom">
					<div class="container clearfix">
					<?php
						if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
							get_template_part( 'includes/social_icons', 'footer' );
						}
					?>

					<!-- begin modification -->

					<?php if(class_exists('Division') && function_exists('tr_get_subfooter_content')) { 

						echo '<div id="footer-info">';
							tr_get_subfooter_content();
						echo '</div>';

					} else { ?>

						<p id="footer-info"><?php printf( __( 'Designed by %1$s | Powered by %2$s', 'Divi' ), '<a href="http://www.elegantthemes.com" title="Premium WordPress Themes">Elegant Themes</a>', '<a href="http://www.wordpress.org">WordPress</a>' ); ?></p>				
					
					<?php } ?>						
				
					<!-- end modification -->
					
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>