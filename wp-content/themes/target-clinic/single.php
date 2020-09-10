<?php

  get_header();
the_post(); ?>

      <main class="content">
          <section class="section section--blog--list blog--list--item">
              <div class="wrapper">
                  <div class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                  </div>
                  <div class="wrapper-920-left">
                      <h1>
                          <?php the_title() ?>
                      </h1>
                      <div class="section--default section--blog-item">
                          <div class="blog-date"><?php the_modified_time('F jS, Y'); ?></div>
                          <div class="section--large-text">
                              <img class="" src="<?php the_post_thumbnail_url() ?>" alt="">
                              <?php the_content(); ?>
							  
							   <?php if( have_rows('service_meta_info') ): ?>
								  <?php while( have_rows('service_meta_info') ): the_row(); ?>
									<div class="meta-page">
									  <span class="author-meta">Автор статьи: <?php the_sub_field('author'); ?></span>
									  <a href="<?php the_sub_field('link');?>" class="link-meta"><?php the_sub_field('link'); ?></a>
									</div>
								  <?php endwhile; ?>
							  <?php endif; ?>

                              <div class="change-order-mob comment-single-page mt-5">
								  <div class="title-box title-box-servies flex-block mb-0"><h3 class="mb-0" style="color: black;"><?php pll_e('Отзыв о услуге');?></h3></div>
									<?php // get_template_part('template-parts/sections', 'contact-form-callback'); ?>
									<?php
									// If comments are open or we have at least one comment, load up the comment template.
									if (comments_open() || get_comments_number()) :
										comments_template();
									endif; ?>
									<div class="change-comments d-flex justify-content-center">
									  <button data-toggle="modal" data-target="#modalCommentForm" type="button" class="button button--secondary button--green__all btn-single-do text--14"><?php pll_e('Оставить отзыв');?></button>
									  <!-- <button onclick="window.location.href='/comments'" class="button button--secondary button--white__all btn-single-do text--14">Все отзывы</button> -->
									</div>
								</div>

                              <h2 class="mt-5 title--small">
                                  <?php pll_e('Читайте также');?>
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
