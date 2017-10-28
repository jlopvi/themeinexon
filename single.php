<?php
// /**
//  * The template for displaying all single posts and attachments
//  *
//  * @package WordPress
//  * @subpackage Twenty_Fifteen
//  * @since Twenty Fifteen 1.0
//  */

get_header(); ?>

	<div class="container py-3">
		<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php
					$category = get_the_category();
					$categoryName = $category[0]->name;
					$categoryNiceName = $category[0]->category_nicename;
					$categorySlug = $category[0]->slug;
					$get_author_id = get_the_author_meta('ID');
					$get_author_name = get_the_author_meta('user_nicename');

					$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));

				 ?>
			<div class="col-12 col-sm-9">
				<div class="ieo-post-page py-3 px-2">
					<header class="ieo-post-page-header d-flex align-items-center">
						<div class="">
							<h3 class="ieo-post-category <?php echo '--cat-'.$categorySlug; ?>">
								<a href="/<?php echo $categorySlug ?>" class="ieo-post-category-name  px-1 py-1">
									<?php
										echo $categoryName;
									 ?>
								</a>
							</h3>
							<h1 class="ieo-title">
								<?php the_title(); ?>
							</h1>

						</div>

						<div class="ieo-post-page-header-info  ml-auto">
							<div class="d-flex align-items-center">
								<a href="<?php echo get_author_posts_url( $get_author_id, $get_author_name);  ?>">
									<img class="ieo-post-page-header-info-avatar mr-1" src="<?php echo $get_author_gravatar; ?>" alt="" height="50">
								</a>
								<div class="">
									<a href="<?php echo get_author_posts_url( $get_author_id, $get_author_name);  ?>" class="ieo-post-page-header-info-user">
										<?php the_author() ?>
									</a>
									<div class="ieo-post-category-date ml-auto">
										<?php echo 'Hace '.human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
									</div>
								</div>

							</div>
						</div>

					</header>
					<div class="ieo-post-thumbnail">
						<?php
						if ( has_post_thumbnail() ) {
								the_post_thumbnail();
						}

						?>
					</div>
					<div class="py-3">
						<?php the_content(); ?>
					</div>
					<?php

					the_post_navigation( array(
						'next_text' => ' <span class="ieo-btn --orange"><i class="zmdi zmdi-chevron-left"></i></span>'.
						'<span class="post-title">%title</span>',

						'prev_text' => '<span class="post-title">%title</span>' .
						'<span class="ieo-btn --orange"><i class="zmdi zmdi-chevron-right"></i></span>',
					) );

				 ?>

				</div>
			</div>
			<aside class="col-12 col-sm-3">
				Publicidad
			</aside>
		</div>
	</div>

		<?php
		// Start the loop.
		// while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			// the_title();


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// Previous/next post navigation.


		// End the loop.
		endwhile;
		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
