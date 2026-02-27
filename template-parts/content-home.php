<?php
/**
 * Template part for displaying posts in home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ominis
 */

?>

					<div class="col-md-6 col-lg-4 px-0">
						<div class="card rounded-0 border-dark">
							<div class="card-body p-3">
								<h5 class="card-title text-center m-0">
									<a class="text-dark" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
										<?php echo get_the_title();?>
									</a>
								</h5>
								<p class="text-center m-0 d-none">
									<?php the_category(', '); ?>
								</p>
							</div><!-- /.card-body -->

							<figure class="figure my-0">
								<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
									<?php
									the_post_thumbnail( 'post-thumbnail ', array(
										'alt' => the_title_attribute( array(
											'echo' => false,
										) ),
									) );
									?>
								</a>
								<figcaption class="figure-caption p-3">
									<a class="post-thumbnail text-light" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
										<?php echo get_the_excerpt();?>
									</a>
								</figcaption>
							</figure>
						</div><!-- /.card -->
					</div>

