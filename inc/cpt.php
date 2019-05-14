<?php 

add_action( 'init', 'custom_hierarchical_taxonomy', 0 );
 
function custom_hierarchical_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Product Category', 'taxonomy general name', 'oxygen' ),
    'singular_name' => _x( 'Product Category', 'taxonomy singular name', 'oxygen' ),
    'search_items' =>  __( 'Search Group', 'oxygen' ),
    'all_items' => __( 'All Product Category', 'oxygen' ),
    'parent_item' => __( 'Parent Product Category', 'oxygen' ),
    'parent_item_colon' => __( 'Parent Product Category:', 'oxygen' ),
    'edit_item' => __( 'Edit Product Category', 'oxygen' ), 
    'update_item' => __( 'Update Product Category', 'oxygen' ),
    'add_new_item' => __( 'Add New Product Category', 'oxygen' ),
    'new_item_name' => __( 'New Product Category Name', 'oxygen' ),
    'menu_name' => __( 'Product Category', 'oxygen' ),
  );    
 
  register_taxonomy('product_category',array('product'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'product_category' ),
  ));

 
}

function custom_post_type() {

    if(vp_option('b_option.p_archive') == 1){
        $ar = true;
    } else {
        $ar = false;
    }

    $labels = array(
        'name'                => _x( 'Product', 'Post Type General Name', 'oxygen' ),
        'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'oxygen' ),
        'menu_name'           => __( 'Product', 'oxygen' ),
        'parent_item_colon'   => __( 'Parent Product', 'oxygen' ),
        'all_items'           => __( 'All Product', 'oxygen' ),
        'view_item'           => __( 'View Product', 'oxygen' ),
        'add_new_item'        => __( 'Add New Product', 'oxygen' ),
        'add_new'             => __( 'Add New Product', 'oxygen' ),
        'edit_item'           => __( 'Edit Product', 'oxygen' ),
        'update_item'         => __( 'Update Product', 'oxygen' ),
        'search_items'        => __( 'Search Product', 'oxygen' ),
        'not_found'           => __( 'Not Found', 'oxygen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'oxygen' ),
    );
     
     
    $args = array(
        'label'               => __( 'posts', 'oxygen' ),
        'description'         => __( 'Posts and reviews', 'oxygen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', ),
        'menu_icon'           => 'dashicons-cart',          
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => false,
        'menu_position'       => 19,
        'can_export'          => true,
        'has_archive'         => $ar,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'product', $args );
    flush_rewrite_rules();
    
    
 
}
 
add_action( 'init', 'custom_post_type', 0 );


function simple_slider_image() {
    $labels1 = array(
        'name'                => _x( 'Banner Slider', 'Post Type General Name', '' ),
        'singular_name'       => _x( 'Banner Slider', 'Post Type Singular Name', '' ),
        'menu_name'           => __( 'Banner Slider', '' ),
        'all_items'           => __( 'All Slider Child', '' ),
        'view_item'           => __( 'Banner Slider', '' ),
        'add_new_item'        => __( 'Add New Child', '' ),
        'add_new'             => __( 'Add New Child', '' ),
        'edit_item'           => __( 'Edit Banner Slider Child', '' ),
        'update_item'         => __( 'Update Banner Slider', '' ),
        'search_items'        => __( 'Search Banner Slider', '' ),
        'not_found'           => __( 'Not Found', '' ),
        'not_found_in_trash'  => __( 'Not found in Trash', '' ),
    );

    $args1 = array(
        'label'               => __( 'Banner Slider', '' ),
        'description'         => __( 'Banner Slider news and reviews', '' ),
        'labels'              => $labels1,
        'supports'            => array( 'title'),
        'menu_icon'           => 'dashicons-format-gallery', 
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 30,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'simple_slider', $args1 );
    flush_rewrite_rules();

}

add_action( 'init', 'simple_slider_image', 0 );

