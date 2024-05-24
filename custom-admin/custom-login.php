<?php
/**
 * HAW_Starter Customised WordPress login page
 *
 * @package HAW_Starter
 */


// Add a custom logo to the login form
// To update the logo replace /img/site-login-logo.png (should be 120 x 120 pixels)
function custom_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/custom-admin/site-login-logo.png);
            height:120px;
            width:120px;
            background-size: 120px 120px;
            background-repeat: no-repeat;
        	padding-bottom: 0px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_logo' );


// Update the link the image goes to on the login page
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// function my_login_logo_url_title() {
//     return bloginfo( 'name' );
// }
// add_filter( 'login_headertext', 'my_login_logo_url_title' );


// UNCOMMENT FOR CUSTOM WORDPRESS ADMIN THEME
// BE SURE TO GENERATE AND ADD THEME CSS FILE FIRST
//Custom stylesheet for admin (generated at https://wpadmincolors.com/)
/* function wpacg_qha_admin_color_scheme() {
    //Get the theme directory
    $theme_dir = get_stylesheet_directory_uri().'/custom-admin';
      
    //QHA
    wp_admin_css_color( 'qha', __( 'QHA' ),
        $theme_dir . '/qha.css',
        array( '#222222', '#fff', '#d54e21' , '#b79d66')
    );
}
add_action('admin_init', 'wpacg_qha_admin_color_scheme'); */


// UNCOMMENT TO FORCE ALL ADMIN USERS TO USE CUSTOM THEME STYLING
// Force all users to use the custom admin colour scheme
/*add_filter( 'get_user_option_admin_color', function( $color_scheme ) {
    
    $color_scheme = 'qha';
        
    return $color_scheme;
        
}, 5 );*/