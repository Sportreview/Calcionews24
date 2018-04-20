<?php
/*
Plugin Name: Advanced AMP ADS
Description: Advertisement addon for Accelerated Mobile Pages plugin. This plugin will Auto Insert Advertisements in the content and many more features.
Author: Mohammed Kaludi, Mohammed Khaled
Version: 1.9.1
Author URI: https://ampforwp.com
*/
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// For AMP by Automattic 
 include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php' ) || is_plugin_active( 'amp/amp.php' )) {

        if(is_plugin_active( 'amp/amp.php' )){
          if ( !class_exists( 'ReduxFramework' ) ) {
              require_once dirname( __FILE__ ).'/includes/extensions/loader.php';
              require_once dirname( __FILE__ ).'/includes/redux-core/framework.php';
          }
          
        }
        add_filter( 'plugin_action_links', 'ampforwp_settings_link', 10, 5 );
    }


/** TESTING **/


else {

	add_filter( 'plugin_action_links', 'ampforwp_plugin_activation_link', 10, 5 );

	// Add Activate Parent Plugin button in settings page
	if ( ! function_exists( 'ampforwp_plugin_activation_link' ) ) {
		function ampforwp_plugin_activation_link( $actions, $plugin_file ) {
			static $plugin;
			if (!isset($plugin))
				$plugin = plugin_basename(__FILE__);
				if ($plugin == $plugin_file) {
						$settings = array('settings' => '<a href="plugin-install.php?s=accelerated+mobile+pages&tab=search&type=term">' . __('Please Activate the Parent Plugin.', 'ampforwp_incontent_ads') . '</a>');
						$actions = array_merge($settings , $actions );
					}
				return $actions;
		}
	}
	// Return if Parent plugin is not active, and don't load the below code.
	return;
}


/** End TESTING **/




// if ( defined( 'AMPFORWP_PLUGIN_DIR' ) ) {
// 	add_filter( 'plugin_action_links', 'ampforwp_settings_link', 10, 5 );
// } else {

// 	//add_filter( 'plugin_action_links', 'ampforwp_plugin_activation_link', 10, 5 );

// 	// Add Activate Parent Plugin button in settings page
// 	if ( ! function_exists( 'ampforwp_plugin_activation_link' ) ) {
// 		function ampforwp_plugin_activation_link( $actions, $plugin_file ) {
// 			static $plugin;
// 			if (!isset($plugin))
// 				$plugin = plugin_basename(__FILE__);
// 				if ($plugin == $plugin_file) {
// 						$settings = array('settings' => '<a href="plugin-install.php?s=accelerated+mobile+pages&tab=search&type=term">' . __('Please Activate the Parent Plugin.', 'ampforwp_incontent_ads') . '</a>');
// 						$actions = array_merge($settings , $actions );
// 					}
// 				return $actions;
// 		}
// 	}
// 	// Return if Parent plugin is not active, and don't load the below code.
// 	return;
// }

// Add settings Icon in the plugin activation page
if ( ! function_exists( 'ampforwp_settings_link' ) ) {
	function ampforwp_settings_link( $actions, $plugin_file )  {
			static $plugin;
			if (!isset($plugin))
				$plugin = plugin_basename(__FILE__);
				if ($plugin == $plugin_file) {
						if(is_plugin_active('amp/amp.php')){
							$settings = array('settings' => '<a href="admin.php?page=advanced_amp_ads_options&tab=0">' . __('Settings', 'ampforwp_incontent_ads') . '</a>');
						}else{
							$settings = array('settings' => '<a href="admin.php?page=amp_options&tab=8">' . __('Settings', 'ampforwp_incontent_ads') . '</a>');
						}
			  		$actions = array_merge( $actions , $settings);
					}
				return $actions;
	}
}


/*
 * Advertisement Code Generator
 * this code has 5 paramaeters $adver_class, $width, $height, $ad_client, $ad_slot
 *
 * Example
 * $adver_class	= ampforwp-incontent-ad (class of the advert container )
 * $width  		= 300
 * $height 		= 250
 * $ad_client	= ca-pub-12345678912345678
 * $ad_slot		= 1234567891
 *
 * 	// Usage Example
	add_action( 'ampforwp_post_after_design_elements','ampforwp_advert_code_output', 10 );
	function ampforwp_advert_code_output() {
		echo ampforwp_advert_code_generator_adsense('ampforwp-incontent-ad', 728, 15,'data-client-id' ,'data-ad-slot' ) ;
	}
 *
*/
function ampforwp_advert_code_generator_adsense($adver_class, $width, $height, $ad_client, $ad_slot ) {

	global $redux_builder_amp; 
	if(isset($redux_builder_amp['ampforwp-data-strategy-loading']) && $redux_builder_amp['ampforwp-data-strategy-loading']==1){
		$optimize = 'data-loading-strategy="prefer-viewability-over-views"';
	}
	else{
		$optimize = '';
	}

	$fx_container = '';
	$fx_container_end = ''; 
	if( $redux_builder_amp['fx-checkbox'] == true){
		
			$fx_container = '<amp-fx-flying-carpet height="200px">';
			$fx_container_end = '</amp-fx-flying-carpet>';
	} 

	$output  = '<div class="amp-ad-wrapper amp_ad_1 ampforwp-incontent-'. $adver_class .'">';
		$output .= $fx_container;
		$output	.=	'
			<amp-ad class="'. $adver_class .'"
				type="adsense"'.$optimize.'
				width="'. $width .'"
				height="'. $height .'"
				data-ad-client="'. $ad_client .'"
				data-ad-slot="'. $ad_slot .'"
			>';
		$output	.=	'</amp-ad>';
		$output .= $fx_container_end;
	$output	.= '</div>';
	return $output;
}

if ( ! function_exists( 'ampforwp_advert_code_generator_adsense_rspv' ) ) {
function ampforwp_advert_code_generator_adsense_rspv($adver_class, $ad_client, $ad_slot ) {

	global $redux_builder_amp; 
	if(isset($redux_builder_amp['ampforwp-data-strategy-loading']) && $redux_builder_amp['ampforwp-data-strategy-loading']==1){
		$optimize = 'data-loading-strategy="prefer-viewability-over-views"';
	}
	else{
		$optimize = '';
	}

	/*$fx_container = '';
	$fx_container_end = ''; 
	if( $redux_builder_amp['fx-checkbox'] == true){
		
			$fx_container = '<amp-fx-flying-carpet height="320">';
			$fx_container_end = '</amp-fx-flying-carpet>';
	} */

	 $output  = '<div class="amp-ad-wrapper amp_ad_1 ampforwp-incontent-'. $adver_class .'">';
		// $output .= $fx_container;
		$output	.=	'  
			<amp-ad class="'. $adver_class .'"
				type="adsense"'.$optimize.'
				width="100vw"
				height=320
				data-ad-client="'. $ad_client .'"
				data-ad-slot="'. $ad_slot .'"
				data-auto-format="rspv"
			data-full-width>';
		$output	.=	'<div overflow></div>
					</amp-ad>';
		// $output .= $fx_container_end;
	 $output	.= '</div>';
	return $output;
}
}
 

/*
 * Advertisement Code Generator for DoubleClick
 * this code has 4 paramaeters $adver_class, $width, $height, $ad_client, $ad_slot
 *
 * Example
 * $adver_class	= doubleclick-incontent (class of the advert container )
 * $width  		= 300
 * $height 		= 250
 * $data_slot	= /4****9/mobile_ad_banner
 *
 * 	// Usage Example
	add_action( 'ampforwp_post_after_design_elements','ampforwp_advert_code_output', 10 );
	function ampforwp_advert_code_output() {
		echo ampforwp_advert_code_generator_doubleclick('ampforwp-incontent-ad', 728, 15,'/4****9/mobile_ad_banner' ) ;
	}
 *
*/
function ampforwp_advert_code_generator_doubleclick($adver_class, $width, $height, $data_slot ) {
	global $redux_builder_amp; 
	if(isset($redux_builder_amp['ampforwp-data-strategy-loading']) && $redux_builder_amp['ampforwp-data-strategy-loading']==1){
		$optimize = 'data-loading-strategy="prefer-viewability-over-views"';
	}
	else{
		$optimize = '';
	}
	
	$fx_container = '';
	$fx_container_end = ''; 
	if( $redux_builder_amp['fx-checkbox'] == true){
		
			$fx_container = '<amp-fx-flying-carpet height="200px">';
			$fx_container_end = '</amp-fx-flying-carpet>';
	}

	$output = '<div class="amp-ad-wrapper amp_ad_1 ampforwp-incontent-'. $adver_class .'">';
		$output .= $fx_container;
		$output	.=	'
			<amp-ad class="ampforwp-incontent-ad ampforwp-incontent-doubleclick-incontent '. $adver_class .'"
				type="doubleclick"'.$optimize.'
				width="'. $width .'"
				height="'. $height .'"
				data-slot="'. $data_slot .'"
			>';
		$output	.=	'</amp-ad>';
		$output .= $fx_container_end;
	$output	.= '</div>';
	return $output;
}

/* Advertisement code */
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/ads/ad-1.php' );
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/ads/ad-2.php' );
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/ads/ad-3.php' );
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/ads/ad-4.php' );
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/ads/ad-doubleclick.php' );
// require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/ads/ad-custom.php' );
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/ads/ad-sticky.php' );
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/ads/standard-ads.php' );


 
/* Settings */
require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/settings.php' );


add_filter( 'amp_post_template_data', 'ampforwp_add_advaced_ads_scripts', 30 );
function ampforwp_add_advaced_ads_scripts( $data ) {
	global $redux_builder_amp;
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return $data;
		}
		

		if(		$redux_builder_amp['ampforwp-incontent-ad-1'] ||
					$redux_builder_amp['ampforwp-incontent-ad-2'] ||
					$redux_builder_amp['ampforwp-incontent-ad-3'] ||
					$redux_builder_amp['ampforwp-standard-ads-1'] ||
					$redux_builder_amp['ampforwp-standard-ads-2'] ||
					$redux_builder_amp['ampforwp-standard-ads-2-1'] ||
					$redux_builder_amp['ampforwp-standard-ads-3'] ||
					$redux_builder_amp['ampforwp-standard-ads-4'] ||
					$redux_builder_amp['ampforwp-standard-ads-5'] ||
					$redux_builder_amp['ampforwp-standard-ads-6'] ||
					$redux_builder_amp['ampforwp-sticky-ad'] ||
					$redux_builder_amp['ampforwp-inbetween-loop'] ) {
						if ( empty( $data['amp_component_scripts']['amp-ad'] ) ) {
							$data['amp_component_scripts']['amp-ad'] = 'https://cdn.ampproject.org/v0/amp-ad-0.1.js';
						}
					}

		if(	isset($redux_builder_amp['ampforwp-amp-auto-ads']) && $redux_builder_amp['ampforwp-amp-auto-ads']) {
						
						if ( empty( $data['amp_component_scripts']['amp-auto-ads'] ) ) {
							$data['amp_component_scripts']['amp-auto-ads'] = 'https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js';
						}
		}

		if(	$redux_builder_amp['fx-checkbox'] == true || 
			$redux_builder_amp['fx-checkbox-2'] == true ||
			$redux_builder_amp['fx-checkbox-3'] == true) {
						
						if ( empty( $data['amp_component_scripts']['amp-fx-flying-carpet'] ) ) {
							$data['amp_component_scripts']['amp-fx-flying-carpet'] = 'https://cdn.ampproject.org/v0/amp-fx-flying-carpet-0.1.js';
						}
		}


	return $data;
}


/* Theme Updater */
add_action( 'init', 'advance_amp_ads_updater' );
/**
 * Load and Activate Plugin Updater Class.
 * @since 0.1.0
 */
function advance_amp_ads_updater() {

    /* Load Plugin Updater */
    require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . '/updater/update.php' );

    /* Updater Config */
    $config = array(
        'base'         => plugin_basename( __FILE__ ), //required
        'repo_uri'     => 'http://magazine3.com/updates/',
        'repo_slug'    => 'advanced-amp-ads',
    );

    /* Load Updater Class */
    new AMPFORWP_Advanced_AMP_ADS_Updater( $config );
}


// Show/Hide Ads in AMP #20
add_action( 'add_meta_boxes', 'ampforwp_ADs_meta_box' );

function ampforwp_ADs_meta_box() {
	global $redux_builder_amp;
    $args = array(
       'public'   => true,
    );

	 $output = 'names'; // 'names' or 'objects' (default: 'names')
   	 $operator = 'and'; // 'and' or 'or' (default: 'and')

    $post_types = get_post_types( $args, $output, $operator );
     if ( $post_types ) { // If there are any custom public post types.
        foreach ( $post_types  as $post_type ) {
          if( $post_type == 'amp-cta' || $post_type == 'amp-optin' ) {
							continue;
          }
          if( $post_type !== 'page' ) {
            add_meta_box( 'AMP_AD_title_meta','Show AMP ADs for current post?', 'AMP_AD_metabox_callback', $post_type,'side','high' );
          }
        if( $post_type == 'page' ) {
          	add_meta_box( 'AMP_AD_title_meta','Show AMP ADs for current pages?', 'AMP_AD_metabox_callback', $post_type,'side','high' );  
          }
        }
    }
}

function AMP_Ad_metabox_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'amp_ad_title_nonce' );
    $amp_ad_stored_meta = get_post_meta( $post->ID );

	?>
        <div class="amp-ad-row-content">
            <label for="meta-radio-one">
                <input type="radio" name="amp_ad_on_off" id="meta-radio-one" value="show"  
                checked ="checked" <?php if ( isset ( $amp_ad_stored_meta['amp_ad_on_off'] ) ) checked( $amp_ad_stored_meta['amp_ad_on_off'][0], 'show' ); ?>>
                <?php _e( 'Show' )?>
            </label>
            <label for="meta-radio-two">
                <input type="radio" name="amp_ad_on_off" id="meta-radio-two" value="hide" <?php if ( isset ( $amp_ad_stored_meta['amp_ad_on_off'] ) ) checked( $amp_ad_stored_meta['amp_ad_on_off'][0], 'hide' ); ?>>
                <?php _e( 'Hide' )?>
            </label>
        </div>
	<?php
}

add_action( 'save_post', 'AMP_Ad_meta_save' );

function AMP_Ad_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'amp_ad_title_nonce' ] ) && wp_verify_nonce( $_POST[ 'amp_ad_title_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    // Checks for radio buttons and saves if needed
    if( isset( $_POST[ 'amp_ad_on_off' ] ) ) {
        $amp_ad_status = sanitize_text_field( $_POST[ 'amp_ad_on_off' ] );
        update_post_meta( $post_id, 'amp_ad_on_off', $amp_ad_status );
    }
}

add_filter('ampforwp_skip_ad_filter', 'stop_ads_from_loading');
function stop_ads_from_loading() {
   global $post, $redux_builder_amp;
	$post_id = $post->ID ;
	if(function_exists('ampforwp_is_front_page')){
		if(ampforwp_is_front_page() && $redux_builder_amp['amp-frontpage-select-option']){
			$post_id = $redux_builder_amp['amp-frontpage-select-option-pages'];
		}
	}
	$check = get_post_meta($post_id, 'amp_ad_on_off',true);
	if ( $check  == 'hide') {
		    return true;
	}  
 }

 add_action('pre_amp_render_post','ampforwp_remove_unwated_functions_in_the_content');
function ampforwp_remove_unwated_functions_in_the_content(){
	if(is_plugin_active('amp/amp.php')){
		$ampforwp_is_amp_endpoint = amp_end_point();
	}
	else{
		$ampforwp_is_amp_endpoint = ampforwp_is_amp_endpoint();
	}
	if ( $ampforwp_is_amp_endpoint ) {
	remove_filter('the_content','txt_after_every_para');
	}
}

function amp_end_point(){
	return false !== get_query_var( 'amp', false );
}
//#32. AMP AUTO ADS

add_action('ampforwp_body_beginning','ampforwp_amp_auto_ads',11);
function ampforwp_amp_auto_ads(){
	global $redux_builder_amp;
  	if( isset($redux_builder_amp['ampforwp-amp-auto-ads']) && $redux_builder_amp['ampforwp-amp-auto-ads'] && $redux_builder_amp['ampforwp-amp-auto-ads-code'] ) {
    	echo $redux_builder_amp['ampforwp-amp-auto-ads-code'] ;
  }
}

// #33. Ads in Between Loop

add_action('pre_amp_render_post','ads_in_between_loop');
function ads_in_between_loop(){
	add_action('ampforwp_between_loop','between_loop_ads',10,1);
}

function between_loop_ads($count){
$displayed_posts = get_option('posts_per_page');
$in_between = round(abs($displayed_posts / 2));
	if(intval($in_between) == $count){
			global $redux_builder_amp;
		if($redux_builder_amp['ampforwp-inbetween-loop'] == 1){
				
			if($redux_builder_amp['ampforwp-inbetween-type'] == '1'){
					
				$advert_class	= 'ampforwp-inbetween-ad';
				$advert_width  	= $redux_builder_amp['ampforwp-inbetween-adsense-ad-width'];
				$advert_height 	= $redux_builder_amp['ampforwp-inbetween-adsense-ad-height'];
				$advert_client	= $redux_builder_amp['ampforwp-inbetween-adsense-ad-data-ad-client'];
				$advert_slot	= $redux_builder_amp['ampforwp-inbetween-adsense-ad-data-ad-slot'];
				if( $redux_builder_amp['adsense-rspv-ad-inbetween-type'] != 1) {
						echo ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot);
					}
				else {
					if(isset($redux_builder_amp['adsense-rspv-ad-inbetween-type']) && 1 == $redux_builder_amp['adsense-rspv-ad-inbetween-type']) {
				 		echo ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); 
				 	}
				 }
			}


			elseif($redux_builder_amp['ampforwp-inbetween-type'] == '2'){
					
				$advert_class	= 'ampforwp-inbetween-ad';
				$advert_width  	= $redux_builder_amp['ampforwp-inbetween-adsense-ad-width'];
				$advert_height 	= $redux_builder_amp['ampforwp-inbetween-adsense-ad-height'];
				$advert_client	= $redux_builder_amp['ampforwp-inbetween-adsense-ad-data-ad-client'];
				$data_slot	= $redux_builder_amp['ampforwp-inbetween-adsense-ad-data-ad-slot'];
				echo ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
			}


			elseif($redux_builder_amp['ampforwp-inbetween-type'] == '3'){
					
					$output = '<div class="amp-ad-wrapper ampforwp-inbetween-custom-banner">';
					$output .= $redux_builder_amp['ampforwp-inbetween-custom-advertisement'];
					$output	.= '</div>';
					echo  $output;
			}
		}
	}
}

// Ad After Featured Image #42
add_action('ampforwp_after_featured_image_hook','ampforwp_after_featured_image_ad');

function ampforwp_after_featured_image_ad(){
	
			global $redux_builder_amp;
			// Google Advertisement Code
			if ( $redux_builder_amp['ampforwp-after-featured-image-ad'] == '1' && $redux_builder_amp['ampforwp-after-featured-image-ad-type'] == '1' ) {
					$advert_class	= 'ampforwp-after-featured-image-ad';
					$advert_width  	= $redux_builder_amp['ampforwp-after-featured-image-ad-type-1-width'];
					$advert_height 	= $redux_builder_amp['ampforwp-after-featured-image-ad-type-1-height'];
					$advert_client	= $redux_builder_amp['ampforwp-after-featured-image-ad-type-1-data-ad-client'];
					$advert_slot	= $redux_builder_amp['ampforwp-after-featured-image-ad-type-1-data-ad-slot'];

				if( $redux_builder_amp['adsense-rspv-ad-after-featured-img'] != 1) {
						echo ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot);
					}
				else {
					if(isset($redux_builder_amp['adsense-rspv-ad-after-featured-img']) && 1 == $redux_builder_amp['adsense-rspv-ad-after-featured-img']) {
				 		echo ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); 
				 	}
				 }
			}

			if ( $redux_builder_amp['ampforwp-after-featured-image-ad'] == '1' && $redux_builder_amp['ampforwp-after-featured-image-ad-type'] == '2' ) {
					$advert_class	= 'ampforwp-after-featured-image-ad';
					$advert_width  	= $redux_builder_amp['ampforwp-after-featured-image-ad-type-2-width'];
					$advert_height 	= $redux_builder_amp['ampforwp-after-featured-image-ad-type-2-height'];
					$data_slot	= $redux_builder_amp['ampforwp-after-featured-image-ad-type-2-ad-data-slot'];

				echo	ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
			}

			if ( $redux_builder_amp['ampforwp-after-featured-image-ad'] == '1' && $redux_builder_amp['ampforwp-after-featured-image-ad-type'] == '3' ) {
				$output = '<div class="amp-ad-wrapper ampforwp-after-featured-image-ad">';
					$output .= $redux_builder_amp['ampforwp-after-featured-image-ad-custom-advertisement'];
				$output	.= '</div>';
				echo $output;

			}
	
}


add_action('amp_post_template_css', 'ampforwp_advance_amp_ads_styling',99);

function ampforwp_advance_amp_ads_styling(){
	global $redux_builder_amp;
	?>

	/* Advance Amp Ads Styling */
	<?php if(is_plugin_active('accelerated-mobile-pages/accelerated-moblie-pages.php')){
				if(ampforwp_is_home()){?>
					.amp-ad-wrapper{padding-top:10px;text-align:center}
			<?php }
		}
}
