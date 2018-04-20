<?php
// DoubleClick Advertisement
	// Ad #1 - Below the Header (SiteWide)
	add_action('ampforwp_after_header','ampforwp_advert_doubleclick_code_output_header');
	add_action('ampforwp_design_1_after_header','ampforwp_advert_doubleclick_code_output_header');
	function ampforwp_advert_doubleclick_code_output_header() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		global $redux_builder_amp;
		if(isset($redux_builder_amp['ampforwp-advertisement-type'])){
			if ( $redux_builder_amp['ampforwp-advertisement-type'] == '2' && $redux_builder_amp['ampforwp-incontent-doubleclickad-1-enable'] == '1' ) {
				$adver_class = 'amp-ad-1 amp-doubleclick-ad-1 amp_ad_1';
				$width  	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-1-width'];
				$height 	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-1-height'];
				$data_slot	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-1-data-slot'];
				echo ampforwp_advert_code_generator_doubleclick($adver_class, $width, $height, $data_slot ) ; 
			}
		}
	}


	// Ad #2 - Below the Footer (SiteWide)
	add_action('amp_post_template_footer','ampforwp_advert_doubleclick_code_output_footer'); 
	function ampforwp_advert_doubleclick_code_output_footer() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		global $redux_builder_amp;
		if(isset($redux_builder_amp['ampforwp-advertisement-type'])){
			if ( $redux_builder_amp['ampforwp-advertisement-type'] == '2' && $redux_builder_amp['ampforwp-incontent-doubleclickad-2-enable'] == '1' ) {
				$adver_class = 'amp-ad-2 amp-doubleclick-ad-2 amp_ad_2';
				$width  	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-2-width'];
				$height 	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-2-height'];
				$data_slot	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-2-data-slot'];
				echo ampforwp_advert_code_generator_doubleclick($adver_class, $width, $height, $data_slot ) ; 
			}
		}
	}


	// Ad #3 - Above the Post Content (Single Post)
	add_action('ampforwp_before_post_content','ampforwp_advert_doubleclick_code_output_content_before');
	add_action('ampforwp_inside_post_content_before','ampforwp_advert_doubleclick_code_output_content_before');
	function ampforwp_advert_doubleclick_code_output_content_before() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		global $redux_builder_amp;
		if(isset($redux_builder_amp['ampforwp-advertisement-type'])){		
			if ( $redux_builder_amp['ampforwp-advertisement-type'] == '2' && $redux_builder_amp['ampforwp-incontent-doubleclickad-3-enable'] == '1' ) {
				$adver_class = 'amp-ad-3 amp-doubleclick-ad-3 amp_ad_3';
				$width  	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-3-width'];
				$height 	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-3-height'];
				$data_slot	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-3-data-slot'];
				echo ampforwp_advert_code_generator_doubleclick($adver_class, $width, $height, $data_slot ) ; 
			}
		}
	}


	// Ad #4 - Below the Post Content (Single Post)
	add_action('ampforwp_after_post_content','ampforwp_advert_doubleclick_code_output_content_after');
	add_action('ampforwp_inside_post_content_after','ampforwp_advert_doubleclick_code_output_content_after');
	function ampforwp_advert_doubleclick_code_output_content_after() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		global $redux_builder_amp;
		if(isset($redux_builder_amp['ampforwp-advertisement-type'])){
			if ( $redux_builder_amp['ampforwp-advertisement-type'] == '2' && $redux_builder_amp['ampforwp-incontent-doubleclickad-4-enable'] == '1' ) {
				$adver_class = 'amp-ad-4 amp-doubleclick-ad-4 amp_ad_4';
				$width  	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-4-width'];
				$height 	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-4-height'];
				$data_slot	 = $redux_builder_amp['ampforwp-incontent-doubleclickad-4-data-slot'];
				echo ampforwp_advert_code_generator_doubleclick($adver_class, $width, $height, $data_slot ) ; 
			}
		}
	}
?>