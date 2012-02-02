<?php
// $Id$

function phptemplate_body_class($sidebar_left, $sidebar_right) {
  if ($sidebar_left != '' && $sidebar_right != '') {
    $class = 'sidebars';
  }
  else {
    if ($sidebar_left != '') {
      $class = 'sidebar-left';
    }
    if ($sidebar_right != '') {
      $class = 'sidebar-right';
    }
  }
  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}

if (is_null(theme_get_setting('whistler_style'))) {
  global $theme_key;
  // Save default theme settings
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
    'whistler_leftsidebarwidth' => '210',
    'whistler_rightsidebarwidth' => '210',
    'whistler_suckerfish' => 0,
    'whistler_usecustomlogosize' => 0,
    'whistler_logowidth' => '100',
    'whistler_logoheight' => '100',
  );

  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge(theme_get_settings($theme_key), $defaults)
  );
  // Force refresh of Drupal internals
  theme_get_setting('', TRUE);
}

function get_whistler_style() {
  $style = theme_get_setting('whistler_style');
  if (!$style)
  {
    $style = 'blue';
  }
  if (isset($_COOKIE["whistlerstyle"])) {
    $style = $_COOKIE["whistlerstyle"];
  }
  return $style;
}

$style = get_whistler_style();
drupal_add_css(drupal_get_path('theme', 'whistler') . '/css/' . $style . '.css', 'theme');

if (theme_get_setting('whistler_iepngfix')) {
   drupal_add_js(drupal_get_path('theme', 'whistler') .'/js/jquery.pngFix.js', 'theme');
}

function _phptemplate_variables($hook, $vars) {
  if (module_exists('advanced_profile')) {
    $vars = advanced_profile_addvars($hook, $vars);
  }
  if (module_exists('advanced_forum')) {
    $vars = advanced_forum_addvars($hook, $vars);
  }
  if ($hook == 'page') {
    if (module_exists('page_title')) {
      $vars['head_title'] = page_title_page_get_title();
    }
  }
  return $vars;
}

if (theme_get_setting('whistler_uselocalcontent')) {
  $local_content = drupal_get_path('theme', 'whistler') .'/'. theme_get_setting('whistler_localcontentfile');
  if (file_exists($local_content)) {
    drupal_add_css($local_content, 'theme');
  }
}


function phptemplate_links($links, $attributes = array('class' => 'links')) {
  $output = '';

  if (count($links) > 0) {
    $output = '<ul'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))) {
        $class .= ' active';
      }
      $output .= '<li'. drupal_attributes(array('class' => $class)) .'>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
				$title = '<span class="left"><span class="center">'. $link['title']. '</span></span><span  class="right"></span>';
				$link['html'] = TRUE;
        $output .= l($title, $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }
      $i++;
      $output .= "</li>\n";
    }
    $output .= '</ul>';
  }
  return $output;
}
