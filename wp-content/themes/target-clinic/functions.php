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

add_action('customize_register', 'your_theme_customizer_setting');

function target_files() {
//  wp_enqueue_script('main-target-js', get_template_directory_uri() .'/js/scripts-bundled.js','','',true);
  wp_enqueue_script('slick-js', get_template_directory_uri() .'/js/slick.min.js','','',true);
  wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js',['jquery'],'',true);
  wp_enqueue_script('main-target-js', get_template_directory_uri() .'/js/main.js','','',true);
  wp_enqueue_style('target_main_styles', get_stylesheet_uri());
  wp_enqueue_style('fancybox-css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
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
    // die(print_r( $fields )); // посмотрим какие поля есть

    $new_fields = array(); // сюда соберем поля в новом порядке
    $myorder = array('author','email','url','comment'); // нужный порядок

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
add_filter('style_loader_tag', 'async_load_css', 10, 4);
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





//Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);
//Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
//Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
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


//add_action( 'wp_print_styles', 'my_font_awesome_cdn', 1);
//function my_font_awesome_cdn() {
//    wp_deregister_style( 'fontawesome' );
//    wp_register_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', false, '4.7.0', 'all');
//    wp_enqueue_style( 'fontawesome' );
//}

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




add_action( 'wp_ajax_contact_form', 'do_contact_form' );
function do_contact_form() {
    if ( isset($_POST['name']) && isset($_POST['phone']) ) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $send_to = "eugene.subota1984@gmail.com,swaty0007@gmail.com,office@car.ua,info@car.ua";
        $subject = "Заказ консультации";
        $message = "Пользователь сайта запросил консультацию менеджера.<br> Пользователь: " . $name . "<br>Номер телефона: " . $phone;
        if (isset($_POST['location'])) {
            $message.=  "<br>Ссылка на страницу: " . $_POST['location'];
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
function do_question_form() {
    if ( isset($_POST['name']) && isset($_POST['email']) ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $send_to = "eugene.subota1984@gmail.com,swaty0007@gmail.com,office@car.ua,info@car.ua";
        $subject = "Заказ консультации";
        $message = "Пользователь сайта задал вопрос онлайн. Пользователь: " . $name . " Email: " . $email ." Коментарий:". $comment;
        if (isset($_POST['location'])) {
            $message.=  "<br>Ссылка на страницу: " . $_POST['location'];
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







add_action( 'wp_ajax_nopriv_buy_tire', 'do_buy_tire' );
function do_buy_tire() {
	if ( isset($_POST['tireName']) && isset($_POST['tirePhone']) ) {
		$sezon = $_POST['tireSezon'];
		$width = $_POST['tireWidth'];
		$profile = $_POST['tireProfile'];
		$diametr = $_POST['tireDiametr'];
		$brand = $_POST['tireBrand'];
		$name = $_POST['tireName'];
		$phone = $_POST['tirePhone'];

		$send_to = "eugene.subota1984@gmail.com,swaty0007@gmail.com,office@car.ua,info@car.ua";
		$subject = "Шины";
		$message = "Пользователь интересуется приобретением шин с характеристиками:";
		$message .= "<br> Сезон: " . $sezon;
		$message .= "<br> Ширина: " . $width;
		$message .= "<br> Профиль: " . $profile;
		$message .= "<br> Диаметр: " . $diametr;
		$message .= "<br> Бренд: " . $brand;
		$message .= "<br> Имя пользователя: " . $name;
		$message .= "<br> Номер телефона: " . $phone;
		$headers = array('From: Car.ua <info@car.ua>', 'Content-Type: text/html; charset=UTF-8');
		$success = wp_mail($send_to,$subject,$message,$headers);
		if ($success){
			wp_send_json(true);
		} else {
			wp_send_json(false);
		}
	}
}



//pll_register_string ("Main","УЗНАТЬ БОЛЬШЕ","Custom");


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



function send_pre_order(WP_REST_Request $request){

    $send_to = 'tkacenkoandrej240@gmail.com,swaty0007@gmail.com';
    $subject = "Бронирование тура";
    $headers = array('Content-Type: text/html; charset=UTF-8');
//    $headers = array('From: Car.ua <info@car.ua>', 'Content-Type: text/html; charset=UTF-8');
//    $request = json_decode($request);

    if($request->offsetExists('name')
        && $request->offsetExists('phone')
        && $request->offsetExists('people_count')
        && $request->offsetExists('tours')
        && $request->offsetExists('date')){
        $name         = htmlspecialchars(trim($request->get_param('name')));
        $phone        = htmlspecialchars(trim($request->get_param('phone')));
        $tours        = htmlspecialchars(trim($request->get_param('tours')));
        $people_gringo = htmlspecialchars(trim($request->get_param('people_count')['gringo']));
        $people_uk = htmlspecialchars(trim($request->get_param('people_count')['user']));

        $date         = htmlspecialchars(trim($request->get_param('date')));
        $message = "Отправленна форма бронирования тура:";
        $message .= "<br>Имя: ".$name;
        $message .= "<br>Телефон: ".$phone;
        $message .= "<br>Выбран тур: ".$tours;
        $message .= "<br>Граждан Украины: ".$people_uk;
        $message .= "<br>Иностранцев: ".$people_gringo;
        $message .= "<br>Дата: ".$date;
        if ($request->offsetExists('comment') && $request->offsetExists('selected_menu')){
            $comment  = htmlspecialchars(trim($request->get_param('comment')));
            $menu     = implode(", ", $request->get_param('selected_menu'));
            $message .= "<br>Меню: " . $menu . "<br>Коментар: " . $comment;
        }

        $success = wp_mail($send_to, $subject, $message, $headers);
        if( $request->offsetExists('capctha') ){
            $captcha = $request->get_param('capctha');
            if($captcha !== ''){
                $url = 'https://www.google.com/recaptcha/api/siteverify';
                $params = [
                    'secret' => '6Lf-kKwUAAAAADHWiasQbdRAFfvyOpAo6_bXOBEw',
                    'response' => $captcha,
                ];
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                if(!empty($response)) $decoded_response = json_decode($response);


                if ($decoded_response && $decoded_response->success)
                {

//                    $success = wp_mail($send_to, $subject, $message, $headers);
                    if ($success) {
                        wp_send_json(true);
                    } else {
                        wp_send_json(false);
                    }
                }
                $result = $success ? 'Капча пройдена успешно!' : 'Неверная капча!';
                curl_close($ch);

                echo $result;
            }
        }

    } else {

        wp_send_json(false);
    }
}
