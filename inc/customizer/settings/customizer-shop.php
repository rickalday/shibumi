<?php
/**
 * Customization of Shop
 *
 * @package shibumi
 */

Kirki::add_config( 'shibumi', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'option',
	'option_name'   => 'shibumi',
) );

/**
 * Section
 */

Kirki::add_section( 'call_action_settings', array(
	'title'          => esc_html__( 'Home Page Settings', 'shibumi' ),
	'priority' => 2,
	'panel'    => 'theme_options_panel'
) );



/**
 * Settings
 */

Kirki::add_field( 'shibumi', array(
	'type'        => 'toggle',
	'settings'    => 'front_toggle',
	'label'       => esc_attr__( 'Enable Home Section', 'shibumi' ),
	'section'     => 'call_action_settings',
	'default'     => 0,
	'priority'    => 1,
) );

Kirki::add_field( 'shibumi', array(
	'type'        => 'repeater',
	'label'       => esc_attr__( 'Elements', 'shibumi' ),
	'section'     => 'call_action_settings',
	'priority'    => 10,
	'row_label' => array(
		'type'  => 'field',
		'value' => esc_attr__('Element', 'shibumi' ),
		'field' => 'action_title',
	),
	'active_callback'    => array(
		array(
			'setting' => 'front_toggle',
			'value'   => '1',
			'operator'=> '==',
		),
	),
	'settings'    => 'front_action',
	'default'     => array(
		array(
			'action_type'         => 'none',
			'action_title'        => 'Title',
			'action_category'     => '',
			'action_slider_style' => 'two',
			'action_archive_style'=> 'side',
			'action_number'       => 8,
			'action_cta_image'    => '',
			'action_cta_text'     => '',
			'action_cta_link'     => '',
			'action_cta_button'   => '',
			//'action_page_select'  => '',

		)
	),
	'fields' => array(
		'action_type' => array(
			'type'        => 'radio',
			'label'       => __( 'Element Type', 'shibumi' ),
			'default'     => '',
			'choices'     => array(
				'slider' => esc_attr__( 'Slider', 'shibumi' ),
				'archive' => esc_attr__( 'Archive', 'shibumi' ),
				'cta' => esc_attr__( 'Call to Action', 'shibumi' ),
				'portfolio-slider' => esc_attr__( 'Portfolio Slider', 'shibumi' ),
				'portfolio-archive' => esc_attr__( 'Portfolio Archive', 'shibumi' ),
			),
		),
		'action_title' => array(
			'type'     => 'text',
			'label'    => __( 'Title', 'shibumi' ),
			'description' => __( 'Title for this element', 'shibumi' ),
			'sanitize_callback' => 'wp_kses_post',
			'default'  => '',
		),

		// cateogry
		'action_category' => array(
			'type'        => 'select',
			'label'       => __( 'Categories', 'shibumi' ),
			'description' => __( 'Select category to be displayed in this element', 'shibumi' ),
			'default'     => 0,
			'choices'     => $categories,
		),

		// slider
		'action_slider_style' => array(
			'type'        => 'radio',
			'label'       => __( 'Slider Style', 'shibumi' ),
			'description' => __( 'Choose style of this slider', 'shibumi' ),
			'default'     => 'two',
			'choices'     => array(
				'two' => esc_attr__( 'Film Strip', 'shibumi' ),
				'side' => esc_attr__( 'Classic', 'shibumi' ),
				'float' => esc_attr__( 'Horizontal', 'shibumi' ),
			),
		),

		// archive
		'action_archive_style' => array(
			'type'        => 'radio',
			'label'       => __( 'Archive Style', 'shibumi' ),
			'description' => __( 'Choose style of this archive', 'shibumi' ),
			'default'     => 'side',
			'choices'     => array(
				'side'    => esc_attr__( 'Two Column', 'shibumi' ),
				'masonry' => esc_attr__( 'Masonry', 'shibumi' ),
				'list'    => esc_attr__( 'List', 'shibumi' ),
			),
		),

		'action_number' => array(
			'type'     => 'number',
			'label'    => __( 'Number of Posts', 'shibumi' ),
			'description' => __( 'Select from 1 to 20', 'shibumi' ),
			'default'  => 8,
			'choices'     => array(
				'min'  => 1,
				'max'  => 20,
				'step' => 1,
			),
		),

		// CTA
		'action_cta_image' => array(
			'type'     => 'image',
			'label'    => __( 'Call to Action Image', 'shibumi' ),
			'default'  => '',
		),
		'action_cta_text' => array(
			'type'     => 'textarea',
			'label'    => __( 'Call to Action Text', 'shibumi' ),
			'sanitize_callback' => 'wp_kses_post',
			'default'  => '',
		),
		'action_cta_link' => array(
			'type'     => 'link',
			'label'    => __( 'Call to Action Link', 'shibumi' ),
			'description' => __( 'Leave empty if you don&#39;t want link', 'shibumi' ),
			'default'  => '',
		),
		'action_cta_button' => array(
			'type'     => 'text',
			'label'    => __( 'Call to Action Button Text', 'shibumi' ),
			'default'  => '',
		),

		// Promo Pages
		/*
		'action_page_select' => array(
			'type'     => 'select',
			'label'    => __( 'Promo Page', 'shibumi' ),
			'multiple'    => 3,
			'default'  => '',
			'choices'     => Kirki_Helper::get_posts(
				array(
					'post_type'      => 'page'
				)
			),
		),
		*/
	),
) );
