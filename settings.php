<?php

function phptemplate_settings($saved_settings) {

  $settings = theme_get_settings('whistler');

  $defaults = array(
    'whistler_style' => 0,
    'whistler_width' => 0,
    'whistler_fixedwidth' => '850',
    'whistler_breadcrumb' => 0,
    'whistler_iepngfix' => 0,
    'whistler_fontfamily' => 0,
    'whistler_customfont' => '',
    'whistler_uselocalcontent' => 0,
    'whistler_localcontentfile' => '',
    'whistler_leftsidebarwidth' => '25',
    'whistler_rightsidebarwidth' => '25',
    'whistler_suckerfish' => 0,
    'whistler_usecustomlogosize' => 0,
    'whistler_logowidth' => '100',
    'whistler_logoheight' => '100',
  );

  $settings = array_merge($defaults, $settings);

  $form['whistler_style'] = array(
    '#type' => 'select',
    '#title' => t('Style'),
    '#default_value' => $settings['whistler_style'],
    '#options' => array(
      'blue' => t('Blue'),
	    'green' => t('Green'),
	    'red' => t('Red'),
    ),
  );

  $form['whistler_width'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use Fixed Width'),
    '#default_value' => $settings['whistler_width'],
  );

  $form['whistler_fixedwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Fixed Width Size'),
    '#default_value' => $settings['whistler_fixedwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['whistler_breadcrumb'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Breadcrumbs'),
    '#default_value' => $settings['whistler_breadcrumb'],
  );

  $form['whistler_iepngfix'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use IE PNG Fix'),
    '#default_value' => $settings['whistler_iepngfix'],
  );
  
  $form['whistler_fontfamily'] = array(
    '#type' => 'select',
    '#title' => t('Font Family'),
    '#default_value' => $settings['whistler_fontfamily'],
    '#options' => array(
      '"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif' => t('"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif'),
      '"Arial Narrow", Arial, Helvetica, sans-serif' => t('"Arial Narrow", Arial, Helvetica, sans-serif'),
      '"Times New Roman", Times, serif' => t('"Times New Roman", Times, serif'),
      '"Lucida Sans", Verdana, Arial, sans-serif' => t('"Lucida Sans", Verdana, Arial, sans-serif'),
      '"Lucida Grande", Verdana, sans-serif' => t('"Lucida Grande", Verdana, sans-serif'),
      'Tahoma, Verdana, Arial, Helvetica, sans-serif' => t('Tahoma, Verdana, Arial, Helvetica, sans-serif'),
      'Georgia, "Times New Roman", Times, serif' => t('Georgia, "Times New Roman", Times, serif'),
      'Custom' => t('Custom (specify below)'),
    ),
  );

  $form['whistler_customfont'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom Font-Family Setting'),
    '#default_value' => $settings['whistler_customfont'],
    '#size' => 40,
    '#maxlength' => 75,
  );

  $form['whistler_uselocalcontent'] = array(
    '#type' => 'checkbox',
    '#title' => t('Include Local Content File'),
    '#default_value' => $settings['whistler_uselocalcontent'],
  );

  $form['whistler_localcontentfile'] = array(
    '#type' => 'textfield',
    '#title' => t('Local Content File Name'),
    '#default_value' => $settings['whistler_localcontentfile'],
    '#size' => 40,
    '#maxlength' => 75,
  );

  $form['whistler_leftsidebarwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Left Sidebar Width'),
    '#default_value' => $settings['whistler_leftsidebarwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['whistler_rightsidebarwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Right Sidebar Width'),
    '#default_value' => $settings['whistler_rightsidebarwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['whistler_suckerfish'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use Suckerfish Menus'),
    '#default_value' => $settings['whistler_suckerfish'],
  );

  $form['whistler_usecustomlogosize'] = array(
    '#type' => 'checkbox',
    '#title' => t('Specify Custom Logo Size'),
    '#default_value' => $settings['whistler_usecustomlogosize'],
  );

  $form['whistler_logowidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Logo Width'),
    '#default_value' => $settings['whistler_logowidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['whistler_logoheight'] = array(
    '#type' => 'textfield',
    '#title' => t('Logo Height'),
    '#default_value' => $settings['whistler_logoheight'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  return $form;
}
