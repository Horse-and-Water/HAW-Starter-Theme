<?php
/**
 * HAW_Starter Customised WordPress login page
 *
 * @package HAW_Starter
 */


// Add a custom logo to the login form
// To update the logo replace /img/site-login-logo.png (should be 120 x 120 pixels pixels)
function custom_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/site-login-logo.png);
            height:120px;
            width:120px;
            background-size: 120px 120px;
            background-repeat: no-repeat;
        	padding-bottom: 0px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_logo' );


// Update the link the image goes to on the login page (the default is wordpress.org)
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return bloginfo( 'name' );
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );