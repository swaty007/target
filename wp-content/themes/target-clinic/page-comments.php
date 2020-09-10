<?php
  /* Template Name: Comments page */

  get_header();
  the_post();
  ?>
<?php //get_template_part('template-parts/sections', 'color'); ?>
<main class="content">
  <section class="section section--comments title-block default-title default-title-small bg-img-services"
    style="background-image: url(<?php the_post_thumbnail_url() ?>);">
    <div class="wrapper">
      <div class="section__content">
        <div class="text--18 breadcrumb__alex">
          <?php the_breadcrumb() ?>
        </div>
        <h1 class="text--48 default-title__text title-reviews">
          <?php the_title(); ?>
        </h1>
        <div class="text--18 default-title__subtext">
          <?php the_excerpt(); ?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
<!--           <div class="comments-slug">
            <span>Клиника TARGET занимается диагностикой и комплексной терапией более 20 видов рака, а также оперативным лечением гинекологических, урологических и ряда других заболеваний. В штате клиники работают высококвалифицированные хирурги-онкологи, химиотерапевты, гинекологи, урологи, проктологи, с многолетним опытом и стажем работы.</span>
          </div> -->
        </div>
        <div class="col-12">
          <ul class="nav nav-pills nav-comments" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                role="tab" aria-controls="pills-home" aria-selected="true"><?php pll_e('Все отзывы');?></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                role="tab" aria-controls="pills-profile" aria-selected="false"><?php pll_e('Про врачей');?></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                role="tab" aria-controls="pills-contact" aria-selected="false"><?php pll_e('По услугам');?></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-services-tab" data-toggle="pill" href="#pills-services"
                role="tab" aria-controls="pills-services" aria-selected="false"><?php pll_e('По локализациям');?></a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
              aria-labelledby="pills-home-tab">
              <?php
                $args = array(
                    // 'number'		=> 5,
                    'orderby' => 'comment_date',
                    'order' => 'DESC',
                    'type' => '', // только комментарии, без пингов и т.д...

                );

                if ($comments = get_comments($args)):?>
              <div class="comment-list">
                <?php foreach ($comments as $comment):
                  $comm_link = get_comment_link($comment->comment_ID); // может быть тяжелый запрос ...
                  $comm_short_txt = mb_substr(strip_tags($comment->comment_content), 0);
                  $rating = get_comment_meta( $comment->comment_ID, 'rating', true ); ?>
                <div class="comment-item">
                  <div class="comment-item__header">
                    <div class="comment-item__header--left">
                      <span class="comment-item--user"><?= $comment->comment_author; ?></span>
                      <span class="comment-item--date"><?= $comment->comment_date; ?></span>
                    </div>
                  </div>
                  <div class="comment-item__body">
                    <span class="comment-item--content">
                    <?= $comment->comment_content; ?>
                    </span>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
              <!-- <div class="change-comments d-flex justify-content-center">
                <button class="button button--secondary button--green__all btn-single-do text--14">
                Показать еще
                </button>
              </div> -->
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
              aria-labelledby="pills-profile-tab">
              <div class="comment-doctor">
                  <?php $loop = new WP_Query(array('post_type' => 'doctor', 'posts_per_page' => -1)); ?>
                  <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                  <?php if (!comments_open() || !get_comments_number()) continue; //пропустить записи без коментариев или выключеным коментированием?>
                    <div class="doctor-item">
                      <img src="<?php the_post_thumbnail_url() ?>" alt="Clinic Target">
                      <div class="doctor-item__body">
                        <span><?php the_title(); ?></span>
                        <ul>
                          <li><?= get_post_meta($post->ID, 'position', true); ?></li>
                        </ul>
                      </div>
                      <div class="doctor-item__footer">
                        <button class="button_get_comment button button--secondary button--green__all btn-single-do text--14" id="pills-profile-tab<?= $post->ID; ?>" data-toggle="pill"
                          href="#pills-profile<?= $post->ID; ?>" role="tab"
                          data-post-id="<?= $post->ID; ?>"
                          data-offset="0"
                          aria-controls="pills-profile<?= $post->ID; ?>">
                            <?php pll_e('Читать коментарии');?>
                        </button>
                      </div>
                    </div>
                  <?php $count++; endwhile;
                    wp_reset_query(); ?>
              </div>
              <div class="tab-content">
                <?php $loop = new WP_Query(array('post_type' => 'doctor', 'posts_per_page' => -1)); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php if (!comments_open() || !get_comments_number()) continue; ?>
                <div class="tab-pane fade" id="pills-profile<?= $post->ID; ?>" role="tabpanel"
                  aria-labelledby="pills-profile-tab<?= $post->ID; ?>">
                  <?php
                    $args = array(
                        'orderby' => 'comment_date',
                        'order' => 'DESC',
                    //                    'number' => 10,
                        'post_id' => $post->ID,
                        'type' => '', // только комментарии, без пингов и т.д...
                    );

                    if ($comments = get_comments($args)):?>
                  <div class="comment-list">
                    <?php foreach ($comments as $comment):
                      $comm_link = get_comment_link($comment->comment_ID); // может быть тяжелый запрос ...
                      $comm_short_txt = mb_substr(strip_tags($comment->comment_content), 0); ?>
                    <div class="comment-item">
                      <div class="comment-item__header">
                        <div class="comment-item__header--left">
                          <span class="comment-item--user"><?= $comment->comment_author; ?></span>
                          <span class="comment-item--date"><?= $comment->comment_date; ?></span>
                        </div>
                      </div>
                      <div class="comment-item__body">
                        <span class="comment-item--content">
                        <?= $comment->comment_content; ?>
                        </span>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                </div>
                <?php endwhile;
                  wp_reset_query(); ?>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-services" role="tabpanel"
              aria-labelledby="pills-services-tab">
              <ul class="nav nav-pills nav-comments nav-com mb-3" role="tablist">
                <?php $loop = new WP_Query(array('post_type' => 'cancer', 'posts_per_page' => -1)); ?>
                <?php $count = 0;
                  while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php if (!comments_open() || !get_comments_number()) continue; ?>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-home-tab<?= $post->ID; ?>" data-toggle="pill"
                    href="#pills-home<?= $post->ID; ?>" role="tab"
                    aria-controls="pills-home<?= $post->ID; ?>" aria-selected="true">
                  <?php the_title(); ?>
                  </a>
                </li>
                <?php $count++; endwhile;
                  wp_reset_query(); ?>
              </ul>
              <div class="tab-content">
                <?php $loop = new WP_Query(array('post_type' => 'cancer', 'posts_per_page' => -1)); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php if (!comments_open() || !get_comments_number()) continue; ?>
                <div class="tab-pane fade" id="pills-home<?= $post->ID; ?>" role="tabpanel"
                  aria-labelledby="pills-home-tab<?= $post->ID; ?>">
                  <?php
                    $args = array(
                        'orderby' => 'comment_date',
                        'order' => 'DESC',
                    //                    'number' => 10,
                        'post_id' => $post->ID,
                        'type' => '', // только комментарии, без пингов и т.д...
                    );

                    if ($comments = get_comments($args)):?>
                  <div class="comment-list">
                    <?php foreach ($comments as $comment):
                      $comm_link = get_comment_link($comment->comment_ID); // может быть тяжелый запрос ...
                      $comm_short_txt = mb_substr(strip_tags($comment->comment_content), 0); ?>
                    <div class="comment-item">
                      <div class="comment-item__header">
                        <div class="comment-item__header--left">
                          <span class="comment-item--user"><?= $comment->comment_author; ?></span>
                          <span class="comment-item--date"><?= $comment->comment_date; ?></span>
                        </div>
                      </div>
                      <div class="comment-item__body">
                        <span class="comment-item--content">
                        <?= $comment->comment_content; ?>
                        </span>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                </div>
                <?php endwhile;
                  wp_reset_query(); ?>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
              aria-labelledby="pills-contact-tab">
              <ul class="nav nav-pills nav-comments nav-com mb-3" role="tablist">
                <?php $loop = new WP_Query(array('post_type' => 'services', 'posts_per_page' => -1)); ?>
                <?php $count = 0;
                  while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php if (!comments_open() || !get_comments_number()) continue; ?>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-home-tab<?= $post->ID; ?>" data-toggle="pill"
                    href="#pills-home<?= $post->ID; ?>" role="tab"
                    aria-controls="pills-home<?= $post->ID; ?>" aria-selected="true">
                  <?php the_title(); ?>
                  </a>
                </li>
                <?php $count++; endwhile;
                  wp_reset_query(); ?>
              </ul>
              <div class="tab-content">
                <?php $loop = new WP_Query(array('post_type' => 'services', 'posts_per_page' => -1)); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php if (!comments_open() || !get_comments_number()) continue; ?>
                <div class="tab-pane fade" id="pills-home<?= $post->ID; ?>" role="tabpanel"
                  aria-labelledby="pills-home-tab<?= $post->ID; ?>">
                  <?php
                    $args = array(
                        'orderby' => 'comment_date',
                        'order' => 'DESC',
                    //                    'number' => 10,
                        'post_id' => $post->ID,
                        'type' => '', // только комментарии, без пингов и т.д...
                    );

                    if ($comments = get_comments($args)):?>
                  <div class="comment-list">
                    <?php foreach ($comments as $comment):
                      $comm_link = get_comment_link($comment->comment_ID); // может быть тяжелый запрос ...
                      $comm_short_txt = mb_substr(strip_tags($comment->comment_content), 0); ?>
                    <div class="comment-item">
                      <div class="comment-item__header">
                        <div class="comment-item__header--left">
                          <span class="comment-item--user"><?= $comment->comment_author; ?></span>
                          <span class="comment-item--date"><?= $comment->comment_date; ?></span>
                        </div>
                      </div>
                      <div class="comment-item__body">
                        <span class="comment-item--content">
                        <?= $comment->comment_content; ?>
                        </span>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                </div>
                <?php endwhile;
                  wp_reset_query(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer();
  ?>
