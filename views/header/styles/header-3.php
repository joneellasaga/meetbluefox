<?php


/**
 * template part for Header. views/header/styles
 *
 * @author      Artbees
 * @package     jupiter/views
 * @version     5.0.0
 */
global $mk_options;

    /*
    * These options comes from header shortcode and will only be used to override the header options through shortcode.
    */
    $header_class = array(
        'sh_id' => isset($view_params['id']) ? esc_attr( $view_params['id'] ) : Mk_Static_Files::shortcode_id(),
        'is_shortcode' => isset($view_params['is_shortcode']) ? esc_attr( $view_params['is_shortcode'] ) : false,
        'sh_toolbar' => isset($view_params['toolbar']) ? esc_attr( $view_params['toolbar'] ) : '',
        'sh_is_transparent' => isset($view_params['is_transparent']) ? esc_attr( $view_params['is_transparent'] ) : '',
        'sh_header_style' => isset($view_params['header_styles']) ? esc_attr( $view_params['header_styles'] ) : '',
        'sh_header_align' => isset($view_params['header_align']) ? esc_attr( $view_params['header_align'] ) : '',
        'sh_hover_styles' => isset($view_params['hover_styles']) ? esc_attr( $view_params['hover_styles'] ) : esc_attr( $mk_options['main_nav_hover'] ),
        'el_class' => isset($view_params['el_class']) ? esc_attr( $view_params['el_class'] ) : '',
    );

    $is_shortcode = $header_class['is_shortcode'];
    $is_transparent = (isset($view_params['is_transparent'])) ? ($view_params['is_transparent'] == 'false' ? false : is_header_transparent()) : is_header_transparent();

    $show_logo = isset($view_params['logo']) ? esc_attr( $view_params['logo'] ) : false;
    $seconday_show_logo = isset($view_params['burger_icon']) ? esc_attr( $view_params['burger_icon'] ) : false;
    $show_cart = isset($view_params['woo_cart']) ? esc_attr( $view_params['woo_cart'] ) : false;
    $search_icon = isset($view_params['search_icon']) ? esc_attr( $view_params['search_icon'] ) : false;
	
	$logo = $mk_options['logo'];
	$phone = stripslashes($mk_options['header_toolbar_phone']);

	$st_menu_meta = get_post_meta($post->ID, 'meta_custom_st_menu', true);
?>	

<?php if(is_header_and_title_show($is_shortcode)) : ?>
	
    
        <div class="st-menu st-effect-11" id="menu-11">
            <ul class="top-menu">
                <?php if( has_nav_menu('primary-menu') ) { wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '') ); } ?>
              
                <li id="close-menu" class="close-st-menu"><i class="fa fa-times-circle-o" aria-hidden="true"></i></i></li>
            </ul>
        </div>
        <?php if( is_page() && ($st_menu_meta == "no" || $st_menu_meta == NULL) ) {?> 
        <div class="st-pusher-wrapper">
        
        <div class="st-pusher st-pusher-header">
        	<div class="st-content">
        		<div class="st-content-inner">  
                
		<?php } else { ?>     
        
        <div class="st-pusher">
        	<div class="st-content">
        		<div class="st-content-inner"> 
                
        <?php } ?>        
                	       
                    <div class="main clearfix top-header">                        
                        <div class="call-us">Call us: <span><a href="tel:1-<?php echo $phone ?>"><?php echo $phone; ?></a><span></div>
                        <div id="logo">                   
                            <a href="<?php echo home_url('/'); ?>" title="<?php esc_attr( bloginfo('name') ); ?>">
                                <img class="" title="<?php esc_attr( bloginfo('description') ); ?>" alt="<?php esc_attr( bloginfo('description') ); ?>" src="<?php echo esc_url( $logo ); ?>" />
                            </a>
                        </div>
                        
                        <div class="nav">
                        	<div class="socials">
                            <?php  mk_get_header_view('global', 'social', ['location' => 'header']); ?>
                            </div>                           
                            <div class="menu-bar">
                                <div id="st-trigger-effects">
                                    <button data-effect="st-effect-11" class="hide-tablet-icon">                                        
                                        MENU
                                    </button>
                                     <button data-effect="st-effect-1" class="visible-tablet-icon">                                       
                                        MENU
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /main -->                     
                    
                    <header <?php echo get_header_json_data($is_shortcode, $header_class['sh_header_style']); ?> <?php echo mk_get_header_class($header_class); ?> <?php echo get_schema_markup('header'); ?>> 
                        <div class="mk-header-holder">
                            <div class="main clearfix top-header">
                                <div class="call-us">Call us: <span><a href="tel:1-<?php echo $phone ?>"><?php echo $phone; ?></a><span></div>
                                <div id="logo">                   
                                    <a href="<?php echo home_url('/'); ?>" title="<?php esc_attr( bloginfo('name') ); ?>">
                                        <img class="" title="<?php esc_attr( bloginfo('description') ); ?>" alt="<?php esc_attr( bloginfo('description') ); ?>" src="<?php echo esc_url( $logo ); ?>" />
                                    </a>
                                </div>
                                <div class="nav">
                                    <div class="socials">
                                       <?php  mk_get_header_view('global', 'social', ['location' => 'header']); ?>
                                    </div>
                                    <div class="menu-bar">
                                        <div id="st-trigger-effects">                                          
                                             <button data-effect="st-effect-1">                                       
                                                MENU
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /main -->
                        </div><!--mk-header-holder-->
                    </header>
                    <nav class="vertical-st-menu st-effect-1" id="menu-1">       
                        <ul>
                            <?php if( has_nav_menu('primary-menu') ) { wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '') ); } ?> 
                            <li id="close-vertical-menu" class="close-st-menu"><i class="fa fa-times-circle-o" aria-hidden="true"></i></i></li>           
                        </ul>
                    </nav>
        <?php if( is_page() && ($st_menu_meta == "no" || $st_menu_meta == NULL) ) {?>         
				</div>
            </div>	
        </div>
        <?php } ?>
                    <div class="main-content">
     
<?php endif; // End to disale whole header