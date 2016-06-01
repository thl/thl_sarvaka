<?php


/**
 * PREPROCESS FUNCTIONS
 */
 
/*
 * Implements hook_preprocess
 * Add theme_path to all templates
 */
function thl_sarvaka_preprocess(&$variables) {
  global $base_url, $base_path;
  $base = $base_url . $base_path . drupal_get_path('theme', 'thl_sarvaka') . '/';
  $variables['base_color'] = theme_get_setting('shanti_sarvaka_base_color');
  $variables['icon_class'] = theme_get_setting('shanti_sarvaka_icon_class');
  $variables['breadcrumb'] = menu_get_active_breadcrumb();
  $variables['breadcrumb'][] = ($variables['is_front'])? 'Home' : drupal_get_title();
  $variables['theme_path'] = $base; 
  
  $options = array(
    'group' => JS_THEME,
    'weight' => 1000,
  );
$path = drupal_get_path('module', 'kmaps_explorer');
  drupal_add_library('system', 'drupal.ajax');
  drupal_add_js(array('kmaps_explorer' => array('app' => 'places')), 'setting');
  drupal_add_js('https://maps.googleapis.com/maps/api/js?v=3.exp', 'external');
  drupal_add_js($path . '/js/google_maps.js', $options);
  drupal_add_js($path . '/js/jquery.bxslider-rahisified.js', $options);
  drupal_add_js($path . '/js/bxslider-initialize.js', $options);
  drupal_add_js($path . '/js/custom.js', $options);
}

function thl_sarvaka_preprocess_html(&$vars) {
    //<link href='http://fonts.googleapis.com/css?family=PT+Sans:700,400italic' rel='stylesheet' type='text/css'>
    //<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    drupal_add_css('http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic', array('type' => 'external'));
}

/**
 * Implements HOOK_breadcrumb().
 * Customizes output of breadcrumbs
 */
function thl_sarvaka_breadcrumb($variables) {
  global $base_url;
  $app = explode("/", current_path());
  $app = $app[0];
  $breadcrumbs = is_array($variables['breadcrumb']) ? $variables['breadcrumb'] : array();
  $output = '<ol class="breadcrumb">';
  array_unshift($breadcrumbs, '<a href="' . base_path() . $app . '">' . theme_get_setting('shanti_sarvaka_breadcrumb_intro') . '</a>');
  if(count($breadcrumbs) > 1) {
    $breadcrumbs[0] = str_replace('</a>', ':</a>', $breadcrumbs[0]);
  }
  $lidx = count($breadcrumbs) - 1;
  $breadcrumbs[$lidx] = '<a href="#">' . $breadcrumbs[$lidx] . '</a>';
  foreach($breadcrumbs as $crumb) {
    $icon = ($breadcrumbs[0] == $crumb) ? '' : ' <span class="icon shanticon-arrow3-right"></span>';
    $output .= "<li>$crumb$icon</li>";
  }
  $output .= '</ol>';
  return $output;
}
 