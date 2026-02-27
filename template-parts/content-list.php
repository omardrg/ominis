<?php
/**
 * Template part for displaying posts in home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ominis
 */

?>

					<div class="col-md-6 col-lg-4">
						<div class="card rounded-0 border-dark text-center mb-3 pt-3 h-100">
							<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
								<?php
								the_post_thumbnail( 'post-thumbnail ', array(
									'alt' => the_title_attribute( array(
										'echo' => false,
									) ),
								) );
								?>
							</a>
							<div class="card-body p-3  d-flex flex-column">
								<h5 class="card-title text-center">
									<a class="text-dark text-decoration-none" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
										<?php echo get_the_title();?>
									</a>
								</h5>
								<p class="text-center me-auto">
									<?php echo get_the_excerpt();?>
								</p>
								<p class="mb-0 mt-auto text-center">
									<a href="<?php the_permalink(); ?>" class="btn btn-dark text-light d-block"><?php _e( 'Read more', 'ominis' );?></a>
								</p>
							</div><!-- /.card-body -->

						</div><!-- /.card -->
					</div>

