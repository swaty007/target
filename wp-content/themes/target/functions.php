<?php

//require get_theme_file_path('/inc/search-lots-route.php');
//require get_theme_file_path('/inc/filter-lots-route.php');


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

function target_files() {
  wp_enqueue_script('main-chornobyl-js', get_template_directory_uri() .'/js/scripts-bundled.js','','',true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600i,600,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext');
//  wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
  wp_enqueue_style('carua_main_styles', get_stylesheet_uri());
  wp_localize_script('main-chornobyl-js', 'targetData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce( 'protection' ),
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
//      'language' => pll_current_language()
  ));
}

add_action('wp_enqueue_scripts', 'target_files');




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
function lot_album_url_array(){
  global $post;
  //get all image ids of our gallery in array
  $album_id_array = get_post_meta($post->ID,'lot_ua_photo', true);
  //crate array with images
  $album_url_array = [];
  return array_map("get_url_from_img_id", $album_id_array);
}

// Only for geting img url
function get_url_from_img_id($id)
{
    return wp_get_attachment_image_url($id,'full');
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

add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
//    wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
//    wp_enqueue_script('jquery');
}



//pll_register_string ("Main","УЗНАТЬ БОЛЬШЕ","Custom");
//pll_register_string ("Main","Подберем самые интересные туры под Ваши требования. Более ста туров в одном месте!","Custom");
//pll_register_string ("Main","Лучший выбор туров в ЧАЭС","Custom");
//pll_register_string ("Main","ПОДОБРАТЬ ТУР","Custom");


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
