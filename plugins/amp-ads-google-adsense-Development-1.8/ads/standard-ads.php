<?php
// Below the Header (SiteWide) -- Starts Here
add_action( 'ampforwp_after_header', 'ampforwp_standard_ads_insert_advertisement_code_1' );
add_action( 'ampforwp_design_1_after_header', 'ampforwp_standard_ads_insert_advertisement_code_1' );

if ( ! function_exists( 'ampforwp_standard_ads_insert_advertisement_code_1' ) ) {
	function ampforwp_standard_ads_insert_advertisement_code_1() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		echo ampforwp_standard_final_advertisement_code_1();
	}
}
if ( ! function_exists( 'ampforwp_standard_final_advertisement_code_1' ) ) {
	function ampforwp_standard_final_advertisement_code_1() {
		global $redux_builder_amp;
		// Google Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-1'] == '1' && $redux_builder_amp['ampforwp-standard-ads-1'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-below-header';
				$advert_width  	= $redux_builder_amp['ampforwp-adsense-ad-width-standard-1'];
				$advert_height 	= $redux_builder_amp['ampforwp-adsense-ad-height-standard-1'];
				$advert_client	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-client-standard-1'];
				$advert_slot	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-slot-standard-1'];

			if( $redux_builder_amp['adsense-rspv-ad-type-standard-1'] != 1) {
				return ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot); }
			else {
				if(isset($redux_builder_amp['adsense-rspv-ad-type-standard-1']) && 1 == $redux_builder_amp['adsense-rspv-ad-type-standard-1']) {
				 		return ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); } }
		}
		// DoubleClick Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-1'] == '2' && $redux_builder_amp['ampforwp-standard-ads-1'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-below-header';
				$advert_width  	= $redux_builder_amp['ampforwp-doubleclick-ad-width-standard-1'];
				$advert_height 	= $redux_builder_amp['ampforwp-doubleclick-ad-height-standard-1'];
				$data_slot	= $redux_builder_amp['ampforwp-doubleclick-ad-data-slot-standard-1'];

			return	ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
		}
		// Custom Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-1'] == '3' && $redux_builder_amp['ampforwp-standard-ads-1'] == '1' ) {

			$output = '<div class="amp-ad-wrapper amp_ad_1 ampforwp-standard-custom-banner ampforwp-ad-below-header">';
				$output .= $redux_builder_amp['ampforwp-custom-advertisement-standard-1'];
			$output	.= '</div>';
			return $output;

		}
	}
}
//Below the Header (SiteWide) -01- Ends Here

//Below the Footer (SiteWide) -02 -- Starts Here
add_action( 'amp_post_template_footer', 'ampforwp_standard_ads_insert_advertisement_code_2' );

if ( ! function_exists( 'ampforwp_standard_ads_insert_advertisement_code_2' ) ) {
	function ampforwp_standard_ads_insert_advertisement_code_2() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		echo ampforwp_standard_final_advertisement_code_2();
	}
}
if ( ! function_exists( 'ampforwp_standard_final_advertisement_code_2' ) ) {
	function ampforwp_standard_final_advertisement_code_2() {
		global $redux_builder_amp;
		// Google Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-2'] == '1' && $redux_builder_amp['ampforwp-standard-ads-2'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-below-footer';
				$advert_width  	= $redux_builder_amp['ampforwp-adsense-ad-width-standard-2'];
				$advert_height 	= $redux_builder_amp['ampforwp-adsense-ad-height-standard-2'];
				$advert_client	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-client-standard-2'];
				$advert_slot	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-slot-standard-2'];

			if( $redux_builder_amp['adsense-rspv-ad-type-standard-2'] != 1) {
				return ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot); }
			else {
				if(isset($redux_builder_amp['adsense-rspv-ad-type-standard-2']) && 1 == $redux_builder_amp['adsense-rspv-ad-type-standard-2']) {
				 		return ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); } }
		}
		// DoubleClick Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-2'] == '2' && $redux_builder_amp['ampforwp-standard-ads-2'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-below-footer';
				$advert_width  	= $redux_builder_amp['ampforwp-doubleclick-ad-width-standard-2'];
				$advert_height 	= $redux_builder_amp['ampforwp-doubleclick-ad-height-standard-2'];
				$data_slot	= $redux_builder_amp['ampforwp-doubleclick-ad-data-slot-standard-2'];

			return	ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
		}
		// Custom Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-2'] == '3' && $redux_builder_amp['ampforwp-standard-ads-2'] == '1' ) {

			$output = '<div class="amp-ad-wrapper amp_ad_2 ampforwp-standard-custom-banner ampforwp-ad-below-footer">';
				$output .= $redux_builder_amp['ampforwp-custom-advertisement-standard-2'];
			$output	.= '</div>';
			return $output;

		}
	}
}
//Below the Footer (SiteWide) -02- Ends Here

//ABove the Footer (SiteWide) -02 -- Starts Here
add_action( 'amp_post_template_above_footer', 'ampforwp_standard_ads_insert_advertisement_code_2_1' );

if ( ! function_exists( 'ampforwp_standard_ads_insert_advertisement_code_2_1' ) ) {
	function ampforwp_standard_ads_insert_advertisement_code_2_1() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		echo ampforwp_standard_final_advertisement_code_2_1();
	}
}
if ( ! function_exists( 'ampforwp_standard_final_advertisement_code_2_1' ) ) {
	function ampforwp_standard_final_advertisement_code_2_1() {
		global $redux_builder_amp;
		// Google Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-2-1'] == '1' && $redux_builder_amp['ampforwp-standard-ads-2-1'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-below-footer';
				$advert_width  	= $redux_builder_amp['ampforwp-adsense-ad-width-standard-2-1'];
				$advert_height 	= $redux_builder_amp['ampforwp-adsense-ad-height-standard-2-1'];
				$advert_client	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-client-standard-2-1'];
				$advert_slot	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-slot-standard-2-1'];

			if( $redux_builder_amp['adsense-rspv-ad-type-standard-2-1'] != 1) {
				return ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot); }
			else {
				if(isset($redux_builder_amp['adsense-rspv-ad-type-standard-2-1']) && 1 == $redux_builder_amp['adsense-rspv-ad-type-standard-2-1']) {
				 		return ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); } }
		}
		// DoubleClick Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-2-1'] == '2' && $redux_builder_amp['ampforwp-standard-ads-2-1'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-below-footer';
				$advert_width  	= $redux_builder_amp['ampforwp-doubleclick-ad-width-standard-2-1'];
				$advert_height 	= $redux_builder_amp['ampforwp-doubleclick-ad-height-standard-2-1'];
				$data_slot	= $redux_builder_amp['ampforwp-doubleclick-ad-data-slot-standard-2-1'];

			return	ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
		}
		// Custom Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-2-1'] == '3' && $redux_builder_amp['ampforwp-standard-ads-2-1'] == '1' ) {

			$output = '<div class="amp-ad-wrapper amp_ad_2 ampforwp-standard-custom-banner ampforwp-ad-below-footer">';
				$output .= $redux_builder_amp['ampforwp-custom-advertisement-standard-2-1'];
			$output	.= '</div>';
			return $output;

		}
	}
}
//Above the Footer (SiteWide) -02- Ends Here

//Above the Post Content (Single Post)-03 -- Starts Here
add_action( 'ampforwp_before_post_content', 'ampforwp_standard_ads_insert_advertisement_code_3' );
add_action( 'ampforwp_inside_post_content_before', 'ampforwp_standard_ads_insert_advertisement_code_3' );

if ( ! function_exists( 'ampforwp_standard_ads_insert_advertisement_code_3' ) ) {
	function ampforwp_standard_ads_insert_advertisement_code_3() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		echo ampforwp_standard_final_advertisement_code_3();
	}
}
if ( ! function_exists( 'ampforwp_standard_final_advertisement_code_3' ) ) {
	function ampforwp_standard_final_advertisement_code_3() {
		global $redux_builder_amp;
		// Google Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-3'] == '1' && $redux_builder_amp['ampforwp-standard-ads-3'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-above-post';
				$advert_width  	= $redux_builder_amp['ampforwp-adsense-ad-width-standard-3'];
				$advert_height 	= $redux_builder_amp['ampforwp-adsense-ad-height-standard-3'];
				$advert_client	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-client-standard-3'];
				$advert_slot	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-slot-standard-3'];

			if( $redux_builder_amp['adsense-rspv-ad-type-standard-3'] != 1) {
				return ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot); }
			else {
				if(isset($redux_builder_amp['adsense-rspv-ad-type-standard-3']) && 1 == $redux_builder_amp['adsense-rspv-ad-type-standard-3']) {
				 		return ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); } }
		}
		// DoubleClick Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-3'] == '2' && $redux_builder_amp['ampforwp-standard-ads-3'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-above-post';
				$advert_width  	= $redux_builder_amp['ampforwp-doubleclick-ad-width-standard-3'];
				$advert_height 	= $redux_builder_amp['ampforwp-doubleclick-ad-height-standard-3'];
				$data_slot	= $redux_builder_amp['ampforwp-doubleclick-ad-data-slot-standard-3'];

			return	ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
		}
		// Custom Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-3'] == '3' && $redux_builder_amp['ampforwp-standard-ads-3'] == '1' ) {

			$output = '<div class="amp-ad-wrapper amp_ad_3 ampforwp-standard-custom-banner ampforwp-ad-above-post">';
				$output .= $redux_builder_amp['ampforwp-custom-advertisement-standard-3'];
			$output	.= '</div>';
			return $output;

		}
	}
}
//Above the Post Content (Single Post)-03 - Ends Here

// Below the Post Content (Single Post) -04 -- Starts Here
add_action( 'ampforwp_after_post_content', 'ampforwp_standard_ads_insert_advertisement_code_4' );
add_action( 'ampforwp_inside_post_content_after', 'ampforwp_standard_ads_insert_advertisement_code_4' );

if ( ! function_exists( 'ampforwp_standard_ads_insert_advertisement_code_4' ) ) {
	function ampforwp_standard_ads_insert_advertisement_code_4() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		echo ampforwp_standard_final_advertisement_code_4();
	}
}
if ( ! function_exists( 'ampforwp_standard_final_advertisement_code_4' ) ) {
	function ampforwp_standard_final_advertisement_code_4() {
		global $redux_builder_amp;
		// Google Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-4'] == '1' && $redux_builder_amp['ampforwp-standard-ads-4'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-below-post';
				$advert_width  	= $redux_builder_amp['ampforwp-adsense-ad-width-standard-4'];
				$advert_height 	= $redux_builder_amp['ampforwp-adsense-ad-height-standard-4'];
				$advert_client	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-client-standard-4'];
				$advert_slot	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-slot-standard-4'];

			if( $redux_builder_amp['adsense-rspv-ad-type-standard-4'] != 1) {
				return ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot); }
			else {
				if(isset($redux_builder_amp['adsense-rspv-ad-type-standard-4']) && 1 == $redux_builder_amp['adsense-rspv-ad-type-standard-4']) {
				 		return ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); } }
		}
		// DoubleClick Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-4'] == '2' && $redux_builder_amp['ampforwp-standard-ads-4'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-below-post';
				$advert_width  	= $redux_builder_amp['ampforwp-doubleclick-ad-width-standard-4'];
				$advert_height 	= $redux_builder_amp['ampforwp-doubleclick-ad-height-standard-4'];
				$data_slot	= $redux_builder_amp['ampforwp-doubleclick-ad-data-slot-standard-4'];

			return	ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
		}
		// Custom Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-4'] == '3' && $redux_builder_amp['ampforwp-standard-ads-4'] == '1' ) {

			$output = '<div class="amp-ad-wrapper amp_ad_4 ampforwp-standard-custom-banner ampforwp-ad-below-post">';
				$output .= $redux_builder_amp['ampforwp-custom-advertisement-standard-4'];
			$output	.= '</div>';
			return $output;

		}
	}
}
// Below the Post Content (Single Post) -04- Ends Here

//Below The Title (Single Post) -05 -- Starts Here
add_action('ampforwp_below_the_title','ampforwp_standard_ads_insert_advertisement_code_5');

if ( ! function_exists( 'ampforwp_standard_ads_insert_advertisement_code_5' ) ) {
	function ampforwp_standard_ads_insert_advertisement_code_5() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		echo ampforwp_standard_final_advertisement_code_5();
	}
}
if ( ! function_exists( 'ampforwp_standard_final_advertisement_code_5' ) ) {
	function ampforwp_standard_final_advertisement_code_5() {
		global $redux_builder_amp;
		// Google Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-5'] == '1' && $redux_builder_amp['ampforwp-standard-ads-5'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-below-the-title';
				$advert_width  	= $redux_builder_amp['ampforwp-adsense-ad-width-standard-5'];
				$advert_height 	= $redux_builder_amp['ampforwp-adsense-ad-height-standard-5'];
				$advert_client	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-client-standard-5'];
				$advert_slot	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-slot-standard-5'];

			if( $redux_builder_amp['adsense-rspv-ad-type-standard-5'] != 1) {
				return ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot); }
			else {
				if(isset($redux_builder_amp['adsense-rspv-ad-type-standard-5']) && 1 == $redux_builder_amp['adsense-rspv-ad-type-standard-5']) {
				 		return ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); } }
		}
		// DoubleClick Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-5'] == '2' && $redux_builder_amp['ampforwp-standard-ads-5'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad aampforwp-ad-below-the-title';
				$advert_width  	= $redux_builder_amp['ampforwp-doubleclick-ad-width-standard-5'];
				$advert_height 	= $redux_builder_amp['ampforwp-doubleclick-ad-height-standard-5'];
				$data_slot	= $redux_builder_amp['ampforwp-doubleclick-ad-data-slot-standard-5'];

			return	ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
		}
		// Custom Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-5'] == '3' && $redux_builder_amp['ampforwp-standard-ads-5'] == '1' ) {

			$output = '<div class="amp-ad-wrapper amp_ad_1 amp_ad_5 ampforwp-standard-custom-banner ampforwp-ad-below-the-title">';
				$output .= $redux_builder_amp['ampforwp-custom-advertisement-standard-5'];
			$output	.= '</div>';
			return $output;

		}
	}
}
//Below the Title (Single Post) -05 -- Ends Here

//Above the Related Post -06 -- Starts Here
add_action('ampforwp_above_related_post','ampforwp_standard_ads_insert_advertisement_code_6');

if ( ! function_exists( 'ampforwp_standard_ads_insert_advertisement_code_6' ) ) {
	function ampforwp_standard_ads_insert_advertisement_code_6() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		echo ampforwp_standard_final_advertisement_code_6();
	}
}
if ( ! function_exists( 'ampforwp_standard_final_advertisement_code_6' ) ) {
	function ampforwp_standard_final_advertisement_code_6() {
		global $redux_builder_amp;
		// Google Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-6'] == '1' && $redux_builder_amp['ampforwp-standard-ads-6'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-above-related-post';
				$advert_width  	= $redux_builder_amp['ampforwp-adsense-ad-width-standard-6'];
				$advert_height 	= $redux_builder_amp['ampforwp-adsense-ad-height-standard-6'];
				$advert_client	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-client-standard-6'];
				$advert_slot	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-slot-standard-6'];

			if( $redux_builder_amp['adsense-rspv-ad-type-standard-6'] != 1) {
				return ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot); }
			else {
				if(isset($redux_builder_amp['adsense-rspv-ad-type-standard-6']) && 1 == $redux_builder_amp['adsense-rspv-ad-type-standard-6']) {
				 		return ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); } }
		}
		// DoubleClick Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-6'] == '2' && $redux_builder_amp['ampforwp-standard-ads-6'] == '1' ) {
				$advert_class	= 'ampforwp-standard-ad ampforwp-ad-above-related-post';
				$advert_width  	= $redux_builder_amp['ampforwp-doubleclick-ad-width-standard-6'];
				$advert_height 	= $redux_builder_amp['ampforwp-doubleclick-ad-height-standard-6'];
				$data_slot	= $redux_builder_amp['ampforwp-doubleclick-ad-data-slot-standard-6'];

			return	ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
		}
		// Custom Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-standard-6'] == '3' && $redux_builder_amp['ampforwp-standard-ads-6'] == '1' ) {

			$output = '<div class="amp-ad-wrapper amp_ad_6 ampforwp-standard-custom-banner ampforwp-ad-above-related-post">';
				$output .= $redux_builder_amp['ampforwp-custom-advertisement-standard-6'];
			$output	.= '</div>';
			return $output;

		}
	}
}
//Above the Related Post -06 -- Ends Here

?>
