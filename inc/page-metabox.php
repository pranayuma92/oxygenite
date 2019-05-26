<?php
return array(
	array(
        'type' => 'textbox',
        'name' => 'm_title',
        'label' => __('Main Title'),
        'description' => __('Product overview main title'),
        'default' => '',
        'validation' => '',
    ),
    array(
        'type' => 'textbox',
        'name' => 's_title',
        'label' => __('Sub Title'),
        'description' => __('Product overview sub title'),
        'default' => '',
        'validation' => '',
    ),
    array(
        'type' => 'toggle',
        'name' => 'o_banner',
        'label' => __('Enable Our Services Section?'),
        'description' => __('If enable you can add our services lists'),
        'default' => '0',
    ),
    array(
        'type'      => 'group',
        'name'      => 'services',
        'repeating' => false,
        'title'     => __('Our Services'),
        'sortable' => false,
        'dependency' => array(
            'field'    => 'o_banner',
            'function' => 'vp_dep_boolean',
        ),
        'fields'    => array(
            array(
                'type' => 'textbox',
                'name' => 'o_title',
                'label' => __('Our Services Title'),
                'description' => __('Our services main title'),
                'default' => '',
                'validation' => '',
            ),
            array(
                'type'      => 'group',
                'name'      => 's_lists',
                'repeating' => true,
                'title'     => __('Our Services Item'),
                'sortable' => true,
                'fields'    => array(
                    array(
                        'type' => 'radiobutton',
                        'name' => 'i_logo',
                        'label' => __('Icon'),
                        'description' => __('Our services item icon'),
                        'items' => array(
                            array(
                                'value' => 'fa-calendar-check-o',
                                'label' => __('Calendar check'),
                            ),
                            array(
                                'value' => 'fa-thumbs-up',
                                'label' => __('Thumbs up'),
                            ),
                            array(
                                'value' => 'fa-tags',
                                'label' => __('Tags'),
                            ),
                            array(
                                'value' => 'fa-truck',
                                'label' => __('Truck'),
                            ),
                            array(
                                'value' => 'fa-star',
                                'label' => __('Star'),
                            ),
                            array(
                                'value' => 'fa-heart',
                                'label' => __('Heart'),
                            ),
                            array(
                                'value' => 'fa-map',
                                'label' => __('Map'),
                            ),
                            array(
                                'value' => 'fa-map-signs',
                                'label' => __('Map signs'),
                            ),
                            array(
                                'value' => 'fa-question-circle',
                                'label' => __('Question'),
                            ),
                            array(
                                'value' => 'fa-wrench',
                                'label' => __('Wrench'),
                            ),
                            array(
                                'value' => 'fa-suitcase',
                                'label' => __('Suitcase'),
                            ),
                            array(
                                'value' => 'fa-gift',
                                'label' => __('Gift'),
                            ),
                            array(
                                'value' => 'fa-check-square-o',
                                'label' => __('Check'),
                            ),
                        ),
                        'default' => array(
                            '',
                        ),
                    ),
                    array(
                        'type' => 'textbox',
                        'name' => 'i_title',
                        'label' => __('Title', 'beverage'),
                        'description' => __('Our services item title'),
                        'default' => '',
                        'validation' => '',
                    ),
                    array(
                        'type' => 'textarea',
                        'name' => 'i_content',
                        'label' => __('Content', 'beverage'),
                        'description' => __('Our services item content'),
                        'default' => '',
                        'validation' => '',
                    ),
                ),
            ),
        ),
    ),
    array(
        'type' => 'toggle',
        'name' => 'o_promo',
        'label' => __('Enable Promotion Banner?'),
        'description' => __('If enable you can add promotion banner product'),
        'default' => '0',
    ),
    array(
        'type'      => 'group',
        'name'      => 'o_promoitem',
        'repeating' => false,
        'title'     => __('Promotion Banner'),
        'dependency' => array(
            'field'    => 'o_promo',
            'function' => 'vp_dep_boolean',
        ),
        'fields'    => array(
            array(
                'type' => 'textbox',
                'name' => 'p_title',
                'label' => __('Title'),
                'description' => __('Main banner title'),
                'default' => '',
                'validation' => ''
            ),
            array(
                'type' => 'textarea',
                'name' => 'p_content',
                'label' => __('Content'),
                'description' => __('Banner content'),
                'default' => '',
                'validation' => ''
            ),
            array(
                'type' => 'upload',
                'name' => 'p_img',
                'label' => __('Image'),
                'description' => __('Banner image'),
                'default' => '',
                'validation' => ''
            ),  
        ),
    )
);