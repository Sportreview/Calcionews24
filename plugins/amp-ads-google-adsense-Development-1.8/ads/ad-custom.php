<?php
// Custom Advertisement
	// Ad #1 - Below the Header (SiteWide)
	add_action('ampforwp_after_header','ampforwp_advert_custom_code_output_header');
	add_action('ampforwp_design_1_after_header','ampforwp_advert_custom_code_output_header');
	function ampforwp_advert_custom_code_output_header() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		global $redux_builder_amp;
		if ( $redux_builder_amp['ampforwp-advertisement-type'] == '3' && $redux_builder_amp['ampforwp-incontent-custom-1-enable'] == '1' ) {
			$output = '<div class="amp-ad-wrapper amp_ad_1">';
				$output	.=	$redux_builder_amp['ampforwp-incontent-custom-advert-1'];
			$output	.= '</div>';
			echo $output ; 
		}
	}


	// Ad #2 - Below the Footer (SiteWide)
	add_action('amp_post_template_footer','ampforwp_advert_custom_code_output_footer'); 
	function ampforwp_advert_custom_code_output_footer() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		global $redux_builder_amp;
		if ( $redux_builder_amp['ampforwp-advertisement-type'] == '3' && $redux_builder_amp['ampforwp-incontent-custom-2-enable'] == '1' ) {
			$output = '<div class="amp-ad-wrapper amp_ad_2">';
				$output	.=	$redux_builder_amp['ampforwp-incontent-custom-advert-2'];
			$output	.= '</div>';
			echo $output ; 
		}
	}


	// Ad #3 - Above the Post Content (Single Post)
	add_action('ampforwp_before_post_content','ampforwp_advert_custom_code_output_content_before');
	add_action('ampforwp_inside_post_content_before','ampforwp_advert_custom_code_output_content_before');
	function ampforwp_advert_custom_code_output_content_before() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		global $redux_builder_amp;
		if ( $redux_builder_amp['ampforwp-advertisement-type'] == '3' && $redux_builder_amp['ampforwp-incontent-custom-3-enable'] == '1' ) {
			$output = '<div class="amp-ad-wrapper amp_ad_3">';
				$output	.=	$redux_builder_amp['ampforwp-incontent-custom-advert-3'];
			$output	.= '</div>';
			echo $output ;
		}
	}


	// Ad #4 - Below the Post Content (Single Post)
	add_action('ampforwp_after_post_content','ampforwp_advert_custom_code_output_content_after');
	add_action('ampforwp_inside_post_content_after','ampforwp_advert_custom_code_output_content_after');
	function ampforwp_advert_custom_code_output_content_after() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		global $redux_builder_amp;
		if ( $redux_builder_amp['ampforwp-advertisement-type'] == '3' && $redux_builder_amp['ampforwp-incontent-custom-4-enable'] == '1' ) {
			$output = '<div class="amp-ad-wrapper amp_ad_4">';
				$output	.=	$redux_builder_amp['ampforwp-incontent-custom-advert-4'];
			$output	.= '</div>';
			echo $output ;
		}
	}
?>