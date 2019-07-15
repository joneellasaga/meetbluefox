<?php

//add style and script
function enqueue_scripts_page() {  
  wp_enqueue_style( 'font-awesome' );   
  if(is_front_page() || is_page(27) ){
  	wp_enqueue_style( 'css-home', get_stylesheet_directory_uri().'/home.min.css' );
  }
  else{
  	wp_enqueue_style( 'css-global', get_stylesheet_directory_uri().'/global.min.css' );
  }
  
  if( is_page('contact-us') || is_page(37)){
  	 wp_enqueue_style( 'css-contact', get_stylesheet_directory_uri().'/css/page/contact.min.css' );
	 
	 wp_enqueue_script( 'services-js', get_stylesheet_directory_uri().'/js/services.min.js' ,array('jquery'),
    '1.1.0',  false);
  }
  if( is_page('about') || is_page(2)){
  	 wp_enqueue_style( 'css-about', get_stylesheet_directory_uri().'/css/page/about.min.css' );
	 
	  wp_enqueue_script( 'services-js', get_stylesheet_directory_uri().'/js/services.min.js' ,array('jquery'),
    '1.1.0',  false);
  }
  if( is_page('web-services/design-development') || is_page(724)){
  	 wp_enqueue_style( 'css-design-development', get_stylesheet_directory_uri().'/css/page/design-development.min.css' );
	 
	  wp_enqueue_script( 'services-js', get_stylesheet_directory_uri().'/js/services.min.js' ,array('jquery'),
    '1.1.0',  false);
  }
  if( is_page('web-services') || is_page(1495)){
  	 wp_enqueue_style( 'css-web-services', get_stylesheet_directory_uri().'/css/page/web-services.min.css' );
	 
	  wp_enqueue_script( 'services-js', get_stylesheet_directory_uri().'/js/services.min.js' ,array('jquery'),
    '1.1.0',  false);
  }
  if( is_page('web-services/media-services') || is_page(43)){
  	 wp_enqueue_style( 'css-media-services', get_stylesheet_directory_uri().'/css/page/media-services.min.css' );
	 
	  wp_enqueue_script( 'services-js', get_stylesheet_directory_uri().'/js/services.min.js' ,array('jquery'),
    '1.1.0',  false);
  }
  if( is_page('web-services/marketing-services') || is_page(897)){
  	 wp_enqueue_style( 'css-marketing-services', get_stylesheet_directory_uri().'/css/page/marketing-services.min.css' );
	 
	  wp_enqueue_script( 'services-js', get_stylesheet_directory_uri().'/js/services.min.js' ,array('jquery'),
    '1.1.0',  false);
  }
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_page',200 );

function enqueue_scripts_js() {

  wp_enqueue_script( 'flowtype-js', get_stylesheet_directory_uri().'/js/flowtype.min.js',array('jquery'), false,  true );
  
  wp_enqueue_script( 'classie-js', get_stylesheet_directory_uri().'/js/classie.min.js',array('jquery'),
    false,  false );
  wp_enqueue_script( 'sidebarEffects-js', get_stylesheet_directory_uri().'/js/sidebarEffects.min.js',array('jquery'),
    false,  false );

  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri().'/js/custom.min.js' ,array('jquery'),
    false,  false);
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_js' ,200);


function add_async_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_async = array('custom-js', 'sidebarEffects-js', 'classie-js', 'services-js', 'flowtype-js');
   
   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
         return str_replace(' src', ' async="async" src', $tag);
      }
   }
   return $tag;
}
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);



// remove admin bar
//add_filter('show_admin_bar', '__return_false');

function remove_ul ( $menu ){
    return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );


add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


function custom_projects() {
  $labels = array(
    'name'               => _x( 'Project', 'Project' ),
    'singular_name'      => _x( 'Project', 'Project' ),
    'add_new'            => _x( 'Add New', 'Project' ),
    'add_new_item'       => __( 'Add New Project' ),
    'edit_item'          => __( 'Edit Project' ),
    'new_item'           => __( 'New Project' ),
    'all_items'          => __( 'All Projects' ),
    'view_item'          => __( 'View Project' ),
    'search_items'       => __( 'Search Project' ),
    'not_found'          => __( 'No Project found' ),
    'not_found_in_trash' => __( 'No Project found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Projects'
  );
 $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'description' => 'Custom Theme Project',
      'supports' => array( 'title', 'thumbnail', 'custom-fields' ),
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'show_in_nav_menus' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'query_var' => true,
      'can_export' => true,
      'public' => true,
      'has_archive' => 'false',
      'capability_type' => 'post',
      'rewrite' => array( 'slug' => 'project', 'with_front' => false ),
  );
  register_post_type( 'project', $args );
}
add_action( 'init', 'custom_projects' );


//add meta box for menu slide transition
add_action( 'add_meta_boxes', 'meta_box_st_menu' );
function meta_box_st_menu()
{
    add_meta_box( 'st-menu-meta', 'Slide Transition', 'meta_box_st_menu_callback', 'page', 'side', 'low' );
}

function meta_box_st_menu_callback( $post )
{
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['meta_custom_st_menu'] ) ? $values['meta_custom_st_menu'][0] : '';
	
    wp_nonce_field( 'my_st_menu_nonce', 'st_menu_nonce' );
    ?>
    <p>        
        <input type="checkbox" name="meta_custom_st_menu" id="meta_custom_st_menu" value="yes" <?php if($selected == "yes"){?> checked <?php } ?> > Enable Default ST Menu
    </p>
    <p></p>
    <?php   
}

add_action( 'save_post', 'meta_box_st_menu_save' );
function meta_box_st_menu_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['st_menu_nonce'] ) || !wp_verify_nonce( $_POST['st_menu_nonce'], 'my_st_menu_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchords can only have href attribute
        )
    );

    // Probably a good idea to make sure your data is set

    if( isset( $_POST['meta_custom_st_menu'] ) ){
        update_post_meta( $post_id, 'meta_custom_st_menu', $_POST['meta_custom_st_menu'] );
	}
	else{
		update_post_meta( $post_id, 'meta_custom_st_menu', "no" );
	}

}

//remove widget filter output from parent theme 
/*
* File location: jupiter/framework/functions/widgets-filter.php
* Line number: 84
*/
function remove_mk_filter_native_widgets(){
    remove_filter('widget_output', 'mk_filter_native_widgets', 10, 4);
}

add_action('wp_loaded', 'remove_mk_filter_native_widgets');


// Filter native widgets here. Decouple to separate file if grows a little
/*
* Custom filter for custom navigation menu on Widgets
*/
function mk_filter_native_widgets_edited( $widget_output, $widget_type, $widget_id, $sidebar_id ) {
	// echo 'Widget type: ' . $widget_type;
    $html = $widget_output;

    if ( 'calendar' == $widget_type ) {
    	$html = phpQuery::newDocument( $widget_output );
    	pq('#prev')->prepend(Mk_SVG_Icons::get_svg_icon_by_class_name(false, 'mk-icon-chevron-left', 14));
    	pq('#next')->prepend(Mk_SVG_Icons::get_svg_icon_by_class_name(false, 'mk-icon-chevron-right', 14));
    }

    if ( 'nav_menu' == $widget_type ) {
    	$html = phpQuery::newDocument( $widget_output );
    	pq('li:not(.menu-item-has-children) a')->prepend(Mk_SVG_Icons::get_svg_icon_by_class_name(false, 'mk-icon-circle'));
    }

    if ( 'meta' == $widget_type ) {
    	$html = phpQuery::newDocument( $widget_output );
    	pq('a')->prepend(Mk_SVG_Icons::get_svg_icon_by_class_name(false, 'mk-icon-angle-right', 14));
    }

    if ( 'rss' == $widget_type ) {
    	$html = phpQuery::newDocument( $widget_output );
    	pq('li a')->prepend(Mk_SVG_Icons::get_svg_icon_by_class_name(false, 'mk-icon-angle-right', 14));
    }

    if ( 'recent-comments' == $widget_type ) {
    	$html = phpQuery::newDocument( $widget_output );
    	pq('.recentcomments')->prepend(Mk_SVG_Icons::get_svg_icon_by_class_name(false, 'mk-icon-comment-o', 14));
    }

    return $html;
}

add_filter( 'widget_output', 'mk_filter_native_widgets_edited', 10, 4 );
