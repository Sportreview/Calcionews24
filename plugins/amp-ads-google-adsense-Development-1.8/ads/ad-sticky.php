<?php
// Sticky Ad code.
add_action('amp_post_template_head','ampforwp_sticky_ads_script', 12);
if ( ! function_exists('ampforwp_sticky_ads_script' ) ) {
	function ampforwp_sticky_ads_script() {
		$skip_ad = "";
		$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

		if ( true === $skip_ad ) {
			return ;
		}
		
		global $redux_builder_amp;
		if($redux_builder_amp['ampforwp-sticky-ad']){
			if( $redux_builder_amp['ampforwp-advertisement-sticky-type']  == '1' || $redux_builder_amp['ampforwp-advertisement-sticky-type']=='2' ) {
				?>
				<script async custom-element="amp-sticky-ad" src="https://cdn.ampproject.org/v0/amp-sticky-ad-1.0.js"></script>
				<?php
			}
		}
	}
}		
add_action('amp_post_template_footer','ampforwp_insert_sticky_ads_code', 12);

function ampforwp_insert_sticky_ads_code() {
	echo ampforwp_generate_sticky_ads_code();
}

function ampforwp_generate_sticky_ads_code() {
	$skip_ad = "";
	$skip_ad = apply_filters('ampforwp_skip_ad_filter', $skip_ad );

	if ( true === $skip_ad ) {
		return ;
	}
		
	global $redux_builder_amp;
	if ( $redux_builder_amp['ampforwp-advertisement-sticky-type'] == '1' && $redux_builder_amp['ampforwp-sticky-ad'] == '1' ) {
			if(isset($redux_builder_amp['ampforwp-data-strategy-loading']) && $redux_builder_amp['ampforwp-data-strategy-loading']==1){
				$optimize = 'data-loading-strategy="prefer-viewability-over-views"';
			}
			else{
				$optimize = '';
			}
	

		$advert_width  	= $redux_builder_amp['ampforwp-sticky-ad-width'];
		$advert_height 	= $redux_builder_amp['ampforwp-sticky-ad-height'];
		$advert_client	= $redux_builder_amp['ampforwp-sticky-ad-data-ad-client'];
		$advert_slot	= $redux_builder_amp['ampforwp-sticky-ad-data-ad-slot'];


		$output  = '<amp-sticky-ad layout="nodisplay">';
			$output	.=	'<amp-ad class="amp-sticky-ads"
						type="adsense"'.$optimize.'
						width='. $advert_width .'
						height='. $advert_height . '
						data-ad-client="'. $advert_client .'"
						data-ad-slot="'.  $advert_slot .'">';
			$output	.=	'</amp-ad>';
		$output	.= '</amp-sticky-ad>';

		return $output;

	} elseif ( $redux_builder_amp['ampforwp-advertisement-sticky-type'] == '2'  && $redux_builder_amp['ampforwp-sticky-ad'] == '1' ) {

		$advert_width  	= $redux_builder_amp['sticky-ampforwp-doubleclick-ad-width'];
		$advert_height 	= $redux_builder_amp['sticky-ampforwp-doubleclick-ad-height'];
		$advert_slot	= $redux_builder_amp['sticky-ampforwp-doubleclick-ad-data-slot'];

		$output  = '<amp-sticky-ad layout="nodisplay">';
			$output	.=	'<amp-ad class="amp-sticky-ads" width='. $advert_width .' height='. $advert_height . '  type="doubleclick"'.$optimize.' data-slot="'.  $advert_slot .'">';
			$output	.=	'</amp-ad>';
		$output	.= '</amp-sticky-ad>';

		return $output;

	} elseif ( $redux_builder_amp['ampforwp-advertisement-sticky-type'] == '3' && $redux_builder_amp['ampforwp-sticky-ad'] == '1' ) {
		 $output = '<div class="ampforwp-sticky-custom-ad amp-sticky-ads">';
				$output .= $redux_builder_amp['sticky-ampforwp-custom-advertisement'];	
			$output	.= '</div>';

		return $output;
	}
}

// added extra css to improve user experiance for sticky ads
add_action( 'amp_post_template_css', 'ampforwp_additional_css_styles' );
function ampforwp_additional_css_styles( $amp_template ) {
global $redux_builder_amp; ?>
	amp-sticky-ad {
		z-index: 9999
	}
	.ampforwp-custom-banner-ad {
		text-align : center
	}<?php if(is_plugin_active('accelerated-mobile-pages/accelerated-moblie-pages.php')){?>
	.amp-ad-wrapper {
		padding-bottom: 15px;
	}<?php } ?>
	.amp_ad_2,
	.amp_ad_3,
	.amp_ad_4 {
		margin-top: 15px;
	}
<?php if($redux_builder_amp['ampforwp-advertisement-sticky-type'] == '3' && $redux_builder_amp['ampforwp-sticky-ad'] == '1'){ ?>
	.ampforwp-sticky-custom-ad{
		position: fixed;
		bottom:0;
		text-align: center;
		left: 0;
		width: 100%;
		z-index: 11;
		max-height: 100px;
		box-sizing: border-box;
		opacity: 1;
		background-image: none;
		background-color: #fff;
		box-shadow: 0 0 5px 0 rgba(0,0,0,.2);
		margin-bottom: 0;
		 }
	body{
		padding-bottom: 40px;
	}	
<?php }
}