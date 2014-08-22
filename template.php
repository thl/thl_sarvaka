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