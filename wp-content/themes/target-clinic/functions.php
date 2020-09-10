<?php

//require get_theme_file_path('/inc/search-lots-route.php');
require get_theme_file_path('/inc/custom-header.php');
require get_theme_file_path('/inc/telegram.php');


if ( ! function_exists( 'target_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function target_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on target, use a find and replace
         * to change 'target' to the name of your theme in all the template files.
         */
        //load_theme_textdomain( 'target', get_template_directory() . '/languages' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo' );
        add_post_type_support( 'page', 'excerpt' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'target' ),
        ) );
        register_nav_menus( array(
            'menu-2' => esc_html__( 'Footer', 'target' ),
        ) );


    }
endif;
add_action( 'after_setup_theme', 'target_setup' );

function your_theme_customizer_setting($wp_customize) {
// add a setting
    $wp_customize->add_setting('your_theme_scroll_logo');
    $wp_customize->add_setting('your_theme_color_logo');
// Add a control to upload the hover logo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'your_theme_scroll_logo', array(
        'label' => 'Upload Scroll Logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'your_theme_scroll_logo',
        'priority' => 8 // show it just below the custom-logo
    )));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'your_theme_color_logo', array(
        'label' => 'Upload Color Logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'your_theme_color_logo',
        'priority' => 8 // show it just below the custom-logo
    )));
}

//	=============
//  Comment
//  =============


// Добавляем поля для всех пользователей
// add_action( 'comment_form_logged_in_after', 'extend_comment_custom_fields' );
// add_action( 'comment_form_after_fields', 'extend_comment_custom_fields' );
// function extend_comment_custom_fields() {
//
// 	echo '<div class="rating-area">';
//
// 	for( $i=1; $i <= 5; $i++ ){
// 		echo '
//     <label for="star-'. $i .'" title="Оценка 1"><input type="radio" id="star-'. $i .'" name="rating" value="'. $i .'"/>
//     </label>';
// 	}
//
// 	echo '</div>';
// }

// Сохранение данных из полей во фронт-энде
// add_action( 'comment_post', 'save_extend_comment_meta_data' );
// function save_extend_comment_meta_data( $comment_id ){
//
// 	if( !empty( $_POST['rating'] ) ){
// 		$rating = intval($_POST['rating']);
// 		add_comment_meta( $comment_id, 'rating', $rating );
// 	}
//
// }

// Проверяем, заполнено ли поле "Рейтинг"
// add_filter( 'preprocess_comment', 'verify_extend_comment_meta_data' );
// function verify_extend_comment_meta_data( $commentdata ) {
//
// 	if ( empty( $_POST['rating'] ) || ! (int)$_POST['rating'] )
// 		wp_die( __( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.' ) );
//
// 	return $commentdata;
// }

// Отображение содержимого метаполей во фронт-энде
// add_filter( 'comment_text', 'modify_extend_comment');
// function modify_extend_comment( $text ){
// 	global $post;
//
// 	if( $commenttitle = get_comment_meta( get_comment_ID(), 'title', true ) ) {
// 		$commenttitle = '<strong>' . esc_attr( $commenttitle ) . '</strong><br/>';
// 		$text = $commenttitle . $text;
// 	}
//
// 	if( $commentrating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
//
// 		$commentrating = wp_star_rating( array (
// 			'rating' => $commentrating,
// 			'echo'=> false
// 		));
//
// 		$text = $text . $commentrating;
// 	}
//
// 	return $text;
// }

add_action( 'wp_enqueue_scripts', 'check_count_extend_comments' );
function check_count_extend_comments(){
	global $post;

	if( isset($post) && (int)$post->comment_count > 0 ){
		require_once ABSPATH .'wp-admin/includes/template.php';
		add_action('wp_enqueue_scripts', function(){
			wp_enqueue_style('dashicons');
		});

		$stars_css = '
		.star-rating .star-full:before { content: "\f155"; }
		.star-rating .star-empty:before { content: "\f154"; }
		.star-rating .star {
			color: #0074A2;
			display: inline-block;
			font-family: dashicons;
			font-size: 20px;
			font-style: normal;
			font-weight: 400;
			height: 20px;
			line-height: 1;
			text-align: center;
			text-decoration: inherit;
			vertical-align: top;
			width: 20px;
		}
		';

		wp_add_inline_style( 'dashicons', $stars_css );
	}

}

// Добавляем новый метабокс на страницу редактирования комментария
add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
function extend_comment_add_meta_box(){
	add_meta_box( 'title', __( 'Comment Metadata - Extend Comment' ), 'extend_comment_meta_box', 'comment', 'normal', 'high' );
}

// Отображаем наши поля
function extend_comment_meta_box( $comment ){
	$rating = get_comment_meta( $comment->comment_ID, 'rating', true );

	wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
	?>
	<p>
		<label for="rating"><?php _e( 'Rating: ' ); ?></label>
		<span class="commentratingbox">
		<?php
		for( $i=1; $i <= 5; $i++ ){
		  echo '
		  <span class="commentrating">
			<input type="radio" name="rating" id="rating" value="'. $i .'" '. checked( $i, $rating, 0 ) .'/>
		  </span>';
		}
		?>
		</span>
	</p>
	<?php
}

add_action( 'edit_comment', 'extend_comment_edit_meta_data' );
function extend_comment_edit_meta_data( $comment_id ) {
	if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) )
	return;

	if( !empty($_POST['rating']) ){
		$rating = intval($_POST['rating']);
		update_comment_meta( $comment_id, 'rating', $rating );
	}
	else
		delete_comment_meta( $comment_id, 'rating');

}




//	=============
//  Comment END
//	=============

add_action('customize_register', 'your_theme_customizer_setting');

function target_files() {
//  wp_enqueue_script('main-target-js', get_template_directory_uri() .'/js/scripts-bundled.js','','',true);
  wp_enqueue_script('slick-js', get_template_directory_uri() .'/js/slick.min.js','','',true);
  wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js',['jquery'],'',true);
  wp_enqueue_script('owlcarousel-js', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js','','',true);
  wp_enqueue_script('main-target-js', get_template_directory_uri() .'/js/main.js','','',true);
  wp_enqueue_style('target_main_styles', get_stylesheet_uri(), [], 2);
  wp_enqueue_style( 'target-style', get_template_directory_uri() . '/css/master.css' );
  wp_enqueue_style('fancybox-css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
  wp_enqueue_style('owlcarousel-css', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css');
  wp_localize_script('main-target-js', 'targetData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce( 'protection' ),
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
//      'language' => pll_current_language()
  ));
}
add_action('wp_enqueue_scripts', 'target_files');

function cc_mime_types($mime_types) {
//    $mime_types['svg'] = 'image/svg+xml';
    $mime_types['svg'] = 'image/svg';
    return $mime_types;
}
add_filter('upload_mimes', 'cc_mime_types');

acf_register_form(array(
  'id'		=> 'reviews_form',
  'post_id'	=> 'new_post',
  'new_post'	=> array(
    'post_type'		=> 'название поста к которому форма принадлежит',
    'post_status'	=> 'pending' // статус " на модерации", другие статусы чекните в гугле
  ),
  'post_title'=> true, // по стандарту поле заглавие должно быть любим но должно, acf поля подключатся сами.
));


function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

// function for higlight active page
function menuActivePage($pageslug){
	if(is_page($pageslug)) {
		return 'menu__list-item--active';
	}
}

//create array of photos for lot
function lot_album_url_array($array){
  return array_map("get_url_from_img_id", $array);
}

// Only for geting img url
function get_url_from_img_id($id)
{
    return wp_get_attachment_image_url($id,'full');
}

//comment form
add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
   // (print_r( $fields )); // посмотрим какие поля есть

    $new_fields = array(); // сюда соберем поля в новом порядке
    $myorder = array('author','email','url','comment', 'rate'); // нужный порядок

    foreach( $myorder as $key ){
        $new_fields[ $key ] = $fields[ $key ];
        unset( $fields[ $key ] );
    }

    // если остались еще какие-то поля добавим их в конец
    if( $fields )
        foreach( $fields as $key => $val )
            $new_fields[ $key ] = $val;

    return $new_fields;
}

//comments template
function mytheme_comment( $comment, $args, $depth ) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }

    $classes = ' ' . comment_class( $depth > 1 ? 'comments--message comments--message--answer' : 'comments--message', null, null, false );
    ?>

    <<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comments--message"><?php
    } ?>
<!--    <div class="comment-author vcard">-->
        <?php
        if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, $args['avatar_size'],'', 'avatar', ['class' => 'user-img'] );
        }
//        printf(
//            __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ),
//            get_comment_author_link()
//        );
        ?>
<!--    </div>-->

    <?php if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation">
            <?php _e( 'Your comment is awaiting moderation.' ); ?>
        </em><br/>
    <?php } ?>
    <p class="message--head text">
        <label class="user-name">
            <?php printf(get_comment_author_link());?>
        </label>
        <label class="message-time"><?php
            printf(
                __( '%1$s %2$s' ),
                get_comment_date(),
                get_comment_time()
            ); ?>
            <?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?></label>
    </p>
<!--    <div class="comment-meta commentmetadata">-->
<!--        <a href="--><?php //echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?><!--">-->
<!--            --><?php
//            printf(
//                __( '%1$s at %2$s' ),
//                get_comment_date(),
//                get_comment_time()
//            ); ?>
<!--        </a>-->
<!--        --><?php //edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
<!--    </div>-->

    <p class="message-text text">
        <?= htmlspecialchars(get_comment_text()); ?>
    </p>


<!--    <div class="reply">-->
        <?php
        comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth']
                )
            )
        ); ?>
<!--    </div>-->

    <?php if ( 'div' != $args['style'] ) { ?>
        </div>
    <?php }
}
add_filter('comment_reply_link', 'replace_reply_link_class');
function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='message-answer text", $class);
    return $class;
}


function the_breadcrumb(){

    // получаем номер текущей страницы
    $pageNum = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $separator = ' / '; //  »
//    global $post;
//    if ( $post->post_parent ) {
//        $parent_id  = $post->post_parent; // присвоим в переменную
//        $breadcrumbs = array();
//        while ( $parent_id ) {
//            $page = get_page( $parent_id );
//            $breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
//            $parent_id = $page->post_parent;
//        }
//        echo join( $separator, array_reverse( $breadcrumbs ) ) . $separator;
//    }
    // если главная страница сайта
//    if( is_tax( $taxonomy_name ) ) {
//        single_term_title();
//    }
    if( is_front_page() ){

        if( $pageNum > 1 ) {
            echo '<a class="text--18" href="' . site_url() . '">Главная</a>' . $separator . $pageNum . '-я страница';
        } else {
            echo 'Вы находитесь на главной странице';
        }

    } else { // не главная

        echo '<a class="text--18" href="' . site_url() . '">Главная</a>' . $separator;


        if( is_single() ){ // записи
            if (empty(get_the_category_list())) {
//                get_post_type();
//                var_dump(get_post_type());
//                the_title();
//                the_category(', ');
//                switch (get_post_type()) {
//                    case 'cancer':
//                        break;
//                }
            } else {
                the_category(', ');echo $separator;
            }
             the_title();

        } elseif ( is_page() ){ // страницы WordPress

            echo '<span class="cell-for-text">';the_title();echo'</span>';

        } elseif ( is_category() ) {

            echo '<span class="cell-for-text">';single_cat_title();echo'</span>';

        } elseif ( is_home() ) {

            echo '<span class="cell-for-text">';single_post_title();echo'</span>';

        } elseif( is_tag() ) {

            echo '<span class="cell-for-text">';single_tag_title();echo'</span>';

        } elseif ( is_day() ) { // архивы (по дням)

            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $separator;
            echo get_the_time('d');

        } elseif ( is_month() ) { // архивы (по месяцам)

            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
            echo get_the_time('F');

        } elseif ( is_year() ) { // архивы (по годам)

            echo get_the_time('Y');

        } elseif ( is_author() ) { // архивы по авторам

            global $author;
            $userdata = get_userdata($author);
            echo 'Опубликовал(а) ' . $userdata->display_name;

        } elseif ( is_404() ) { // если страницы не существует

            echo 'Ошибка 404';

        }

        if ( $pageNum > 1 ) { // номер текущей страницы
            echo ' (' . $pageNum . '-я страница)';
        }

    }

}



//Opti start
add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}
//add_filter('script_loader_tag', 'add_async_attribute', 49, 3);
function add_async_attribute($tag, $handle, $src) {
    if(is_admin()) {return $tag;}
    // добавьте дескрипторы (названия) скриптов в массив ниже
    $scripts_to_async = array('jquery-core');
    foreach($scripts_to_async as $async_script) {
        if ($async_script === $handle) {
            return str_replace(' src', ' src', $tag);
        } else {
            return str_replace(' src', ' defer src', $tag);
        }
    }
    return $tag;
}
//add_filter('style_loader_tag', 'async_load_css', 10, 4);
function async_load_css ($html, $handle, $href, $media) {
    if( is_admin() ){return $html;} //если в админке

    //$href = str_replace('https://example.com/','/',$href);

    if( strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false ||
        strpos($_SERVER['HTTP_USER_AGENT'],'Firefox')!==false ||
        strpos($_SERVER['HTTP_USER_AGENT'],'rv:11.0')!==false ) {
        return $html;
        //        return '<script async id="'.$handle.'-css-js">var async_css = document.createElement( "link" );async_css.id = "'.$handle.'-css";async_css.rel = "stylesheet";async_css.href = "'.$href.'";document.body.insertBefore( async_css, document.body.childNodes[ document.body.childNodes.length - 1 ].nextSibling );</script>';
//        return '<script async>var async_css = document.createElement( "link" );async_css.rel = "stylesheet";async_css.href = "'.$href.'";document.body.insertBefore( async_css, document.body.childNodes[ document.body.childNodes.length - 1 ].nextSibling );</script>';
    } else {
        return str_replace(" rel='stylesheet'", " rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet';\" ", $html);
    }
}

add_action( 'wp_enqueue_scripts', 'my_jquery_cdn_method', 1);
function my_jquery_cdn_method() {
//  if(is_admin()) {return;}
    wp_enqueue_script( 'jquery' );
    // для версий WP меньше 3.6 'jquery' нужно поменять на 'jquery-core'
    // отменяем зарегистрированный jQuery
    wp_deregister_script( 'jquery-core' );
//    wp_deregister_script( 'jquery' );
    // регистрируем
//    wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, '1.11.2', false);

    //wp_deregister_script( 'jquery-migrate' );
    //wp_register_script( 'jquery-migrate', "//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.3.0/jquery-migrate.min.js", array(), '1.3.0',true);

    // подключаем
    wp_enqueue_script( 'jquery' );
}
//add_action('wp_head', 'fix_header_jquery', 1);
//function fix_header_jquery () {
//    if(is_admin()) {return;}
//    echo '<script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>';
//}
//add_action('wp_footer', 'fix_footer_jquery', 8);
//function fix_footer_jquery () {
//    if(is_admin()) {return;}
//    echo '<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>';
//}

function true_remove_url_field( $comments_form_modal ) {
	unset( $comments_form_modal['url'] );
	return $comments_form_modal;
}

add_filter( 'comment_form_default_fields', 'true_remove_url_field', 10, 1);


//Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);
//Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
//Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11);
remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head','wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head','wp_generator');  // скрыть версию wordpress

add_filter('after_setup_theme', 'remove_redundant_shortlink');
function remove_redundant_shortlink() {
    // remove HTML meta tag
    // <link rel='shortlink' href='http://example.com/?p=25' />
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);

    // remove HTTP header
    // Link: <https://example.com/?p=25>; rel=shortlink
    remove_action( 'template_redirect', 'wp_shortlink_header', 11);
}


add_action( 'wp_print_styles', 'my_font_awesome_cdn', 1);
function my_font_awesome_cdn() {
   wp_deregister_style( 'fontawesome' );
   wp_register_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', false, '5.14.0', 'all');
   wp_enqueue_style( 'fontawesome' );
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Основные настройки',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

add_action( 'after_setup_theme', 'footer_enqueue_scripts' );
function footer_enqueue_scripts() {
    if(is_admin()) {return;}
    remove_action('wp_enqueue_scripts', 'ls_load_google_fonts'); //remove google fonts
    remove_action('admin_enqueue_scripts', 'ls_load_google_fonts'); //remove google fonts


    remove_action('wp_head', 'download_rss_link'); //RRS meta

    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_enqueue_scripts', 2);
//  remove_action('wp_head', 'wp_print_styles',8);
    remove_action('wp_head', 'wp_print_head_scripts', 9);
//    wp_enqueue_style
//    style_loader_tag
    add_action('wp_footer','wp_print_scripts',4);
    add_action('wp_footer','wp_enqueue_scripts',5);
//  add_action('wp_footer','wp_print_styles',6);
    add_action('wp_footer','wp_print_head_scripts',7);

}
//Opti End

add_action( 'wp_ajax_contact_form_order', 'do_contact_form_order' );
add_action( 'wp_ajax_nopriv_contact_form_order', 'do_contact_form_order' );
function do_contact_form_order() {
    if ( isset($_POST['name']) && isset($_POST['phone']) ) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $u_message = $_POST['message'];

        $send_to = "eugene.subota1984@gmail.com,swaty0007@gmail.com,office@car.ua,info@car.ua";
        $subject = "Заказ консультации";
        $message = "Пользователь сайта запросил консультацию менеджера.\n Пользователь: " . $name . "\nНомер телефона: " . $phone. "\nДата: " . $date. "\nСообщение: " . $u_message;
        if (isset($_POST['location'])) {
            $message.=  "\nСсылка на страницу: " . $_POST['location'];
        }
        $headers = array('From: Car.ua <info@car.ua>', 'Content-Type: text/html; charset=UTF-8');


        $telegram = new Telegram('1072821683:AAFLRe-3Cd3c8EKLBAsYB8-oei3dCdwBT-0');
        $telegram->sendMessage([
            'chat_id' => -379470267,
            'text' => $message,
        ]);
        wp_send_json(true);

//        $success = wp_mail($send_to,$subject,$message,$headers);
//        if ($success){
//            wp_send_json(true);
//        } else {
//            wp_send_json(false);
//        }
    }

}


add_action( 'wp_ajax_contact_form_himio', 'do_contact_form_himio' );
add_action( 'wp_ajax_nopriv_contact_form_himio', 'do_contact_form_himio' );
function do_contact_form_himio() {
    if ( isset($_POST['name']) && isset($_POST['phone']) ) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $u_message = $_POST['message'];

        $send_to = "eugene.subota1984@gmail.com,swaty0007@gmail.com,office@car.ua,info@car.ua";
        $subject = "Заказ консультации";
        $message = "Пользователь сайта запросил консультацию химиотерапевта.\n Пользователь: " . $name . "\nНомер телефона: " . $phone. "\nПочта: " . $email. "\nСообщение: " . $u_message;
        if (isset($_POST['location'])) {
            $message.=  "\nСсылка на страницу: " . $_POST['location'];
        }
        $headers = array('From: Car.ua <info@car.ua>', 'Content-Type: text/html; charset=UTF-8');


        $telegram = new Telegram('1072821683:AAFLRe-3Cd3c8EKLBAsYB8-oei3dCdwBT-0');
        $telegram->sendMessage([
            'chat_id' => -379470267,
            'text' => $message,
        ]);
        wp_send_json(true);

//        $success = wp_mail($send_to,$subject,$message,$headers);
//        if ($success){
//            wp_send_json(true);
//        } else {
//            wp_send_json(false);
//        }
    }

}


add_action( 'wp_ajax_contact_form_callback', 'do_contact_form_callback' );
add_action( 'wp_ajax_nopriv_contact_form_callback', 'do_contact_form_callback' );
function do_contact_form_callback() {
    if (isset($_POST['phone']) ) {
        $height = $_POST['height'];
        $phone = $_POST['phone'];
        $weight = $_POST['weight'];
        $pils = $_POST['pils'];

        $send_to = "eugene.subota1984@gmail.com,swaty0007@gmail.com,office@car.ua,info@car.ua";
        $subject = "Заказ консультации";
        $message = "Пользователь сайта запросил консультацию.\n Рост: " . $height . "\nВес: " . $weight. "\nНомер телефона: " . $phone. "\nСхема лечения: " . $pils;
        if (isset($_POST['location'])) {
            $message.=  "\nСсылка на страницу: " . $_POST['location'];
        }
        $headers = array('From: Car.ua <info@car.ua>', 'Content-Type: text/html; charset=UTF-8');


        $telegram = new Telegram('1072821683:AAFLRe-3Cd3c8EKLBAsYB8-oei3dCdwBT-0');
        $telegram->sendMessage([
            'chat_id' => -379470267,
            'text' => $message,
        ]);
        wp_send_json(true);

//        $success = wp_mail($send_to,$subject,$message,$headers);
//        if ($success){
//            wp_send_json(true);
//        } else {
//            wp_send_json(false);
//        }
    }

}


add_action( 'wp_ajax_contact_form', 'do_contact_form' );
add_action( 'wp_ajax_nopriv_contact_form', 'do_contact_form' );
function do_contact_form() {
    if ( isset($_POST['name']) && isset($_POST['phone']) ) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $send_to = "eugene.subota1984@gmail.com,swaty0007@gmail.com,office@car.ua,info@car.ua";
        $subject = "Заказ консультации";
        $message = "Пользователь сайта запросил консультацию менеджера.\n Пользователь: " . $name . "\nНомер телефона: " . $phone;
        if (isset($_POST['location'])) {
            $message.=  "\nСсылка на страницу: " . $_POST['location'];
        }
        $headers = array('From: Car.ua <info@car.ua>', 'Content-Type: text/html; charset=UTF-8');


        $telegram = new Telegram('1072821683:AAFLRe-3Cd3c8EKLBAsYB8-oei3dCdwBT-0');
        $telegram->sendMessage([
            'chat_id' => -379470267,
            'text' => $message,
        ]);
        wp_send_json(true);

//        $success = wp_mail($send_to,$subject,$message,$headers);
//        if ($success){
//            wp_send_json(true);
//        } else {
//            wp_send_json(false);
//        }
    }

}
add_action( 'wp_ajax_question_form', 'do_question_form' );
add_action( 'wp_ajax_nopriv_question_form', 'do_question_form' );
function do_question_form() {
    if ( isset($_POST['name']) && isset($_POST['email']) ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $send_to = "eugene.subota1984@gmail.com,swaty0007@gmail.com,office@car.ua,info@car.ua";
        $subject = "Заказ консультации";
        $message = "Пользователь сайта задал вопрос онлайн. Пользователь: " . $name . " Email: " . $email ." Коментарий:". $comment;
        if (isset($_POST['location'])) {
            $message.=  "\nСсылка на страницу: " . $_POST['location'];
        }
        $headers = array('From: Car.ua <info@car.ua>', 'Content-Type: text/html; charset=UTF-8');


        $telegram = new Telegram('1072821683:AAFLRe-3Cd3c8EKLBAsYB8-oei3dCdwBT-0');
        $telegram->sendMessage([
            'chat_id' => -379470267,
            'text' => $message,
        ]);
        wp_send_json(true);

//        $success = wp_mail($send_to,$subject,$message,$headers);
//        if ($success){
//            wp_send_json(true);
//        } else {
//            wp_send_json(false);
//        }
    }

}


pll_register_string ("Pages","Записаться на прием","Globals");
pll_register_string ("Pages","Запись на прием","Globals");
pll_register_string ("Pages","Задайте вопрос онлайн","Globals");
pll_register_string ("Pages","Имя","Globals");
pll_register_string ("Pages","E-mail","Globals");
pll_register_string ("Pages","Отправить","Globals");
pll_register_string ("Pages","Запись на консультацию в клинику 24/7","Globals");
pll_register_string ("Pages","Пн-Пт с 08:00 до 17:00","Globals");
pll_register_string ("Pages","Имя","Globals");
pll_register_string ("Pages","Телефон","Globals");
pll_register_string ("Pages","Спасибо, Ваша заявка отправлена.","Globals");
pll_register_string ("Pages","Оставьте заявку и мы свяжемся в течении дня","Globals");
pll_register_string ("Pages","Не знаете схему лечения? Оставьте заявку и мы подберем для Вас индивидуальный курс лечения.","Globals");
pll_register_string ("Pages","Напишите ваш вопрос химиотерапевту","Globals");
pll_register_string ("Pages","ФИО","Globals");
pll_register_string ("Pages","Телефон","Globals");
pll_register_string ("Pages","Желаемая дата приема","Globals");
pll_register_string ("Pages","Комментарий","Globals");
pll_register_string ("Pages","Оставить отзыв","Globals");
pll_register_string ("Pages","Отзыв о услуге","Globals");
pll_register_string ("Pages","Смотреть все статьи","Globals");
pll_register_string ("Pages","Задать вопрос онкологу","Globals");
pll_register_string ("Pages","Читать статью","Globals");
pll_register_string ("Pages","Все отзывы","Globals");
pll_register_string ("Pages","Про врачей","Globals");
pll_register_string ("Pages","По услугам","Globals");
pll_register_string ("Pages","По локализациям","Globals");
pll_register_string ("Pages","Читать коментарии","Globals");
pll_register_string ("Pages","Узнать детальнее","Globals");
pll_register_string ("Pages","Читайте также","Globals");
pll_register_string ("Pages","Наши врачи","Globals");
pll_register_string ("Pages","Автор статьи:","Globals");
pll_register_string ("Pages","О враче","Globals");
pll_register_string ("Pages","FAQ","Globals");

pll_register_string ("Pages","География наших пациентов","About");
pll_register_string ("Pages","Украина","About");

pll_register_string ("Pages","лет","Doctor");
pll_register_string ("Pages","Стаж:","Doctor");
pll_register_string ("Pages","Сертификаты","Doctor");

pll_register_string ("Pages","Страница не найдена!","404");
pll_register_string ("Pages",'К сожалению, запрашиваемая Вами страница, не найдена.</p><p class="main-text">Вероятно, она была удалена автором.',"404");
pll_register_string ("Pages","Вернуться на главную","404");

pll_register_string ("Pages","Лечение рака","Footer");
pll_register_string ("Pages","<li>Троллейбус: №9, №22</li>
                      <li>Автобус: 78, 302, 368, 805</li>
                      <li>Маршрутное такси: 496, 499, 565.</li>
                      <li>Остановка Аэропорт «Киев»</li>","Footer");


pll_register_string ("Pages","Как добраться","Main");
pll_register_string ("Pages","Киев, п-р Воздухофлотский 71/3","Main");



// pll_e('');


function add_recaptcha()
{
    //https://www.google.com/recaptcha/api.js
    wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js', [], 1.0, false);
//    wp_enqueue_script('theme-helper-js', get_stylesheet_directory_uri() . '/assets/js/helper.js', [], 1.0, true);
}
add_action('wp_enqueue_scripts', 'add_recaptcha');


add_action( 'rest_api_init', function (  ) {
    register_rest_route('pre-order/v1', 'pre-order', array(
        'methods'  => 'POST',
        'callback' => 'send_pre_order'
    ));
});



function vic_admin_menu()
{
/*
	if($_COOKIE['lang_clinic'] == 'ua'){
		add_menu_page('Переключить на RU', 'Переключить на RU', 'manage_options', '/lang.php?set_lang=ru');
	}
	else{
		add_menu_page('Переключить на UA', 'Переключить на UA', 'manage_options', '/lang.php?set_lang=ua');
	}
*/

	// add_menu_page('Переключить на UA', 'Переключить на UA', 'manage_options', 'lang.php');


}

add_action( 'admin_menu', 'vic_admin_menu' );


add_action( 'wp_ajax_get_comments', 'get_comments_form' );
add_action( 'wp_ajax_nopriv_get_comments', 'get_comments_form' );
function get_comments_form () {
    $post_id = $_POST['post_id'];
    $offset = $_POST['offset'];

    $comments = get_comments(array(
        'orderby' => 'comment_date',
        'order' => 'DESC',
        'offset' => $offset,
        'number' => 2,
        'post_id' => $post_id,
        'type' => '',
    ));
    wp_send_json($comments);
}


//redirection uppercase to lower
if(!is_admin()){
    add_action( 'init', 'storm_force_lowercase' );
}
function storm_force_lowercase(){

    $url = $_SERVER['REQUEST_URI'];

    if(preg_match('/[\.]/', $url)){
        return;
    }

    if(preg_match('/[A-Z]/', $url)){

        $lc_url = strtolower($url);
        header("Location: " . $lc_url);
        exit(0);
    }

}

//image pages disable
function myprefix_redirect_attachment_page() {
    if ( is_attachment() ) {
        global $post;
        if ( $post && $post->post_parent ) {
            wp_redirect( esc_url( get_permalink( $post->post_parent ) ), 301 );
            exit;
        } else {
            wp_redirect( esc_url( home_url( '/' ) ), 301 );
            exit;
        }
    }
}
add_action( 'template_redirect', 'myprefix_redirect_attachment_page' );