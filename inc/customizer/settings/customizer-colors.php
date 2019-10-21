<?php
/**
 * Customizer Custom Colors
 *
 * Here you can define your own CSS rules
 *
 * @package  Shibumi
 */

/*
 *
 * Sections
 *
 */
$wp_customize->add_section( 'shibumi_colors_section', array(
    'title'    => esc_html__( 'Colors Settings', 'shibumi' ),
    'priority' => 220,
    'panel'    => 'theme_options_panel'
) );

/**
 *
 * Settings
 *
 */

/* GENERAL COLORS */

// Body BG color
$wp_customize->add_setting( 'shibumi_body_bg_color', array(
    'default'           => '#ffffff',
    'sanitize_callback' => 'shibumi_sanitize_color'
));

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'shibumi_body_bg_color',
        array(
            'label'    => esc_html__( 'Background Color', 'shibumi' ),
            'section'  => 'shibumi_colors_section',
        ) )
);

// Accent color
$wp_customize->add_setting( 'shibumi_accent_color', array(
    'default'           => '#616369',
    'sanitize_callback' => 'shibumi_sanitize_color'
));

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'shibumi_accent_color',
        array(
            'label'    => esc_html__( 'Accent Color', 'shibumi' ),
            'section'  => 'shibumi_colors_section',
        ) )
);

// Headline color
$wp_customize->add_setting( 'shibumi_headline_color', array(
    'default'           => '#000',
    'sanitize_callback' => 'shibumi_sanitize_color'
));

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'shibumi_headline_color',
        array(
            'label'    => esc_html__( 'Headline Color', 'shibumi' ),
            'section'  => 'shibumi_colors_section',
        ) )
);

// Paragraph color
$wp_customize->add_setting( 'shibumi_paragraph_color', array(
    'default'           => '#000',
    'sanitize_callback' => 'shibumi_sanitize_color'
));

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'shibumi_paragraph_color',
        array(
            'label'    => esc_html__( 'Paragraph / Text Color', 'shibumi' ),
            'section'  => 'shibumi_colors_section',
        ) )
);

// Secondary Body BG color
$wp_customize->add_setting( 'shibumi_sec_body_bg_color', array(
    'default'           => '#222',
    'sanitize_callback' => 'shibumi_sanitize_color'
));

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'shibumi_sec_body_bg_color',
        array(
            'label'    => esc_html__( 'Secondary Background Color', 'shibumi' ),
            'section'  => 'shibumi_colors_section',
        ) )
);

// Secondary Text color
$wp_customize->add_setting( 'shibumi_sec_text_color', array(
    'default'           => '#fcfcfc',
    'sanitize_callback' => 'shibumi_sanitize_color'
));

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'shibumi_sec_text_color',
        array(
            'label'    => esc_html__( 'Secondary Text Color', 'shibumi' ),
            'section'  => 'shibumi_colors_section',
        ) )
);
