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
		<?php $postid = '';?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php
					$postid = get_the_ID();
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
				<div class="ieo-post-page py-3 px-2 mt-2">
				<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
				</div>
			</div>
			<aside class="col-12 col-sm-3">
				<div class="fake-publi">

				</div>
				<div >
					<?php
					// Default arguments
					$args = array(
						'posts_per_page' => 3, // How many items to display
						'post__not_in'   => array( $postid ), // Exclude current post
						'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
					);

					// Check for current post category and add tax_query to the query arguments
					$cats = wp_get_post_terms( get_the_ID(), 'category' );
					$cats_ids = array();
					foreach( $cats as $wpex_related_cat ) {
						$cats_ids[] = $wpex_related_cat->term_id;
					}
					if ( ! empty( $cats_ids ) ) {
						$args['category__in'] = $cats_ids;
					}

					// Query posts
					$wpex_query = new wp_query( $args );

					// Loop through posts
					foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>

						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>

					<?php
					// End loop
					endforeach;

					// Reset post data
					wp_reset_postdata(); ?>
				</div>
			</aside>
		</div>
	</div>

	<div class="container">

	</div>
		<?php
		// End the loop.
		endwhile;
		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
