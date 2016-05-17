<?php


/**
 * PREPROCESS FUNCTIONS
 */
 
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
 
/*
 * Implements hook_preprocess
 * Add theme_path to all templates
 */
function thl_sarvaka_preprocess(&$variables) {
  global $base_url, $base_path;
  $base = $base_url . $base_path . drupal_get_path('theme', 'thl_sarvaka') . '/';
  $variables['base_color'] = theme_get_setting('shanti_sarvaka_base_color');
  $variables['breadcrumb'] = menu_get_active_breadcrumb();
  $variables['breadcrumb'][] = ($variables['is_front'])? 'Home' : drupal_get_title();
  $variables['theme_path'] = $base; 
}

function thl_sarvaka_preprocess_html(&$vars) {
	//<link href='http://fonts.googleapis.com/css?family=PT+Sans:700,400italic' rel='stylesheet' type='text/css'>
	//<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	drupal_add_css('http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic', array('type' => 'external'));
}
