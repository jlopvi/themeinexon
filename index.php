<?php get_header(); ?>
      <!-- fiincabecera -->

      <!-- Cover -->
      <div class="container-fluid ieo-category ">
        <div class="container py-4">
          <h2 class="ieo-title">Que quieres aprender hoy?</h2>
          <div class="row ">

            <div class="ieo-category-item px-1 col-12 col-sm-6 col-md-4 col-lg-3 my-sm-1">
              <a href="#" class="ieo-category-link --cat-bo py-3 px-3">
                <div class="ieo-category-img">
                  <img class="" src="img/category/binaryoption.jpg" height="70">
                </div>
                <h3 class="ieo-category-title px-2">Opciones binarias</h3>
              </a>
            </div>

            <div class="ieo-category-item px-1 col-12 col-sm-6 col-md-4 col-lg-3 my-sm-1">
              <a href="#" class="ieo-category-link --aqua py-3 px-3">
                <div class="ieo-category-img">
                  <img class="" src="img/category/binaryoption.jpg" height="70">
                </div>
                <h3 class="ieo-category-title px-2">Opciones binarias</h3>
              </a>
            </div>

            <div class="ieo-category-item px-1 col-12 col-sm-6 col-md-4 col-lg-3 my-sm-1">
              <a href="#" class="ieo-category-link --green py-3 px-3">
                <div class="ieo-category-img">
                  <img class="" src="img/category/binaryoption.jpg" height="70">
                </div>
                <h3 class="ieo-category-title px-2">Opciones binarias</h3>
              </a>
            </div>
            <div class="ieo-category-item px-1 col-12 col-sm-6 col-md-4 col-lg-3 my-sm-1">
              <a href="#" class="ieo-category-link --blue py-3 px-3">
                <div class="ieo-category-img">
                  <img class="" src="img/category/binaryoption.jpg" height="70">
                </div>
                <h3 class="ieo-category-title px-2">Opciones binarias</h3>
              </a>
            </div>






          </div>
        </div>
      </div>

      <!-- finCover -->


      <!-- Posts -->

      <section class="ieo-post container-fluid py-4">
        <div class="container">
          <h2 class="ieo-title">Mira esto lo escribimos hace poco</h2>
          <div class="row row-eq-height">



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
                <div class="col-12  col-md-6 col-lg-4 my-2 px-2">
                  <div class="ieo-post-item px-3">
                    <div class="ieo-post-category <?php echo '--cat-'.$categorySlug; ?>">
                      <h3>
                        <a href="/<?php echo $categorySlug ?>" class="ieo-post-category-name  px-1 py-1">
                          <?php
                            echo $categoryName;
                           ?>
                        </a>
                      </h3>
                      <span class="ieo-post-category-date ml-auto">
                        <?php echo 'Hace '.human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
                      </span>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="ieo-post-link">
                      <div class="ieo-post-thumbnail">
                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        }

                        ?>
                      </div>
                      <div class="ieo-post-copy text-justify py-2">
                        <h1 class="ieo-post-title">
                          <?php the_title(); ?>
                        </h1>
                        <div class="ieo-post-text">
                          <?php the_excerpt(); ?>
                        </div>
                      </div>
                    </a>
                    <div class="ieo-post-footer pb-2">
                      <a href="<?php echo get_author_posts_url( $get_author_id, $get_author_name);  ?>" class="ieo-post-author">
                        <img class="ieo-post-author-photo" src="<?php echo $get_author_gravatar; ?>" alt="">
                        <span class="ieo-post-author-name"><?php the_author() ?></span>
                      </a>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
              </div>
              <?php wordpress_numeric_post_nav(); ?>
            <?php else : ?>
              <?php echo '<h1 class="page-title screen-reader-text">No Posts Found</h1>'; ?>
            <?php endif ?>





        </div>
      </section>


      <!-- FinPOst -->


<?php get_footer(); ?>
