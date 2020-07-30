<?php

  get_header();
the_post(); ?>

      <main class="content">
          <section class="section section--blog--list blog--list--item">
              <div class="wrapper">
                  <h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                  </h3>
                  <div class="wrapper-920-left">
                      <h1>
                          <?php the_title() ?>
                      </h1>
                      <div class="section--default section--blog-item">
                          <div class="blog-date"><?php the_modified_time('F jS, Y'); ?></div>
                          <div class="section--large-text">
                              <img class="" src="<?php the_post_thumbnail_url() ?>" alt="">
                              <?php the_content(); ?>

                              <?php
                              // If comments are open or we have at least one comment, load up the comment template.
                              if (comments_open() || get_comments_number()) :
                                  comments_template();
                              endif; ?>

                              <h2 class="title--small">
                                  Читайте также
                              </h2>
                          </div>
                      </div>
                  </div>
                  <div class="content-image-box content-link-box">
                      <?php $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'post__not_in' => [$post->ID] ) ); ?>
                      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                          <a href="<?php the_permalink(); ?>" class="link-box">
                              <div class="link-box__image">
                                  <img src="<?php the_post_thumbnail_url();?>" alt="">
                              </div>
                              <div class="link-box__text">
                                  <h2 class="text--20">
                                      <?php the_title();?>
                                  </h2>
                                  <p class="text--16">
                                      <?php the_excerpt();?>
                                  </p>
                              </div>
                              <div class="link-box__footer">
                                  <p class="link-box-date">
                                      <?php the_modified_time('F jS, Y'); ?>
                                  </p>
                              </div>
                          </a>
                      <?php endwhile; wp_reset_query(); ?>
                  </div>

              </div>
          </section>
      </main>


  <?php get_footer(); ?>
