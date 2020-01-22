<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gns-theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments order-num1">


	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :?>
		<h3 class="title--small">
			<?php
			$gns_theme_comment_count = get_comments_number();
			if ( '1' === $gns_theme_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'gns-theme' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $gns_theme_comment_count, 'comments title', 'gns-theme' ) ),
					number_format_i18n( $gns_theme_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h3><!-- .comments-title -->

        <div class="comments__form">
            <form action="">
                <img src="../assets/images/noavatar92.svg" alt="" class="user-img">
                <label for="name">
                    <input type="text" id="name" placeholder="Имя">
                </label>
                <textarea name="" id="" cols="30" rows="10"
                          placeholder="Комментарий"></textarea>
                <button type="submit" class="button--secondary button--green text--14">
                    отправить
                </button>
            </form>
        <?php comment_form();?>
        </div>
        <div class="comments__messages">
            <div class="comments--message">
                <img src="../assets/images/noavatar92.svg" alt="" class="user-img">
                <p class="message--head text">
                    <label class="user-name">Петя Петрович</label>
                    <label class="message-time">18.05, 12:22</label>
                </p>
                <p class="message-text text">
                    В апреле 2018 года я сдал свою Киа Сид по отзывной кампании в салон
                    официального дилера.
                    Там ее починили, сломали и снова починили. Я потерял немного времени, но
                    зато ничего за
                    это не платил. Пока машину чинили, ездил на подменном автомобиле от салона.
                </p>
                <button class="message-answer text">ОТВЕТИТЬ</button>
            </div>
            <div class="comments--message">
                <img src="../assets/images/noavatar92.svg" alt="" class="user-img">
                <p class="message--head text">
                    <label class="user-name">Иван Гамаз</label>
                    <label class="message-time">18.05, 12:22</label>
                </p>
                <p class="message-text text">
                    В апреле 2018 года я сдал свою Киа Сид по отзывной кампании в салон
                    официального дилера.
                    Там ее починили, сломали и снова починили. Я потерял немного времени, но
                    зато ничего за
                    это не платил. Пока машину чинили, ездил на подменном автомобиле от салона.
                </p>
                <button class="message-answer text">ОТВЕТИТЬ</button>
                <div class="comments--message comments--message--answer">
                    <img src="../assets/images/noavatar92.svg" alt="" class="user-img">
                    <p class="message--head text">
                        <label class="user-name">Диана Шуригина</label>
                        <label class="message-time">18.05, 12:22</label>
                    </p>
                    <p class="message-text text">
                        Я не знаю эту историю, могу лишь предполагать. За все в этой жизни нам
                        приходится
                        платить. Если она действительно такая коварная, что сначала согласилась
                        на близость
                        с
                        молодым человеком, а затем заявила, что этого не хотела, ей за это
                        воздастся
                    </p>
                    <button class="message-answer text">ОТВЕТИТЬ</button>
                </div>
            </div>
        </div>
		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'gns-theme' ); ?></p>
			<?php
		endif; ?>

	<?php endif; // Check for have_comments().
	?>

</div><!-- #comments -->
