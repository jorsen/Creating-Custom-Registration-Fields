<?php //Start building your awesome child theme functions
if ( ! function_exists( 'pre' ) ){
function pre($args){
echo '<pre>';
print_r($args);
exit;
}
}


add_action( 'wp_enqueue_scripts', 'shopkeeper_enqueue_styles', 100 );
function shopkeeper_enqueue_styles() {

    // enqueue parent styles
	wp_enqueue_style('shopkeeper-parent-styles', get_template_directory_uri() .'/style.css');

	// enqueue RTL styles
    if( is_rtl() ) {
    	wp_enqueue_style( 'shopkeeper-child-rtl-styles',  get_template_directory_uri() . '/rtl.css', array( 'shopkeeper-styles' ), wp_get_theme()->get('Version') );
    }
}

/**
 * Functions
 *
*/

define( 'DISALLOW_FILE_EDIT', true );
define('ROOT', get_stylesheet_directory_uri());
define('IMAGES', ROOT . '/images/');
define('CSS', ROOT . '/css/');
define('JS', ROOT . '/js/');
define('LIB', ROOT . '/lib/');


if ( ! function_exists( '_theme_setup' ) ) :

    function _theme_setup() {

        // Add default posts and comments RSS feed links to head.
        //add_theme_support( 'automatic-feed-links' );

        /**
         * Enables post thumbnail
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * Common Navigation Location
         */
        register_nav_menus( array(
            'primary-nav' => __( 'Primary Menu' ),
            'footer-nav' => __( 'Footer Menu' ),
            'mobile-nav' => __( 'Mobile Menu' ),
            'service-nav' => __( 'Service Menu' ),
            'quick-links-nav' => __( 'Quick Links' ),

        ));
        
        register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
        
        add_theme_support( 'woocommerce', array(
            'thumbnail_image_width' => 200,
            'gallery_thumbnail_image_width' => 100,
            'single_image_width' => 500,
        ) );
        /*
         * Sidebars
         */
        register_sidebar(array(
            'name' => 'Main Sidebar',
            'id'   => 'main-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        ));

        register_sidebar(array(
            'name' => 'Footer Sidebar',
            'id'   => 'footer-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        ));


    }
endif;
add_action( 'after_setup_theme', '_theme_setup' );

function enqueue_scripts_and_styles() {

    wp_register_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js');
    wp_enqueue_script('jquery');

    wp_register_style( 'bootstrap4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'bootstrap4' );

    wp_register_script( 'bootstrap4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script('bootstrap4');

    wp_register_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'animate' );

    wp_register_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'font-awesome' );

    wp_register_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'slick-css' );

    wp_register_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'slick-theme' );

    wp_register_script( 'slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'slick-js' );

    wp_register_style( 'aos', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'aos' );

    wp_register_script( 'aos', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'aos' );

    wp_register_style( 'animateCSS', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'animateCSS' );

    wp_register_style( 'theme-fonts', ROOT . '/fonts/stylesheet.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'theme-fonts' );

    wp_register_style( 'styles', CSS . 'style.css', null, 1.2, 'screen' );
    wp_enqueue_style( 'styles' );

    wp_register_style( 'style-res', CSS . 'style-responsive.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'style-res' );

    wp_register_script( 'cad', JS . 'cad.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'cad' );

    wp_register_script( 'custom-script', JS . 'custom-script.js', array( 'jquery' ), 1.3, true );
    wp_enqueue_script( 'custom-script' );

}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_and_styles' );


function get_menu($theme_location = '', $menu = '', $menuClass = ''){
    $defaults = array(
        'theme_location'  => $theme_location,
        'menu'            => $menu,
        'container'       => false,
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => $menuClass,
        'menu_id'         => '',
        'echo'            => true,
        'before'          => '',
        'after'           => '',
        'link_before'     => '<span>',
        'link_after'      => '</span>',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 3,
        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',

        );
    return wp_nav_menu( $defaults );
}

/**
 * ACF Theme Options
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => '',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

add_shortcode( 'prod_categories', 'prod_categories_type' );
    function prod_categories_type( $atts ) {
        ob_start(); ?>
            <?php echo get_template_part('template/content' , 'prod-categories'); ?>
    <?php
        $myvariable = ob_get_clean(); return $myvariable;
}

add_shortcode( 'featured_product', 'featured_product_type' );
    function featured_product_type( $atts ) {
        ob_start(); ?>
            <?php echo get_template_part('template/content' , 'featured-product'); ?>
    <?php
        $myvariable = ob_get_clean(); return $myvariable;
}

add_shortcode( 'shop_category', 'shop_category_type' );
    function shop_category_type( $atts ) {
        ob_start(); ?>
            <?php echo get_template_part('template/content' , 'shop-category'); ?>
    <?php
        $myvariable = ob_get_clean(); return $myvariable;
}

add_shortcode( 'testimonials', 'testimonials_type' );
    function testimonials_type( $atts ) {
        ob_start(); ?>
            <?php echo get_template_part('template/content' , 'testimonials'); ?>
    <?php
        $myvariable = ob_get_clean(); return $myvariable;
}


/**
* Gravity Forms Custom Activation Template
* http://gravitywiz.com/customizing-gravity-forms-user-registration-activation-page
*/
add_action('wp', 'custom_maybe_activate_user', 9);
function custom_maybe_activate_user() {

    $template_path = STYLESHEETPATH . '/gfur-activate-template/activate.php';
    $is_activate_page = isset( $_GET['page'] ) && $_GET['page'] == 'gf_activation';

    if( ! file_exists( $template_path ) || ! $is_activate_page  )
        return;

    require_once( $template_path );

    exit();
}

// prevent admin notification email for new registered users or user password changes
// function conditional_mail_stop() {
//     global $phpmailer;
//     $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
//     $subject = array(
//         sprintf(__('[%s] New User Registration'), $blogname),
//         sprintf(__('[%s] Password Lost/Changed'), $blogname)
//     );
//     if ( in_array( $phpmailer->Subject, $subject ) )
//         // empty $phpmailer class -> email cannot be send
//         $phpmailer = new PHPMailer( true );
// }
// add_action( 'phpmailer_init', 'conditional_mail_stop' );

// Disable wordpress account verification
add_action('phpmailer_init', 'wse199274_intercept_registration_email');
function wse199274_intercept_registration_email($phpmailer){
    $admin_email = get_option( 'admin_email' );

    # Intercept username and password email by checking subject line
    if( strpos($phpmailer->Subject, 'Your username and password info') ){
        # clear the recipient list
        $phpmailer->ClearAllRecipients();
        # optionally, send the email to the WordPress admin email
        $phpmailer->AddAddress($admin_email);
    }else{
        #not intercepted
    }
}

add_filter( 'gform_enable_password_field', '__return_true' );


//function _remove_script_version( $src ){
  //  $parts = explode( '?ver', $src );
    //    return $parts[0];
    //}
//add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
//add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

function is_wholesale_customer() {

    $user_id = get_current_user_id();

    $user_roles = get_user_meta($user_id, 'dwd_capabilities', true);

    if( array_key_exists( 'wholesale_customer' , $user_roles ) || array_key_exists( 'administrator' , $user_roles ) ) {

        return true;

    }

    return false;

}

add_action( 'gform_user_registered', 'set_user_role', 10, 3 );

function set_user_role( $user_id, $feed, $entry ) {

    $selected_role = rgar( $entry, '7.1' );

    $user = new WP_User( $user_id );

    if (!empty($selected_role)) {

        $user->set_role($selected_role);

    }

}

// add_action( 'user_register', 'lachic_registration_save', 10, 1 );
// function lachic_registration_save( $user_id ) {
//     $userdata = get_userdata($user_id);
//     $useremail = $userdata->user_email;
//     $username = $userdata->user_login;
//     $userpass = $userdata->user_pass;

//     $body = "Username: $username | Password: Your chosen password.";

//     wp_mail($useremail, 'Your account credentials', $body);

// }



add_action( 'gform_after_submission_1', 'gform_signup', 10, 2 );
function gform_signup( $entry, $form ) {

    // $customer_firstname = $entry[1];
    // $customer_lastname = $entry[2];
    // $customer_email = $entry[4];
    // $customer_username = $entry[5];
    // $customer_password = $entry[6];

    // $subject = "New user registration";
    // $message = "
    //     Hi <strong>$customer_firstname</strong>, <br><br>
    //     Thank you for your registration on La Chic Designs.<br>
    //     We hope you enjoy our website and find exactly what you are looking for!
    //     <br><br>
    //     Username: <strong>$customer_username</strong> <br>
    //     Password: <strong>$customer_password</strong> <br><br>
    //     Thank You!
    // ";
    // $headers = array('Content-Type: text/html; charset=UTF-8');

    // wp_mail($customer_email, $subject, $message, $headers);

}

// Function to change email address

function wpb_sender_email( $original_email_address ) {
    return 'info@lachic.us';
}

// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'La Chic Designs';
}

// Hooking up our functions to WordPress filters
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );




add_action( 'woocommerce_after_shop_loop_item_title', 'add_view_more_details_link', 10 );

function add_view_more_details_link (  ) {

    global $woocommerce_loop;


    $product = wc_get_product( get_the_ID() );

    $currency = get_woocommerce_currency_symbol();

    $price = $currency.number_format($product->get_price(), 2);
    $title = get_the_title( get_the_ID() );
    $permalink = get_the_permalink( get_the_ID() );

    $wholesale_price = $currency.number_format(get_post_meta( get_the_ID(), 'wholesale_customer_wholesale_price', true ), 2);

    $subtracted_price = $currency.number_format($product->get_price() - get_post_meta( get_the_ID(), 'wholesale_customer_wholesale_price', true ), 2);

    $percent_discount = (( $product->get_price() - get_post_meta( get_the_ID(), 'wholesale_customer_wholesale_price', true ) ) / $product->get_price() ) * 100  ;
    $percent_discount = round($percent_discount);

    if( is_product_category() || $woocommerce_loop['name'] == 'related') {
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        echo "<h3><div class='product-title-link custom'>$title</a></h3>";
        echo "<a href='$permalink' class='button-1'>View Details</a>";

        if (is_wholesale_customer()) {
            if ( get_post_meta( get_the_ID(), 'wholesale_customer_wholesale_price', true ) != '' ) {
                echo "<div class='custom-price'>Wholesale Price: $wholesale_price</div>";
                //echo "<div class='custom-price'>Your Price: $subtracted_price (%$percent_discount) </div>";
            } elseif (!empty($price) && (float) $price > 0) {
                echo "<div class='custom-price'>$price</div>";
            }
        } elseif (!empty($price) && (float) $price > 0) {
            echo "<div class='custom-price'>$price</div>";
        }
    }

}

    //add_filter( 'woocommerce_get_price_html', 'hide_price', 99, 2 );



function hide_price( $price, $product ) {
    if ( is_singular('product') && $product->is_type( 'variable' ) ) {
        $price = '';

    }

    return $price;
}

// add_filter( 'woocommerce_is_purchasable', 'woocommerce_hide_add_to_cart_button', 10, 2 );
// function woocommerce_hide_add_to_cart_button( $is_purchasable = true, $product ) {

//     if( is_product_category() ) {
//         return false;
//     }
// }

add_action( 'admin_post_nopriv_register_account', 'register_user_account' );
add_action( 'admin_post_register_account', 'register_user_account' );
function register_user_account() {
    // pre($_FILES);
    // echo '<pre>';
    // print_r($_FILES);
    // exit;
    if (isset($_POST['register'])) {
        // $username = explode('@', $_POST['email']);
        // $username = $username[0];

        $username = $_POST['username'];

        $user_data = array(
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'user_email' => $_POST['email'],
            'user_login' => $username,
            'nickname' => $username,
            'user_nicename' => $username,
            'user_pass' => $_POST['password'],
            'role' => 'pending_wholesale_customer'
        );

        $user_id = wp_insert_user($user_data);

        if ( is_wp_error($user_id) ) {
            setcookie("register_error", $user_id->get_error_message(), time() + (60 * 5), '/');
            foreach ($_POST as $key => $value) {
                if ($key != 'confirm_password' && $key != 'password') {
                    $cookie_key = 'register_' . $key;
                    setcookie($cookie_key, $value, time() + (60 * 5), "/");
                }
            }
            wp_redirect( 'new-account-registration' ); exit;
        } else {
            unset($_COOKIE['register_error']);
            setcookie('register_error', '', time() - 3600, '/');
            foreach ($_POST as $key => $value) {
                unset($_COOKIE[$key]);
                setcookie($key, '', time() - 3600, '/');
            }
        }

        update_user_meta($user_id, 'billing_company', $_POST['company']);
        update_user_meta($user_id, 'billing_address_1', $_POST['address']);
        update_user_meta($user_id, 'billing_city', $_POST['city']);
        update_user_meta($user_id, 'billing_state', $_POST['state']);
        update_user_meta($user_id, 'billing_postcode', $_POST['zipcode']);
        update_user_meta($user_id, 'billing_phone', $_POST['phone']);
        add_user_meta($user_id, 'user_tax_id', $_POST['tax_id']);
        //add_user_meta($user_id, 'file_upload', $_POST['fileToUpload']);
        
        
          if( ! empty( $_FILES ) ) 
          {
              add_user_meta($user_id, 'file_upload', $_FILES['fileToUpload']['name']);
              $file=$_FILES['fileToUpload'];   // file array
              $upload_dir=wp_upload_dir();
              $path=$upload_dir['basedir'].'/woocommerce_uploads/alg_uploads/checkout_files_upload/';  //upload dir.
              if(!is_dir($path)) { mkdir($path); }
              $attachment_id = upload_user_file( $file ,$path);
    
          }

        $creds = array();
        $creds['user_login'] = $_POST['email'];
        $creds['user_password'] = $_POST['password'];
        $user = wp_signon( $creds );

        wp_redirect( 'registration-confirmation' ); exit;
    }
}

add_action('show_user_profile', 'custom_user_profile_fields');
add_action('edit_user_profile', 'custom_user_profile_fields');

function custom_user_profile_fields( $user ) {
?>
    <table class="form-table">
        <tr>
            <th>
                <label for="code"><?php _e( 'Tax ID' ); ?></label>
            </th>
            <td>
                <input type="text" name="user_tax_id" id="user_tax_id" value="<?php echo esc_attr( get_the_author_meta( 'user_tax_id', $user->ID ) ); ?>" class="regular-text" />
            </td>
            <th>
                <label for="code"><?php _e( 'Presale Certificate' ); ?></label>
            </th>
            <td>
                
                <?php
                $post = get_post();
                 $image_meta = wp_get_attachment_metadata( $image_id );
                  $image_id  = get_post_meta( $post->ID, $attachment, true );
                  $image_alt = get_post_meta($image_id, 'file_upload', true);
                  print $image_alt;
                  
                    var_dump( get_the_author_meta( 'file_upload', $user->ID ) ); 
                
                ?>
                <?php
                //   $all_meta_for_user = get_user_meta( $user->ID );
                //   print_r( $all_meta_for_user );
                
                

                ?>
            </td>
        </tr>
    </table>
<?php
}

add_action( 'personal_options_update', 'update_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'update_extra_profile_fields' );

function update_extra_profile_fields( $user_id ) {
    if ( current_user_can( 'edit_user', $user_id ) )
        update_user_meta( $user_id, 'user_tax_id', $_POST['user_tax_id'] );
}

add_action( 'admin_post_nopriv_login_action', 'login_action' );
add_action( 'admin_post_login_action', 'login_action' );
function login_action() {
    if (isset($_POST['login'])) {
        $creds = array();
        $creds['user_login'] = $_POST['username'];
        $creds['user_password'] = $_POST['password'];
        //$creds['remember'] = false;
        $user = wp_signon( $creds );
        if ( is_wp_error($user) ) {
            setcookie("login_username", $_POST['username'], time() + (60 * 5), '/');
            setcookie("login_error", true, time() + (60 * 5), '/');
            wp_redirect( 'wholesale-registration' ); exit;
        } else {
            unset($_COOKIE['login_username']);
            unset($_COOKIE['login_error']);
            setcookie('login_username', '', time() - 3600, '/');
            setcookie('login_error', '', time() - 3600, '/');
            wp_redirect( 'my-account' ); exit;
        }
    }
}

add_filter( 'woocommerce_cart_item_name', 'product_thumbnail_in_checkout', 20, 3 );
function product_thumbnail_in_checkout( $product_name, $cart_item, $cart_item_key ){
    if ( is_checkout() ) {

        $thumbnail   = $cart_item['data']->get_image(array( 50, 50));
        $image_html  = '<div class="product-item-thumbnail">'.$thumbnail.'</div> ';

        $product_name = $image_html . $product_name;
    }
    return $product_name;
}

add_filter( 'woocommerce_before_shop_loop_item', 'product_link_check_login', 20);
function product_link_check_login() {
    global $product;

    $link = $product->get_permalink();
    $modal = '';
    if (!is_user_logged_in()) {
        $modal = 'data-toggle="modal" data-target="#loginPopup"';
    }
    echo '<a href="' . $link . '" class="permalink" '. $modal .'>';
}

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
  wp_safe_redirect( home_url() );
  exit;
}

function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'right-menu' => __( 'Right side Menu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );

function wpb_custom_new_menu_left() {
  register_nav_menus(
    array(
      'left-menu' => __( 'Left side Menu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu_left' );


// //
// //  Re-direct not-logged-in users to holding page
// //
// if(!is_user_logged_in() && curPageURL() != 'https://lachic.us/wp-login.php') {
//     wp_redirect( 'https://lachic.us/wholesale-registration-login/', 302 );
//     exit;
// }

// //
// //  Get current page URL
// //
// function curPageURL() {

//     $pageURL = 'http';
//     if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}

//     $pageURL .= "://";
//     if ($_SERVER["SERVER_PORT"] != "80") {
//         $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
//     } else {
//         $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
//     }

//     return $pageURL;
// }

// add_action( 'template_redirect', 'wc_redirect_non_logged_to_login_access');
// function wc_redirect_non_logged_to_login_access() {
//     if ( !is_user_logged_in() ) {
//         global $post;
//         header('Location: ' . wp_login_url());
//     }
// }

// add_filter( 'woocommerce_login_redirect', 'my_login_redirect', 10, 2 );
// function my_login_redirect( $redirect, $user ) {
//     if( isset( $_GET['redirect'] ) && $_GET['redirect'] != '' ){
//         return $_GET['redirect'];
//     }
//     return $redirect;
// }


function is_login_page() {
    if ( $GLOBALS['pagenow'] === 'wp-login.php' && ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] === 'register' )
   return ( 'wp-login.php' === $_SERVER['REQUEST_URI'] );
}

function my_redirect() {  
    //if you have the page id of landing. I would tell you to use if( is_page('page id here') instead
    //Don't redirect if user is logged in or user is trying to sign up or sign in
    if( !is_login_page() && !is_admin() && !is_user_logged_in() ){
        //$page_id is the page id of landing page
        if( !is_page(3489) && !is_page(3515) && !is_page('71') && !is_login_page() && ! is_page('dwd') ){
            wp_redirect( get_permalink(3489) );
            
        }

    }
}
add_action( 'template_redirect', 'my_redirect' );

// if( !is_login_page() && !is_admin() && !is_user_logged_in() ){
//     if('https://lachic.us/events/'){
//         wp_redirect( get_permalink(3489) );
//     }
// }




function my_wp_nav_menu_args( $args = '' ) {
if( is_user_logged_in() ) {
// Logged in menu to display
$args['menu'] = 795;
 
} else {
// Non-logged-in menu to display
$args['menu'] = 1898;
}
return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

add_action('template_redirect', 'redirect_user_role'); 

function redirect_user_role()
{ 
    if(current_user_can('pending_wholesale_customer') && !is_page('9826')) 
    { 
        wp_redirect('https://lachic.us/approval'); 
    } 
}

function upload_user_file( $file = array(),$path ) {
    if(!empty($file)) 
    {


        $upload_dir=$path;
        $uploaded=move_uploaded_file($file['tmp_name'], $upload_dir.$file['name']);
        if($uploaded) 
        {
            echo "uploaded successfully ";

        }else
        {
            echo "some error in upload " ;print_r($file['error']);  
        }
    }

}

