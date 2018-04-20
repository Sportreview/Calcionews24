<?php
add_action( 'pre_amp_render_post', 'ampforwp_incontent_advertisement_code_4' );
// Incontent Adsense Ad #1 -- Starts Here
// Run the filter and insert the ad for Adsense.
if ( ! function_exists( 'ampforwp_incontent_advertisement_code_4' ) ) {
	function ampforwp_incontent_advertisement_code_4() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		add_filter( 'the_content', 'ampforwp_ads_insert_advertisement_code_4' );
	}
}

//Insert ads after set number of paragraphs of single post content.
if ( ! function_exists( 'ampforwp_ads_insert_advertisement_code_4' ) ) {
	function ampforwp_ads_insert_advertisement_code_4( $content ) {
	 	global $redux_builder_amp;
		$insertion = ampforwp_incontent_final_advertisement_code_4();

		// to show ad after below number of paragraph.
		if ( $redux_builder_amp['ampforwp-advertisement-type-incontent-ad-4'] == '1' && $redux_builder_amp['ampforwp-incontent-ad-4'] == '1' ) {
			$paragraph_id = $redux_builder_amp['ampforwp-adsense-ad-position-incontent-ad-4'];
			if ( $paragraph_id =='custom' ) {
				$paragraph_id = $redux_builder_amp['ampforwp-custom-adsense-ad-position-incontent-ad-4'];
				$paragraph_id = round($paragraph_id);
			}
		} elseif ( $redux_builder_amp['ampforwp-advertisement-type-incontent-ad-4'] == '2' && $redux_builder_amp['ampforwp-incontent-ad-3'] == '1'  ) {
			$paragraph_id = $redux_builder_amp['ampforwp-doubleclick-ad-position-incontent-ad-4'];
			if ( $paragraph_id =='custom' ) {
				$paragraph_id = $redux_builder_amp['ampforwp-custom-doubleclick-ad-position-incontent-ad-4'];
				$paragraph_id = round($paragraph_id);

			}
		} elseif ( $redux_builder_amp['ampforwp-advertisement-type-incontent-ad-4'] == '3' && $redux_builder_amp['ampforwp-incontent-ad-4'] == '1'  ) {
			$paragraph_id = $redux_builder_amp['ampforwp-custom-ads-ad-position-incontent-ad-4'];
			if ( $paragraph_id =='custom' ) {
				$paragraph_id = $redux_builder_amp['ampforwp-custom-custom-ads-ad-position-incontent-ad-4'];
				$paragraph_id = round($paragraph_id);
			}
		}
		if ( ( is_single() || is_page() || is_front_page() )  && ! is_admin() ) {
			if(isset($paragraph_id)){
				return ampforwp_ads_insert_after_paragraph_advertisement_code_4( $insertion,$paragraph_id,$content);
			}
		}
		return $content;
	}
}

// Parent Function that makes the magic happen
if ( ! function_exists( 'ampforwp_ads_insert_after_paragraph_advertisement_code_4' ) ) {
	function ampforwp_ads_insert_after_paragraph_advertisement_code_4( $insertion, $paragraph_id, $content ) {
		global $redux_builder_amp;
		$closing_p = '</p>';
		$paragraphs = explode( $closing_p, $content );

		if ( $paragraph_id == '50-percent' ) {
			$paragraph_id =  count($paragraphs);
			$paragraph_id = $paragraph_id / 2 ;
			$paragraph_id = round($paragraph_id);
		}

		foreach ($paragraphs as $index => $paragraph) {
			if ( trim( $paragraph ) ) {
				$paragraphs[$index] .= $closing_p;
			}
			if ( $paragraph_id == $index + 1 ) {
				$paragraphs[$index] .= $insertion;
			}
		}
		return implode( '', $paragraphs );
	}
}

if ( ! function_exists( 'ampforwp_incontent_final_advertisement_code_4' ) ) {
	function ampforwp_incontent_final_advertisement_code_4() {
		global $redux_builder_amp;
		// Google Advertisement Code
		if ( $redux_builder_amp['ampforwp-advertisement-type-incontent-ad-4'] == '1' && $redux_builder_amp['ampforwp-incontent-ad-4'] == '1' ) {
				$advert_class	= 'ampforwp-incontent-ad ampforwp-incontent-ad4';
				$advert_width  	= $redux_builder_amp['ampforwp-adsense-ad-width-incontent-ad-4'];
				$advert_height 	= $redux_builder_amp['ampforwp-adsense-ad-height-incontent-ad-4'];
				$advert_client	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-client-incontent-ad-4'];
				$advert_slot	= $redux_builder_amp['ampforwp-adsense-ad-data-ad-slot-incontent-ad-4'];

			if( $redux_builder_amp['adsense-rspv-ad-incontent-4'] != 1) {
				return ampforwp_advert_code_generator_adsense( $advert_class, $advert_width, $advert_height, $advert_client, $advert_slot); }
			else {
				if(isset($redux_builder_amp['adsense-rspv-ad-incontent-4']) && 1 == $redux_builder_amp['adsense-rspv-ad-incontent-4']) {
				 		return ampforwp_advert_code_generator_adsense_rspv( $advert_class, $advert_client, $advert_slot); } }

		}

		if ( $redux_builder_amp['ampforwp-advertisement-type-incontent-ad-4'] == '2' && $redux_builder_amp['ampforwp-incontent-ad-4'] == '1' ) {
				$advert_class	= 'ampforwp-incontent-ad ampforwp-incontent-ad4';
				$advert_width  	= $redux_builder_amp['ampforwp-doubleclick-ad-width-incontent-ad-4'];
				$advert_height 	= $redux_builder_amp['ampforwp-doubleclick-ad-height-incontent-ad-4'];
				$data_slot	= $redux_builder_amp['ampforwp-doubleclick-ad-data-slot-incontent-ad-4'];

			return	ampforwp_advert_code_generator_doubleclick( $advert_class, $advert_width, $advert_height, $data_slot ) ;
		}

		if ( $redux_builder_amp['ampforwp-advertisement-type-incontent-ad-4'] == '3' && $redux_builder_amp['ampforwp-incontent-ad-4'] == '1' ) {

			$output = '<div class="amp-ad-wrapper amp_ad_1 ampforwp-incontent-custom-banner ampforwp-incontent-ad3">';
				$output .= $redux_builder_amp['ampforwp-custom-advertisement-incontent-ad-4'];
			$output	.= '</div>';
			return $output;

		}
	}
}
//Incontent Adsense ad -01- Ends Here
?>
