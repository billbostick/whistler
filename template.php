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

function whistler_regions() {
  return array(
    'sidebar_left' => t('left sidebar'),
    'sidebar_right' => t('right sidebar'),
    'content_top' => t('content top'),
    'content_bottom' => t('content bottom'),
    'header' => t('header'),
		'banner' => t('banner'),
    'suckerfish' => t('suckerfish menu'),
    'user1' => t('user1'),
    'user2' => t('user2'),
    'user3' => t('user3'),
    'user4' => t('user4'),
    'user5' => t('user5'),
    'user6' => t('user6'),
    'user7' => t('user7'),
    'user8' => t('user8'),
    'footer_region' => t('footer')
  );
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


function whistler_block($block) {
  if (module_exists('blocktheme')) {
    if ( $custom_theme = blocktheme_get_theme($block) ) {
      return _phptemplate_callback($custom_theme, array('block' => $block));
    }
  }
  return phptemplate_block($block);
}

if (theme_get_setting('whistler_uselocalcontent')) {
  $local_content = drupal_get_path('theme', 'whistler') .'/'. theme_get_setting('whistler_localcontentfile');
  if (file_exists($local_content)) {
    drupal_add_css($local_content, 'theme');
  }
}


function phptemplate_menu_links($primary_links){
  if ($plinks = $primary_links) {
    foreach ($plinks as $key => $link) {
      if (stristr($key, 'active')) {
        $plinks[$key]['attributes']['class'] = 'active';
      }
      $plinks[$key]['html'] = true;
      $plinks[$key]['title'] = $link['title'];
    }
  return theme('links',$plinks, array('class' => 'links primary-links'));
  }
}

// this code overrides drupals default theme_menu_tree in favor of the next routine
function phptemplate_menu_tree($pid = 1) {
  if ($tree = phptemplate_menu_tree_improved($pid)) {
    return "\n<ul class=\"menu\">\n". $tree ."\n</ul>\n";
  }
}

// This code adds several class selectors to menu items. We use the first and last class
// in order to display the divider pipes between items in the footer menu
function phptemplate_menu_tree_improved($pid = 1) {
  $menu = menu_get_menu();
  $output = '';

  if (isset($menu['visible'][$pid]) && $menu['visible'][$pid]['children']) {
    $num_children = count($menu['visible'][$pid]['children']);
    for ($i=0; $i < $num_children; ++$i) {
      $mid = $menu['visible'][$pid]['children'][$i];
      $type = isset($menu['visible'][$mid]['type']) ? $menu['visible'][$mid]['type'] : NULL;
      $children = isset($menu['visible'][$mid]['children']) ? $menu['visible'][$mid]['children'] : NULL;
      $extraclass = $i == 0 ? 'first' : ($i == $num_children-1 ? 'last' : '');
      $output .= theme('menu_item', $mid, menu_in_active_trail($mid) || ($type & MENU_EXPANDED) ? theme('menu_tree', $mid) : '', count($children) == 0, $extraclass);
      }
  }
  return $output;
}

// this function adds the expanded and collapsed class to menu items
function phptemplate_menu_item($mid, $children = '', $leaf = TRUE, $extraclass = '') {
  return '<li class="'. ($leaf ? 'leaf' : ($children ? 'expanded' : 'collapsed')) . ($extraclass ? ' ' . $extraclass : '') . '">'. menu_item_link($mid, TRUE, $extraclass) . $children ."</li>\n";
}

