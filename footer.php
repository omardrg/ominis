<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ominis
 */

global $dataOminis;
?>

					</div> <!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /#content -->
			<?php if ( is_active_sidebar( 'social-1' ) ) : ?>
				<aside class="py-3 bg-secondary text-white text-center">
					<div class="row">
						<div class="col-md">
							<?php dynamic_sidebar('social-1'); ?>
						</div><!-- /.col -->
					</div>
				</aside>
			<?php endif; ?>
			<aside class="py-3 bg-light">
				<div class="container">
					<div class="row">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="col-md">
							<?php dynamic_sidebar('footer-1'); ?>
						</div><!-- /.col -->
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="col-md">
							<?php dynamic_sidebar('footer-2'); ?>
						</div><!-- /.col -->
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="col-md">
							<?php dynamic_sidebar('footer-3'); ?>
						</div><!-- /.col -->
					<?php endif; ?>
					</div> <!-- /.row -->
				</div><!-- /.container -->
			</aside>
			<footer id="colophon" class="site-footer text-light bg-dark py-2">
				<div class="container">
					<div class="row">
						<div class="site-info col-10">
							<?php echo $dataOminis['credits'];?>
							<?php echo ( $dataOminis['cookies'] != 0 )?  "- <a class=\"link-light\" href=\"".get_permalink($dataOminis['cookies'])."\">".get_the_title($dataOminis['cookies'])."</a>" :  "";?>
							<?php echo ( get_privacy_policy_url() != "" )?  "- <a class=\"link-light\" href=\"".get_privacy_policy_url()."\">".__( 'Privacy policy', 'ominis' )."</a>" :  "";?>
						</div><!-- /.site-info -->
						<div class="col-2 text-right">
							<a href="#top" class="jquery-pag text-light">
								<span class="fa-stack fa-1x">
									<i class="fas fa-square fa-stack-2x"></i>
									<i class="fas fa-arrow-up fa-stack-1x text-dark"></i>
								</span>
							</a>
						</div><!-- /.col -->
					</div> <!-- /.row -->
				</div><!-- /.container -->
			</footer><!-- /#colophon -->
		</div><!-- /#page -->

<?php wp_footer(); ?>

	</body>
</html>
