<?php
/* Template Name: Comments page */

get_header();
the_post();
?>
<?php get_template_part('template-parts/sections', 'color'); ?>

<main class="content">
    <section class="section title-block default-title default-title-small bg-img-services"
             style="background-image: url(<?php the_post_thumbnail_url() ?>);">
        <div class="wrapper">
            <div class="section__content">
                <h3 class="text--18 breadcrumb__alex">
                    <?php the_breadcrumb() ?>
                </h3>
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
              <div class="comments-slug">
                <span>Клиника TARGET занимается диагностикой и комплексной терапией более 20 видов рака, а также оперативным лечением гинекологических, урологических и ряда других заболеваний. В штате клиники работают высококвалифицированные хирурги-онкологи, химиотерапевты, гинекологи, урологи, проктологи, с многолетним опытом и стажем работы.</span>
              </div>
            </div>
            <div class="col-12">
              <ul class="nav nav-pills nav-comments" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Об онкоцентре</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">О врачах</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">О лечении</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                  <?php
                  $args = array(
                    'number' => 10,
                    'orderby' => 'comment_date',
                    'order' => 'DESC',
                    'number' => 2,
                    //'post_id' => 0,
                    'type' => '', // только комментарии, без пингов и т.д...
                  );

                  if( $comments = get_comments( $args ) ){
                    echo '<div class="comment-list">';
                    foreach( $comments as $comment ){
                      $comm_link = get_comment_link( $comment->comment_ID ); // может быть тяжелый запрос ...
                      $comm_short_txt = mb_substr( strip_tags( $comment->comment_content ), 0 );

                      echo '
                      <div class="comment-item">
                        <div class="comment-item__header">
                          <div class="comment-item__header--left">
                            <span class="comment-item--user">' . $comment->comment_author . '</span>
                            <span class="comment-item--date">' . $comment->comment_date . '</span>
                          </div>
                          <div class="comment-item--rate">
                            rate
                          </div>
                        </div>
                        <div class="comment-item__body">
                          <span class="comment-item--content">
                            ' . $comment->comment_content . '
                          </span>
                        </div>
                      </div>
                      ';
                    }
                    echo '</div>';
                  }
                  ?>

                  <div class="change-comments d-flex justify-content-center">
                    <button class="button button--secondary button--green__all btn-single-do text--14">Показать еще</button>
                  </div>


                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                  <div class="comment-doctor">
                    <div class="doctor-item">
                      <img src="http://c-targ.loc/wp-content/uploads/2020/01/111-1.png" alt="Clinic Target">
                      <div class="doctor-item__body">
                        <h1>Киричевский Станислав Игоревич</h1>
                        <ul>
                          <li>Онкохирург</li>
                          <li>Профессор</li>
                          <li>Доктор медицинских наук</li>
                        </ul>
                      </div>
                      <div class="doctor-item__footer">
                        <button class="button button--secondary button--green__all btn-single-do text--14">Читать коментарии</button>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">


                  <ul class="nav nav-pills nav-comments mb-3" id="pills-tab2" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pills-home-tab2" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-home2" aria-selected="true">Химия</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#pills-profile2" role="tab" aria-controls="pills-profile2" aria-selected="false">Таргетная терапия</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="pills-contact2" aria-selected="false">Иммунотерапия</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">

                      <ul class="nav nav-pills nav-comments mb-3" id="pills-tab2" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-home-tab3" data-toggle="pill" href="#pills-home3" role="tab" aria-controls="pills-home3" aria-selected="true">GIST</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-profile-tab3" data-toggle="pill" href="#pills-profile3" role="tab" aria-controls="pills-profile3" aria-selected="false">Рак поджелудочной железы</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-contact-tab3" data-toggle="pill" href="#pills-contact3" role="tab" aria-controls="pills-contact3" aria-selected="false">Меланома</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-home3" role="tabpanel" aria-labelledby="pills-home-tab3">GIST</div>
                        <div class="tab-pane fade" id="pills-profile3" role="tabpanel" aria-labelledby="pills-profile-tab3">Рак поджелудочной железы</div>
                        <div class="tab-pane fade" id="pills-contact3" role="tabpanel" aria-labelledby="pills-contact-tab3">Меланома</div>
                      </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab2">Таргетная терапия</div>
                    <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2">Иммунотерапия</div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section>

    </section>

</main>

<?php get_footer();
?>
