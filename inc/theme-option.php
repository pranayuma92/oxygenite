<?php
return array(
    'title' => __('Theme Settings | by UKMGood', 'oxygen'),
    'logo'  => get_template_directory_uri() .  '/assets/images/ukmgood.png',
    'menus' => array(
        array(
	        'title' => __('Contact Details', 'oxygen'),
	        'icon' => 'font-awesome:fa-user',
	        'controls' => array(
	           	array(
			        'type' => 'textbox',
			        'name' => 'contact',
			        'label' => __('Contact', 'oxygen'),
			        'description' => __('Your contact person', 'oxygen'),
			        'default' => '',
			        'validation' => 'numeric'
			    ),
			    array(
			        'type' => 'textbox',
			        'name' => 'instagram',
			        'label' => __('Instagram', 'oxygen'),
			        'description' => __('Your instagram url', 'oxygen'),
			        'default' => '',
			    ),
			    array(
			        'type' => 'textbox',
			        'name' => 'facebook',
			        'label' => __('Facebook', 'oxygen'),
			        'description' => __('Your facebook url', 'oxygen'),
			        'default' => '',
			    ),
			    array(
			        'type' => 'textbox',
			        'name' => 'twitter',
			        'label' => __('Twitter', 'oxygen'),
			        'description' => __('Your twitter url', 'oxygen'),
			        'default' => '',
			    ),
			    array(
			        'type' => 'textbox',
			        'name' => 'email',
			        'label' => __('Email', 'oxygen'),
			        'description' => __('Your email address', 'oxygen'),
			        'default' => '',
			        'validation' => 'email'
			    ),
			    array(
			        'type' => 'textarea',
			        'name' => 'address',
			        'label' => __('Address', 'oxygen'),
			        'description' => __('Your shop address', 'oxygen'),
			        'default' => '',
			    ),
			    array(
			        'type' => 'textarea',
			        'name' => 'map',
			        'label' => __('Address on Gmap', 'oxygen'),
			        'description' => __('Your shop address on gmap', 'oxygen'),
			        'default' => '',
			    ),
	        ),
	    ),
	    array(
	        'title' => __('Banner', 'oxygen'),
	        'icon' => 'font-awesome:fa-picture-o',
	        'controls' => array(
			    array(
			        'type' => 'upload',
			        'name' => 'banner',
			        'label' => __('Banner Cover', 'oxygen'),
			        'description' => __('Set homepage banner cover image', 'oxygen'),
			        'default' => get_template_directory_uri() . '/assets/images/banner1.jpg',
			        'validation' => ''
			    ),
	        )
	    ),
	    array(
	        'title' => __('Product', 'oxygen'),
	        'icon' => 'font-awesome:fa-shopping-cart',
	        'controls' => array(
	        	array(
			        'type' => 'toggle',
			        'name' => 'p_mode',
			        'label' => __('Enable Non-Services Product Mode', 'oxygen'),
			        'description' => __('If enable, your product mode will change to Non-Services Product Mode', 'oxygen'),
			        'default' => '0',
			    ),
			    array(
			        'type' => 'notebox',
			        'name' => 'p_note',
			        'label' => __('Non-Service Product Mode is Active', 'oxygen'),
			        'description' => __('Now you can set product per page & order button', 'oxygen'),
			        'status' => 'info',
			        'dependency' => array(
			            'field'    => 'p_mode',
			            'function' => 'vp_dep_boolean',
			        ),
			    ),
	        	array(
			        'type' => 'textbox',
			        'name' => 'p_count',
			        'label' => __('Product Per Page', 'oxygen'),
			        'description' => __('Set how many product will display per page', 'oxygen'),
			        'default' => '4',
			        'validation' => '',
			        'dependency' => array(
			            'field'    => 'p_mode',
			            'function' => 'vp_dep_boolean',
			        ),
			    ),
			    array(
			        'type' => 'toggle',
			        'name' => 'p_wa',
			        'label' => __('Enable Button Order Via Whatsapp', 'oxygen'),
			        'description' => __('If enable, customer can order the product via Whatsapp', 'oxygen'),
			        'default' => '1',
			        'dependency' => array(
			            'field'    => 'p_mode',
			            'function' => 'vp_dep_boolean',
			        ),
			    ),
			    array(
			        'type' => 'toggle',
			        'name' => 'p_email',
			        'label' => __('Enable Button Order Via Email', 'oxygen'),
			        'description' => __('If enable, customer can order the product via Email', 'oxygen'),
			        'default' => '0',
			        'dependency' => array(
			            'field'    => 'p_mode',
			            'function' => 'vp_dep_boolean',
			        ),
			    ),
	        )
	    ),
	    array(
	        'title' => __('Email Booking', 'oxygen'),
	        'icon' => 'font-awesome:fa-envelope',
	        'controls' => array(
	        	array(
			        'type' => 'textbox',
			        'name' => 'to',
			        'label' => __('To', 'oxygen'),
			        'description' => __('Recipient for email booking. Use shorttag {object} to get object product', 'oxygen'),
			        'default' => '',
			        'validation' => ''
			    ),
	        	array(
			        'type' => 'textbox',
			        'name' => 'subject',
			        'label' => __('Subject', 'oxygen'),
			        'description' => __('Subject for email booking. Use shorttag {object} to get object product', 'oxygen'),
			        'default' => '',
			        'validation' => ''
			    ),
			    array(
			        'type' => 'wpeditor',
			        'name' => 'body',
			        'label' => __('Message', 'oxygen'),
			        'description' => __('Message for email booking. Use shorttag {object} to get object product', 'oxygen'),
			        'default' => '',
			        'validation' => ''
			    ),
			    array(
			        'type' => 'wpeditor',
			        'name' => 'body_thankyou',
			        'label' => __('Message Thankyou', 'oxygen'),
			        'description' => __('Message thankyou for customer after booking. Use shorttag {object} to get object product', 'oxygen'),
			        'default' => '',
			        'validation' => ''
			    ),
	        )
	    ),
		array(
	        'title' => __('Appearance', 'oxygen'),
	        'icon' => 'font-awesome:fa-picture-o',
	        'controls' => array(
	        	array(
			        'type' => 'upload',
			        'name' => 'c_logo',
			        'label' => __('Custom Logo', 'beverage'),
			        'description' => __('Change website title with your custom logo', 'beverage'),
			        'default' => '',
			    ),
	        	array(
			        'type' => 'color',
			        'name' => 'b_color',
			        'label' => __('Color Scheme', 'oxygen'),
			        'description' => __('Set color Scheme style. Let empty if you want to use default color', 'oxygen'),
			        'default' => '#c20d00',
			        'format' => 'hex',
			    ),
	        )
	    ),
    ),
);