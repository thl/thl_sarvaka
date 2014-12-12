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
  $variables['breadcrumb'] = menu_get_active_breadcrumb();
  $variables['breadcrumb'][] = ($variables['is_front'])? 'Home' : drupal_get_title();
  $variables['theme_path'] = $base; 
}

function thl_sarvaka_preprocess_html(&$vars) {
	//<link href='http://fonts.googleapis.com/css?family=PT+Sans:700,400italic' rel='stylesheet' type='text/css'>
	//<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	drupal_add_css('http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic', array('type' => 'external'));
}
