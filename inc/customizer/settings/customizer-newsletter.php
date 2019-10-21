<?php
/**
 * Customization of Newsletter
 *
 * @package shibumi
 */


/* --- Settings --- */

$wp_customize->add_setting( 'newsletter_toggle', array(
    'default'           => 1,
    'sanitize_callback' => 'shibumi_sanitize_select'
) );

$wp_customize->add_control( 'newsletter_toggle', array(
    'label'    => esc_attr__( 'Display newsletter form in the pre-footer area', 'shibumi' ),
    'description' => esc_attr__( 'Customize in Settings > MailChimp Setup', 'shibumi' ),
    'section'  => 'footer_section',
    'priority' => 1,
    'type'     => 'checkbox'
) );

// Divider
$wp_customize->add_setting( 'shibumi_divider_2', array(
    'sanitize_callback' => 'shibumi_sanitize_text',
) );

// Divider
$wp_customize->add_control( new WP_Customize_Divider_Control(
    $wp_customize,
    'shibumi_divider_2',
        array(
            'section'  => 'footer_section',
            'priority' => 2
        )
) );
