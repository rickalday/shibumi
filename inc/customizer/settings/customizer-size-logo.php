<?php
/**
 * Customizer Logo Size Setting
 *
 * @package shibumi
 */


Kirki::add_field( 'shibumi', array(
    'type'        => 'slider',
    'settings'    => 'size_logo',
    'label'       => __( 'Logo Size', 'shibumi' ),
    'section'     => 'title_tagline',
    'priority'    => 8,
    'default'     => 50,
    'choices'     => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 10,
    ),
    'active_callback' => 'has_custom_logo',
) );
