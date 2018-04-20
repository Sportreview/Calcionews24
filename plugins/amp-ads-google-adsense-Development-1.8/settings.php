<?php

if(is_plugin_active( 'amp/amp.php' )){
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'              => 'redux_builder_amp', // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'          =>  __( 'AMPforWP Advance AMP Ads Options','accelerated-mobile-pages' ), // Name that appears at the top of your panel
    'menu_type'             => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'        => true, // Show the sections below the admin menu item or not
    'menu_title'            => __( 'Advanced AMP Ads', 'accelerated-mobile-pages' ),
    'page_title'            => __('Advanced AMP Ads','accelerated-mobile-pages'),
    'global_variable'       => '', // Set a different name for your global variable other than the opt_name
    'dev_mode'              => false, // Show the time the page took to load, etc
    'customizer'            => false, // Enable basic customizer support,
    'async_typography'      => false, // Enable async for fonts,
    'disable_save_warn'     => true,
    'open_expanded'         => false,
    // OPTIONAL -> Give you extra features
    'page_priority'         => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'           => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'      => 'manage_options', // Permissions needed to access the options panel.
    'last_tab'              => '', // Force your panel to always open to a specific tab (by id)
    'page_icon'             => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
    'page_slug'             => 'advanced_amp_ads_options', // Page slug used to denote the panel
    'save_defaults'         => true, // On load save the defaults to DB before user clicks save or not
    'default_show'          => false, // If true, shows the default value next to each field that is not the default value.
    'default_mark'          => '', // What to print by the field's title if the value shown is default. Suggested: *
    'admin_bar'             => false,
    'admin_bar_icon'        => 'dashicons-admin-generic', 
    // CAREFUL -> These options are for advanced use only
    'output'                => false, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'            => false, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    //'domain'              => 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
    'footer_credit'         => false, // Disable the footer credit of Redux. Please leave if you can help it.
    'footer_text'           => "",
    'show_import_export'    => false,
    'system_info'           => true,

);

    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ahmedkaludi/Accelerated-Mobile-Pages',
        'title' => __('Visit us on GitHub','accelerated-mobile-pages'),
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );


Redux::setArgs( "redux_builder_amp", $args );
}




function ampforwp_create_controls() {
	// New control on users feedback.
	// Optimized ads using data strategy loading
	$controls[] =  array(
        'id'        =>'ampforwp-data-strategy-loading',
        'type'      => 'switch',
        'title'     => __('Optimize Ads', 'redux-framework-demo'),
        'subtitle'	=> __('Optimize for viewability', 'redux-framework-demo'),
        'default'   => 1,
	);

	// AMP Auto ADs
	if(is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php')){
		$controls[] = array(
			'id'        	=> 'ampforwp-amp-auto-ads',
			'type'      	=> 'switch',
			'title'     	=> __('AMP Auto Ads'),
			'default'		=> 0,
		);
	

		$controls[] = array(
			'id'        	=> 'ampforwp-amp-auto-ads-code',
			'type'      	=> 'textarea',
			'title'     	=> __('AMP Auto Ads Code'),
			'placeholder'	=> '<amp-auto-ads
	type="adsense"
	data-ad-client="ca-pub-5439573510495356">
</amp-auto-ads>',
			'required'		=> array('ampforwp-amp-auto-ads','=','1'),
		);
	}

	// Incontent Ad #1
	$controls[] =  array(
        'id'        =>'ampforwp-incontent-ad-1',
        'type'      => 'switch',
        'title'     => __('Incontent Ad #1', 'redux-framework-demo'),
        'default'   => 0,
        'true'      => 'Enabled',
        'false'     => 'Disabled',
		'default'		=> 0,
	);
	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-incontent-ad-1',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-incontent-ad-1','=','1'),
	);
	// Responsive ad unit incontent-1
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-incontent-1',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-1','=','1'),
			'default'	=> 0, 
	);
 
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       => 'ampforwp-adsense-ad-position-incontent-ad-1',
			'type'     => 'select',
			'title'    => __( 'Google Adsense incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-1','=','1'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-adsense-ad-position-incontent-ad-1',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-adsense-ad-position-incontent-ad-1','=','custom'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-incontent-ad-1',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'placeholder'	=> '300',
			'required'		=> array( 
					array('ampforwp-advertisement-type-incontent-ad-1','=','1'),
					  array('adsense-rspv-ad-incontent-1','=','0'),
					),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-incontent-ad-1',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
			'placeholder'	=> '300',
			'required'		=> array(
					array('ampforwp-advertisement-type-incontent-ad-1','=','1'),
					 array('adsense-rspv-ad-incontent-1','=','0'),
				),
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-incontent-ad-1',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-1','=','1'),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-incontent-ad-1',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-1','=','1'),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] =  array(
			'id'       => 'ampforwp-doubleclick-ad-position-incontent-ad-1',
			'type'     => 'select',
			'title'    => __( 'DoubleClick incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-1','=','2'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-doubleclick-ad-position-incontent-ad-1',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-doubleclick-ad-position-incontent-ad-1','=','custom'),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-incontent-ad-1',
			'type'      => 'text',
			'title'     => __('Width'),
			'placeholder'=> '300',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-1','=','2'),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-incontent-ad-1',
			'type'      => 'text',
			'title'     => __('Height'),
			'placeholder'=> '250',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-1','=','2'),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-incontent-ad-1',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-1','=','2'),
		);
	// '3'  	=> 'Custom Advertisement',
		$controls[] =  array(
			'id'       => 'ampforwp-custom-ads-ad-position-incontent-ad-1',
			'type'     => 'select',
			'title'    => __( 'Custom Ads incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-1','=','3'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-custom-ads-ad-position-incontent-ad-1',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-custom-ads-ad-position-incontent-ad-1','=','custom'),
		);
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-incontent-ad-1',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
			'required'		=> array('ampforwp-advertisement-type-incontent-ad-1','=','3'),
		);
		if(is_plugin_active('accelerated-mobile-pages/accelerated-moblie-pages.php')){
		$controls[] = array(
		    'id'       => 'fx-checkbox',
		    'type'     => 'checkbox',
		    'title'    => __('Parallax Effect', 'redux-framework-demo'), 
		    'subtitle' => __('add parallax effect (amp fx flying carpet) to the ad', 'redux-framework-demo'),
			'required'	=> array('ampforwp-incontent-ad-1','=','1'),
		    'default'  => 0// 1 = on | 0 = off
		);
	}
	// Incontent Ad #1 ENDS

	// Incontent Ad #2
	$controls[] =  array(
        'id'        =>'ampforwp-incontent-ad-2',
        'type'      => 'switch',
        'title'     => __('Incontent Ad #2', 'redux-framework-demo'),
        'default'   => 0,
        'true'      => 'Enabled',
        'false'     => 'Disabled',
		'default'		=> 0,
	);
	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-incontent-ad-2',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-incontent-ad-2','=','1'),
	);

	// Responsive ad unit incontent-2
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-incontent-2',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-2','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       => 'ampforwp-adsense-ad-position-incontent-ad-2',
			'type'     => 'select',
			'title'    => __( 'Google Adsense incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-2','=','1'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-adsense-ad-position-incontent-ad-2',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-adsense-ad-position-incontent-ad-2','=','custom'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-incontent-ad-2',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
						array('ampforwp-advertisement-type-incontent-ad-2','=','1'),
						array('adsense-rspv-ad-incontent-2','=','0'),
					),

		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-incontent-ad-2',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
			'required'		=> array(
						array('ampforwp-advertisement-type-incontent-ad-2','=','1'),
						array('adsense-rspv-ad-incontent-2','=','0'),
					),
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-incontent-ad-2',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-2','=','1'),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-incontent-ad-2',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-2','=','1'),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] =  array(
			'id'       => 'ampforwp-doubleclick-ad-position-incontent-ad-2',
			'type'     => 'select',
			'title'    => __( 'DoubleClick incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-2','=','2'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-doubleclick-ad-position-incontent-ad-2',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-doubleclick-ad-position-incontent-ad-2','=','custom'),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-incontent-ad-2',
			'type'      => 'text',
			'title'     => __('Width'),
			'default'=> '300',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-2','=','2'),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-incontent-ad-2',
			'type'      => 'text',
			'title'     => __('Height'),
			'default'=> '250',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-2','=','2'),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-incontent-ad-2',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-2','=','2'),
		);
	// '3'  	=> 'Custom Advertisement',
		$controls[] =  array(
			'id'       => 'ampforwp-custom-ads-ad-position-incontent-ad-2',
			'type'     => 'select',
			'title'    => __( 'Custom Ads incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-2','=','3'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-custom-ads-ad-position-incontent-ad-2',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-custom-ads-ad-position-incontent-ad-2','=','custom'),
		);
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-incontent-ad-2',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
			'required'		=> array('ampforwp-advertisement-type-incontent-ad-2','=','3'),
		);
	if(is_plugin_active('accelerated-mobile-pages/accelerated-moblie-pages.php')){
		$controls[] = array(
		    'id'       => 'fx-checkbox-2',
		    'type'     => 'checkbox',
		    'title'    => __('Parallax Effect', 'redux-framework-demo'), 
		    'subtitle' => __('add parallax effect (amp fx flying carpet) to the ad', 'redux-framework-demo'),
			'required'	=> array('ampforwp-incontent-ad-2','=','1'),
		    'default'  => 0// 1 = on | 0 = off
		);
	}
	// Incontent Ad #2 ENDS

	// Incontent Ad #3
	$controls[] =  array(
        'id'        =>'ampforwp-incontent-ad-3',
        'type'      => 'switch',
        'title'     => __('Incontent Ad #3', 'redux-framework-demo'),
        'default'   => 0,
        'true'      => 'Enabled',
        'false'     => 'Disabled',
		'default'		=> 0,
	);
	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-incontent-ad-3',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-incontent-ad-3','=','1'),
	);

		// Responsive ad unit incontent-3
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-incontent-3',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-3','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       => 'ampforwp-adsense-ad-position-incontent-ad-3',
			'type'     => 'select',
			'title'    => __( 'Google Adsense incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-3','=','1'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-adsense-ad-position-incontent-ad-3',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-adsense-ad-position-incontent-ad-3','=','custom'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-incontent-ad-3',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
				array('ampforwp-advertisement-type-incontent-ad-3','=','1'),
				array('adsense-rspv-ad-incontent-3','=','0'),
			),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-incontent-ad-3',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
			'required'		=> array(
					array('ampforwp-advertisement-type-incontent-ad-3','=','1'),
					array('adsense-rspv-ad-incontent-3','=','0'),
				),
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-incontent-ad-3',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-3','=','1'),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-incontent-ad-3',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-3','=','1'),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] =  array(
			'id'       => 'ampforwp-doubleclick-ad-position-incontent-ad-3',
			'type'     => 'select',
			'title'    => __( 'DoubleClick incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-3','=','2'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-doubleclick-ad-position-incontent-ad-3',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-doubleclick-ad-position-incontent-ad-2','=','custom'),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-incontent-ad-3',
			'type'      => 'text',
			'title'     => __('Width'),
			'default'=> '300',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-3','=','2'),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-incontent-ad-3',
			'type'      => 'text',
			'title'     => __('Height'),
			'default'=> '250',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-3','=','2'),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-incontent-ad-3',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-3','=','2'),
		);
	// '3'  	=> 'Custom Advertisement',
		$controls[] =  array(
			'id'       => 'ampforwp-custom-ads-ad-position-incontent-ad-3',
			'type'     => 'select',
			'title'    => __( 'Custom Ads incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-3','=','3'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-custom-ads-ad-position-incontent-ad-3',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-custom-ads-ad-position-incontent-ad-3','=','custom'),
		);
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-incontent-ad-3',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
			'required'		=> array('ampforwp-advertisement-type-incontent-ad-3','=','3'),
		);
	if(is_plugin_active('accelerated-mobile-pages/accelerated-moblie-pages.php')){
		$controls[] = array(
		    'id'       => 'fx-checkbox-3',
		    'type'     => 'checkbox',
		    'title'    => __('Parallax Effect', 'redux-framework-demo'), 
		    'subtitle' => __('add parallax effect (amp fx flying carpet) to the ad', 'redux-framework-demo'),
			'required'	=> array('ampforwp-incontent-ad-3','=','1'),
		    'default'  => 0// 1 = on | 0 = off
		);
	}
	// Incontent Ad #3 ENDS



	// Incontent Ad #4
	$controls[] =  array(
        'id'        =>'ampforwp-incontent-ad-4',
        'type'      => 'switch',
        'title'     => __('Incontent Ad #4', 'redux-framework-demo'),
        'default'   => 0,
        'true'      => 'Enabled',
        'false'     => 'Disabled',
		'default'		=> 0,
	);
	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-incontent-ad-4',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-incontent-ad-4','=','1'),
	);

		// Responsive ad unit incontent-4
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-incontent-4',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-4','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       => 'ampforwp-adsense-ad-position-incontent-ad-4',
			'type'     => 'select',
			'title'    => __( 'Google Adsense incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-4','=','1'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-adsense-ad-position-incontent-ad-4',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-adsense-ad-position-incontent-ad-4','=','custom'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-incontent-ad-4',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'placeholder'	=> '300',
			'required'		=> array(
				array('ampforwp-advertisement-type-incontent-ad-4','=','1'),
				array('adsense-rspv-ad-incontent-4','=','0'),
			),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-incontent-ad-4',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
			'placeholder'	=> '300',
			'required'		=> array(
				array('ampforwp-advertisement-type-incontent-ad-4','=','1'),
				array('adsense-rspv-ad-incontent-4','=','0'),
			),
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-incontent-ad-4',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-4','=','1'),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-incontent-ad-4',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-4','=','1'),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] =  array(
			'id'       => 'ampforwp-doubleclick-ad-position-incontent-ad-4',
			'type'     => 'select',
			'title'    => __( 'DoubleClick incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-4','=','2'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-doubleclick-ad-position-incontent-ad-4',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-doubleclick-ad-position-incontent-ad-2','=','custom'),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-incontent-ad-4',
			'type'      => 'text',
			'title'     => __('Width'),
			'placeholder'=> '300',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-4','=','2'),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-incontent-ad-4',
			'type'      => 'text',
			'title'     => __('Height'),
			'placeholder'=> '250',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-4','=','2'),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-incontent-ad-4',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-4','=','2'),
		);
	// '3'  	=> 'Custom Advertisement',
		$controls[] =  array(
			'id'       => 'ampforwp-custom-ads-ad-position-incontent-ad-4',
			'type'     => 'select',
			'title'    => __( 'Custom Ads incontent Ads Position', 'redux-framework-demo' ),
			'subtitle' => __( 'Select after how many paragraphs your ads should show.', 'redux-framework-demo' ),
			'options'  => array(
					'50-percent' 	=> 'Show Ad after 50% of content',
					'1' 					=> '1 Paragraphs',
					'2'  					=> '2 Paragraphs',
					'3'  					=> '3 Paragraphs',
					'4'  					=> '4 Paragraphs',
					'5'  					=> '5 Paragraphs',
					'6'  					=> '6 Paragraphs',
					'7'  					=> '7 Paragraphs',
					'8'  					=> '8 Paragraphs',
					'9'  					=> '9 Paragraphs',
					'10' 					=> '10 Paragraphs',
					'custom' 				=> 'Custom',
				),
			'default'  => '50-percent',
			'required'	=> array('ampforwp-advertisement-type-incontent-ad-4','=','3'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-custom-custom-ads-ad-position-incontent-ad-4',
			'type'     		=> 'text',
			'title'    		=> __('Show ad after Paragraphs', 'redux-framework-demo'),
			'default'  		=> '5',
			'placeholder'	=> '5',
			'required'		=> array('ampforwp-custom-ads-ad-position-incontent-ad-4','=','custom'),
		);
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-incontent-ad-4',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
			'required'		=> array('ampforwp-advertisement-type-incontent-ad-4','=','3'),
		);
	// Incontent Ad #4 ENDS


	
	// Ad After Featured Image 
		if(is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php')){
		$controls[] = array(
			'id'        	=> 'ampforwp-after-featured-image-ad',
			'type'      	=> 'switch',
			'title'     	=> __('Ad after Featured Image'),
			'default'		=> 0,
		);
	

		$controls[] =  array(
		'id'       => 'ampforwp-after-featured-image-ad-type',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-after-featured-image-ad','=','1'),
	);
			// Responsive ad After Featured Image
		$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-after-featured-img',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-after-featured-image-ad-type','=','1'),
			'default'	=> 0, 
	);

		// Adsense
		$controls[] =  array(
			'id'       		=> 'ampforwp-after-featured-image-ad-type-1-width',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
				array('ampforwp-after-featured-image-ad-type','=','1'),
				array('adsense-rspv-ad-after-featured-img','=','0'),
			),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-after-featured-image-ad-type-1-height',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
			'required'		=> array(
				array('ampforwp-after-featured-image-ad-type','=','1'),
				array('adsense-rspv-ad-after-featured-img','=','0'),
			),
		);
		$controls[] =  array(
			'id'        =>'ampforwp-after-featured-image-ad-type-1-data-ad-client',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
			'required'	=> array('ampforwp-after-featured-image-ad-type','=','1'),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-after-featured-image-ad-type-1-data-ad-slot',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
			'required'	=> array('ampforwp-after-featured-image-ad-type','=','1'),
		);

		// Double Click
		$controls[] =  array(
			'id'       		=> 'ampforwp-after-featured-image-ad-type-2-width',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array('ampforwp-after-featured-image-ad-type','=','2'),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-after-featured-image-ad-type-2-height',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
			'required'		=> array('ampforwp-after-featured-image-ad-type','=','2'),
		);
		$controls[] =  array(
			'id'        =>'ampforwp-after-featured-image-ad-type-2-ad-data-slot',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
			'required'	=> array('ampforwp-after-featured-image-ad-type','=','2'),
		);
		// Custom type

		$controls[] = array(
			'id'        	=> 'ampforwp-after-featured-image-ad-custom-advertisement',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
			'required'		=> array('ampforwp-after-featured-image-ad-type','=','3'),
		);
		
		//** End Of Ad After Featured Image **//
	}



  // Standard Ads - starts
		if(is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php')){
	$controls[] =  array(
        'id'        =>'ampforwp-standard-ads-1',
        'type'      => 'switch',
        'title'     => __('Below the Header (SiteWide)', 'redux-framework-demo'),
        'default'   => 0,
	);


  //standard ad 1 - starts here
	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-standard-1',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-standard-ads-1','=','1'),
	);

		// Responsive ad unit incontent-2
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-type-standard-1',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-standard-1','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-standard-1',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
                          array('ampforwp-standard-ads-1','=','1'),
                          array('ampforwp-advertisement-type-standard-1','=','1'),
                          array('adsense-rspv-ad-type-standard-1','=','0'),
		));
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-standard-1',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-1','=','1'),
                          array('ampforwp-advertisement-type-standard-1','=','1'),
                          array('adsense-rspv-ad-type-standard-1','=','0'),
                      )
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-standard-1',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
      'required'		=> array(
                          array('ampforwp-standard-ads-1','=','1'),
                          array('ampforwp-advertisement-type-standard-1','=','1')),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-standard-1',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
      'required'		=> array(
                          array('ampforwp-standard-ads-1','=','1'),
                          array('ampforwp-advertisement-type-standard-1','=','1')),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-standard-1',
			'type'      => 'text',
			'title'     => __('Width'),
			'default'=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-1','=','1'),
                          array('ampforwp-advertisement-type-standard-1','=','2')),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-standard-1',
			'type'      => 'text',
			'title'     => __('Height'),
			'default'=> '250',
      'required'		=> array(
                          array('ampforwp-standard-ads-1','=','1'),
                          array('ampforwp-advertisement-type-standard-1','=','2')),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-standard-1',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
      'required'		=> array(
                          array('ampforwp-standard-ads-1','=','1'),
                          array('ampforwp-advertisement-type-standard-1','=','2')),
		);
	// '3'  	=> 'Custom Advertisement'
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-standard-1',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
'required'		=> array(
                    array('ampforwp-standard-ads-1','=','1'),
                    array('ampforwp-advertisement-type-standard-1','=','3')),
		);
	}
    //standard ad -1 ends here
    $controls[] =  array(
          'id'        =>'ampforwp-standard-ads-2',
          'type'      => 'switch',
          'title'     => __('Below the Footer (SiteWide)', 'redux-framework-demo'),
          'default'   => 0,
  	);


  //standard ad 2- starts here
	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-standard-2',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-standard-ads-2','=','1'),
	);
		// Responsive ad type-standard-2
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-type-standard-2',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-standard-2','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-standard-2',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
                          array('ampforwp-standard-ads-2','=','1'),
                          array('ampforwp-advertisement-type-standard-2','=','1'),
                          array('adsense-rspv-ad-type-standard-2','=','0'),
		));
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-standard-2',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-2','=','1'),
                          array('ampforwp-advertisement-type-standard-2','=','1'),
      					  array('adsense-rspv-ad-type-standard-2','=','0'),
      					),

		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-standard-2',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
      'required'		=> array(
                          array('ampforwp-standard-ads-2','=','1'),
                          array('ampforwp-advertisement-type-standard-2','=','1')),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-standard-2',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
      'required'		=> array(
                          array('ampforwp-standard-ads-2','=','1'),
                          array('ampforwp-advertisement-type-standard-2','=','1')),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-standard-2',
			'type'      => 'text',
			'title'     => __('Width'),
			'default'=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-2','=','1'),
                          array('ampforwp-advertisement-type-standard-2','=','2')),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-standard-2',
			'type'      => 'text',
			'title'     => __('Height'),
			'default'=> '250',
      'required'		=> array(
                          array('ampforwp-standard-ads-2','=','1'),
                          array('ampforwp-advertisement-type-standard-2','=','2')),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-standard-2',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
      'required'		=> array(
                          array('ampforwp-standard-ads-2','=','1'),
                          array('ampforwp-advertisement-type-standard-2','=','2')),
		);
	// '3'  	=> 'Custom Advertisement'
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-standard-2',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
'required'		=> array(
                    array('ampforwp-standard-ads-2','=','1'),
                    array('ampforwp-advertisement-type-standard-2','=','3')),
		);
    //standard ad -2 ends here



if(is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php')){

  $controls[] =  array(
          'id'        =>'ampforwp-standard-ads-2-1',
          'type'      => 'switch',
          'title'     => __('Above the Footer (SiteWide)', 'redux-framework-demo'),
          'default'   => 0,
  	);


  //standard ad 2-1- starts here
	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-standard-2-1',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-standard-ads-2-1','=','1'),
	);

		// Responsive ad unit incontent-2
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-type-standard-2-1',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-standard-2-1','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-standard-2-1',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'placeholder'	=> '300',
			'required'		=> array(
                          array('ampforwp-standard-ads-2-1','=','1'),
                          array('ampforwp-advertisement-type-standard-2-1','=','1'),
                          array('adsense-rspv-ad-type-standard-2-1','=','0'),
		));
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-standard-2-1',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
			'placeholder'	=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-2-1','=','1'),
                          array('ampforwp-advertisement-type-standard-2-1','=','1'),
                          array('adsense-rspv-ad-type-standard-2-1','=','0'),
                      		)
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-standard-2-1',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
      'required'		=> array(
                          array('ampforwp-standard-ads-2-1','=','1'),
                          array('ampforwp-advertisement-type-standard-2-1','=','1')),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-standard-2-1',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
      'required'		=> array(
                          array('ampforwp-standard-ads-2-1','=','1'),
                          array('ampforwp-advertisement-type-standard-2-1','=','1')),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-standard-2-1',
			'type'      => 'text',
			'title'     => __('Width'),
			'placeholder'=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-2-1','=','1'),
                          array('ampforwp-advertisement-type-standard-2-1','=','2')),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-standard-2-1',
			'type'      => 'text',
			'title'     => __('Height'),
			'placeholder'=> '250',
      'required'		=> array(
                          array('ampforwp-standard-ads-2-1','=','1'),
                          array('ampforwp-advertisement-type-standard-2-1','=','2')),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-standard-2-1',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
      'required'		=> array(
                          array('ampforwp-standard-ads-2-1','=','1'),
                          array('ampforwp-advertisement-type-standard-2-1','=','2')),
		);
	// '3'  	=> 'Custom Advertisement'
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-standard-2-1',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
'required'		=> array(
                    array('ampforwp-standard-ads-2-1','=','1'),
                    array('ampforwp-advertisement-type-standard-2-1','=','3')),
		);
    //standard ad -2-1 ends here

}
		if(is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php')){
    $controls[] =  array(
          'id'        =>'ampforwp-standard-ads-3',
          'type'      => 'switch',
          'title'     => __('Above the Post Content (Single Post)', 'redux-framework-demo'),
          'default'   => 0,
  	);


  //standard ad 3 - starts here
	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-standard-3',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-standard-ads-3','=','1'),
	);

		// Responsive ad unit incontent-2
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-type-standard-3',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-standard-3','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',3
  $controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-standard-3',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
                          array('ampforwp-standard-ads-3','=','1'),
                          array('ampforwp-advertisement-type-standard-3','=','1'),
                          array('adsense-rspv-ad-type-standard-3','=','0'),
		));
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-standard-3',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-3','=','1'),
                          array('ampforwp-advertisement-type-standard-3','=','1'),
                      		 array('adsense-rspv-ad-type-standard-3','=','0'),
                      		)
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-standard-3',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
      'required'		=> array(
                          array('ampforwp-standard-ads-3','=','1'),
                          array('ampforwp-advertisement-type-standard-3','=','1')),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-standard-3',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
      'required'		=> array(
                          array('ampforwp-standard-ads-3','=','1'),
                          array('ampforwp-advertisement-type-standard-3','=','1')),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-standard-3',
			'type'      => 'text',
			'title'     => __('Width'),
			'default'=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-3','=','1'),
                          array('ampforwp-advertisement-type-standard-3','=','2')),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-standard-3',
			'type'      => 'text',
			'title'     => __('Height'),
			'default'=> '250',
      'required'		=> array(
                          array('ampforwp-standard-ads-3','=','1'),
                          array('ampforwp-advertisement-type-standard-3','=','2')),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-standard-3',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
      'required'		=> array(
                          array('ampforwp-standard-ads-3','=','1'),
                          array('ampforwp-advertisement-type-standard-3','=','2')),
		);
	// '3'  	=> 'Custom Advertisement'
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-standard-3',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
'required'		=> array(
                    array('ampforwp-standard-ads-3','=','1'),
                    array('ampforwp-advertisement-type-standard-3','=','3')),
		);
	}
    //standard ad -3 ends here

		//standard ad - 4 starts here
		if(is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php')){
    $controls[] =  array(
          'id'        =>'ampforwp-standard-ads-4',
          'type'      => 'switch',
          'title'     => __('Below the Post Content (Single Post)', 'redux-framework-demo'),
          'default'   => 0,
  	);

	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-standard-4',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-standard-ads-4','=','1'),
	);

		// Responsive ad unit incontent-2
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-type-standard-4',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-standard-4','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-standard-4',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
                          array('ampforwp-standard-ads-4','=','1'),
                          array('ampforwp-advertisement-type-standard-4','=','1'),
                          array('adsense-rspv-ad-type-standard-4','=','0'),
		));
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-standard-4',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-4','=','1'),
                          array('ampforwp-advertisement-type-standard-4','=','1'),
                      	array('adsense-rspv-ad-type-standard-4','=','0'),
                  )
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-standard-4',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
      'required'		=> array(
                          array('ampforwp-standard-ads-4','=','1'),
                          array('ampforwp-advertisement-type-standard-4','=','1')),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-standard-4',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
      'required'		=> array(
                          array('ampforwp-standard-ads-4','=','1'),
                          array('ampforwp-advertisement-type-standard-4','=','1')),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-standard-4',
			'type'      => 'text',
			'title'     => __('Width'),
			'default'=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-4','=','1'),
                          array('ampforwp-advertisement-type-standard-4','=','2')),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-standard-4',
			'type'      => 'text',
			'title'     => __('Height'),
			'default'=> '250',
      'required'		=> array(
                          array('ampforwp-standard-ads-4','=','1'),
                          array('ampforwp-advertisement-type-standard-4','=','2')),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-standard-4',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
      'required'		=> array(
                          array('ampforwp-standard-ads-4','=','1'),
                          array('ampforwp-advertisement-type-standard-4','=','2')),
		);
	// '3'  	=> 'Custom Advertisement'
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-standard-4',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
'required'		=> array(
                    array('ampforwp-standard-ads-4','=','1'),
                    array('ampforwp-advertisement-type-standard-4','=','3')),
		);
	}
    //standard ad -4 ends here

	//standard ad - 5 starts here
		if(is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php')){
    $controls[] =  array(
          'id'        =>'ampforwp-standard-ads-5',
          'type'      => 'switch',
          'title'     => __('Below the Title (Single Post)', 'redux-framework-demo'),
          'default'   => 0,
  	);

	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-standard-5',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-standard-ads-5','=','1'),
	);

		// Responsive ad unit incontent-2
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-type-standard-5',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-standard-5','=','1'),
			'default'	=> 0, 
	);

	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-standard-5',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
                          array('ampforwp-standard-ads-5','=','1'),
                          array('ampforwp-advertisement-type-standard-5','=','1'),
                          array('adsense-rspv-ad-type-standard-5','=','0'),
		));
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-standard-5',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-5','=','1'),
                          array('ampforwp-advertisement-type-standard-5','=','1'),
                          array('adsense-rspv-ad-type-standard-5','=','0'),
                      )
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-standard-5',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
      'required'		=> array(
                          array('ampforwp-standard-ads-5','=','1'),
                          array('ampforwp-advertisement-type-standard-5','=','1')),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-standard-5',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
      'required'		=> array(
                          array('ampforwp-standard-ads-5','=','1'),
                          array('ampforwp-advertisement-type-standard-5','=','1')),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-standard-5',
			'type'      => 'text',
			'title'     => __('Width'),
			'default'=> '300',
      'required'		=> array(
                          array('ampforwp-standard-ads-5','=','1'),
                          array('ampforwp-advertisement-type-standard-5','=','2')),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-standard-5',
			'type'      => 'text',
			'title'     => __('Height'),
			'default'=> '250',
      'required'		=> array(
                          array('ampforwp-standard-ads-5','=','1'),
                          array('ampforwp-advertisement-type-standard-5','=','2')),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-standard-5',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
      'required'		=> array(
                          array('ampforwp-standard-ads-5','=','1'),
                          array('ampforwp-advertisement-type-standard-5','=','2')),
		);
	// '3'  	=> 'Custom Advertisement'
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-standard-5',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
'required'		=> array(
                    array('ampforwp-standard-ads-5','=','1'),
                    array('ampforwp-advertisement-type-standard-5','=','3')),
		);
	}
    //standard ad -5 ends here

		//standard ad -6 starts here
		if(is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php')){
		$controls[] =  array(
					'id'        =>'ampforwp-standard-ads-6',
					'type'      => 'switch',
					'title'     => __('Above Related Posts (Single Post)', 'redux-framework-demo'),
					'default'   => 0,
		);
	
	$controls[] =  array(
		'id'       => 'ampforwp-advertisement-type-standard-6',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-standard-ads-6','=','1'),
	);

		// Responsive ad unit incontent-2
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-type-standard-6',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-advertisement-type-standard-6','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-width-standard-6',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
													array('ampforwp-standard-ads-6','=','1'),
													array('ampforwp-advertisement-type-standard-6','=','1'),
													array('adsense-rspv-ad-type-standard-6','=','0'),
		));
		$controls[] =  array(
			'id'       		=> 'ampforwp-adsense-ad-height-standard-6',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
			'required'		=> array(
													array('ampforwp-standard-ads-6','=','1'),
													array('ampforwp-advertisement-type-standard-6','=','1'),
													array('adsense-rspv-ad-type-standard-6','=','0'),
												)
		);
		$controls[] =  array(
			'id'        =>'ampforwp-adsense-ad-data-ad-client-standard-6',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
			'required'		=> array(
													array('ampforwp-standard-ads-6','=','1'),
													array('ampforwp-advertisement-type-standard-6','=','1')),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-adsense-ad-data-ad-slot-standard-6',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
			'required'		=> array(
													array('ampforwp-standard-ads-6','=','1'),
													array('ampforwp-advertisement-type-standard-6','=','1')),
		);
	// '2'  	=> 'DoubleClick',
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-width-standard-6',
			'type'      => 'text',
			'title'     => __('Width'),
			'default'=> '300',
			'required'		=> array(
													array('ampforwp-standard-ads-6','=','1'),
													array('ampforwp-advertisement-type-standard-6','=','2')),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-doubleclick-ad-height-standard-6',
			'type'      => 'text',
			'title'     => __('Height'),
			'default'=> '250',
			'required'		=> array(
													array('ampforwp-standard-ads-6','=','1'),
													array('ampforwp-advertisement-type-standard-6','=','2')),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-doubleclick-ad-data-slot-standard-6',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
			'required'		=> array(
													array('ampforwp-standard-ads-6','=','1'),
													array('ampforwp-advertisement-type-standard-6','=','2')),
		);
	// '3'  	=> 'Custom Advertisement'
		$controls[] = array(
			'id'        	=> 'ampforwp-custom-advertisement-standard-6',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
'required'		=> array(
										array('ampforwp-standard-ads-6','=','1'),
										array('ampforwp-advertisement-type-standard-6','=','3')),
		);
	}
		//standard ad -6 ends here


	//Standard Ads ENDS




          // #Sticky AD
        $controls[] = 	array(
									'id'        =>'ampforwp-sticky-ad',
									'type'      => 'switch',
									'title'     => __('Sticky Ads', 'redux-framework-demo'),
									'subtitle' 	=> __('Shows Ad as sticky ad at the bottom of the screen.','redux-framework-demo'),
									'default'   => 0,
									'true'      => 'Enabled',
									'false'     => 'Disabled',
								);
                $controls[] =  array(
                  'id'       => 'ampforwp-advertisement-sticky-type',
                  'type'     => 'select',
                  'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
                  'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
                  'options'  	=> array(
                    '1' 	=> 'Adsense',
                    '2'  	=> 'DoubleClick',
                    '3'  	=> 'Custom Advertisement',
                  ),
                  'default'  => '1',
                  'required'	=> array('ampforwp-sticky-ad','=','1'),
                );
              $controls[] = 	array(
									'id'        =>'ampforwp-sticky-ad-width',
									'type'      => 'text',
									'title'     => __('Width', 'redux-framework-demo'),
									'default'   => '300',
									'required'	=> array(
                             array('ampforwp-sticky-ad','=','1'),
									           array('ampforwp-advertisement-sticky-type','=','1'))
								);
              $controls[] = 	array(
									'id'        =>'ampforwp-sticky-ad-height',
									'type'      => 'text',
									'title'     => __('Height', 'redux-framework-demo'),
									'default'   => '50',
                  'required'	=> array(
                             array('ampforwp-sticky-ad','=','1'),
									           array('ampforwp-advertisement-sticky-type','=','1'))
								);
              $controls[] = array(
									'id'        =>'ampforwp-sticky-ad-data-ad-client',
									'type'      => 'text',
									'title'     => __('Data AD Client', 'redux-framework-demo'),
									'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
									'default'   => '',
									'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
                  'required'	=> array(
                             array('ampforwp-sticky-ad','=','1'),
									           array('ampforwp-advertisement-sticky-type','=','1'))
								);
              $controls[] = array(
									'id'        => 'ampforwp-sticky-ad-data-ad-slot',
									'type'      => 'text',
									'title'     => __('Data AD Slot', 'redux-framework-demo'),
									'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
									'default'  => '',
									'placeholder'=> '70XXXXXX12',
                  'required'	=> array(
                             array('ampforwp-sticky-ad','=','1'),
									           array('ampforwp-advertisement-sticky-type','=','1'))
								);
                // '2'  	=> 'DoubleClick',
              		$controls[] = 	array(
              			'id'        =>'sticky-ampforwp-doubleclick-ad-width',
              			'type'      => 'text',
              			'title'     => __('Width'),
              			'default'=> '300',
                    'required'	=> array(
                               array('ampforwp-sticky-ad','=','1'),
  									           array('ampforwp-advertisement-sticky-type','=','2'))
              		);
              		$controls[] = 	array(
              			'id'        =>'sticky-ampforwp-doubleclick-ad-height',
              			'type'      => 'text',
              			'title'     => __('Height'),
              			'default'=> '250',
                    'required'	=> array(
                               array('ampforwp-sticky-ad','=','1'),
  									           array('ampforwp-advertisement-sticky-type','=','2'))
              		);
              		$controls[] = 	array(
              			'id'        => 'sticky-ampforwp-doubleclick-ad-data-slot',
              			'type'      => 'text',
              			'title'     => __('Data Slot'),
              			'placeholder'=> '/41****9/mobile_ad_banner',
                    'required'	=> array(
                               array('ampforwp-sticky-ad','=','1'),
  									           array('ampforwp-advertisement-sticky-type','=','2'))
              		);
              	// '3'  	=> 'Custom Advertisement',
              		$controls[] = array(
              			'id'        	=> 'sticky-ampforwp-custom-advertisement',
              			'type'      	=> 'textarea',
              			'title'     	=> __('Advertisement Code'),
              			'desc'     	=> __('Please have a look at the Example and then form your own Sticky-Ad code '),
              			'placeholder'	=> ' <amp-ad width="320"
      height="50"
      type="doubleclick"
      data-slot="/XXXXXX/amptesting/formats/sticky">
   </amp-ad>',
              'required'	=> array(
                         array('ampforwp-sticky-ad','=','1'),
                         array('ampforwp-advertisement-sticky-type','=','3'))
              		);

      // Ads in Between Loop
     if(is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php')){  
    $controls[] =  array(
        'id'        =>'ampforwp-inbetween-loop',
        'type'      => 'switch',
        'title'     => __('Ads Inbetween Loop', 'redux-framework-demo'),
        'desc'     => __('Works only with 0.9.68 or higher version of ampforwp core', 'redux-framework-demo'),
        'default'   => 0,
        'true'      => 'Enabled',
        'false'     => 'Disabled',
	);

	$controls[] =  array(
		'id'       => 'ampforwp-inbetween-type',
		'type'     => 'select',
		'title'    => __( 'Advertisement Type', 'redux-framework-demo' ),
		'subtitle' => __( 'Select Advertisement Type you want to show.', 'ampforwp' ),
		'options'  	=> array(
			'1' 	=> 'Adsense',
			'2'  	=> 'DoubleClick',
			'3'  	=> 'Custom Advertisement',
		),
		'default'  => '1',
		'required'	=> array('ampforwp-inbetween-loop','=','1'),
	);

		// Responsive ad unit incontent-2
	$controls[] = array(
			'id' 		=> 'adsense-rspv-ad-inbetween-type',
			'type'		=> 'switch', 
			'title'		=> __('Responsive Ad unit','redux-framework-demo'),
			'required'	=> array('ampforwp-inbetween-type','=','1'),
			'default'	=> 0, 
	);
	// '1' 	=> 'Adsense',
		$controls[] =  array(
			'id'       		=> 'ampforwp-inbetween-adsense-ad-width',
			'type'     		=> 'text',
			'title'    		=> __('Width', 'redux-framework-demo'),
			'default'  		=> '300',
			'required'		=> array(
						array('ampforwp-inbetween-type','=','1'),
						array('adsense-rspv-ad-inbetween-type','=','0'),
					),
		);
		$controls[] =  array(
			'id'       		=> 'ampforwp-inbetween-adsense-ad-height',
			'type'     		=> 'text',
			'title'    		=> __('Height'),
			'default'  		=> '300',
			'required'		=> array(
						array('ampforwp-inbetween-type','=','1'),
						array('adsense-rspv-ad-inbetween-type','=','0'),
					),
		);
		$controls[] =  array(
			'id'        =>'ampforwp-inbetween-adsense-ad-data-ad-client',
			'type'      => 'text',
			'title'     => __('Data AD Client'),
			'desc'      => __('Enter the Data Ad Client (data-ad-client) from the adsense ad code. e.g. ca-pub-2005XXXXXXXXX342', 'redux-framework-demo'),
			'default'   => '',
			'placeholder'=> 'ca-pub-2005XXXXXXXXX342',
			'required'	=> array('ampforwp-inbetween-type','=','1'),
		);
		$controls[] =  array(
			'id'        => 'ampforwp-inbetween-adsense-ad-data-ad-slot',
			'type'      => 'text',
			'title'     => __('Data AD Slot'),
			'desc'      => __('Enter the Data Ad Slot (data-ad-slot) from the adsense ad code. e.g. 70XXXXXX12', 'redux-framework-demo'),
			'default'  => '',
			'placeholder'=> '70XXXXXX12',
			'required'	=> array('ampforwp-inbetween-type','=','1'),
		);
	// '2'  	=> 'DoubleClick',
		
		$controls[] = 	array(
			'id'        =>'ampforwp-inbetween-doubleclick-ad-width',
			'type'      => 'text',
			'title'     => __('Width'),
			'default'=> '300',
			'required'	=> array('ampforwp-inbetween-type','=','2'),
		);
		$controls[] = 	array(
			'id'        =>'ampforwp-inbetween-doubleclick-ad-height',
			'type'      => 'text',
			'title'     => __('Height'),
			'default'=> '250',
			'required'	=> array('ampforwp-inbetween-type','=','2'),
		);
		$controls[] = 	array(
			'id'        => 'ampforwp-inbetween-doubleclick-ad-data-slot',
			'type'      => 'text',
			'title'     => __('Data Slot'),
			'placeholder'=> '/41****9/mobile_ad_banner',
			'required'	=> array('ampforwp-inbetween-type','=','2'),
		);
	// '3'  	=> 'Custom Advertisement',

		$controls[] = array(
			'id'        	=> 'ampforwp-inbetween-custom-advertisement',
			'type'      	=> 'textarea',
			'title'     	=> __('Advertisement Code'),
			'placeholder'	=> ' <amp-ad width=300 height=250 type="XXXX" data-xxx="XXXX""></amp-ad>
OR
<a href="https://example.com"><amp-img src="/img/amp.jpg" width=300 height=250 alt="advert banner"></amp-img> </a>',
			'required'		=> array('ampforwp-inbetween-type','=','3'),
		);
	}
// End of In Between loop Ads


	return $controls;
}

if ( ! function_exists( 'ampforwp_ads_section' ) ) {
	function ampforwp_ads_section($sections){

	    $sections[] = array(
	        'title' => __('Advanced AMP ADS', 'redux-framework-demo'),
	        'icon' => 'el el-th-large',
					'desc'  => 'Create Ads either Custom or Adsense in both AD #1 and AD #2 ',
	        'fields' =>  ampforwp_create_controls(),
	        );
	    return $sections;
	}
}

add_filter("redux/options/redux_builder_amp/sections", 'ampforwp_ads_section');
if(is_plugin_active('accelerated-mobile-pages/accelerated-moblie-pages.php') && class_exists('Redux')){ 

Redux::removeSection( $opt_name,'amp-ads');
}
?>
