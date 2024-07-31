<?php
/*
* File for custom post types
*/


/* Creating a function to create our CPT */
function custom_post_types() {

    // Example custom post type
    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Test Post Type', 'Post Type General Name', 'haw-starter' ),
        'singular_name'       => _x( 'Test Post Type', 'Post Type Singular Name', 'haw-starter' ),
        'menu_name'           => __( 'Test Post Type', 'haw-starter' ),
        'parent_item_colon'   => __( 'Parent Test Post Type', 'haw-starter' ),
        'all_items'           => __( 'All Test Post Types', 'haw-starter' ),
        'view_item'           => __( 'View Test Post Type', 'haw-starter' ),
        'add_new_item'        => __( 'Add New Test Post Type', 'haw-starter' ),
        'add_new'             => __( 'Add New', 'haw-starter' ),
        'edit_item'           => __( 'Edit Test Post Type', 'haw-starter' ),
        'update_item'         => __( 'Update Test Post Type', 'haw-starter' ),
        'search_items'        => __( 'Search Test Post Type', 'haw-starter' ),
        'not_found'           => __( 'Not Found', 'haw-starter' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'haw-starter' ),
    );
      
    // Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'test-post-type', 'haw-starter' ),
        'description'         => __( 'Test post type', 'haw-starter' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'test-post-type', $args );
  
}
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
  
add_action( 'init', 'custom_post_types', 0 );